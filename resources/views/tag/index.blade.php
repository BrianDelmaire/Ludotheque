@extends("layout.master")
    <!DOCTYPE html>
<html>
<head>
    <title>Liste - Tag</title>
    <link rel="icon" href="">
</head>


<body>
@section('navbar')
    @parent
@endsection

@section('content')
<h1 style="margin-top: 100px">TAG</h1>
<ul>
    @foreach($tag as $t)
        <li><a href="{{route('tag/index')}}">{{$t->label}}</a></li>

    @endforeach
</ul>
@endsection
</body>
</html>
