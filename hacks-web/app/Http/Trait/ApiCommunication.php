<?php

namespace App\Http\Trait;

trait ApiCommunication
{
    public function apiURL($path){
        return \config('ourapi.url').$path;
    }
}
