<?php

App::uses('Controller', 'Controller');

class AnnualIncomesController extends AppController {

    public $uses = array('AnnualIncome', 'UserInfo');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('annual_id');
        $this->Session->write('flag_link_annual', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('AnnualIncome.employee_id' => 'ASC')
        );
        $this->set('annualIncome', $this->paginate('AnnualIncome'));
        $this->set(array(
            'title_for_layout' => '年収計算',
            'page_title' => '年収計算',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['AnnualIncome']['created'] = date('Y-m-d');
            if ($this->AnnualIncome->customValidate()) {
                $this->AnnualIncome->create();
                if ($this->AnnualIncome->save($data)) {
                    $this->Session->setFlash(__('Save successful!'));
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                }
            } 
        }
        $this->Session->write('flag_link_annual', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('annual_id', $this->request->data['id']);
        }
        $id = $this->Session->read('annual_id');
        if (!$this->AnnualIncome->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['AnnualIncome']['modified'] = date('Y-m-d');
            if ($this->AnnualIncome->customValidate()) {
                if ($this->AnnualIncome->save($data)) {
                    $this->Session->setFlash(__('Save successful!'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_annual'));
                }
            } 
        } else {
           
            $this->request->data = $this->AnnualIncome->findById($id);
        }
        $this->Session->write('flag_link_annual', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_annual') == 0) {
            $this->Session->write('save_latest_link_annual', $_SERVER['HTTP_REFERER']);
        }

        if (!empty($id)) {
            if (!$this->AnnualIncome->deleteAll(array('AnnualIncome.id' => $id))) {
                $this->Session->setFlash(__('Delete error'), 'error');              
            } else {
                $this->Session->setFlash(__('Delete successful'), 'success');                
            }
        } 
        $this->Session->write('flag_link_annual', 1);
    }
}

?>
