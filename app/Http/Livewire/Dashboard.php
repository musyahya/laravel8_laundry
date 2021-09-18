<?php

namespace App\Http\Livewire;

use App\Models\Transaksi;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $faker = Factory::create();

        $count_diterima = Transaksi::where('status', 0)->count();
        $count_dicuci = Transaksi::where('status', 1)->count();
        $count_dikeringkan = Transaksi::where('status', 2)->count();
        $count_disetrika = Transaksi::where('status', 3)->count();
        $count_menunggu_pembayaran = Transaksi::where('status', 4)->count();
        $count_selesai = Transaksi::where('status', 5)->count();

        $selesai = Transaksi::latest()->limit(5)->where('status', 5)->get();

        $data_selesai = Transaksi::select(DB::raw('DATE_FORMAT(tanggal_diambil, "%d") as date'), DB::raw('count(DATE_FORMAT(tanggal_diambil, "%d %m %y")) as value'))
            ->groupBy('date')
            ->where('status', 5)
            ->get();

        $data_baru = [];
        for ($a=0; $a < now()->day; $a++) { 
            for ($b=0; $b < count($data_selesai); $b++) { 
                if ($a+1 == $data_selesai[$b]->date) {
                    $data_baru[$a+1] = $data_selesai[$b]->value;
                    break;
                } else {
                    $data_baru[$a+1] = 0;
                }
                
            }
        }
        
        $chart = (new ColumnChartModel());
        foreach ($data_baru as $key => $item) {
            $chart->addColumn($key, $item, $faker->hexColor());
        }

        $chart
            ->withoutLegend()
            ->withDataLabels()
            ->setAnimated(true)
        ;

        return view('livewire.dashboard', 
            compact('count_diterima', 'count_dicuci', 'count_dikeringkan', 'count_disetrika',
             'count_menunggu_pembayaran', 'count_selesai', 'selesai', 'chart')
        );
    }
}
