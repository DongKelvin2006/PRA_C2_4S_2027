<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manuals = Manual::all();
        return view('pages.adminpage', [
                'manuals' => $manuals,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manual = Manual::findOrFail($id);

        $manual->delete();

        return redirect()->route('page.index')
            ->with('success', 'Manual deleted successfully.');
    }
}
