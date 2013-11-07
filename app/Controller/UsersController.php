<?php

App::uses('Controller', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('login', 'logout'));
    }

    public function login() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller' => 'SchoolEducations', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Login failse'), 'error');
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect(array('controller' => 'Users', 'action' => 'login'));
    }

}

?>
