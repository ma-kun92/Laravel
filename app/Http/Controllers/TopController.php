<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
// フォームリクエスト
use Illuminate\Http\Request;

class TopController extends Controller{
  public function index(Request $request){
    return view('front/index')->with('message', $request->get('message'));
  }
}
