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
        return Auth::user()->getRoleNames()[0];
    }
}

if(!function_exists('jsonDone')){
    function jsonDone($data,$message = null){
        return response()->json([
            'status' => true,
            'message' => $message == null ? 'Success' : $message,
            'data' => $data,
        ],200);
    }
}

if(!function_exists('jsonError')){
    function jsonError($data){
        return response()->json([
            'status' => false,
            'message' => $data,
            'data' => null,
        ],400);
    }
}

