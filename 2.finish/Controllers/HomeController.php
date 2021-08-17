<?php

class HomeController extends Controller
{

    public static function showResults()
    {
        if (isset($_SESSION['logged_in'])) {
        } else {
            $_SESSION['msg'] = "Please login";
            include 'Views/login.php';
        }
    }

}
