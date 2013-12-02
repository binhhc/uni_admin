<?php

App::uses('AppModel', 'Model');

class AnnualIncome extends AppModel {

    public $useTable = 'annual_income';

    public function customValidate() {
        $validate = array(
            'employee_id' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Employee id not empty!'
                ),
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Numbers only'
                ),
            ),
            'yearly_amount' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'income_gross' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                     'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'income_net' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                     'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'total_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                     'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'total_tax' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                     'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
        );
        $this->validate = $validate;
        return $this->validates();
    }

}

?>
