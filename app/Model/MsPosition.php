<?php

App::uses('AppModel', 'Model');

class MsPosition extends AppModel {

    public $useTable = 'ms_positions';

    public function customValidate() {
        $validate = array(
            'position_cd' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0031')
                ),
                'unique' => array(
                    'rule' => array('checkExist'),
                    'message' => __('UAD_ERR_MSG0032'),
                ),
            ),
            'position_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0033')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

    public function checkExist() {
        $checkExist = $this->find('first', array(
            'conditions'=> array(
                $this->alias . '.position_cd' => $this->data[$this->alias]['position_cd'],
                $this->alias . '.delete_flg' => DELETE_FLG_OFF,
            ),
            'recursive' => -1
        ));
        if (($checkExist)) {
            if (!empty($this->data[$this->alias]['position_cd'])) {
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
