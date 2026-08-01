<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class AdminClaimController extends Controller
{
    public function index(Request $request)
    {
        $query = Claim::with(['foundItem.category', 'lostItem']);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('claim_number', 'like', "%{$search}%")
                  ->orWhere('claimant_name', 'like', "%{$search}%")
                  ->orWhere('claimant_phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $claims = $query->latest()->paginate(10)->withQueryString();

        return view('admin.claims.index', compact('claims'));
    }

    public function show($id)
    {
        $claim = Claim::with(['foundItem.category', 'foundItem.location', 'lostItem'])->findOrFail($id);
        return view('admin.claims.show', compact('claim'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'admin_notes' => 'nullable|string|max:1000',
            'mark_returned' => 'nullable|boolean',
        ]);

        $claim = Claim::findOrFail($id);
        $claim->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        // If approved and admin requested to mark returned
        if ($request->status === 'approved' && $request->boolean('mark_returned')) {
            if ($claim->foundItem) {
                $claim->foundItem->update(['status' => 'returned']);
            }
            if ($claim->lostItem) {
                $claim->lostItem->update(['status' => 'returned']);
            }
        } elseif ($request->status === 'rejected') {
            // Revert found item status back to found if rejected
            if ($claim->foundItem && $claim->foundItem->status === 'claimed') {
                $claim->foundItem->update(['status' => 'found']);
            }
        }

        return back()->with('success', 'Status klaim #' . $claim->claim_number . ' berhasil diperbarui!');
    }
}
