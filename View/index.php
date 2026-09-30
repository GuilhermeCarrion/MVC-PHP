<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura MVC</title>
</head>

<body>
    <form action="index.php?action=store" method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>

    <a href="index.php?action=loginForm">Fazer Login</a>
    <a href="index.php?action=meusLivros">Meus Livros</a>

    <hr>

    <h2>Usuários cadastrados:</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['id']) ?> - <?= htmlspecialchars($user['nome']) ?> - <?= htmlspecialchars($user['email']) ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>