<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function test(){
        echo"<script>alert('Hello World! Welcome to my Laravel Application');</script>";
    }

    function CheckAge(){
        $age=$_POST['age'];
        echo $age;
    }
}
