<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
</head>
<body>
    <h1>Profil użytkownika</h1>
    
    <p>Witaj, {{ Auth::user()->name }}!</p>
    <p>Twój email to: {{ Auth::user()->email }}</p>

    <!-- Formularz wylogowania -->
    <form method="POST" action="/wyloguj">
        @csrf <!-- Laravel generuje token CSRF, który chroni formularze -->
        <button type="submit">Wyloguj się</button>
    </form>

</body>
</html>