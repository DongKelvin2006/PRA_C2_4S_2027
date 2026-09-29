<?php

namespace App\Http\Controllers;

use App\Models\Manual;

class TestController extends Controller
{
    public function update()
    {
        $manual = Manual::find(1);

        if ($manual) {
            $manual->name = 'Test222';
            $manual->save();

            return 'Naam aangepast!';
        }

        return 'Manual niet gevonden.';
    }
}
