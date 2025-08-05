<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

    @auth
        <h1>Homepage</h1>

        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div class="box">
            <h1>Neuen Post erstellen</h1>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Titel">
                <textarea name="body" placeholder="Inhalt"></textarea>
                <button>Post speichern!</button>
            </form>
        </div>

        <div class="box">
            <h1>Posts</h1>
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>

                    <p><a href="/edit-post/{{ $post->id }}">Bearbeiten</a></p>

                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Löschen</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="box">
            <h1>Anmelden</h1>
            <form action="/login" method="POST">
                @csrf
                <input name="loginemail" type="text" placeholder="Email">
                <input name="loginpassword" type="password" placeholder="Passwort">
                <button>Anmelden</button>
            </form>
        </div>

        <div class="box">
            <h1>Registrierung</h1>
            <form action="/register" method="POST">
                @csrf
                <input name="email" type="text" placeholder="Email">
                <input name="password" type="password" placeholder="Passwort">
                <button>Registrieren</button>
            </form>
        </div>
    @endauth

</body>
</html>
