<?php

namespace App\Http\Livewire;

use App\Models\Karyawan as ModelsKaryawan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class Karyawan extends Component
{
    public $tambah;
    public $nama, $email, $password, $password_confirmation, $alamat, $hp;

    protected function rules()
    {
        return [
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'hp' => ['required', 'numeric', 'digits:12'],
            'alamat' => ['required'],
        ];
    }

    public function show_tambah()
    {
        $this->tambah = true;
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->nama, 
            'email' => $this->email, 
            'password' => bcrypt($this->password),
            'role_id' => 2
        ]);

        ModelsKaryawan::create([
            'user_id' => $user->id,
            'hp' => $this->hp,
            'alamat' => $this->alamat
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');
        $this->format();
    }

    public function format()
    {
        unset($this->nama, $this->email, $this->password, $this->password_confirmation, $this->hp, $this->alamat);
        $this->tambah = false;
    }

    public function render()
    {
        $karyawan = ModelsKaryawan::all();
        return view('livewire.karyawan', compact('karyawan'));
    }
}
