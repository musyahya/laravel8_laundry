<?php

namespace App\Http\Livewire;

use App\Mail\PembayaranMail;
use App\Models\Transaksi;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        DB::transaction(function () {
            $transaksi = Transaksi::find(session('transaksi_id'));
            $transaksi->update([
                'status' => 5
            ]);

            Mail::to($transaksi->barang->user->email)->send(new PembayaranMail($transaksi));
    
            session()->forget('transaksi_id');
            session()->flash('sukses', 'Berhasil melakukan pembayaran.');
            return redirect('/progres');
        });
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
