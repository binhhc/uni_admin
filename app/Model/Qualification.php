<?php

App::uses('AppModel', 'Model');

class Qualification extends AppModel {

    public $useTable = 'qualification';

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',  
                    'allowEmpty' => false,                  
                    'message' => 'Employee id not empty!'
                ),                             
            ),
            'license_type_cd' => array(
                 'numeric' => array(
                    'allowEmpty' =>true,
                    'rule' => 'numeric',                    
                    'message' => 'Numbers only'
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>