<?php

namespace App\Http\Controllers;

use App\Models\VoucherBatch;

class PrintController extends Controller
{
    /**
     * Impression A4 d'un lot.
     */
    public function a4(VoucherBatch $batch)
    {
        $batch->load([
            'router',
            'vouchers'
        ]);

        return view('print.a4', [

            'batch'    => $batch,

            'vouchers' => $batch->vouchers,

        ]);
    }

    /**
     * Impression ticket 80 mm.
     */
    public function thermal80(VoucherBatch $batch)
    {
        $batch->load('vouchers');

        return view('print.thermal80', [

            'batch'    => $batch,

            'vouchers' => $batch->vouchers,

        ]);
    }

    /**
     * Impression ticket 58 mm.
     */
    public function thermal58(VoucherBatch $batch)
    {
        $batch->load('vouchers');

        return view('print.thermal58', [

            'batch'    => $batch,

            'vouchers' => $batch->vouchers,

        ]);
    }
}