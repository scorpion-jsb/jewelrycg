<?php

use App\Models\SettingGeneral;
use App\Models\Product;

if( ! function_exists('guest_checkout')){
    function guest_checkout(){
        return SettingGeneral::first() ? ( SettingGeneral::first()->guest_checkout == null ? false : true ) : false;
    }
}

if( ! function_exists('pending_count')){
    function pending_count(){
        return Product::where('status', 2)->count() ? Product::where('status', 2)->count() : 0;
    }
}