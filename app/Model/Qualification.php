<?php

App::uses('AppModel', 'Model');

class Qualification extends AppModel {

    public $useTable = 'qualification';

	public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = Qualification.employee_id',
            'fields' => 'employee_name'
        )
    );
    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',  
                    'allowEmpty' => false,                  
                    'message' => __('COMMON_MSG_011')
                ),                             
            ),
            'license_type_cd' => array(
                 'numeric' => array(
                    'allowEmpty' =>true,
                    'rule' => 'numeric',                    
                    'message' => __('COMMON_MSG_012')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>
