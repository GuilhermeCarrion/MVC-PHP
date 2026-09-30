<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST" action="index.php?action=login">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>