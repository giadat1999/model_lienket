@extends('layouts.master')

@section('NoiDung')
<?php $ngonngu=array('Chinese','Cantonese','English','French','Vietnamese'); ?>
@forelse($ngonngu as $value)
@break($value =="French")
{{$value}}
@empty
{{"Mảng rỗng"}}
@endforelse

@endsection