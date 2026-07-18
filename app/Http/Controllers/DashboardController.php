<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $transactionsCount = Transaction::count();
       
        $todaySalesAmount = Transaction::whereDate('created_at', today())->sum('total_price') ?: 2450000;
        $todayTransactionsCount = Transaction::whereDate('created_at', today())->count() ?: 28;
        
        $recentTransactions = Transaction::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'productsCount',
            'transactionsCount',
            'todaySalesAmount',
            'todayTransactionsCount',
            'recentTransactions'
        ));
    }

    public function transactions()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::latest()->get();
        return view('admin.transactions', compact('products', 'categories'));
    }

    public function storeTransaction(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,qris',
            'total_paid' => 'required_if:payment_method,cash|numeric|min:0',
        ], [
            'cart.required' => 'Keranjang belanja tidak boleh kosong.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'total_paid.required_if' => 'Nominal pembayaran wajib diisi untuk metode tunai.',
        ]);

        try {
            return \DB::transaction(function () use ($request) {
                $datePart = date('Ymd');
                $countToday = Transaction::whereDate('created_at', today())->count();
                $seq = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT);
                $transactionCode = "TX-{$datePart}-{$seq}";

                $totalPrice = 0;
                $itemsToCreate = [];

                foreach ($request->cart as $item) {
                    $product = Product::lockForUpdate()->find($item['id']);
                    
                    if ($product->stock < $item['quantity']) {
                        throw new \Exception("Stok produk '{$product->name}' tidak mencukupi (Tersedia: {$product->stock}).");
                    }

                    $product->decrement('stock', $item['quantity']);

                    $subtotal = $product->price * $item['quantity'];
                    $totalPrice += $subtotal;

                    $itemsToCreate[] = [
                        'product_id' => $product->id,
                        'quantity' => $item['quantity'],
                        'price' => $product->price,
                        'subtotal' => $subtotal,
                        'product_name' => $product->name
                    ];
                }

                $paymentMethod = $request->payment_method;
                $totalPaid = $paymentMethod === 'qris' ? $totalPrice : $request->total_paid;

                if ($totalPaid < $totalPrice) {
                    throw new \Exception("Uang pembayaran tidak mencukupi.");
                }

                $totalChange = $totalPaid - $totalPrice;

                $transaction = Transaction::create([
                    'user_id' => auth()->id(),
                    'transaction_code' => $transactionCode,
                    'total_price' => $totalPrice,
                    'total_paid' => $totalPaid,
                    'total_change' => $totalChange,
                    'payment_method' => $paymentMethod,
                ]);

                foreach ($itemsToCreate as $itemData) {
                    $transaction->items()->create([
                        'product_id' => $itemData['product_id'],
                        'quantity' => $itemData['quantity'],
                        'price' => $itemData['price'],
                        'subtotal' => $itemData['subtotal'],
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi berhasil disimpan!',
                    'data' => [
                        'transaction_code' => $transaction->transaction_code,
                        'created_at' => $transaction->created_at->format('d-m-Y H:i'),
                        'cashier_name' => auth()->user()->name,
                        'total_price' => $transaction->total_price,
                        'total_paid' => $transaction->total_paid,
                        'total_change' => $transaction->total_change,
                        'payment_method' => $transaction->payment_method,
                        'items' => $itemsToCreate,
                    ]
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function products()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $products = Product::with('category')->latest()->get();
        $categories = Category::latest()->get();
        return view('admin.products', compact('products', 'categories'));
    }

    public function createProduct()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $categories = Category::latest()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        if ($request->has('price')) {
            $request->merge([
                'price' => str_replace('.', '', $request->price)
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.unique' => 'Nama produk sudah digunakan.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok produk harus berupa bilangan bulat.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('products'))) {
                mkdir(public_path('products'), 0777, true);
            }
            $file->move(public_path('products'), $filename);
            $data['photo'] = 'products/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function editProduct(Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $categories = Category::latest()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        if ($request->has('price')) {
            $request->merge([
                'price' => str_replace('.', '', $request->price)
            ]);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'name.unique' => 'Nama produk sudah digunakan.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok produk harus berupa bilangan bulat.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        if ($request->hasFile('photo')) {
            if ($product->photo && file_exists(public_path($product->photo))) {
                @unlink(public_path($product->photo));
            }
            
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('products'))) {
                mkdir(public_path('products'), 0777, true);
            }
            $file->move(public_path('products'), $filename);
            $product->photo = 'products/' . $filename;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Produk berhasil diubah.');
    }

    public function deleteProduct(Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        if ($product->photo && file_exists(public_path($product->photo))) {
            @unlink(public_path($product->photo));
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus.');
    }

    public function categories()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $categories = Category::withCount('products')->latest()->get();
        return view('admin.categories', compact('categories'));
    }

    public function createCategory()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah digunakan.',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function editCategory(Category $category)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah digunakan.',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diubah.');
    }

    public function deleteCategory(Category $category)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }

    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.users.CreateKasir');
    }

    public function storeUser(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'role' => 'required|string|in:admin,kasir',
            'shift' => 'nullable|string|in:Pagi,Siang,Malam',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'shift' => $request->shift,
        ];

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0777, true);
            }
            $file->move(public_path('profiles'), $filename);
            $data['profile_picture'] = 'profiles/' . $filename;
        }

        User::create($data);

        return redirect()->route('admin.users')->with('success', 'Akun kasir/admin berhasil dibuat.');
    }

    public function editUser(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        return view('admin.users.EditKasir', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4',
            'role' => 'required|string|in:admin,kasir',
            'shift' => 'nullable|string|in:Pagi,Siang,Malam',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->shift = $request->shift;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                @unlink(public_path($user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0777, true);
            }
            $file->move(public_path('profiles'), $filename);
            $user->profile_picture = 'profiles/' . $filename;
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Akun kasir/admin berhasil diperbarui.');
    }

    public function deleteUser(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }

        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
            @unlink(public_path($user->profile_picture));
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Akun berhasil dihapus.');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'profile_picture.uploaded' => 'Ukuran foto profil terlalu besar (maksimal 2MB) atau file gagal diunggah.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran foto profil terlalu besar (maksimal 2MB).',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                @unlink(public_path($user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('profiles'))) {
                mkdir(public_path('profiles'), 0777, true);
            }
            $file->move(public_path('profiles'), $filename);
            $user->profile_picture = 'profiles/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
