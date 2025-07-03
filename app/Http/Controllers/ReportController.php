<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalReceipt;
use App\Models\MedicalReceiptItem;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function a()
    {
        $results = Patient::where('jenis_kelamin', 'P')
            ->whereBetween('umur', [19, 30])
            ->whereHas('receipts', function ($query) {
                $query->whereMonth('tanggal_periksa', 8)->whereYear('tanggal_periksa', 2015);
            })->get();

        return view('reports.a', compact('results'));
    }

    public function b()
    {
        $results = Doctor::with(['receipts' => function ($q) {
            $q->whereYear('tanggal_periksa', 2015);
        }])->get();

        return view('reports.b', compact('results'));
    }

    public function c()
    {
        $results = MedicalReceiptItem::select(
            'keterangan',
            DB::raw('SUM(qty) as total_qty'),
            DB::raw('SUM(subtotal) as total_uang')
        )
            ->whereHas('receipt', function ($query) {
                $query->whereBetween('tanggal_periksa', ['2015-08-01', '2015-12-31']);
            })
            ->groupBy('keterangan')
            ->get();

        return view('reports.c', compact('results'));
    }

    public function d()
    {
        $results = MedicalReceiptItem::select('keterangan', DB::raw('SUM(qty) as total_qty'))
            ->whereHas('receipt', function ($q) {
                $q->whereYear('tanggal_periksa', 2015);
            })
            ->groupBy('keterangan')
            ->orderByDesc('total_qty')
            ->limit(10)
            ->get();

        return view('reports.d', compact('results'));
    }

    public function e()
    {
        $results = Patient::select(
            'nama',
            'umur',
            DB::raw("CASE 
                        WHEN umur < 18 THEN 'Anak-anak'
                        WHEN umur BETWEEN 18 AND 30 THEN 'Dewasa'
                        ELSE 'Orang tua'
                    END AS kategori_umur")
        )
            ->get();

        return view('reports.e', compact('results'));
    }
}
