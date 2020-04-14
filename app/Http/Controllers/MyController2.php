<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController2 extends Controller
{
    public function XinChao(){
        echo "Chào các bạn";
    }

    public function Hello($ten){
        echo "Hello ".$ten;
        return redirect() -> route('MyRoute');
    }

    public function Time($t){
        return view('welcome',['time' =>$t]);
    }

    public function blade($str){
        $ngonngu="<b>Chinese, English, Vietnamese, Japanese</b>";
        if($str=='laravel'){
            return view('pages.laravel',['ngonngu' => $ngonngu]);
        }else if($str=='php'){
            return view('pages.php',['ngonngu' => $ngonngu]);
        }
    }
}
