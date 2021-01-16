<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';
require_once __DIR__.'/../repository/NotesRepository.php';

class DefaultController extends AppController {

    private $notesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->notesRepository = new NotesRepository();
    }

    public function home() {
        $this->render('home',['messages' => ['test']]);
    }

    public function notes() {

        $note = $this->notesRepository->getNoteById(1);
        if(!$this->isPost()) {
            return $this->render('notes', ['note' => $note]);
        }
        echo $_POST['title'];
        $note->setTitle($_POST['title']);
        $note->setContent($_POST['content']);
        $note->setLastOpen(Date("Y-m-d"));
        //$this->notesRepository->updateNote($note);

        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/home");


    }

    public function characters() {
        $notes = $this->notesRepository->getNotesByType("characters",7);
        $this->render('characters', ['notes' => $notes]);
    }

    public function events() {
        $this->render('events');
    }

    public function items() {
        $this->render('items');
    }

    public function places() {
        $this->render('places');
    }

    public function scenarios() {
        $this->render('scenarios');
    }




}