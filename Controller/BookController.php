<?php

require __DIR__ . '/../Model/Book.php';

class BookController
{
    private Book $bookModel;

    public function __construct()
    {
        $this->bookModel = new Book();
    }

    public function showLivros(): void
    {
        $livros = $this->bookModel->listBooks();
        require __DIR__ . '/../View/meus-livros.php';
    }

    public function storeLivros(): void
    {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $descricao = $_POST['descricao'];
        $nota = $_POST['nota'];

        $this->bookModel->createBook($titulo, $autor, $descricao, $nota);

        header('Location: index.php?action=meusLivros');
        exit();
    }
}
