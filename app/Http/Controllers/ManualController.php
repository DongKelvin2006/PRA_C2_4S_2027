<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function shortLink($code)
    {
        $manual = Manual::where('short_link_code', $code)->firstOrFail();
        $brand = Brand::findOrFail($manual->brand_id);

        return redirect()->route('manual.detail', [
            'brand_id' => $brand->id,
            'brand_slug' => $brand->getNameUrlEncodedAttribute(),
            'manual_id' => $manual->id,
        ]);
    }

    public function createShortLink($manual_id)
    {
        $manual = DB::transaction(function () use ($manual_id) {
            $manual = Manual::whereKey($manual_id)
                ->lockForUpdate()
                ->firstOrFail();

            if (empty($manual->short_link_code)) {
                do {
                    $code = strtolower(Str::random(4));
                } while (Manual::where('short_link_code', $code)->exists());

                $manual->short_link_code = $code;
                $manual->save();
            }

            return $manual;
        });

        $brand = Brand::findOrFail($manual->brand_id);

        return redirect()->route('manual.detail', [
            'brand_id' => $brand->id,
            'brand_slug' => $brand->getNameUrlEncodedAttribute(),
            'manual_id' => $manual->id,
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
