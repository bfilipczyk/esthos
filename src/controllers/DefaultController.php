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
        $this->checkAuthentication();
        $notes = $this->notesRepository->getNotes($_COOKIE['user']);
        $this->render('home', ['notes' => $notes]);
    }

    public function notes() {
        $this->checkAuthentication();
        if(!isset($_COOKIE['note'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }
        $note = $this->notesRepository->getNote($_COOKIE['note']);
        if(!$this->isPost()) {
            return $this->render('notes', ['note' => $note]);
        }
        $note->setTitle($_POST['title']);
        $note->setContent($_POST['content']);
        $note->setLastOpen(Date('Y-m-d H:i:s'));

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

    public function add() {
        $this->checkAuthentication();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === 'text/xml') {
            $type = substr(trim(file_get_contents(("php://input"))),1);
            $timeVar = Date('Y-m-d H:i:s');
            $note = new Note($_COOKIE['user'],$type ,"name","description", $timeVar);
            $this->notesRepository->addNote($note);


            $note2 = $this->notesRepository->getNewNote($_COOKIE['user']);
            setcookie("note",$note2->getId(),time()+86400,"/");


        }
    }

    public function search() {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));

            header('Content-type: application/json');
            http_response_code(200);

            $tmp = $this->notesRepository->getNotesByTitle($content, $_COOKIE['user']);
            echo json_encode($tmp);
        }

    }
    public function remove()
    {
        $this->checkAuthentication();
        $this->notesRepository->removeNote($_COOKIE['note']);
    }


    private function checkAuthentication() {
        if(isset($_COOKIE['user']) and isset($_COOKIE['user_check']))
        {
            $user = $this->userRepository->getUserById($_COOKIE['user']);
            if($user->getPassword() === $_COOKIE['user_check']) {
                return null;
            }
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }




}