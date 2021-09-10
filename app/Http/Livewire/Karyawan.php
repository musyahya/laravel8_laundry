<?php

namespace App\Http\Livewire;

use App\Models\Karyawan as ModelsKaryawan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\WithPagination;

class Karyawan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tambah, $edit, $hapus, $search;
    public $nama, $email, $password, $password_confirmation, $alamat, $hp, $karyawan_id;

    protected function rules()
    {
        $karyawan = ModelsKaryawan::find($this->karyawan_id);

        $rule = [
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'hp' => ['required', 'numeric', 'digits:12'],
            'alamat' => ['required'],
        ];

        if ($this->edit) {
            if (!$this->password && !$this->password_confirmation) {
                $rule['password'] = '';
            }
            if ($this->email == $karyawan->user->email) {
                $rule['email'] = '';
            }
        }

        return $rule;
    }

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function show_edit(ModelsKaryawan $karyawan)
    {
        $this->edit = true;

        $this->karyawan_id = $karyawan->id;
        $this->nama = $karyawan->user->name;
        $this->email = $karyawan->user->email;
        $this->alamat = $karyawan->alamat;
        $this->hp = $karyawan->hp;
    }

    public function update()
    {
        $this->validate();

        $karyawan = ModelsKaryawan::find($this->karyawan_id);

        $data_user = [
            'name' => $this->nama, 
            'email' => $this->email, 
            'password' => bcrypt($this->password),
        ];

        if (!$this->password) {
            unset($data_user['password']);
        }

        $karyawan->user->update($data_user);

        $karyawan->update([
            'hp' => $this->hp,
            'alamat' => $this->alamat
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');
        $this->format();
    }

    public function show_hapus(ModelsKaryawan $karyawan)
    {
        $this->hapus = true;

        $this->karyawan_id = $karyawan->id;
        $this->nama = $karyawan->user->name;
    }

    public function destroy()
    {
        $karyawan = ModelsKaryawan::find($this->karyawan_id);

        User::whereId($karyawan->user_id)->delete();
        $karyawan->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');
        $this->updatingSearch();
        $this->format();
    }

    public function format()
    {
        unset($this->nama, $this->email, $this->password, $this->password_confirmation, $this->hp, $this->alamat, $this->karyawan_id);
        $this->tambah = false;
        $this->edit = false;
        $this->hapus = false;
    }

    public function format_search()
    {
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $karyawan = ModelsKaryawan::whereHas('user', function($user){
                $user->where('name', 'like', '%'. $this->search .'%');
            })->paginate(5);
        } else {
            $karyawan = ModelsKaryawan::paginate(5);
        }
        return view('livewire.karyawan', compact('karyawan'));
    }
}
