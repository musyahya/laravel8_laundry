<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class Pembayaran extends Component
{
    public function mount()
    {
        if (session()->missing('transaksi_id')) {
            return redirect('/progres');
        }
    }

    public function pembayaran()
    {
        Transaksi::whereId(session('transaksi_id'))->update([
            'status' => 5
        ]);

        session()->forget('transaksi_id');
        session()->flash('sukses', 'Berhasil melakukan pembayaran.');
        return redirect('/progres');
    }

    public function kembali()
    {
        return redirect('/progres');
    }

    public function render()
    {
        $transaksi = Transaksi::find(session('transaksi_id'));
        return view('livewire.pembayaran', compact('transaksi'));
    }
}
