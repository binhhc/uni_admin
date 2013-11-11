<?php

App::uses('Controller', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {          
        $this->Auth->user() ? $this->Auth->allow(array('runbatch')) : null;
    
        $this->Auth->allow(array('login', 'logout'));
    }

    public function login() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Auth->login()) {                
                $this->redirect(array('controller' => 'SchoolEducations', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Wrong username or password!'));
            }
        }
        
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect(array('controller' => 'Users', 'action' => 'login'));
    }

    /*
     * Author Binh Hoang
     */

    public function runbatch() {
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['Batch']['patch'])) {
                $path = substr(APP, 0, strlen(APP) - 1);
                $cake_path = $path . DS . 'Console' . DS . 'cake.php';
                $shell = 'ImportCSVtoDB';
                $command = $this->request->data['Batch']['patch'];
                $shell = "php \"{$cake_path}\" -app {$path} {$shell} {$command} &";
                if (preg_match('/^win/i', PHP_OS)) {
                    pclose(popen('start "ImportCSVtoDB" ' . $shell, "r"));
                } else {
                    $handle = popen($shell, 'r');
                    while (!feof($handle)) {
                        $buffer1 = fgets($handle);
                        if (!empty($buffer1)) {
                            $buffer = trim(htmlspecialchars($buffer1));
                        }
                    }
                    $this->Session->setFlash($buffer);
                }
            } else {
                $this->Session->setFlash('Please input path');
            }
        }
    }

}

?>
