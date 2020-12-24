
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/tailwind.css" />
    </head>
    <body class="antialiased">
        <h1>User Login</h1>
        <form action="user" method="POST">
            @csrf
            <input type="text" name="user" placeholder="enter user name"><br><br>
            <input type="password" name="password" placeholder="enter user password"><br><br>
            <button type="submit">login</button>
        </form>
    </body>
</html>


