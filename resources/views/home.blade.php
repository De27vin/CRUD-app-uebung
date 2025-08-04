<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <div style="margin: 10px;">
            <h1>Registrierung</h1>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="Email">
                <input type="password" placeholder="Passwort">
                <br>
                <button style="margin-top: 10px">Registrieren</button>
            </form>
            
        </div>
    </div>
</body>
</html>