<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = items::first();
        // dd($item);
        return view('pages.items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    public function updateValue(items $item, Request $request)
    {
        $val = $item->value();
        
        if ($val == 0) {
            $item->valueHistory()->create(['value' => $request->value]);
            return redirect()->back();
        } else if ((($request->value - $val) / $val) < 0.35) {
            $item->valueHistory()->create(['value' => $request->value]);
            return redirect()->back();
        }

        return redirect()->back()->withInput($request->all())
            ->withErrors(['value' => 'Value is greater than 35% threshold']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items = $request->validate([
            'image' => 'required|image',
            'name' => 'required|string',
            'description' => 'required|string',
            'maxspeed' => 'required|integer',
            'type' => 'required|string',
            'value' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $image_path = time() . '.' . $request->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads/images'), $image_path);
        $items['image'] = 'uploads/images/' . $image_path;

        items::create($items);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = items::find($id);
        // dd($item);
        $items = items::whereNot('id', $id)->latest()->limit(3)->get();
        return view('pages.items', compact('items', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $items)
    {
        //
    }
}
