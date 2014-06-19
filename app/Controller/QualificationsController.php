<?php

App::uses('Controller', 'Controller');

class QualificationsController extends AppController {

    public $uses = array('Qualification', 'UserInfo');
    public $components = array('Paginator');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete', 'typeahead')) : null;
    }

    public function index() {
        $this->Session->delete('quanlity_id');
        $this->Session->write('flag_link_quanlity', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'Qualification.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('Qualification.employee_id' => 'ASC')
        );
        try{
            $this->set('quanlity', $this->Paginator->paginate('Qualification'));
        }catch(exception $e){

        }
        $this->set(array(
            'title_for_layout' => '免許資格',
            'page_title' => '免許資格',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_quanlity') == 0) {
            $this->Session->write('save_latest_link_quanlity', @$_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            // $data['Qualification']['created'] = date('Y-m-d');
            if ($this->Qualification->customValidate()) {
                $this->Qualification->create();
                if ($this->Qualification->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_quanlity'));
                }
            }
        }
        $this->Session->write('flag_link_quanlity', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '免許資格',
            'page_title' => '免許資格',
        ));
        $this->set('readonly', '');
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
        if (!$this->Qualification->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            // $data['Qualification']['modified'] = date('Y-m-d');
			unset($data['Qualification']['employee_id']);
            if ($this->Qualification->customValidate()) {
                if ($this->Qualification->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_quanlity'));
                }
            }
        }
        $this->request->data = $this->Qualification->findById($id, null);
        $this->Session->write('flag_link_quanlity', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '免許資格',
            'page_title' => '免許資格',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_quanlity') == 0) {
            $this->Session->write('save_latest_link_quanlity', $_SERVER['HTTP_REFERER']);
        }

        if (intval($id > 0) || !empty($id)) {
            $this->Qualification->id = $id;
            $data['Qualification']['delete_flg'] = DELETE_FLG_ON;
            $data['Qualification']['beforeSave'] = false;
            if ($this->Qualification->save($data)) {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
                $this->response->type("json");
                echo json_encode(array('success' => 1));
            } else {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_quanlity', 1);
    }
}
?>