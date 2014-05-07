<?php

App::uses('Controller', 'Controller');

class UserInfosController extends AppController {

    public $uses = array('SystemAuth', 'UserInfo', 'AnnualIncome', 'Qualification', 'SchoolEducation', 'UnitPrice', 'WorkExperience', 'Department');
    public $components = array('Paginator');
    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('index', 'add', 'edit', 'delete')) : null;
    }

    public function index() {
        $this->Session->delete('info_id');
        $this->Session->write('flag_link_info', 0);

        // filter
        $filter = array('UserInfo.delete_flg' => DELETE_FLG_OFF);
        if (!empty($this->request->query['employment_type_cd']) && is_numeric($this->request->query['employment_type_cd'])) {
            $filter['UserInfo.employment_type_cd'] = $this->request->query['employment_type_cd'];
        };
        if(!empty($this->request->query['work_location_cd']) && is_numeric($this->request->query['work_location_cd'])) {
            $filter['UserInfo.work_location_cd'] = $this->request->query['work_location_cd'];
        };
        if(!empty($this->request->query['department_cd'])) {
            $filter['UserInfo.department_cd'] = $this->request->query['department_cd'];
        };
        $this->Paginator->settings = array(
            'joins' => array(array(
                'table' => 'departments',
                'alias' => 'Department',
                'type' => 'LEFT',
                'conditions' => array(
                    'Department.department_cd = UserInfo.department_cd',
                    'Department.delete_flg = ' . DELETE_FLG_OFF,
                )
            )),
            'fields' => array(
                'UserInfo.*', 'Department.department_name',
            ),
            'conditions' => $filter,
            'limit' => Configure::read('max_row'),
            'order' => array('UserInfo.employee_id' => 'ASC')
        );
        //departments to filter
        $departments = $this->Department->find('list', array(
            'conditions' => array(
                'Department.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'Department.department_cd', 'Department.department_name',
            )));

        $this->set('userInfo', $this->Paginator->paginate('UserInfo'));
        $this->set(array(
            'departments' => $departments,
            'filter' => $filter,
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
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_info'));
                }
            }
        }
        $this->Session->write('flag_link_info', 1);
        $this->set(array(
            'title_for_layout' => '社員情報',
            'page_title' => '社員情報',
        ));
        $this->set('readonly', '');
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
            unset($data['UserInfo']['employee_id']);

            if ($this->UserInfo->customValidate()) {
                if ($this->UserInfo->save($data)) {
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_info'));
                }
            }
        } else {
            $quanlitify = $this->UserInfo->findById($id);
            $this->request->data = $quanlitify;
        }
        $this->Session->write('flag_link_info', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set(array(
            'title_for_layout' => '社員情報',
            'page_title' => '社員情報',
        ));
        $this->render('detail');
    }

    public function delete($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        if ($this->Session->read('flag_link_info') == 0) {
            $this->Session->write('save_latest_link_info', $_SERVER['HTTP_REFERER']);
        }
        $this->UserInfo->begin();

        if (intval($id > 0) || !empty($id)) {
            if ($this->UserInfo->updateAll(array('UserInfo.delete_flg' => DELETE_FLG_OFF), array('UserInfo.employee_id' => $id))) {
                if($this->AnnualIncome->updateAll(array('AnnualIncome.delete_flg' => DELETE_FLG_OFF),array('AnnualIncome.employee_id' => $id)) &&
                    $this->Qualification->updateAll(array('Qualification.delete_flg' => DELETE_FLG_OFF),array('Qualification.employee_id' => $id)) &&
                    $this->SchoolEducation->updateAll(array('SchoolEducation.delete_flg' => DELETE_FLG_OFF),array('SchoolEducation.employee_id' => $id)) &&
                    $this->UnitPrice->updateAll(array('UnitPrice.delete_flg' => DELETE_FLG_OFF),array('UnitPrice.employee_id' => $id)) &&
                    $this->WorkExperience->updateAll(array('WorkExperience.delete_flg' => DELETE_FLG_OFF),array('WorkExperience.employee_id' => $id))
                ){
                    $this->UserInfo->commit();
                    $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
                }
            } else {
                $this->UserInfo->rollback();
                $this->Session->setFlash(__('UAD_ERR_MSG0001'), 'error');
            }
        }
        $this->Session->write('flag_link_info', 1);
    }
}
?>
