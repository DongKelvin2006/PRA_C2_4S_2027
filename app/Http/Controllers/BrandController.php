<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
public function show($brand_id, $brand_slug)
{
    $brand = Brand::findOrFail($brand_id);

    $manuals = Manual::where('brand_id', $brand_id)->get();

    $top5Manuals = Manual::where('brand_id', $brand_id)
        ->orderByDesc('visited')
        ->take(5)
        ->get();

    return view('pages/manual_list', [
        'brand' => $brand,
        'manuals' => $manuals,
        'top5Manuals' => $top5Manuals
    ]);
}
}
