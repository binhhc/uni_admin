<?php

App::uses('AppModel', 'Model');

class MsJob extends AppModel {

    public $useTable = 'ms_jobs';

    public function customValidate() {
        $validate = array(
            'job_cd' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0028')
                ),
                'unique' => array(
                    'rule' => array('checkExist'),
                    'message' => __('UAD_ERR_MSG0029'),
                ),
            ),
            'job_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0030')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

    public function checkExist() {
        $checkExist = $this->find('first', array(
            'conditions'=> array(
                $this->alias . '.job_cd' => $this->data[$this->alias]['job_cd'],
                $this->alias . '.delete_flg' => DELETE_FLG_OFF,
            ),
            'recursive' => -1
        ));
        if (($checkExist)) {
            if (!empty($this->data[$this->alias]['job_cd'])) {
                if($this->data[$this->alias]['id'] == $checkExist[$this->alias]['id']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
        return true;
        }
    }
}

?>
