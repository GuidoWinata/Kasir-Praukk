<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable = [
        'pelangganID',
        'TanggalPenjualan',
        'TotalHarga',
        'tempat_id',
        'created_by'
    ]; 
    public $timestamps = false;

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelangganID');
    }
}
