<?php

namespace App\Charts;

use app\Models\Product;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        //setingan chart 2 langsung menampilkan stok nya berdasarkan nama product
      $products = Product::all(); 
    
        // Mengelompokkan produk berdasarkan nama produk
        $productCountByName = $products->groupBy('name')->map(function($nameProducts) {
            // Menghitung jumlah total stok untuk setiap nama produk
            $totalStock = $nameProducts->sum('stock');
            return $totalStock;
        });
    
        // Ubah data menjadi format yang sesuai untuk chart
        $data = $productCountByName->values()->toArray();
        $labels = $productCountByName->keys()->toArray();
    
        // Buat chart berdasarkan data produk
        $chart = $this->chart->pieChart() // Menggunakan pieChart() untuk chart tipe pie
            ->setTitle('Stok Produk Makanan yang Ada Saat Ini')
            ->setSubtitle('Hans Restaurant') // Penyesuaian dengan setSubtitle yang lebih baru
            ->setLabels($labels); // Tentukan label di sini
    
        // Tambahkan data ke dalam chart
        $chart->addData($data); // Memasukkan data langsung ke dalam chart
    
        return $chart;


        //setingan chart ke 1 yang ini untuk menampilkan data category berdasarkan jumlah product yang ada
        //$products = Product::all(); 
    
        // Mengelompokkan produk berdasarkan kategori
        //$productCountByCategory = $products->groupBy('category')->map->count();
    
        // Ubah data menjadi format yang sesuai untuk chart
        //$data = $productCountByCategory->values()->toArray();
        //$labels = $productCountByCategory->keys()->map(function($category) {
         //   return ucfirst($category); // Mengubah huruf pertama kategori menjadi huruf besar
       // })->toArray();
    
        // Buat chart berdasarkan data produk
        //$chart = $this->chart->pieChart() // Menggunakan pieChart() untuk chart tipe pie
          //  ->setTitle('Stok Produk Makanan yang Ada Saat Ini')
           // ->setSubtitle('Hans Restaurant') // Penyesuaian dengan setSubtitle yang lebih baru
            //->setLabels($labels); // Tentukan label di sini
    
        // Tambahkan data ke dalam chart
        //$chart->addData($data); // Memasukkan data langsung ke dalam chart
    
        //return $chart;
    }
}
