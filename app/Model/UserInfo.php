<?php

App::uses('AppModel', 'Model');

class UserInfo extends AppModel {

    public $useTable = 'user_info';

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'MsDepartment' => array(
            'className' => 'MsDepartment',
            'foreignKey' => '',
            'conditions' => 'MsDepartment.department_cd = UserInfo.department_cd',
            'fields' => array('id', 'department_name'),
        ),
        'MsEmploymentType' => array(
            'className' => 'MsEmploymentType',
            'foreignKey' => '',
            'conditions' => 'MsEmploymentType.employment_cd = UserInfo.employment_type_cd',
            'fields' => array('id', 'employment_name'),
        ),
        'MsJob' => array(
            'className' => 'MsJob',
            'foreignKey' => '',
            'conditions' => 'MsJob.job_cd = UserInfo.job_cd',
            'fields' => 'job_name',
        ),
        'MsPosition' => array(
            'className' => 'MsPosition',
            'foreignKey' => '',
            'conditions' => 'MsPosition.position_cd = UserInfo.position_cd',
            'fields' => 'position_name',
        ),
        'MsWorkLocation' => array(
            'className' => 'MsWorkLocation',
            'foreignKey' => '',
            'conditions' => 'MsWorkLocation.work_location_cd = UserInfo.work_location_cd',
            'fields' => 'work_location_name',
        )
    );

    public function customValidate($import = false) {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0006')
                ),
                'unique' => array(
                    'rule' => array('checkUniqueId'),
                    'message' => __('UAD_ERR_MSG0007'),
                    'on' => 'create',
                ),
            ),
            'employee_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0009')
                ),
            ),
            'work_place_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0037')
                ),
            ),
            'office_email' => array(
                'email' => array(
                    'rule' => 'email',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0010')
                ),
            ),

            'company_join_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'prev_company_join_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'prev_company_leave_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'prev_last_work_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'leave_start_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'leave_end_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'leave_plan_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'gender_code' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'birthday' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'employment_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'prev_employment_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'job_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'position_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'work_location_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'face_auth_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'rating_job_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'rating_grade_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'TMS_auth_group_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'TMS_offday_apply_possible_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'TMS_attendance_approver' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
                'unique' => array(
                    'rule' => array('checkExist'),
                    'message' => __('UAD_ERR_MSG0038'),
                ),
            ),
        );
        if ($import == true) {
            unset($validate['employee_id']['unique']);
            unset($validate['TMS_attendance_approver']['unique']);
        }
        $this->validate = $validate;
        return $this->validates();
    }

    public function checkUniqueId($id){
        $arr_id = $this->find('first', array(
            'conditions' => array(
                'UserInfo.employee_id' => $id,
            )
        ));
        if(!empty($arr_id) || strlen($id['employee_id'])>6 || !is_numeric($id['employee_id'])){
            return false;
        }
        return true;
    }

    public function checkExist($id){
        $arr_id = $this->find('first', array(
            'conditions' => array(
                'UserInfo.employee_id' => $id,
            )
        ));
        if(!empty($arr_id)){
            return true;
        }
        return false;
    }

    public function listUser(){
        $arr_user = $this->find('list', array(
            'conditions' => array(
                'UserInfo.delete_flg' => DELETE_FLG_OFF
                ),
            'fields' => array('UserInfo.employee_id', 'UserInfo.employee_name'),
        ));
        $result = array();
        if (!empty($arr_user)) {
            foreach ($arr_user as $key => $value) {
                $result[$key] = $key .' | ' . $value;
            }
        }
        if(empty($result)) $result[''] = '';
        return $result;
    }

    /**
     * Add Zero before number
     * @author  Bao Nam
     * @since 2014-08-18
     */

    public function beforeValidate() {
        $key = $this->alias;

        //employee_id format xxxxxx
        if (!empty($this->data[$key]['employee_id'])) {
            $this->data[$key]['employee_id'] = str_pad($this->data[$key]['employee_id'], 6, 0, STR_PAD_LEFT);
        }

        //employment_type_cd format xx
        if (!empty($this->data[$key]['employment_type_cd'])) {
            $this->data[$key]['employment_type_cd'] = str_pad($this->data[$key]['employment_type_cd'], 2, 0, STR_PAD_LEFT);
        }
        //prev_employment_type_cd format xx
        if (!empty($this->data[$key]['prev_employment_type_cd'])) {
            $this->data[$key]['prev_employment_type_cd'] = str_pad($this->data[$key]['prev_employment_type_cd'], 2, 0, STR_PAD_LEFT);
        }
        //job_cd format xxx
        if (!empty($this->data[$key]['job_cd'])) {
            $this->data[$key]['job_cd'] = str_pad($this->data[$key]['job_cd'], 3, 0, STR_PAD_LEFT);
        }

        //position_cd format xxx
        if (!empty($this->data[$key]['position_cd'])) {
            $this->data[$key]['position_cd'] = str_pad($this->data[$key]['position_cd'], 3, 0, STR_PAD_LEFT);
        }

        //work_location_cd format xxx
        if (!empty($this->data[$key]['work_location_cd'])) {
            $this->data[$key]['work_location_cd'] = str_pad($this->data[$key]['work_location_cd'], 3, 0, STR_PAD_LEFT);
        }

        //face_auth_cd format xx
        if (!empty($this->data[$key]['face_auth_cd'])) {
            $this->data[$key]['face_auth_cd'] = str_pad($this->data[$key]['face_auth_cd'], 2, 0, STR_PAD_LEFT);
        }

        //rating_job_cd format xxx
        if (!empty($this->data[$key]['rating_job_cd'])) {
            $this->data[$key]['rating_job_cd'] = str_pad($this->data[$key]['rating_job_cd'], 3, 0, STR_PAD_LEFT);
        }

        //rating_grade_cd format xxx
        if (!empty($this->data[$key]['rating_grade_cd'])) {
            $this->data[$key]['rating_grade_cd'] = str_pad($this->data[$key]['rating_grade_cd'], 3, 0, STR_PAD_LEFT);
        }

        //TMS_auth_group_cd format xxx
        if (!empty($this->data[$key]['TMS_auth_group_cd'])) {
            $this->data[$key]['TMS_auth_group_cd'] = str_pad($this->data[$key]['TMS_auth_group_cd'], 3, 0, STR_PAD_LEFT);
        }

        //TMS_offday_apply_possible_cd format xxx
        if (!empty($this->data[$key]['TMS_offday_apply_possible_cd'])) {
            $this->data[$key]['TMS_offday_apply_possible_cd'] = str_pad($this->data[$key]['TMS_offday_apply_possible_cd'], 3, 0, STR_PAD_LEFT);
        }

        //TMS_attendance_approver format xxxxxx
        if (!empty($this->data[$key]['TMS_attendance_approver'])) {
            $this->data[$key]['TMS_attendance_approver'] = str_pad($this->data[$key]['TMS_attendance_approver'], 6, 0, STR_PAD_LEFT);
        }

    }


    /**
     * Add Permission for Employees
     * @author  Bao Nam
     * @since 2014-08-18
     */

    public function afterSave($created) {
        $data = $this->data;
        if(!empty($data['UserInfo']['employee_id'])) {
            $employee_id = $data['UserInfo']['employee_id'];
        } else {
            $employees = $this->findById($data['UserInfo']['id'], array('fields' => 'employee_id'));
            $employee_id = $employees['UserInfo']['employee_id'];
        }


        $userInfoData = $this->findByEmployeeId($employee_id);


//Save history Staff Department
        App::uses('MsDepartment', 'Model');
        App::uses('HistoryStaffDept', 'Model');
        $department = new MsDepartment();
        $staffDept = new HistoryStaffDept();

        $staffDeptCurrent = $staffDept->find('first', array(
            'conditions' => array('employee_id' => $employee_id),
            'fields' => 'dept_id',
            'order' => array('id' => 'DESC')
        ));
        $staffDeptId = (!empty($staffDeptCurrent['HistoryStaffDept']['dept_id'])) ? $staffDeptCurrent['HistoryStaffDept']['dept_id'] : '';
        $historyStaffDept = array();
        if ( (!empty($userInfoData['MsDepartment']['id'])) && ($staffDeptId != $userInfoData['MsDepartment']['id']) ) {
            $historyStaff['employee_id'] = $employee_id;
            $historyStaff['dept_id'] = $userInfoData['MsDepartment']['id'];
            $historyStaff['date_change'] = $userInfoData['UserInfo']['company_join_date'];
            $staffDept->create();
            $staffDept->save($historyStaff);
        }


//Save history Staff Type
        App::uses('MsEmploymentType', 'Model');
        App::uses('HistoryStaffType', 'Model');
        $employmentType = new MsEmploymentType();
        $staffType = new HistoryStaffType();
        $staffTypeCurrent = $staffType->find('first', array(
            'conditions' => array('employee_id' => $employee_id),
            'fields' => 'emp_type_id',
            'order' => array('id' => 'DESC')
        ));
        $staffTypeId = (!empty($staffTypeCurrent['HistoryStaffType']['emp_type_id'])) ? $staffTypeCurrent['HistoryStaffType']['emp_type_id'] : '';
        $historyStaffType = array();
        if ( (!empty($userInfoData['MsEmploymentType']['id'])) && ($staffTypeId != $userInfoData['MsEmploymentType']['id']) ) {
            $historyStaffType['employee_id'] = $employee_id;
            $historyStaffType['emp_type_id'] = $userInfoData['MsEmploymentType']['id'];
            $historyStaffType['date_change'] = $userInfoData['UserInfo']['company_join_date'];
            $staffType->create();
            $staffType->save($historyStaffType);
        }

//Set Permission
        App::uses('SystemAuth', 'Model');
        $systemAuth = new SystemAuth();

        $checkExist = $systemAuth->findByEmployeeId($employee_id);
        $department_id = $data['UserInfo']['department_cd'];
        $employee_type = $data['UserInfo']['employment_type_cd'];

        $access_tms = AUTH_BANNED;
        $access_kousu = AUTH_BANNED;
        $access_uni = AUTH_BANNED;

        switch ($employee_type) {
            case '01':
                $access_kousu = AUTH_ACTIVE;
                $access_tms = AUTH_ACTIVE;
                if(empty($department_id)){
                    $access_uni = AUTH_ACTIVE;
                } else {
                    if($department_id == SYS_AUTH_TMS_DEP_EXCEPT) {
                        $access_tms = AUTH_BANNED;
                    }
                }
                break;
            case '02':
                break;
            case '03':
                break;
            case '04':
                $access_tms = AUTH_ACTIVE;
                $access_kousu = AUTH_ACTIVE;
                break;
            case '05':
                $access_tms = AUTH_ACTIVE;
                $access_kousu = AUTH_ACTIVE;
                break;
            default:
                # code...
                break;
        }

        $systemAuthData['employee_id'] = $employee_id;
        $systemAuthData['access_kousu'] = $access_kousu;
        $systemAuthData['access_tms'] = $access_tms;
        $systemAuthData['access_uni'] = $access_uni;

        $systemAuth->set($systemAuthData);

        if (!empty($checkExist)) {
            $systemAuth->id = $checkExist['SystemAuth']['id'];
            $systemAuth->save($systemAuthData);
        } else {
            $systemAuth->create();
            $systemAuth->save($systemAuthData);

        }
        return true;
    }

}