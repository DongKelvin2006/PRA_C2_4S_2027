<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            'manual' => $manual,
            'brand' => $brand,
        ]);
    }

    public function visit($manual_id)
    {
        $manual = Manual::findOrFail($manual_id);

        $manual->increment('visited');

        return redirect()->away($manual->url);
    }

    public function SelectTop10()
    {
    return Manual::orderByDesc('visited')
        ->take(10)
        ->get();
    }

    public function homepage()
    {
        $brands = Brand::all()->sortBy('name');
        $manuals = $this->SelectTop10();

        return view('pages.homepage', [
            'brands' => $brands,
            'manuals' => $manuals,
            'name' => 'Kelvin',
        ]);
    }
}
