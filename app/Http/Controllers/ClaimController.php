<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use App\Models\FoundItem;
use App\Models\Notification;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function create($foundItem = null)
    {
        $selectedItem = null;
        if ($foundItem) {
            $selectedItem = FoundItem::with(['category', 'location'])->find($foundItem);
        }

        $availableItems = FoundItem::with(['category', 'location'])
            ->where('status', 'Menunggu Pemilik')
            ->get();

        return view('claims.create', compact('selectedItem', 'availableItems'));
    }

    public function store(StoreClaimRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'Pending';

        $claim = Claim::create($data);

        $foundItem = FoundItem::find($claim->found_item_id);

        Notification::create([
            'title' => 'Pengajuan Klaim Baru',
            'message' => "Pengajuan klaim dari {$claim->claimer_name} untuk barang '{$foundItem->item_name}'.",
        ]);

        return redirect()->route('claims.status', ['phone' => $claim->phone_number])
            ->with('success', 'Pengajuan klaim Anda berhasil dikirim dan sedang menunggu verifikasi Admin.');
    }

    public function status(Request $request)
    {
        $claims = collect();
        $search = $request->query('phone') ?? $request->query('search');

        if (!empty($search)) {
            $claims = Claim::with(['foundItem.category', 'foundItem.location'])
                ->where('phone_number', 'like', '%' . $search . '%')
                ->orWhere('id', $search)
                ->latest()
                ->get();
        }

        return view('claims.status', compact('claims', 'search'));
    }
}
