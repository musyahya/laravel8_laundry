<?php

namespace App\Http\Livewire;

use App\Models\Layanan;
use Livewire\Component;

class Transaksi extends Component
{
    public function render()
    {
        $layanan = Layanan::all();
        return view('livewire.transaksi', compact('layanan'));
    }
}
