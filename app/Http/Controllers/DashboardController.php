<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Models\Voucher;
use App\Models\VoucherBatch;

class DashboardController extends Controller
{
    public function index()
    {
        $routers = Router::count();

        $batches = VoucherBatch::count();

        $vouchers = Voucher::count();

        $used = Voucher::where('used', true)->count();

        $latestBatches = VoucherBatch::latest()
            ->take(10)
            ->get();

        $firstRouter = Router::first();

        return view('dashboard', [

            'routers'      => $routers,

            'batches'      => $batches,

            'vouchers'     => $vouchers,

            'used'         => $used,

            'latestBatches'=> $latestBatches,

            'firstRouter'  => $firstRouter,

        ]);
    }
}