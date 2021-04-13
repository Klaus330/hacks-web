<?php

namespace App\Http\Trait;

trait ApiCommunication
{
    public function url($path){
        return env("EXTERNAL_API_URL").$path;
    }
}
