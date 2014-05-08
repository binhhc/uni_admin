<?php

App::uses('Controller', 'Controller');

class SchoolEducationsController extends AppController {

    public $uses = array('SchoolEducation', 'UserInfo');
    public $components = array('Paginator');
    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('school_id');
        $this->Session->write('flag_link_school', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'SchoolEducation.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('SchoolEducation.employee_id' => 'ASC')
        );

        $this->set('schoolEdu', $this->Paginator->paginate('SchoolEducation'));
        $this->set(array(
            'title_for_layout' => '学歴情報',
            'page_title' => '学歴情報',
        ));
    }

    public function add() {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $data['SchoolEducation']['created'] = date('Y-m-d');
            if ($this->SchoolEducation->customValidate()) {
                $this->SchoolEducation->create();
                if ($this->SchoolEducation->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_school'));
                }
            }
        }
        $this->Session->write('flag_link_school', 1);
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '学歴情報',
            'page_title' => '学歴情報',
        ));
        $this->set('readonly', '');
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('school_id', $this->request->data['id']);
        }
        $id = $this->Session->read('school_id');
        if (!$this->SchoolEducation->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $data['SchoolEducation']['modified'] = date('Y-m-d');
            unset($data['SchoolEducation']['employee_id']);
            if ($this->SchoolEducation->customValidate()) {
                if ($this->SchoolEducation->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_school'));
                }
            }
        } else {
            $this->request->data = $this->SchoolEducation->findById($id);
        }
        $this->Session->write('flag_link_school', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set('user_info', $this->UserInfo->listUser());
        $this->set(array(
            'title_for_layout' => '学歴情報',
            'page_title' => '学歴情報',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_school') == 0) {
            $this->Session->write('save_latest_link_school', $_SERVER['HTTP_REFERER']);
        }

        if (intval($id > 0) || !empty($id)) {
            $this->SchoolEducation->id = $id;
            $data['SchoolEducation']['delete_flg'] = DELETE_FLG_ON;
            $data['SchoolEducation']['beforeSave'] = false;
            if ($this->SchoolEducation->save($data)) {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
            } else {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_school', 1);
    }
}
?>