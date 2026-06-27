<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Services\HotspotService;

class HotspotController extends Controller
{
    public function index(Router $router, HotspotService $hotspot)
    {
        try {

            $servers = $hotspot->servers($router);

            return view('hotspot.index', [
                'router' => $router,
                'servers' => $servers,
            ]);

        } catch (\Throwable $e) {

            return redirect()
                ->route('routers.index')
                ->with('error', $e->getMessage());

        }
    }

    public function users(Router $router, HotspotService $hotspot)
    {
        try {

            $users = $hotspot->users($router);

            return view('hotspot.users', [
                'router' => $router,
                'users' => $users,
            ]);

        } catch (\Throwable $e) {

            return redirect()
                ->route('hotspot.index', $router)
                ->with('error', $e->getMessage());

        }
    }
}