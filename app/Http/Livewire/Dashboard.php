<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $count_diterima = Transaksi::where('status', 0)->count();
        $count_dicuci = Transaksi::where('status', 1)->count();
        $count_dikeringkan = Transaksi::where('status', 2)->count();
        $count_disetrika = Transaksi::where('status', 3)->count();
        $count_menunggu_pembayaran = Transaksi::where('status', 4)->count();
        $count_selesai = Transaksi::where('status', 5)->count();

        $selesai = Transaksi::latest()->limit(5)->get();
        return view('livewire.dashboard', 
            compact('count_diterima', 'count_dicuci', 'count_dikeringkan', 'count_disetrika', 'count_menunggu_pembayaran', 'count_selesai', 'selesai')
        );
    }
}
