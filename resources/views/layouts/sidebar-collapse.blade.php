<div class="d-sm-block d-md-none">
    <a href=" /dashboard" class="nav-link">Dashboard</a>
    @can('admin')
        <a href="/karyawan" class="nav-link">Karyawan</a>
    @endcan
    <a href="/layanan" class="nav-link">Layanan</a>
    <a href="/transaksi" class="nav-link">Transaksi</a>
    <a href="/progres" class="nav-link">Progres</a>

    <hr>

    <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
