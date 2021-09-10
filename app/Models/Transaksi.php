<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['layanan_id', 'barang_id', 'total_bayar', 'status', 'tanggal_diterima', 'tanggal_diambil'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
