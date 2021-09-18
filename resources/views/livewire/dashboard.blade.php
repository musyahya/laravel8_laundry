<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/sidebar')
        </div>
        <div class="col-md-9">
            <h2>Halaman Dashboard</h2>

            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Diterima :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_diterima}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Dicuci :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_dicuci}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Dikeringkan :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_dikeringkan}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Disetrika :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_disetrika}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Pandding :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_menunggu_pembayaran}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5>Total Selesai :</h5>
                                </div>
                                <div class="col-md-4">
                                    <h1>{{$count_selesai}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                        <h5 class="card-title">Transaksi Selesai</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="10%" scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Tanggal Diterima</th>
                                    <th scope="col">Tanggal Diambil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selesai as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->barang->user->name }}</td>
                                        <td>Rp. {{ number_format($item->total_bayar) }}</td>
                                        <td>{{ $item->layanan->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_diterima)->format('d m Y, H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_diambil)->format('d m Y, H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                   </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Chart Selesai Transaksi</h5>
                            <div style="height: 32rem;">
                                <livewire:livewire-column-chart
                                    key="{{ $chart->reactiveKey() }}"
                                    :column-chart-model="$chart"
                                />
                             </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>