<?php

namespace App\Http\Controllers;

use App\Models\VoucherBatch;
use Illuminate\Http\Request;

class VoucherHistoryController extends Controller
{
    /**
     * Historique des lots.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $batches = VoucherBatch::with(['router'])
            ->when($search, function ($query) use ($search) {
                $query->where('batch_number', 'like', "%{$search}%")
                    ->orWhere('profile', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('vouchers.history', compact(
            'batches',
            'search'
        ));
    }

    /**
     * Affiche le détail d'un lot.
     */
    public function show(VoucherBatch $batch)
    {
        $batch->load([
            'router',
            'vouchers'
        ]);

        return view('vouchers.show', compact('batch'));
    }

    /**
     * Supprimer un lot.
     */
    public function destroy(VoucherBatch $batch)
    {
        $batch->delete();

        return redirect()
            ->route('vouchers.history')
            ->with('success', 'Lot supprimé.');
    }
}