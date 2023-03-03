<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{asset('css/style.css')}} ">
    <title>Post</title>
</head>
<body>
    <form action="{{url('update')}}" method="POST">
        @csrf
        <div>
            <label for="id">Titre</label>
        <input type="text" name="id" value="{{$post->id}}">
        </div>

        <div>
            <label for="title">Titre</label>
        <input type="text" name="title" value="{{$post->titre}}">
        </div>

        <div>
            <label for="content">Contenu</label>
        <input name="content" value="{{$post->contenu}}" cols="30" rows="10">
        </div>

        <div>
            <button type="submit">Update</button>
        </div>


    </form>
</body>
</html>
