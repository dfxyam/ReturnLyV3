<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class AdminLostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with(['category', 'location']);

        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%')
                ->orWhere('reporter_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $items = $query->latest()->paginate(10)->withQueryString();

        return view('admin.lost-items.index', compact('items'));
    }

    public function show($id)
    {
        $item = LostItem::with(['category', 'location'])->findOrFail($id);

        // Smart Manual Matching: find found items matching category & location with status 'Menunggu Pemilik'
        $matchingFoundItems = FoundItem::with(['category', 'location'])
            ->where('category_id', $item->category_id)
            ->where('location_id', $item->location_id)
            ->where('status', 'Menunggu Pemilik')
            ->get();

        return view('admin.lost-items.show', compact('item', 'matchingFoundItems'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:Belum Ditemukan,Ditemukan,Selesai'],
        ]);

        $item = LostItem::findOrFail($id);
        $oldStatus = $item->status;
        $item->update(['status' => $request->status]);

        ActivityLog::create([
            'activity' => 'Update Status Barang Hilang',
            'description' => "Status barang hilang '{$item->item_name}' (ID: {$item->id}) diubah dari '{$oldStatus}' menjadi '{$request->status}'.",
        ]);

        return back()->with('success', 'Status barang hilang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);
        $itemName = $item->item_name;
        $item->delete();

        ActivityLog::create([
            'activity' => 'Hapus Barang Hilang',
            'description' => "Laporan barang hilang '{$itemName}' (ID: {$id}) telah dihapus oleh Admin.",
        ]);

        return redirect()->route('admin.lost-items.index')
            ->with('success', 'Laporan barang hilang berhasil dihapus.');
    }
}
