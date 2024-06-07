<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
     @csrf
     @method('PUT')
     <input type="text" name="title" value="{{$post->title}}">
     <textarea name="body">{{$post->body}}</textarea>
     <button>save changes</button>
    </form>
</body>
</html>