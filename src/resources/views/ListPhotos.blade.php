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
Фотографии для стенда №{{$Photos[0]->stand_id}} в меропиятии {{$Photos[0]->name}}:<br>
@foreach($Photos as $photo)
   {{$photo->name_mini}} {{$photo->stand_id}}<br>
@endforeach
</body>
</html>
