<?php

App::uses('Controller', 'Controller');

class QuanlificationsController extends AppController {

    public $uses = array('Quanlification', 'UserInfo');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete', 'typeahead')) : null;
    }

    public function index() {

        $this->Session->delete('quanlity_id');
        $this->Session->write('flag_link_quanlity', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('Quanlification.employee_id' => 'ASC')
        );
        $this->set('quanlity', $this->paginate('Quanlification'));
    }

    public function add() {        
        if ($this->Session->read('flag_link_quanlity') == 0) {
            $this->Session->write('save_latest_link_quanlity', @$_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['Quanlification']['created'] = date('Y-m-d');
            if ($this->Quanlification->customValidate()) {
                $this->Quanlification->create();
                if ($this->Quanlification->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_quanlity'));
                }
            }
        }
        $this->Session->write('flag_link_quanlity', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->render('detail');        
    }

    public function edit() {
        if ($this->Session->read('flag_link_quanlity') == 0) {
            $this->Session->write('save_latest_link_quanlity', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('quanlity_id', $this->request->data['id']);
        }
        $id = $this->Session->read('quanlity_id');
        if (!$this->Quanlification->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['Quanlification']['modified'] = date('Y-m-d');
            if ($this->Quanlification->customValidate()) {
                if ($this->Quanlification->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_quanlity'));
                }
            }
        } else {           
            $this->request->data = $this->Quanlification->findById($id);
        }
        $this->Session->write('flag_link_quanlity', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->render('detail');
    }

    public function delete($id = null) {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_quanlity', $_SERVER['HTTP_REFERER']);
        }
        $this->Quanlification->id = $id;
        if (!$this->Quanlification->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (isset($id)) {
            $this->Quanlification->deleteAll(array('Quanlification.id' => $id));
            $this->Session->setFlash(__('Delete successful!'), 'success');
            $this->redirect($this->Session->read('save_latest_link_quanlity'));
        }
        $this->Session->write('flag_link_quanlity', 1);
    }

    public function typeahead() {
        $this->autoRender = false;        

        // get the search term from URL
        $term = $this->request->query['q'];
        pr($term);exit;
        $userInfo = $this->UserInfo->find('all',array(
            'conditions' => array(
                'UserInfo.employee_name LIKE' => '%'.$term.'%'
            )
        ));

        pr($userInfo);exit;

        // Format the result for select2
        $result = array();
        foreach($userInfo as $key => $user) {
            array_push($result, $userInfo['UserInfo']['employee_name']);
        }
        $users = $result;        
        echo json_encode($users);
    }

}

?>
