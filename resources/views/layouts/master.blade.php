<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>GIA ĐẠT</title>
</head>
<body>
@include('layouts.header')
   <div id="content">
   <h1>GIA ĐẠT</h1>
    @yield('NoiDung')
   </div>
@include('layouts.footer')
</body>
</html>