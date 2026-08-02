<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount(['lostItems', 'foundItems'])->latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah ada.',
        ]);

        $category = Category::create(['name' => $request->name]);

        ActivityLog::create([
            'activity' => 'Tambah Kategori',
            'description' => "Menambahkan kategori baru '{$category->name}'.",
        ]);

        return back()->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name,' . $id],
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori sudah ada.',
        ]);

        $oldName = $category->name;
        $category->update(['name' => $request->name]);

        ActivityLog::create([
            'activity' => 'Edit Kategori',
            'description' => "Mengubah nama kategori dari '{$oldName}' menjadi '{$category->name}'.",
        ]);

        return back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;

        if ($category->lostItems()->exists() || $category->foundItems()->exists()) {
            return back()->with('error', "Kategori '{$name}' tidak dapat dihapus karena masih digunakan oleh data barang.");
        }

        $category->delete();

        ActivityLog::create([
            'activity' => 'Hapus Kategori',
            'description' => "Menghapus kategori '{$name}'.",
        ]);

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
