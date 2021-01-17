<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';
require_once __DIR__.'/../repository/NotesRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class DefaultController extends AppController {

    private $notesRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->notesRepository = new NotesRepository();
        $this->userRepository = new UserRepository();
    }

    public function home() {
        $this->render('home',['messages' => ['test']]);
    }

    public function notes() {

        $note = $this->notesRepository->getNoteById(1);
        if(!$this->isPost()) {
            return $this->render('notes', ['note' => $note]);
        }
        $note->setTitle($_POST['title']);
        $note->setContent($_POST['content']);
        $note->setLastOpen(Date("Y-m-d"));
        $this->notesRepository->updateNote($note);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");


    }

    public function characters() {
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotesByType("characters",$_COOKIE['user']);
        $this->render('characters', ['notes' => $notes]);
    }

    public function events() {
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotesByType("events",$_COOKIE['user']);
        $this->render('events', ['notes' => $notes]);
    }

    public function items() {
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotesByType("items",$_COOKIE['user']);
        $this->render('items', ['notes' => $notes]);
    }

    public function places() {
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotesByType("places",$_COOKIE['user']);
        $this->render('places', ['notes' => $notes]);
    }

    public function scenarios() {
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotesByType("scenarios",$_COOKIE['user']);
        $this->render('scenarios', ['notes' => $notes]);
    }

    private function checkAuthentication() {
        if(isset($_COOKIE['user']) and isset($_COOKIE['user_check']))
        {
            $user = $this->userRepository->getUserById($_COOKIE['user']);
            if($user->getPassword() === $_COOKIE['user_check']) {
                return null;
            }
        }
    }




}