<div class="container">
    <div class="row">
        <div class="col-md-3">
          @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <h2>Halaman Layanan</h2>

            @include('layouts/layanan/tambah')
            {{-- @include('layouts/layanan/edit') --}}
            {{-- @include('layouts/layanan/hapus') --}}
            @include('layouts/flashdata')

            <button wire:click="show_tambah" type="button" class="btn btn-primary btn-sm mb-3">
                Tambah Layanan
            </button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%" scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Harga</th>
                        <th width="10%" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layanan as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->durasi }} jam</td>
                            <td>Rp. {{ number_format($item->harga) }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="show_edit({{$item->id}})" type="button" class="btn btn-sm btn-primary mr-2">Edit</button>
                                <button wire:click="show_hapus({{$item->id}})" type="button" class="btn btn-sm btn-danger">Hapus</button>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $layanan->links() }}
        </div>
    </div>
</div>
