<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post bearbeiten</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="box">
        <h1>Post bearbeiten</h1>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}">
            <textarea name="body">{{ $post->body }}</textarea>
            <button>Änderungen speichern</button>
        </form>
    </div>
</body>
</html>
