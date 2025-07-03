<?php

namespace App\Models;

use App\Models\MedicalReceipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'umur', 'penanggung'];

    public function receipts()
    {
        return $this->hasMany(MedicalReceipt::class);
    }
}
