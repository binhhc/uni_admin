<?php

App::uses('AppModel', 'Model');

class Quanlification extends AppModel {

    public $useTable = 'qualification';

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
            'license_type_cd' => array(
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
