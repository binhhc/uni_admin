<?php

App::uses('AppModel', 'Model');

class MsPosition extends AppModel {

    public $useTable = 'ms_positions';

    public function customValidate() {
        $validate = array(
            'position_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0026')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }
}

?>
