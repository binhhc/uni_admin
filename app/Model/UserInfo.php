<?php

App::uses('AppModel', 'Model');

class UserInfo extends AppModel {

    public $useTable = 'user_info';

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => 'Employee id not empty!'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Numbers only'
                ),
                'unique' => array(
                    'rule' => array('checkUniqueId'),
                    'message' => 'Unique employeeId',
                    'on' => 'create',
                ),
            ),
            'employee_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => 'Employee name not empty!'
                ),
            ),
            'gender_code' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'office_email' => array(
                'email' => array(
                    'rule' => 'email',
                    'allowEmpty' => true,
                    'message' => 'Not format email'
                ),
            ),
            'employment_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'job_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'position_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'work_location_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'problem_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'recruit_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'recruit_place_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'introduction_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'introduction_related_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_holiday' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'face_auth_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'rating_job_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'rating_grade_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

    public function checkUniqueId($id){
        $arr_id = $this->find('first', array(
            'conditions' => array(
                'UserInfo.employee_id' => $id
            )
        ));
        if(!empty($arr_id)){
            return false;
        }
        return true;
    }

    public function listUser(){
        $arr_user = $this->find('list', array(
            'fields' => array('UserInfo.employee_id', 'UserInfo.employee_name'),
        ));
        return $arr_user;        
    }
}