<?php

namespace App\Helpers;

class Json
{
    public function dump($data = null, $onlyInDebugMode = true)
    {
        $show = ($onlyInDebugMode === true && env('APP_DEBUG') === false) ? false : true;
        if (array_key_exists('json', app('request')->query()) && $show) {
            header('Content-Type: application/json');
            die(json_encode($data));
        } elseif (array_key_exists('dd', app('request')->query()) && $show) {
            dd($data);
        }
    }
}
