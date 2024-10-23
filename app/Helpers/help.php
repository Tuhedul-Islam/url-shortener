<?php

use Carbon\Carbon;

if (!function_exists('carbonDateTime')) {
    function carbonDateTime($data, $format = 'm-d-Y') : string
    {
        if($data){
            $data = Carbon::parse($data);
            return $data->format($format);
        }
        return '';
    }
}
