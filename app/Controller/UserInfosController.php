<?php

App::uses('Controller', 'Controller');

class UserInfosController extends AppController {

    public $uses = array('SystemAuth', 'UserInfo', 'AnnualIncome', 'Qualification', 'SchoolEducation', 'UnitPrice', 'WorkExperience', 'MsDepartment', 'MsEmploymentType', 'MsJob', 'MsPosition', 'MsWorkLocation');
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
                'table' => 'ms_departments',
                'alias' => 'MsDepartment',
                'type' => 'LEFT',
                'conditions' => array(
                    'MsDepartment.department_cd = UserInfo.department_cd',
                    'MsDepartment.delete_flg = ' . DELETE_FLG_OFF,
                )
            )),
            'fields' => array(
                'UserInfo.*',
                'MsDepartment.department_name',
                'MsEmploymentType.employment_name',
                'MsJob.job_name',
                'MsPosition.position_name',
                'MsWorkLocation.work_location_name',
            ),
            'conditions' => $filter,
            'limit' => Configure::read('max_row'),
            'order' => array('UserInfo.employee_id' => 'ASC')
        );
        //departments to filter
        $departments = $this->MsDepartment->find('list', array(
            'conditions' => array(
                'MsDepartment.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsDepartment.department_cd', 'MsDepartment.department_name',
            )));

        $workLocations = $this->MsWorkLocation->find('list', array(
            'conditions' => array(
                'MsWorkLocation.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsWorkLocation.id', 'MsWorkLocation.work_location_name',
            )));

        $employmentTypes = $this->MsEmploymentType->find('list', array(
            'conditions' => array(
                'MsEmploymentType.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsEmploymentType.id', 'MsEmploymentType.employment_name',
            )));

        $this->set('userInfo', $this->Paginator->paginate('UserInfo'));
        $this->set(array(
            'departments' => $departments,
            'work_locations' => $workLocations,
            'employment_types' => $employmentTypes,
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
                    $data_system_auth['SystemAuth']['employee_id'] = str_pad(ereg_replace('[^0-9]', '', $data['UserInfo']['employee_id']), MAX_EMP_ID, 0, STR_PAD_LEFT);;
                    $data_system_auth['SystemAuth']['access_type'] = SYSTEM_AUTH_ACTIVE;
                    $this->SystemAuth->set($data_system_auth);
                    $this->SystemAuth->create();
                    $this->SystemAuth->save($data_system_auth);
                    $this->Session->setFlash(__('UAD_COMMON_MSG0001'), 'success');
                    $this->redirect($this->Session->read('save_latest_link_info'));
                }
            }
        }
        $departments = $this->MsDepartment->find('list', array(
            'conditions' => array(
                'MsDepartment.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsDepartment.department_cd', 'MsDepartment.department_name',
            )));

        $workLocations = $this->MsWorkLocation->find('list', array(
            'conditions' => array(
                'MsWorkLocation.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsWorkLocation.id', 'MsWorkLocation.work_location_name',
            )));

        $employmentTypes = $this->MsEmploymentType->find('list', array(
            'conditions' => array(
                'MsEmploymentType.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsEmploymentType.id', 'MsEmploymentType.employment_name',
            )));
        $jobs = $this->MsJob->find('list', array(
            'conditions' => array(
                'MsJob.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsJob.id', 'MsJob.job_name',
            )));
        $positions = $this->MsPosition->find('list', array(
            'conditions' => array(
                'MsPosition.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsPosition.id', 'MsPosition.position_name',
            )));

        $this->Session->write('flag_link_info', 1);
        $this->set(array(
            'departments' => $departments,
            'work_locations' => $workLocations,
            'employment_types' => $employmentTypes,
            'jobs' => $jobs,
            'positions' => $positions,
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

        $departments = $this->MsDepartment->find('list', array(
            'conditions' => array(
                'MsDepartment.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsDepartment.department_cd', 'MsDepartment.department_name',
            )));

        $workLocations = $this->MsWorkLocation->find('list', array(
            'conditions' => array(
                'MsWorkLocation.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsWorkLocation.id', 'MsWorkLocation.work_location_name',
            )));

        $employmentTypes = $this->MsEmploymentType->find('list', array(
            'conditions' => array(
                'MsEmploymentType.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsEmploymentType.id', 'MsEmploymentType.employment_name',
            )));
        $jobs = $this->MsJob->find('list', array(
            'conditions' => array(
                'MsJob.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsJob.id', 'MsJob.job_name',
            )));
        $positions = $this->MsPosition->find('list', array(
            'conditions' => array(
                'MsPosition.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array(
                'MsPosition.id', 'MsPosition.position_name',
            )));

        $this->Session->write('flag_link_info', 1);
        $this->set('readonly', 'readonly="readonly"');
        $this->set(array(
            'departments' => $departments,
            'work_locations' => $workLocations,
            'employment_types' => $employmentTypes,
            'jobs' => $jobs,
            'positions' => $positions,
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
            if ($this->UserInfo->updateAll(array('UserInfo.delete_flg' => DELETE_FLG_ON), array('UserInfo.employee_id' => $id))) {
                if($this->AnnualIncome->updateAll(array('AnnualIncome.delete_flg' => DELETE_FLG_ON),array('AnnualIncome.employee_id' => $id)) &&
                    $this->Qualification->updateAll(array('Qualification.delete_flg' => DELETE_FLG_ON),array('Qualification.employee_id' => $id)) &&
                    $this->SchoolEducation->updateAll(array('SchoolEducation.delete_flg' => DELETE_FLG_ON),array('SchoolEducation.employee_id' => $id)) &&
                    $this->UnitPrice->updateAll(array('UnitPrice.delete_flg' => DELETE_FLG_ON),array('UnitPrice.employee_id' => $id)) &&
                    $this->WorkExperience->updateAll(array('WorkExperience.delete_flg' => DELETE_FLG_ON),array('WorkExperience.employee_id' => $id)) &&
                    $this->SystemAuth->updateAll(array('SystemAuth.delete_flg' => DELETE_FLG_ON),array('SystemAuth.employee_id' => $id))
                ){
                    $this->UserInfo->commit();
                    $this->Session->setFlash(__('UAD_COMMON_MSG0002'), 'success');
                    $this->response->type("json");
                    echo json_encode(array('success' => 1));
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
