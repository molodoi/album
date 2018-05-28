<?php

namespace App\Http\Controllers;

use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$images = Image::latestWithUser()->paginate(config('app.pagination'));
        $images = Image::paginate(8);
        return view('home', compact('images'));
    }
}
