@component('mail::message')
# Barang berhasil diterima

@component('mail::table')
|                  |                                                                            |
| ---------------- | -------------------------------------------------------------------------- | 
| Nama             | {{$transaksi->barang->user->name}}                                         | 
| Layanan          | {{$transaksi->layanan->nama}}                                              |
| Berat            | {{$transaksi->barang->berat}}                                              |
| Total Bayar      | {{$transaksi->total_bayar}}                                                |
| Tanggal diterima | {{ \Carbon\Carbon::parse($transaksi->tanggal_diterima)->format('d m Y, H:i') }} |
| Tanggal diambil  | {{ \Carbon\Carbon::parse($transaksi->tanggal_diambil)->format('d m Y, H:i') }}  |
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
