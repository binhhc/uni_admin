<?php

App::uses('AppModel', 'Model');

class SchoolEducation extends AppModel {

    public $useTable = 'school_education';
    
    public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = SchoolEducation.employee_id',
            'fields' => 'employee_name'
        )
    );
    
    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0006')
                ),                
            ),
            'graduate_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'edu_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'newest_edu_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'school_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'diploma_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>
