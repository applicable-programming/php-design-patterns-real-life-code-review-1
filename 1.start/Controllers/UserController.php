<?php

require_once 'Models/User.php';

class UserController

//Todo: move validation to Validation class

{
    private $db;


    public function __construct($db)
    {
        $this->db = $db;

    }

    public function register()
    {
        unset($_SESSION['old_user']);
        $user = new User($this->db);

        if ($user->validate()) {
            $user->createUser();
            $user->saveUser();
            $_SESSION['msg'] = "Welcome, " . $_POST['name'];
            header("Location: home");
        } else {
            $_SESSION['old_user'] = $_POST;
            header("Location: register");

        }
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User($this->db);

        if ($user->loginUser($email, $password)) {
            $_SESSION['msg'] = "Welcome, " . $_SESSION['user'];
            header("Location: home");
        } else {
            $_SESSION['msg'] = "Error loging in. Check your email and password";
            header("Location: login");
        }
    }

    public function findUser()
    {
        $user = new User($this->db);
        $result = $user->findUsers();
        $_SESSION['result'] = $result;

        if (empty($result)) {
            $_SESSION['msg'] = "No results found";
            header("Location: results");
        } else {
            unset($_SESSION['msg']);
            header("Location: results");
        }
    }

    public static function logout()
    {
        session_destroy();
        header("Location: home");
    }
}