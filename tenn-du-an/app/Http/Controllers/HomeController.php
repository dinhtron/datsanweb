<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function showHome()
    {   $slides = DB::table('slide')->get();
        $sanbong = DB::table('sanbong')->get();
        $id = Session::get('id');
        return view('home', compact('id','slides','sanbong'));
    }
}
