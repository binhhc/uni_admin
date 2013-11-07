<?php

App::uses('AppModel', 'Model');

class UserInfo extends AppModel {

    public $useTable = 'user_info';

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Employee id not empty!'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Numbers only'
                ),
            ),
            'employee_name' => array(
                'alphaNumeric' => array(
                    'rule' => 'alphaNumeric',
                    'required' => true,
                    'message' => 'Employee name must only contain letters and numbers.'
                ),
                'between' => array(
                    'rule' => array('between', 5, 50),
                    'message' => 'Between 5 to 15 characters'
                )
            ),
            'gender_code' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
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

}

?>
