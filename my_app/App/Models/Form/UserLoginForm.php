<?php

namespace App\Models\Form;

class UserLoginForm
{
    public $email;
    public $password;

    public function __construct()
    {
        $this->email = array_key_exists('email', $_POST) ? trim($_POST['email']) : NULL;
        $this->password = array_key_exists('password', $_POST) ? trim($_POST['password']) : NULL;
    }
}
