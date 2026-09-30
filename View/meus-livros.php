<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus livros</title>
</head>

<body>
    <h1>Meus livros</h1>
    <hr>
    <br>
    <form action="index.php?action=storeLivro" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor">
        <br>
        <label for="descricao">Descricao:</label>
        <input type="text" name="descricao" id="descricao">
        <br>
        <label for="nota">Nota:</label>
        <input type="text" name="nota" id="nota">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <hr>
    <h2>Livros cadastrados:</h2>

    <?php foreach ($livros as $livro): ?>
        <div style="border: 2px solid">
            <h3><?= $livro['titulo'] ?></h3>
            <p>Autor: <?= $livro['autor'] ?></p>
            <p><?= $livro['descricao'] ?></p>
            <p>Nota: <?= $livro['nota'] ?></p>
        </div>
    <?php endforeach ?>
</body>

</html>