<?php

App::uses('AppModel', 'Model');

class MsJob extends AppModel {

    public $useTable = 'ms_jobs';

    public function customValidate() {
        $validate = array(
            'job_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0025')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }
}

?>
