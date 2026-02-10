<?php

namespace App\Http\Controllers\module5;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function collections(){
        $products = collect([
            ['name' => 'Laptop', 'price' => 50000],
            ['name' => 'Phone', 'price' => 20000],
            ['name' => 'Tablet', 'price' => 30000],
            ['name' => 'Camera', 'price' => 40000],
            ['name' => 'Watch', 'price' => 10000],
            ['name' => 'Keyboard', 'price' => 5000],
            ['name' => 'Mouse', 'price' => 35000],
        ]);

        //$sun = $products->sum('price');

        $min=$products->min('price');
        $max=$products->max('price');
        $avg=$products->avg('price');
        $sun=$products->sum('price');
        dd("min".$min,"max".$max,"avg".$avg,"sum".$sun);
        

        //echo $sun;

        //dd($sun);
    }
}
