<?php

App::uses('AppModel', 'Model');

class UnitPrice extends AppModel {

    public $useTable = 'unit_price';
    
    public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = UnitPrice.employee_id',
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
            'salary_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'adjust_salary' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'bonus' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'support_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'leader_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'meal_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'address_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'absent_salary_cut' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'late_salary_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_normal' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_night' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_holiday' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_1' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_2' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_3' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_4' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'overtime_5' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'basic_bonus' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('UAD_ERR_MSG0007')
                ),
            ),
            'revise_date' => array(
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
}

?>
