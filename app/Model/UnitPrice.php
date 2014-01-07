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
                    'message' => __('COMMON_MSG_011')
                ),                
            ),
            'salary_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'adjust_salary' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'bonus' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'support_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'leader_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'meal_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'address_allowance' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'absent_salary_cut' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'late_salary_cut' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_normal' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_night' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_holiday' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_1' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_2' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_3' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_4' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'overtime_5' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'basic_bonus' => array(
                 'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
			'revise_date' => array(
				'date' => array(
					'rule' => array('date', 'ymd'),
					'message' => __('You must provide a deadline in YYYY-MM-DD format.'),
					'allowEmpty' => true
				),
			)
        );

        $this->validate = $validate;
        return $this->validates();
    }
}

?>
