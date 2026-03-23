<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Площадки для мероприятия {{$Stands[0]->name}}:<br>
@foreach($Stands as $stand)
    Номер площадки:
    <a href="{{route('photoList',['stand'=>$stand->id])}}">{{$stand->id}}</a>
    <br>
@endforeach
</body>
</html>
