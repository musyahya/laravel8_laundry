<?php

namespace App\Http\Livewire;

use App\Models\Karyawan as ModelsKaryawan;
use Livewire\Component;

class Karyawan extends Component
{
    public function render()
    {
        $karyawan = ModelsKaryawan::all();
        return view('livewire.karyawan', compact('karyawan'));
    }
}
