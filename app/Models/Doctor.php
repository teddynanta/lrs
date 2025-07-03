<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function receipts()
    {
        return $this->hasMany(MedicalReceipt::class, 'dokter_id');
    }
}
