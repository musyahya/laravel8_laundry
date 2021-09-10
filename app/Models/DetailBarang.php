<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    use HasFactory;
    protected $table = 'detail_barang';
    protected $fillable = ['nama', 'barang_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
