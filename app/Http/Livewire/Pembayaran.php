<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class Pembayaran extends Component
{
    public function render()
    {
        $transaksi = Transaksi::find(session('transaksi_id'));
        return view('livewire.pembayaran', compact('transaksi'));
    }
}
