<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-view',function(){
    return view('homepage');
});

Route::get('/test',function(){
    // echo"<script>alert('Hello World! Welcome to my Laravel Application');</script>";
});

Route::group(['prefix' => 'MyGroup'],function(){
    Route::get('User1',function(){
        echo "<h1>Trương Diệp Nghi - Marine Collins Cheung </h1>";
    });
    Route::get('User2',function(){
        echo "<h1>Trương Diệp Hòa - Harper Collins Cheung </h1>";
    });
});
Route::get('Route',function(){
    echo "Xin chào các bạn";
}) -> name('MyRoute');

Route::get('BladeTemplate/{str}','MyController2@blade');

Route::get('GoiController', 'MyController2@XinChao');
Route::get('ThamSo/{ten}', 'MyController2@Hello');

Route::get('welcome/{t}', 'MyController2@Time');

Route::get('/test','MyController@test');

use App\Http\Middleware\CheckAge;
// Route::post('/test-form', function(){
//     $age=$_POST['age'];
//     echo $age;
// })->middleware(CheckAge::class);

Route::post('/checkage','MyController@CheckAge')->middleware(CheckAge::class);

Route::get('database',function(){
     Schema::create('loaisanpham', function ($table) {
        $table->increments('id');
         $table->string('ten',200);
     });
    // Schema::create('theloai', function ($table) {
    //     $table->bigIncrements('id');
    //     $table->string('ten',200) ->nullable();
    //     $table ->string('nsx') ->default('Nha san xuat');
    // });

    echo "Đã thực hiện lệnh tạo bảng";
});

Route::get('lienketbang',function(){
    Schema::create('sanpham',function($table){
        $table ->bigIncrements('id');
        $table ->string('ten');
        $table ->float('gia');
        $table ->integer('soluong') ->default(0);
        $table ->integer('id_loaisanpham') ->unsigned();
        $table ->foreign('id_loaisanpham') ->references('id') ->on('loaisanpham');
    });
    echo "Đã tạo bảng sản phẩm";
});

Route::get('suabang',function(){
    Schema::table('theloai',function($table){
        $table ->dropColumn('nsx');
    });
});

Route::get('themcot',function(){
    Schema::table('theloai',function($table){
        $table ->string('email');
    });
});

Route::get('xoabang',function(){
    Schema::drop('nguoidung');
});

Route::get('doiten',function(){
    Schema::rename('theloai','nguoidung');
});

// Query builder

Route::get('qb/get',function(){
    $data= DB::table('users') ->get();
    foreach($data as $row){
        foreach($row as $key => $value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/where',function(){
    $data= DB::table('users') ->where('id','=',18) ->get();
    foreach($data as $row){
        foreach($row as $key => $value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/select',function(){
    $data= DB::table('users') ->select(['id','name','email']) ->where('id','=',18) ->get();
    foreach($data as $row){
        foreach($row as $key => $value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/raw',function(){
    $data= DB::table('users') ->select(DB::raw('id,name as HoTen,email')) ->where('id','=',18) ->get();
    foreach($data as $row){
        foreach($row as $key => $value){
            echo $key.":".$value."<br>";
        }
        echo "<hr>";
    }
});

Route::get('qb/orderby',function(){
    $data= DB::table('users') ->select(DB::raw('id,name as HoTen,email'))->where('id','>',1)->orderBy('id','desc')->skip(1)->take(4)->get();
    echo $data->count();
    // foreach($data as $row){
    //     foreach($row as $key => $value){
    //         echo $key.":".$value."<br>";
    //     }
    //     echo "<hr>";
    // }
});

Route::get('qb/update',function(){
    DB::table('users')->where('id','=',1)->update(['name' =>'AlexCheung', 'email' =>'alexcheung@gmail.com']);
    echo "Đã update";
});

Route::get('qb/delete',function(){
    DB::table('users')->truncate();
    echo "Đã xóa";
});

//Model
Route::get('model/save',function(){
    $user=new App\User();
    $user ->name = "Gia Đạt";
    $user ->email = "giadat99@gmail.com";
    $user ->password = "Mat khau";
    $user ->save();
    echo "Đã thực hiện save";
});

Route::get('model/query',function(){
   $user = App\User::find(5);
   echo $user ->name;
});

Route::get('model/sanpham/save/{ten}',function($ten){
   $sanpham= new App\SanPham();
   $sanpham->tensanpham = $ten;
   $sanpham->soluong = 100;
   $sanpham->save();
   echo "Đã lưu ".$ten;
});

Route::get('model/sanpham/all',function(){
    $sanpham= App\SanPham::all();
    $sanpham->toArray();
    dd($sanpham);
});

Route::get('model/sanpham/ten',function(){
    $sanpham= App\SanPham::where('tensanpham','Samsung Galaxy')->get()->toArray();
    echo $sanpham[0]['tensanpham'];
});

Route::get('model/sanpham/delete',function(){
    App\SanPham::destroy(4);
    echo "Đã xóa";
});

Route::get('taocot',function(){
    Schema::table('sanpham',function($table){
       $table ->integer('id_loaianpham')->unsigned();
    });
});

Route::get('lienket',function(){
   $data= App\SanPham::find(3)->loaisanpham->toArray();
   
   if($data==null){
       echo "hellow";
   }
});