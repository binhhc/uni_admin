<?php

App::uses('Controller', 'Controller');

class UnitPricesController extends AppController {

    public $uses = array('UnitPrice');

    public function beforeFilter() {
        $this->Auth->allow(array('index', 'add', 'edit', 'delete'));
    }

    public function index() {
       $unitPrices=  $this->UnitPrice->find('all', array(
           'limit' => Configure::read('max_row'),
       ));
        $this->set('unitPrices', $unitPrices);
    }

    public function add() {
        
    }

    public function edit() {
        
    }

    public function delete() {
        
    }

}

?>
