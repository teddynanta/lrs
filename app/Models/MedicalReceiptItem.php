<?php

namespace App\Models;

use App\Models\MedicalReceipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalReceiptItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_receipt_id',
        'keterangan',
        'harga_satuan',
        'qty',
        'subtotal'
    ];

    public function receipt()
    {
        return $this->belongsTo(MedicalReceipt::class, 'medical_receipt_id');
    }
}
