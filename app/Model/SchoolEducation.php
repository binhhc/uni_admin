<?php

App::uses('AppModel', 'Model');

class SchoolEducation extends AppModel {

    public $useTable = 'school_education';

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('COMMON_MSG_011')
                ),                
            ),
            'graduate_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'edu_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'newest_edu_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'school_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'diploma_type_cd' => array(
                'numeric' => array(
                    'required' => false,
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>
