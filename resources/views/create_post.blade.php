<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <form action="{{url('store')}}" method="POST">
        @csrf
        <div>
            <label for="">Titre</label>
        <input type="text" name="title">
        </div>
        
        <div>
            <label for="">Contenu</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Create</button>
        </div>

        
    </form>
</body>
</html>