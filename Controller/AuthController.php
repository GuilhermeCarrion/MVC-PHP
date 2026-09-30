<?php

require_once __DIR__ . '/../Model/User.php';

class AuthController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showLoginForm(): void
    {
        require __DIR__ . '/../View/login.php';
    }

    public function login(): void
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // if($email == null && $senha == null){
        //     $msg = "Email e senha são obrigtórios";
        //     return $msg;
        // }

        // $user = $this->userModel->findByEmail($email);

        // if(!$user){
        //     echo "usuário não existe";
        // }

        if ($this->userModel->comparePassword($senha, $email)) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit();
        }
        echo "Email ou senha inválidas";
    }
}
