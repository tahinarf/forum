<?php
session_start();

require_once '../models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login($email, $password) {
        $user = $this->user->login($email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: /forum/public/index.php');
        } else {
            echo "Invalid email or password.";
        }
    }

    public function register($username, $email, $password) {
        if ($this->user->register($username, $email, $password)) {
            header('Location: /forum/public/index.php');
        } else {
            echo "Registration failed.";
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /forum/public/index.php');
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function getUserId() {
        return $_SESSION['user_id'];
    }

    public function getUsername() {
        return $_SESSION['username'];
    }
}
?>
