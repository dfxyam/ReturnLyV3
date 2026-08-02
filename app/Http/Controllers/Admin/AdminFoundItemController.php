<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class AdminFoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%')
                ->orWhere('finder_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $items = $query->latest()->paginate(10)->withQueryString();

        return view('admin.found-items.index', compact('items'));
    }

    public function show($id)
    {
        $item = FoundItem::with(['category', 'location', 'claims'])->findOrFail($id);

        return view('admin.found-items.show', compact('item'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:Menunggu Pemilik,Diklaim,Dikembalikan'],
            'storage_location' => ['nullable', 'string', 'max:150'],
        ]);

        $item = FoundItem::findOrFail($id);
        $oldStatus = $item->status;

        $updateData = ['status' => $request->status];
        if ($request->has('storage_location')) {
            $updateData['storage_location'] = $request->storage_location;
        }

        $item->update($updateData);

        ActivityLog::create([
            'activity' => 'Update Status Barang Ditemukan',
            'description' => "Status barang ditemukan '{$item->item_name}' (ID: {$item->id}) diubah dari '{$oldStatus}' menjadi '{$request->status}'.",
        ]);

        return back()->with('success', 'Status barang ditemukan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = FoundItem::findOrFail($id);
        $itemName = $item->item_name;
        $item->delete();

        ActivityLog::create([
            'activity' => 'Hapus Barang Ditemukan',
            'description' => "Laporan barang ditemukan '{$itemName}' (ID: {$id}) telah dihapus oleh Admin.",
        ]);

        return redirect()->route('admin.found-items.index')
            ->with('success', 'Laporan barang ditemukan berhasil dihapus.');
    }
}
