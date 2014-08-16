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
            'fields' => 'department_name',
        ),
        'MsEmploymentType' => array(
            'className' => 'MsEmploymentType',
            'foreignKey' => '',
            'conditions' => 'MsEmploymentType.employment_cd = UserInfo.employment_type_cd',
            'fields' => 'employment_name',
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

    public function beforeValidate() {
        $key = $this->alias;
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
}