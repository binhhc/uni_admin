<?php

App::uses('Controller', 'Controller');

class UserInfosController extends AppController {

    public $uses = array('UserInfo');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {        
        $this->Session->delete('info_id');
        $this->Session->write('flag_link_info', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('UserInfo.employee_id' => 'ASC')
        );
        $this->set('userInfo', $this->paginate('UserInfo'));
        $this->set(array(
            'title_for_layout' => '社員情報',
            'page_title' => '社員情報',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_info') == 0) {
            $this->Session->write('save_latest_link_info', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['UserInfo']['created'] = date('Y-m-d');
            if ($this->UserInfo->customValidate()) {
                $this->UserInfo->create();
                if ($this->UserInfo->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_info'));
                }
            }
        }
        $this->Session->write('flag_link_info', 1);
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_info') == 0) {
            $this->Session->write('save_latest_link_info', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('info_id', $this->request->data['id']);
        }
        $id = $this->Session->read('info_id');
        if (!$this->UserInfo->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['UserInfo']['modified'] = date('Y-m-d');
            if ($this->UserInfo->customValidate()) {
                if ($this->UserInfo->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_info'));
                }
            } 
        } else {
            $quanlitify = $this->UserInfo->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_info', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->render('detail');
    }

    public function delete($id = null) {
        if ($this->Session->read('flag_link_info') == 0) {
            $this->Session->write('save_latest_link_info', $_SERVER['HTTP_REFERER']);
        }
        $this->UserInfo->id = $id;
        if (!$this->UserInfo->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (isset($id)) {
            $this->UserInfo->deleteAll(array('UserInfo.id' => $id));
            $this->Session->setFlash(__('Delete successful!'), 'success');
            $this->redirect($this->Session->read('save_latest_link_info'));
        }
        $this->Session->write('flag_link_info', 1);
    }

}

?>
