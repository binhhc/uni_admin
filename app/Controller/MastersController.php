<?php

App::uses('Controller', 'Controller');

class MastersController extends AppController {

    public $uses = array('UserInfo', 'MsDepartment', 'MsEmploymentType', 'MsJob', 'MsPosition', 'MsWorkLocation');
    public $components = array('Paginator');
    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'msDepartment', 'msEmploymentType', 'msWorkLocation', 'msJob', 'msPosition', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->write('flag_link_master', 0);
        $this->set(array(
            'title_for_layout' => ' マスター管理',
            'page_title' => ' マスター管理',
        ));
    }

    public function msDepartment() {
        $this->Session->write('flag_link_master', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'MsDepartment.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('MsDepartment.id' => 'ASC')
        );
        $this->set('msDetail', $this->Paginator->paginate('MsDepartment'));
        $this->set(array(
            'fields_name' => 'department',
            'form_model' => 'MsDepartment',
            'title_for_layout' => ' 所属',
            'page_title' => ' マスター所属',
        ));
        $this->render('msdetail');
    }

    public function msEmploymentType() {
        $this->Session->write('flag_link_master', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'MsEmploymentType.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('MsEmploymentType.id' => 'ASC')
        );
        $this->set('msDetail', $this->Paginator->paginate('MsEmploymentType'));
        $this->set(array(
            'fields_name' => 'employment',
            'form_model' => 'MsEmploymentType',
            'title_for_layout' => '雇用区分',
            'page_title' => ' 雇用区分マスター',
        ));
        $this->render('msdetail');
    }

    public function msJob() {
        $this->Session->write('flag_link_master', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'MsJob.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('MsJob.id' => 'ASC')
        );
        $this->set('msDetail', $this->Paginator->paginate('MsJob'));
        $this->set(array(
            'fields_name' => 'job',
            'form_model' => 'MsJob',
            'title_for_layout' => ' 職種',
            'page_title' => ' 職種マスター',
        ));
        $this->render('msdetail');
    }

    public function msPosition() {
        $this->Session->write('flag_link_master', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'MsPosition.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('MsPosition.id' => 'ASC')
        );
        $this->set('msDetail', $this->Paginator->paginate('MsPosition'));
        $this->set(array(
            'fields_name' => 'position',
            'form_model' => 'MsPosition',
            'title_for_layout' => ' 役職',
            'page_title' => ' 役職マスター',
        ));
        $this->render('msdetail');
    }


    public function msWorkLocation() {

        $this->Session->write('flag_link_master', 0);

        $this->Paginator->settings = array(
            'conditions' => array(
                'MsWorkLocation.delete_flg' => DELETE_FLG_OFF,
                ),
            'limit' => Configure::read('max_row'),
            'order' => array('MsWorkLocation.id' => 'ASC')
        );
        $this->set('msDetail', $this->Paginator->paginate('MsWorkLocation'));
        $this->set(array(
            'fields_name' => 'work_location',
            'form_model' => 'MsWorkLocation',
            'title_for_layout' => ' 勤務地',
            'page_title' => ' 勤務地マスター',
        ));
        $this->render('msdetail');
    }

    public function add($form_model) {
        if ($this->Session->read('flag_link_master') == 0) {
            $this->Session->write('save_latest_link_master', $_SERVER['HTTP_REFERER']);
        }
        $modelAdd = array(
            'MsDepartment' => 'department',
            'MsEmploymentType' => 'employment',
            'MsJob' => 'job',
            'MsPosition' => 'position',
            'MsWorkLocation' => 'work_location');
        if (empty($form_model) || !array_key_exists($form_model, $modelAdd)) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $createdUser = $this->UserInfo->findByOfficeEmail($this->Auth->user(), array("fields" => "UserInfo.id"));
            $data[$form_model]['created_user'] = $createdUser['UserInfo']['id'];
            if ($this->$form_model->customValidate()) {
                $this->$form_model->create();
                if ($this->$form_model->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_master'));
                }
            }
        }
        $this->Session->write('flag_link_master', 1);
        $this->set(array(
            'fields_name' => $modelAdd[$form_model],
            'form_model' => $form_model,
            'title_for_layout' => $form_model.'追加',
            'page_title' => $form_model.'追加',
        ));
        $this->set('readonly', '');
        $this->render('detail');
    }

    public function edit() {
        if ($this->Session->read('flag_link_master') == 0) {
            $this->Session->write('save_latest_link_master', $_SERVER['HTTP_REFERER']);
        }
        if (!empty($this->request->data['id'])) {
            $this->Session->write('master_id', $this->request->data['id']);
        }
        if (!empty($this->request->data['master_model'])) {
            $this->Session->write('master_model', $this->request->data['master_model']);
        }
        if (!empty($this->request->data['fields_name'])) {
            $this->Session->write('fields_name', $this->request->data['fields_name']);
        }
        $id = $this->Session->read('master_id');
        $masterModel = $this->Session->read('master_model');
        $fieldsName = $this->Session->read('fields_name');
        if (!$this->$masterModel->exists($id)) {
            return $this->redirect(array('action' => 'index'));
        }
        if (($this->request->is('post') || $this->request->is('put')) && (empty($this->request->data['id']))) {
            $data = $this->request->data;
            $modifiedUser = $this->UserInfo->findByOfficeEmail($this->Auth->user(), array("fields" => "UserInfo.id"));
            $data[$masterModel]['beforeSave'] = false;
            $data[$masterModel]['modified_user'] = $modifiedUser['UserInfo']['id'];
            if ($this->$masterModel->customValidate()) {
                if ($this->$masterModel->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_master'));
                }
            }
        } else {
            $modelData = $this->$masterModel->findById($id);
            $this->request->data = $modelData;
        }
        $this->Session->write('flag_link_master', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set(array(
            'fields_name' => $fieldsName,
            'form_model' => $masterModel,
            'title_for_layout' => $masterModel.'更新',
            'page_title' => $masterModel.'更新',
        ));
        $this->render('detail');

    }

    public function delete($form_model = null, $id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_master') == 0) {
            $this->Session->write('save_latest_link_master', $_SERVER['HTTP_REFERER']);
        }

        if (intval($id > 0) || !empty($id)) {
            $this->$form_model->id = $id;
            $modifiedUser = $this->UserInfo->findByOfficeEmail($this->Auth->user(), array("fields" => "UserInfo.id"));
            $data[$form_model]['modified_user'] = $modifiedUser['UserInfo']['id'];
            $data[$form_model]['delete_flg'] = DELETE_FLG_ON;
            $data[$form_model]['beforeSave'] = false;
            if ($this->$form_model->save($data)) {
                $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
                $this->response->type("json");
                echo json_encode(array('success' => 1));
            } else {
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_master', 1);
    }

}