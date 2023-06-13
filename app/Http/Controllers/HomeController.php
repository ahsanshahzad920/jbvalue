<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $request  = request();
        $items = items::withAvg('valueYesterday', 'value');

        if ($request->input('q')) {
            $items->where('name', 'LIKE', "%" . $request->input('q') . "%");
        }
        $sort_filter = $request->input('sort');
        if ($sort_filter) {
            $sort_filter = explode('.', $sort_filter);
            $items->orderBy($sort_filter[0], $sort_filter[1]);
        }

        $items = $items->get();

        if ($request->input('value_from')) {
            $items = $items->where('value_yesterday_avg_value', '>=', $request->input('value_from'));
        }
        if ($request->input('value_to')) {
            $items =  $items->where('value_yesterday_avg_value', '<=', $request->input('value_to'));
        }
        $items = $items->all();

        return view('home', compact('items'));
    }

    public function items()
    {
        return view('pages.items');
    }
}
