<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class Progres extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function aksi(Transaksi $transaksi)
    {
        $transaksi->update([
            'status' => $transaksi->status +1
        ]);
        session()->flash('sukses', 'Aksi berhasil dijalankan.');
    }

    public function format_search()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $progres = Transaksi::whereHas('barang', function($barang){
                $barang->whereHas('user', function($user){
                    $user->where('name', 'like', '%'. $this->search .'%');
                });
            })->latest()->paginate(5);
        } else {
            $progres = Transaksi::latest()->paginate(5);
        }
        return view('livewire.progres', compact('progres'));
    }
}
