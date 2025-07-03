<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalReceipt;
use Illuminate\Support\Facades\DB;

class LRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('receipts.create');
    }

    public function indexData()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 1. Create patient
            $patient = Patient::create($request->input('patient'));

            // 2. Calculate total
            $totalBiaya = 0;
            foreach ($request->input('items') as $item) {
                $totalBiaya += $item['harga_satuan'] * $item['qty'];
            }

            // 3. Create receipt
            $receipt = MedicalReceipt::create([
                'patient_id' => $patient->id,
                'nomor_nota' => $request->input('nomor_nota'),
                'tanggal_periksa' => $request->input('tanggal_periksa'),
                'total_biaya' => $totalBiaya,
            ]);

            // 4. Create items
            foreach ($request->input('items') as $item) {
                $receipt->items()->create([
                    'keterangan' => $item['keterangan'],
                    'harga_satuan' => $item['harga_satuan'],
                    'qty' => $item['qty'],
                    'subtotal' => $item['harga_satuan'] * $item['qty'],
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Nota berhasil disimpan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
