<?php

namespace App\Http\Controllers;

use App\Models\addValue;
use App\Models\items;
use Illuminate\Http\Request;

class AddValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = items::withAvg('valueYesterday', 'value');
        if(request()->input('q')){
            $items->where('name','LIKE', "%".request()->input('q')."%");
        }
        $items = $items->get();
        return view('pages.add-value', compact('items'));
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
    public function show(addValue $addValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(addValue $addValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, addValue $addValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(addValue $addValue)
    {
        //
    }
}
