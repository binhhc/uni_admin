<?php

App::uses('AppModel', 'Model');

class MsDepartment extends AppModel {

    public $useTable = 'ms_departments';

    public function customValidate() {
        $validate = array(
            'department_cd' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0022')
                ),
            ),
            'department_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0023')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }
}

?>
