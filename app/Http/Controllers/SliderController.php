<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(Request $request){
        $data = DB::table('tb_slider')->first();
        return view('front/cms/slider/index', compact('data'));
    }
}
