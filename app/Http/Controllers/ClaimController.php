<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClaimController extends Controller
{
    public function create(Request $request)
    {
        $foundItem = null;
        if ($request->filled('found_item_id')) {
            $foundItem = FoundItem::with(['category', 'location'])->find($request->found_item_id);
        }

        $foundItems = FoundItem::where('status', 'found')->get();
        $lostItems = LostItem::where('status', 'lost')->get();

        return view('claims.create', compact('foundItem', 'foundItems', 'lostItems'));
    }

    public function store(StoreClaimRequest $request)
    {
        $data = $request->validated();
        $data['claim_number'] = 'CLM-' . strtoupper(Str::random(8));
        $data['status'] = 'pending';

        $claim = Claim::create($data);

        // Update found item status to claimed while under review
        $foundItem = FoundItem::find($data['found_item_id']);
        if ($foundItem) {
            $foundItem->update(['status' => 'claimed']);
        }

        return redirect()->route('claims.status', ['claim_number' => $claim->claim_number])
            ->with('success', 'Pengajuan klaim berhasil dibuat! Silakan simpan Kode Klaim Anda: ' . $claim->claim_number);
    }

    public function status(Request $request)
    {
        $claim = null;
        if ($request->filled('claim_number')) {
            $claim = Claim::with(['foundItem.category', 'foundItem.location', 'lostItem'])
                ->where('claim_number', trim($request->claim_number))
                ->first();
        }

        return view('claims.status', compact('claim'));
    }
}
