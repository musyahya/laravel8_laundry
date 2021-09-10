<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['user_id', 'berat'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function detail_barang()
    {
        return $this->hasMany(DetailBarang::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
