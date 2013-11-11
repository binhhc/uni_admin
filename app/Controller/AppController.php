<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Ldap' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
    );

    public function beforeFilter() {
        //$this->Auth->allow('display');
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'AnnualIncomes', 'action' => 'index');
        // check if user has permission to access function
        if ($this->Auth->user()) {   // user has logged in
            $node = $this->Acl->Aco->node('controllers/' . $this->params['controller'] . '/' . $this->params['action']);
            if (empty($node)) {
                throw new NotFoundException();
            }
            $chk = $this->Acl->check($this->User, 'controllers/' . $this->params['controller'] . '/' . $this->params['action']);
            if (!$chk) {
                throw new ForbiddenException('You are not authorized!!!');
            }
        }
    }

}
