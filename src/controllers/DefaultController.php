<?php

require_once 'AppController.php';

class DefaultController extends AppController {


    public function home() {
        $this->render('home',['messages' => ['test']]);
    }

    public function notes() {
        $this->render('notes');
    }

    public function characters() {
        $this->render('characters');
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