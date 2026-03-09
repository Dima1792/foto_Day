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
    @foreach($meetings as $meeting)
        Событие:
        <a href="{{route('meetingList')}}">{{$meeting->name}}</a>
        пользователя:
            {{$meeting->user_id}}
        относящегося к агентству:
            {{$meeting->agency_id}}
        <br>
@endforeach
</body>
</html>
