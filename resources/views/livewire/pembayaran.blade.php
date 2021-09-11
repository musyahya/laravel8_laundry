<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <h2>Halaman Pembayaran</h2>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input value="{{$transaksi->barang->user->name}}" readonly type="text" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input  value="{{$transaksi->barang->user->email}}" readonly  type="text" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="layanan_nama">Layanan</label>
                                <input  value="{{$transaksi->layanan->nama}}" readonly  type="text" class="form-control" id="layanan">
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input value="{{$transaksi->barang->berat}} Kg" readonly type="text" class="form-control" id="berat" min="1">
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input value="Rp. {{number_format($transaksi->total_bayar)}}" readonly type="text" class="form-control"
                                    id="total_bayar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Barang</label>
                                @foreach ($transaksi->barang->detail_barang as $item)
                                    <input value="{{$item->nama}}" type="text" class="form-control mb-3" readonly>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button wire:click="pembayaran" class="btn btn-success btn-sm mt-3">Pembayaran</button>
                    <button wire:click="kembali" class="btn btn-secondary btn-sm mt-3">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>
