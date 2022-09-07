<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function discover()
    {
        return view('discover');
    }

    public function commingSoon()
    {
        return view('CoomingSoon');
    }

    public function Top250()
    {   
        return view('top-250');
    }

    public function MobileGames(){
        return view('mobileGame');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('show',compact('slug'));
    }

    
}
