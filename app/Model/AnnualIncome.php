<?php

App::uses('AppModel', 'Model');

class AnnualIncome extends AppModel {

    public $useTable = 'annual_income';

    public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = AnnualIncome.employee_id',
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
            'yearly_amount' => array(
                'date' => array(
                    'rule' => array('date', 'ymd'),
                    'message' => __('UAD_ERR_MSG0018'),
                    'allowEmpty' => true
                ),
            ),
            'income_gross' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'total_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'total_tax' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
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
