<?php

namespace App\Http\Livewire;

use App\Models\Layanan as ModelsLayanan;
use Livewire\Component;
use Livewire\WithPagination;

class Layanan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $layanan = ModelsLayanan::paginate(5);
        return view('livewire.layanan', compact('layanan'));
    }
}
