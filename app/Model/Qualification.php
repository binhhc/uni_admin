<?php

App::uses('AppModel', 'Model');

class Qualification extends AppModel {

    public $useTable = 'qualification';

    public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = Qualification.employee_id',
            'fields' => 'employee_name'
        )
    );

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0006')
                ),
            ),
            'license_type_cd' => array(
                 'numeric' => array(
                    'allowEmpty' =>true,
                    'rule' => 'numeric',
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'acquire_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'update_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'expire_date' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            )
        );
        $this->validate = $validate;
        return $this->validates();
    }

    /**
     * Check record exists
     *
     * @author Bao Nam
     * @since 2014/06/24
     */
    public function checkExist($fields = array()){
        $data = $this->data;
        $conCheck = array();
        foreach ($fields as $key => $val) {
            $conCheck[$val] = $data[$this->alias][$val];
        }
        $id = $this->find('first', array(
            'conditions' => $conCheck,
            'recursive' => -1,
            ));
        if (!empty($id)) {
            return $id[$this->alias]['id'];
        } else {
            return false;
        }
    }
}
?>


