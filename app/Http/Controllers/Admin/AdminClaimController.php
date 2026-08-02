<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Claim;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class AdminClaimController extends Controller
{
    public function index(Request $request)
    {
        $query = Claim::with(['foundItem.category', 'foundItem.location']);

        if ($request->filled('search')) {
            $query->where('claimer_name', 'like', '%' . $request->search . '%')
                ->orWhere('phone_number', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $claims = $query->latest()->paginate(10)->withQueryString();

        return view('admin.claims.index', compact('claims'));
    }

    public function show($id)
    {
        $claim = Claim::with(['foundItem.category', 'foundItem.location'])->findOrFail($id);

        return view('admin.claims.show', compact('claim'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:Pending,Disetujui,Ditolak'],
            'item_status' => ['nullable', 'in:Diklaim,Dikembalikan'],
        ]);

        $claim = Claim::with('foundItem')->findOrFail($id);
        $foundItem = $claim->foundItem;
        $newStatus = $request->status;

        $claim->update(['status' => $newStatus]);

        if ($newStatus === 'Disetujui') {
            // Update found item status to Diklaim or Dikembalikan (default: Diklaim)
            $itemStatus = $request->input('item_status', 'Diklaim');
            $foundItem->update(['status' => $itemStatus]);

            // Reject all other pending claims for this found item
            Claim::where('found_item_id', $foundItem->id)
                ->where('id', '!=', $claim->id)
                ->where('status', 'Pending')
                ->update(['status' => 'Ditolak']);

            ActivityLog::create([
                'activity' => 'Menyetujui Klaim',
                'description' => "Admin menyetujui klaim #{$claim->id} oleh {$claim->claimer_name} untuk barang '{$foundItem->item_name}'. Status barang menjadi {$itemStatus}.",
            ]);
        } elseif ($newStatus === 'Ditolak') {
            // If item has no other approved claim, keep/revert status to 'Menunggu Pemilik'
            $hasApprovedClaim = Claim::where('found_item_id', $foundItem->id)
                ->where('status', 'Disetujui')
                ->exists();

            if (!$hasApprovedClaim) {
                $foundItem->update(['status' => 'Menunggu Pemilik']);
            }

            ActivityLog::create([
                'activity' => 'Menolak Klaim',
                'description' => "Admin menolak klaim #{$claim->id} oleh {$claim->claimer_name} untuk barang '{$foundItem->item_name}'.",
            ]);
        }

        return back()->with('success', "Status klaim berhasil diperbarui menjadi '{$newStatus}'.");
    }
}
