<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
 
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
   <div id="hero">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-6">
                <h1 class="display-4">Laravel Laundry</h1>
                <p class="mb-5">Pelayanan yang bagus dan murah</p>
            </div>
            <div class="col-md-6">
                <img src="/images/hero.svg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
   </div>

   <div id="layanan">
       <div class="container">
           <div class="row text-center">
               <div class="col-md-12">
                   <h1>Layanan</h1>
               </div>
               @foreach ($layanan as $item)
                    <div class="col-lg-3 col-6">
                        <div class="card shadow my-4">
                            <div class="card-body">
                                <h2 class="mb-4">{{$item->nama}}</h2>
                                <p>Durasi : {{$item->durasi}} jam</p>
                                <p>Harga : Rp. {{number_format($item->harga)}}</p>
                            </div>
                        </div>
                    </div>
               @endforeach
           </div>
       </div>
   </div>

   <div id="lokasi">
       <div class="container">
           <div class="row text-center">
               <div class="col-md-12">
                   <h1>Lokasi</h1>
               </div>
               <div class="col-md-12 my-4">
                    <iframe scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=1000&amp;height=500&amp;hl=en&amp;q=pahlawan%20semarang+(laravel%20laundry)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="1000" height="500" frameborder="0"></iframe> <a href='https://embedmap.org/'>embed google maps wordpress</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9e3090867dfff3abaadb27be772df8b260c59144'></script>
               </div>
           </div>
       </div>
   </div>

   <div id="footer">
       <p class="text-center">Copyright musyahya 2021</p>
   </div>
</body>
</html>