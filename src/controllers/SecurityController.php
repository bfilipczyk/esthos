<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('jk@mail.com','user','Jan','Kowalski');

        $email=$_POST['email'];
        $password=$_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User this email doesnt exist']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        return $this->render("home");
    }
}