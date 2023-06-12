<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit post</h1>
    <div style="border: 3px solid rgb(104, 101, 101); background: rgb(239, 241, 217);">
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->title}}">
            <br>
            <br>
            <br>
            <textarea name="body">{{$post->body}}</textarea>
            <br>
            <br>
            <button>Save changes</button>
        </form>
    </div>
</body>
</html>