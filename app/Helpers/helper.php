<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('aurl')) {
    function aurl($url = null) {
        return url($url);
    }
}

if (!function_exists('active_link')) {
    function active_link($link)
    {
        if (request()->is($link)) {
            return 'active';
        }
    }
}

if (!function_exists('sub_menu')) {
    function sub_menu($link){
        if (request()->is($link)) {
            return 'active open';
        }
    }
}


if(!function_exists('done_msg')){
    function done_msg(){
        return session()->flash('success', 'successfully');
    }
}

if(!function_exists('wrong_msg')){
    function wrong_msg($msg = null){
        return session()->flash('danger', $msg);
    }
}


if(!function_exists('getRole')){
    function getRole(){
        return Auth::user()->getRoleNames();
    }
}

