<?php

App::uses('Controller', 'Controller');

class WorkExperiencesController extends AppController {

    public $uses = array('WorkExperience', 'UserInfo');

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('work_id');
        $this->Session->write('flag_link_work', 0);
        $this->paginate = array(
            'limit' => Configure::read('max_row'),
            'order' => array('WorkExperience.employee_id' => 'ASC')
        );
        $this->set('workExp', $this->paginate('WorkExperience'));
        $this->set(array(
            'title_for_layout' => '職種履歴',
            'page_title' => '職種履歴',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_work') == 0) {
            $this->Session->write('save_latest_link_work', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['WorkExperience']['created'] = date('Y-m-d');
            if ($this->WorkExperience->customValidate()) {              
                $this->WorkExperience->create();
                if ($this->WorkExperience->save($data)) {
                    $this->Session->setFlash(__('COMMON_MSG_001'), 'success');
                    $this->redirect(array('action' => 'index'));
                } 
            }
        }
        $this->Session->write('flag_link_work', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '職種履歴',
            'page_title' => '職種履歴',
        ));
        $this->set('readonly', '');
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_work') == 0) {
            $this->Session->write('save_latest_link_work', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('work_id', $this->request->data['id']);
        }
        $id = $this->Session->read('work_id');
        if (!$this->WorkExperience->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['WorkExperience']['modified'] = date('Y-m-d');
			unset($data['WorkExperience']['employee_id']);
			
            if ($this->WorkExperience->customValidate()) {
                if ($this->WorkExperience->save($data)) {
                    $this->Session->setFlash(__('COMMON_MSG_001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_work'));
                } 
            }
        } else {
            $quanlitify = $this->WorkExperience->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_work', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '職種履歴',
            'page_title' => '職種履歴',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_work') == 0) {
            $this->Session->write('save_latest_link_work', $_SERVER['HTTP_REFERER']);
        }

        if (!empty($id)) {
            if (!$this->WorkExperience->deleteAll(array('WorkExperience.id' => $id))) {
                $this->Session->setFlash(__('COMMON_MSG_003'), 'error');              
            } else {
                $this->Session->setFlash(__('COMMON_MSG_002'), 'success');                
            }
        } 
        $this->Session->write('flag_link_work', 1);
    }
}

?>
