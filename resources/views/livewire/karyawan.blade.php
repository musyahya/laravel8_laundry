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

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Hp</th>
                    <th scope="col">Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($karyawan as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->hp}}</td>
                        <td>{{$item->alamat}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>