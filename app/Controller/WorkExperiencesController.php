<?php

App::uses('Controller', 'Controller');

class WorkExperiencesController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('index', 'add', 'edit', 'delete'));
    }

    public function index() {
        echo "sdfdsfsdf";
    }

    public function add() {
        
    }

    public function edit() {
        
    }

    public function delete() {
        
    }

}

?>
