<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\MedicalReceiptItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalReceipt extends Model
{
    use HasFactory;

    protected $fillable = ['nomor_nota', 'tanggal_periksa', 'total_biaya', 'patient_id'];

    public function items()
    {
        return $this->hasMany(MedicalReceiptItem::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
