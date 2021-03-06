<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class PagesController extends Controller
{
    public function index()
    {
        $redis  = Redis::Connection();
        $redis->incr(Carbon::today()->toDateString());
        return view('home');
    }
}
