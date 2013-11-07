<?php

App::uses('AppModel', 'Model');

class UnitPrice extends AppModel {

    public $useTable = 'unit_price';

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
            'salary_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'bonus' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'support_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'leader_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'meal_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'address_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'absent_salary_cut' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'late_salary_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_normal' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_night' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_holiday' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_1' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_2' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_3' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_4' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'overtime_5' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => 'Numbers only'
                ),
            ),
            'basic_bonus' => array(
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
