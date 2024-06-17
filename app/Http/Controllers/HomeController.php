<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user'] = DB::table('users')->where('id',auth()->user()->id)->first();
        return view('user.home')->with($data);
    }
}
