<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="/karyawan" class="list-group-item list-group-item-action">Karyawan</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Halaman Karyawan</h2>

            @include('layouts/karyawan/tambah')
            @include('layouts/karyawan/edit')
            @if (session()->has('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif

            <button wire:click="show_tambah" type="button" class="btn btn-primary btn-sm mb-3">
                Tambah Karyawan
            </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Hp</th>
                        <th scope="col">Alamat</th>
                        <th width="10%" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="show_edit({{$item->id}})" type="button" class="btn btn-sm btn-primary mr-2">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $karyawan->links() }}
        </div>
    </div>
</div>
