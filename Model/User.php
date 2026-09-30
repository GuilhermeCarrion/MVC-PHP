<?php

require_once __DIR__ . '/../Database/Database.php';

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function createUser(string $nome, string $email, string $senha): bool
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(
            'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)'
        );

        // Caso email (unique) já tenha sido cadastrado
        try {
            return $stmt->execute([
                'nome' => $nome,
                'email' => $email,
                'senha' => $hash,
            ]);
        } catch (PDOException $e) {
            // Verificando se o código é de valor unico 
            if ($e->getCode() === '23000') {
                return false;
            }
            // Outro erro
            throw $e;
        }
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM usuarios WHERE email = :email'
        );
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch();

        return $user ?: null;
    }

    public function comparePassword(string $senha, string $email): bool
    {
        $stmt = $this->db->prepare(
            'SELECT senha FROM usuarios WHERE email = :email'
        );
        $stmt->execute(['email' => $email]);

        $hash = $stmt->fetch();

        if (!$hash) {
            return false;
        }

        return password_verify($senha, $hash['senha']);
    }

    public function listUsers(): array
    {
        $stmt = $this->db->query('SELECT id, nome, email FROM usuarios');

        return $stmt->fetchAll();
    }
}
