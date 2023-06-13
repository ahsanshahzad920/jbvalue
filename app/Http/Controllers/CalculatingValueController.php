<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatingValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.calculator');
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
    public function show($calculatingValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($calculatingValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $calculatingValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($calculatingValue)
    {
        //
    }
}
