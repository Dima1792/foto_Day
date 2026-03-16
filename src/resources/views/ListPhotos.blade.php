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
@foreach($Photos as $photo)
    На площадке:
    {{$photo->stand_id}}
    у пользователя:
    {{$photo->user_name}}
    сделаны фото:
    {{$photo->id}}
    его короткие названия:
    {{$photo->name_mini}}
    оно сделанно:
    {{$photo->date_last_order}}
    <br>
@endforeach
</body>
</html>
