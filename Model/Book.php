<?php

require_once __DIR__ . '/../Database/Database.php';

class Book
{
    private PDO $db;

    function __construct()
    {
        $this->db = Database::getInstance();
    }

    function createBook(string $titulo, string $autor, string $descricao, int $nota): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO livros (titulo, autor, descricao, nota) VALUES (:titulo, :autor, :descricao, :nota)'
        );

        return $stmt->execute([
            'titulo' => $titulo,
            'autor' => $autor,
            'descricao' => $descricao,
            'nota' => $nota,
        ]);
    }

    function listBooks(): array
    {
        $stmt = $this->db->query('SELECT * FROM livros');

        return $stmt->fetchAll();
    }
}
