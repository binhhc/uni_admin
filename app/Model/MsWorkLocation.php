<?php

App::uses('AppModel', 'Model');

class MsWorkLocation extends AppModel {

    public $useTable = 'ms_work_locations';

    public function customValidate() {
        $validate = array(
            'work_location_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0027')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }
}

?>
