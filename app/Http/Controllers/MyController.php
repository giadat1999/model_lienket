<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function test(){
        echo"<script>alert('Hello World! Welcome to my Laravel Application');</script>";
    }

    public function CheckAge(){
        $age=$_POST['age'];
        echo $age;
    }

    public function GetURL(Request $request){
        // return $request ->url();
        // if($request ->isMethod('post')){
        //     echo "Phương thức post";
        // }else{
        //     echo "Không phải phương thức post";
        // }
        if($request ->is('My*')){
            echo "Có My";
        }else{
            echo "không có My";
        }
    }

    public function postForm(Request $request){
         echo "Tên của bạn là: ";
         echo $request->input('HoTen');
       
    }

    public function setCookie()
    {
        $response= new Response();
        $response->withCookie('GiaDat','Alex Cheung',0.1);
        echo "Đã set cookie";
        return $response;
    }

    public function getCookie(Request $request)
    {
       echo "Cookie của bạn là: ";
       return $request->cookie('GiaDat');
    }

    public function postFile(Request $request)
    {
       if($request->hasFile('myFile')){
           $file=$request->file('myFile');
           if($file->getClientOriginalExtension('myFile')=="png"){
              $filename=$file->getClientOriginalName('myFile');
              $file->move('images',$filename);
              echo "<script>alert('Upload ".$filename." thành công');</script>";
           }else{
               echo "Không được phép upload file khác ngoài file hình";
           }
          
       }else{
           echo "Chưa có file";
       }
    }

    public function getJson()
    {
        $array=['Languagues' => 'Chinese','English','Cantonese','Vietnamese'];
        return response()->json($array);
    }
}
