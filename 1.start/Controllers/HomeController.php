<?php

class HomeController
{

    public static function show()
    {
        include 'Views/home.php';
    }

    public static function showRegisterForm()
    {
        include 'Views/register.php';
    }

    public static function showLoginForm()
    {
        include 'Views/login.php';
    }

    public static function showResults()
    {
        if (isset($_SESSION['logged_in'])) {
            include 'Views/results.php';
        } else {
            $_SESSION['msg'] = "Please login";
            include 'Views/login.php';
        }
    }

}
