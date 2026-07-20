<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('admin.transactions');
        }
        $categories = Category::withCount('products')->with('products')->latest()->get();
        $totalProducts = \App\Models\Product::count();
        $totalStock = \App\Models\Product::sum('stock');
        return view('admin.categories', compact('categories', 'totalProducts', 'totalStock'));
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

        $category->products()->delete();
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
