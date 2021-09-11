<div class="list-group d-none d-sm-none d-md-block">
    <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
    @can('admin')
    <a href="/karyawan" class="list-group-item list-group-item-action">Karyawan</a>
    @endcan
    <a href="/layanan" class="list-group-item list-group-item-action">Layanan</a>
    <a href="/transaksi" class="list-group-item list-group-item-action">Transaksi</a>
    <a href="/progres" class="list-group-item list-group-item-action">Progres</a>
</div>