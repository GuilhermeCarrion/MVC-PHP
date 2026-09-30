<?php

require_once __DIR__ . '/../Model/User.php';

class UserController
{

    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index(): void
    {
        $users = $this->userModel->listUsers();

        require __DIR__ . '/../View/index.php';
    }

    public function store(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $this->userModel->createUser($name, $email, $senha);

        header('Location: index.php');
        exit();
    }
}
