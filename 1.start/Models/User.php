<?php


class User
{

    private $email;
    private $name;
    private $password;
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser()
    {
        $this->email = $_POST['email'];
        $this->name = $_POST['name'];
        $this->password = $_POST['password_1'];
    }


    public function saveUser()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = ("insert into users (email, name, password) values (:email, :name, :password);");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $this->email,
            "name" => $this->name,
            "password" => $hash,
        ]);

        //TODO login registered user and redirect home

    }

    public function loginUser($email, $password)
    {

        $sql = ("select * from  users where email = :email");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $email,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['password'])) {
                $this->name = $result['name'];
                $this->email = $result['email'];
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $this->name;
                $_SESSION['user_email'] = $this->email;
                return true;
            }
        }
    }


    /*
     * Find user by name or email
     * return array
     */

    public function findUsers(): array
    {

        $searchTerm = $_POST['search'];

        if (strlen($searchTerm) < 1) return [];
        $sql = ("select email, name from  users where email like :email or name like :name ");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => '%' . $searchTerm . '%',
            "name" => '%' . $searchTerm . '%',
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    private function isRegistered($email)
    {
        $sql = ("select * from  users where email = :email ");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $email,

        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) return true;


    }


    public function validate()
    {

        unset($_SESSION['password_error']);
        unset($_SESSION['mail_error']);


        if ($this->isRegistered($_POST['email'])) {
            $_SESSION['mail_error'] = 'User already registered!';
            return false;
        };


        //Validate email


        //Check if mail is valid
        if (!$this->validateEmail($_POST['email'])) {
            $_SESSION['mail_error'] = 'Invalid email address';
            return false;
        }

        //Check if both passwords match
        if ($_POST['password_1'] != $_POST['password_2']) {
            $_SESSION['password_error'] = 'Passwords doas not match';
            return false;
        }

        //Check password lenth

        if (!$this->validatePassword($_POST['password_1'])) {
            $_SESSION['password_error'] = 'Passwords minimum lenghth is 5 characters';
            return false;
        }

        return true;

    }

    private function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function validatePassword($password)
    {

        //Set password minimum length
        if (strlen($password) < 5) {
            return false;
        } else return true;

    }

}