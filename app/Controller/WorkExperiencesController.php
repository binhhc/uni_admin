<?php

App::uses('Controller', 'Controller');

class WorkExperiencesController extends AppController {

    public $uses = array('WorkExperience');

    public function beforeFilter() {
        $this->Auth->allow(array('index', 'add', 'edit', 'delete'));
    }

    public function index() {
        $workExperience = $this->WorkExperience->find('all', array(
            'limit' => Configure::read('max_row'),
        ));
        $this->set('workExperience', $workExperience);
    }

    public function add() {
        
    }

    public function edit() {
        
    }

    public function delete() {
        
    }

}

?>
