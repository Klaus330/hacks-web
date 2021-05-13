<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index()
    {

        $views = $this->getViews();

//        dd($views);
        return view("admin.dashboard", compact("views"));
    }


    public function getViews(){
        $redis = Redis::Connection();

        if(session()->get('user')->institutions === []){
            $views = [
                Carbon::today()->subDays(2)->toDateString() => $redis->get(Carbon::today()->subDays(2)->toDateString()) ?? 0,
                Carbon::today()->subDays(3)->toDateString() => $redis->get(Carbon::today()->subDays(3)->toDateString()) ?? 0,
                Carbon::today()->subDays(4)->toDateString() => $redis->get(Carbon::today()->subDays(4)->toDateString()) ?? 0,
                Carbon::today()->subDays(5)->toDateString() => $redis->get(Carbon::today()->subDays(5)->toDateString()) ?? 0,
                Carbon::today()->subDays(6)->toDateString() => $redis->get(Carbon::today()->subDays(6)->toDateString()) ?? 0,
                Carbon::yesterday()->toDateString() => $redis->get(Carbon::yesterday()->toDateString()) ?? 0,
                Carbon::today()->toDateString() => $redis->get(Carbon::today()->toDateString())
            ];
        }else{
            $id = session()->get("user")->institutions[0]->id;
            $date = Carbon::today()->subDays(2)->toDateString();
            
            $views = [
                Carbon::today()->subDays(2)->toDateString() => $redis->get(sprintf("%s-%s",$id,$date)) ?? 0,
                Carbon::today()->subDays(3)->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::today()->subDays(3)->toDateString())) ?? 0,
                Carbon::today()->subDays(4)->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::today()->subDays(4)->toDateString())) ?? 0,
                Carbon::today()->subDays(5)->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::today()->subDays(5)->toDateString())) ?? 0,
                Carbon::today()->subDays(6)->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::today()->subDays(6)->toDateString())) ?? 0,
                Carbon::yesterday()->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::yesterday()->toDateString())) ?? 0,
                Carbon::today()->toDateString() => $redis->get(sprintf("%s-%s",$id,Carbon::today()->toDateString())) ?? 0
            ];
        }

        return $views;
    }

    public function refresh(){
        $response = Http::get('https://check-diff.herokuapp.com/refresh-info');
        session()->flash('succes','informatii in curs de actualizare');
        return redirect('/admin/dashboard');
    }
}
