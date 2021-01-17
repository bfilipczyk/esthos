<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if(!$this->isPost()) {
            return $this->render('login');
        }


        $email = $_POST['email'];
        $password = hash('sha512', $_POST['password']);

        $user = $this->userRepository->getUser($email);

        if(!$user)
        {
            return $this->render('login', ['messages' => ['User doesnt exist']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        setcookie("user",$user->getId(),time()+86400,"/");
        setcookie("user_check",$password,time()+86400,"/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register() {
        if(!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }
        $user = new User($email, hash('sha512',$password));

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' =>['You\'ve been succesfully registrated!']]);
    }
}