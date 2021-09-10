<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <h2>Halaman Transaksi</h2>

            @include('layouts/flashdata')

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input wire:model="nama" type="text" class="form-control" id="nama">
                                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model="email" type="email" class="form-control" id="email">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="hp">Hp</label>
                                <input wire:model="hp" type="number" class="form-control" id="hp" min="1">
                                @error('hp') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea wire:model="alamat" class="form-control" id="alamat" rows="3"></textarea>
                                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="layanan_nama">Layanan</label>
                                <select wire:model="layanan_nama" class="form-control" id="layanan_nama">
                                    <option>Pilih Layanan</option>
                                    @foreach ($layanan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} / (Rp.
                                            {{ number_format($item->harga) }})</option>
                                    @endforeach
                                </select>
                                @error('layanan_nama') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input wire:model="berat" type="number" class="form-control" id="berat" min="1">
                                @error('berat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input wire:model="total_bayar" readonly type="text" class="form-control"
                                    id="total_bayar">
                                @error('total_bayar') <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Barang</label>
                                @foreach ($barang as $key => $item)
                                    <div class="input-group mb-2">
                                        <input wire:model="barang.{{$key}}" type="text" class="form-control">
                                        <div class="input-group-prepend">
                                            <div wire:click="hapus_barang({{$key}})" class="input-group-text pointer">x</div>
                                        </div>
                                    </div>
                                @endforeach
                                @error('barang') <small class="text-danger">{{ $message }}</small> @enderror
                                @error('barang.*') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <span wire:click="tambah_barang" class="badge badge-primary pointer">Tambah</span>
                        </div>
                    </div>
                    <button wire:click="store" class="btn btn-success btn-sm mt-3">Simpan Transaksi</button>
                </div>
            </div>
        </div>
    </div>
</div>
