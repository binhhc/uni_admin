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
                    'message' => __('COMMON_MSG_011')
                ),                
            ),
            'yearly_amount' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'income_gross' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'income_net' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'total_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'total_tax' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>
