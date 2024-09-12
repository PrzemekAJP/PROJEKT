<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyślij e-mail</title>
</head>
<body>
    <h1>Formularz wysyłania wiadomości</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form method="POST" action="/email/send">
        @csrf <!-- Token CSRF dla bezpieczeństwa -->

        <div>
            <label for="email">Adres e-mail:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="subject">Temat:</label>
            <input type="text" name="subject" id="subject" required>
        </div>

        <div>
            <label for="message">Wiadomość:</label>
            <textarea name="message" id="message" required></textarea>
        </div>

        <div>
            <button type="submit">Wyślij wiadomość</button>
        </div>
    </form>
</body>
</html>