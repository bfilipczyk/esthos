<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }



        $email=$_POST['email'];
        $password=$_POST['password'];

        $user = $userRepository->getUser($email);

        if(!$user)
        {
            return $this->render('login', ['messages' => ['User doesnt exist']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email doesnt exist']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

       /// return $this->render("home");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('register');
        }



        $email=$_POST['email'];
        $password=$_POST['password'];

        $user = $userRepository->getUser($email);

        if(!$user)
        {
            return $this->render('register', ['messages' => ['User doesnt exist']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('register', ['messages' => ['User with this email doesnt exist']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('register', ['messages' => ['Wrong password']]);
        }

        /// return $this->render("home");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}