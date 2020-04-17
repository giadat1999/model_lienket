<form action="{{route('postForm')}}" method="post">
    {{csrf_field()}}
   Name: <input type="text" name="HoTen">
    Age: <input type="text" name="age">
    <input type="submit">
</form>