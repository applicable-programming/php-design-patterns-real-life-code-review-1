<?php
class Validation {

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validatePassword($password)
    {

        //Set password minimum length
        if (strlen($password) < 5) {
            return false;
        } else return true;

    }
}
