<?php

App::uses('AppModel', 'Model');

class MsEmploymentType extends AppModel {

    public $useTable = 'ms_employment_types';

    public function customValidate() {
        $validate = array(
            'employment_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0025')
                ),
                'unique' => array(
                    'rule' => array('checkExist'),
                    'message' => __('UAD_ERR_MSG0026'),
                ),
            ),
            'employment_name' => array(
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

    public function checkExist() {
        $checkExist = $this->find('first', array(
            'conditions'=> array(
                $this->alias . '.employment_cd' => $this->data[$this->alias]['employment_cd'],
                $this->alias . '.delete_flg' => DELETE_FLG_OFF,
            ),
            'recursive' => -1
        ));
        if (($checkExist)) {
            if (!empty($this->data[$this->alias]['employment_cd'])) {
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

    public function beforeValidate() {
        $key = $this->alias;
        if (!empty($this->data[$key]['employment_cd'])) {
            $this->data[$key]['employment_cd'] = str_pad($this->data[$key]['employment_cd'], 2, 0, STR_PAD_LEFT);
        }
    }
}

?>
