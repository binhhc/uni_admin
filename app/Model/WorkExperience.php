<?php

App::uses('AppModel', 'Model');

class WorkExperience extends AppModel {

    public $useTable = 'work_experience';
	
	public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = WorkExperience.employee_id',
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
            'abroad_type_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
            'retire_reason_cd' => array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'allowEmpty' => true,
                    'message' => __('COMMON_MSG_012')
                ),
            ),
			'join_date' => array(
				'date' => array(
					'rule' => array('date', 'ymd'),
					'message' => __('You must provide a deadline in YYYY-MM-DD format.'),
					'allowEmpty' => true
				),
			),
			'leave_date' => array(
				'date' => array(
					'rule' => array('date', 'ymd'),
					'message' => __('You must provide a deadline in YYYY-MM-DD format.'),
					'allowEmpty' => true
				),
			)
        );
        $this->validate = $validate;
        return $this->validate;
    }

}