<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $products = Product::with('category')->latest()->get();
        $categories = Category::latest()->get();
        return view('admin.products.index', compact('products', 'categories'));
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
}
