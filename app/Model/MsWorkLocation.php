<?php

App::uses('AppModel', 'Model');

class MsWorkLocation extends AppModel {

    public $useTable = 'ms_work_locations';

    public function customValidate() {
        $validate = array(
            'work_location_cd' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0034')
                ),
                'unique' => array(
                    'rule' => array('checkExist'),
                    'message' => __('UAD_ERR_MSG0035'),
                ),
            ),
            'work_location_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0036')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

    public function checkExist() {
        $checkExist = $this->find('first', array(
            'conditions'=> array(
                $this->alias . '.work_location_cd' => $this->data[$this->alias]['work_location_cd'],
                $this->alias . '.delete_flg' => DELETE_FLG_OFF,
            ),
            'recursive' => -1
        ));
        if (($checkExist)) {
            if (!empty($this->data[$this->alias]['work_location_cd'])) {
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
