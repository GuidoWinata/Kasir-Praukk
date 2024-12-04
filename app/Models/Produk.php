<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'NamaProduk',
        'kategori_id',
        'Price',
        'image_path',
        'Harga',
        'Stok',
        'tempat_id'
    ]; 

    public $timestamps = false;

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}