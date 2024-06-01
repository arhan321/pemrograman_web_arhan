<?php

namespace App\Http\Controllers\Admin;

use App\Charts\adminchart;
use App\Charts\adminchartareachart;
use App\Http\Controllers\Controller;
use App\Charts\pendapatanbulaninichart;

class HomeController extends Controller
{
    public function index(adminchart $chart, adminchartareachart $chartArea, pendapatanbulaninichart $penghasilan_bulan_ini)
    {
        return view('home', [
            'chart' => $chart->build(),
            'chartArea' => $chartArea->build(),
            'penghasilanbulanini' => $penghasilan_bulan_ini->build(), 
        ]);
    }
}