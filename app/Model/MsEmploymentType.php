<?php

App::uses('AppModel', 'Model');

class MsEmploymentType extends AppModel {

    public $useTable = 'ms_employment_types';

    public function customValidate() {
        $validate = array(
            'employment_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0024')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }
}

?>
