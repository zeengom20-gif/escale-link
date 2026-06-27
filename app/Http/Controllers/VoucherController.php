<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Models\VoucherBatch;
use App\Services\HotspotService;
use App\Services\MikrotikVoucherService;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Affichage de la page de génération.
     */
    public function index(
        Router $router,
        HotspotService $hotspot
    ) {
        try {

            $profiles = $hotspot->profiles($router);

            $lastBatch = VoucherBatch::with('vouchers')
                ->where('router_id', $router->id)
                ->latest()
                ->first();

            return view('vouchers.index', [

                'router'    => $router,

                'profiles'  => $profiles,

                'lastBatch' => $lastBatch,

            ]);

        } catch (\Throwable $e) {

            return redirect()
                ->route('routers.index')
                ->with('error', $e->getMessage());

        }
    }

    /**
     * Génération d'un nouveau lot.
     */
    public function generate(
        Request $request,
        Router $router,
        MikrotikVoucherService $voucherService
    ) {

        $request->validate([

            'profile'  => 'required',

            'quantity' => 'required|integer|min:1|max:1000',

            'prefix'   => 'nullable|string|max:10',

            'length'   => 'required|integer|min:4|max:20',

            'price'    => 'nullable|numeric',

            'comment'  => 'nullable|string|max:255',

        ]);

        $voucherService->createBatch(

            $router,

            $request->profile,

            (int) $request->quantity,

            $request->prefix ?: 'EL',

            (int) $request->length,

            (float) ($request->price ?? 0),

            $request->comment

        );

        return redirect()
            ->route('vouchers.index', $router)
            ->with('success', 'Les vouchers ont été générés avec succès.');

    }
}