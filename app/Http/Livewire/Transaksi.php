<?php

namespace App\Http\Livewire;

use App\Mail\TransaksiMail;
use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\Konsumen;
use App\Models\Layanan;
use App\Models\Transaksi as ModelsTransaksi;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Transaksi extends Component
{
    public $nama, $email, $hp, $alamat, $layanan_nama, $berat, $total_bayar, $barang = [];

    public function mount()
    {
        array_push($this->barang, "");
    }

    protected function rules()
    {
        return [
            'nama' => 'required',
            'email' => ['required', 'email'],
            'hp' => ['required', 'digits:12', 'numeric'],
            'alamat' => 'required',
            'layanan_nama' => 'required',
            'berat' => 'required|min:1|numeric',
            'barang' => 'array',
            'barang.*' => 'required'
        ];
    }

    public function tambah_barang()
    {
        array_push($this->barang, "");
    }

    public function hapus_barang($key)
    {
        unset($this->barang[$key]);
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $layanan = Layanan::find($this->layanan_nama);
        
            $user = User::create([
                'name' => $this->nama,
                'email' => $this->email,
                'role_id' => 3
            ]);
    
            Konsumen::create([
                'hp' => $this->hp,
                'alamat' => $this->alamat,
                'user_id' => $user->id,
            ]);
    
            $barang = Barang::create([
                'berat' => $this->berat,
                'user_id' => $user->id,
            ]);
    
            foreach ($this->barang as $item) {
                DetailBarang::create([
                    'barang_id' => $barang->id,
                    'nama' => $item
                ]);
            }
    
            $transaksi = ModelsTransaksi::create([
                'layanan_id' => $this->layanan_nama,
                'barang_id' => $barang->id,
                'total_bayar' => $layanan->harga * $this->berat,
                'tanggal_diterima' => now(),
                'tanggal_diambil' => now()->addHours($layanan->durasi),
                'status' => 0
            ]);

            Mail::to($this->email)->send(new TransaksiMail($transaksi));

            session()->flash('sukses', 'Data berhasil ditambahkan.');
            return redirect('/progres');
        });
    }

    public function render()
    {
        if ($this->layanan_nama && $this->berat) {
            $layanan = Layanan::find($this->layanan_nama);
            $this->total_bayar = $layanan->harga * $this->berat;
        } else {
            $this->total_bayar = 0;
        }
        $layanan = Layanan::all();
        return view('livewire.transaksi', compact('layanan'));
    }
}
