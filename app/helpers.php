<?php

use App\Models\SettingGeneral;

if( ! function_exists('guest_checkout')){
    function guest_checkout(){
        return SettingGeneral::first() ? ( SettingGeneral::first()->guest_checkout == null ? false : true ) : false;
    }
}