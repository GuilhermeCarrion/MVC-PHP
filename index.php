<?php

session_start();

require_once __DIR__ . '/Controller/UserController.php';
require_once __DIR__ . '/Controller/AuthController.php';
require_once __DIR__ . '/Controller/BookController.php';

$controller = new UserController();
$authController = new AuthController();
$bookingController = new BookController();

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'loginForm':
        $authController->showLoginForm();
        break;

    case 'login':
        $authController->login();
        break;

    case 'meusLivros':
        $bookingController->showLivros();
        break;

    case 'storeLivro':
        $bookingController->storeLivros();
        break;

    case 'store':
        $controller->store();
        break;

    case 'index':
    default:
        $controller->index();
        break;
}
