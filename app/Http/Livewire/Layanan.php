<?php

namespace App\Http\Livewire;

use App\Models\Layanan as ModelsLayanan;
use Livewire\Component;
use Livewire\WithPagination;

class Layanan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah;
    public $nama, $durasi, $harga;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'nama' => 'required',
            'durasi' => 'required|min:1|numeric',
            'harga' => 'required|min:1000|numeric',
        ];
    }

    public function show_tambah()
    {
        $this->tambah = true;
    }

    public function store()
    {
        $this->validate();
        
        ModelsLayanan::create([
            'nama' => $this->nama,
            'durasi' => $this->durasi,
            'harga' => $this->harga,
        ]);

        session()->flash('sukses', 'Data berhasil disimpan.');
        $this->format();
    }

    public function format()
    {
        $this->tambah = false;
        unset($this->nama, $this->durasi, $this->harga);
    }

    public function render()
    {
        $layanan = ModelsLayanan::paginate(5);
        return view('livewire.layanan', compact('layanan'));
    }
}
