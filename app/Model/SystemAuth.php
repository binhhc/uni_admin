<?php

App::uses('AppModel', 'Model');

class SystemAuth extends AppModel {

    public $useTable = 'system_auths';

    public $belongsTo = array(
        'UserInfo' => array(
            'className' => 'UserInfo',
            'foreignKey' => '',
            'conditions' => 'UserInfo.employee_id = SystemAuth.employee_id',
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
            'access_type' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0021')
                ),
            ),
        );

        $this->validate = $validate;
        return $this->validates();
    }

    /**
     * get active of application
     * @author BinhHoang
     **/
    public function getActive($app, $username){

        $userInfo = $this->UserInfo->find('first', array(
            'conditions' => array(
                'UserInfo.office_email' => $username
            )
        ));
        $active = '';
        if(!empty($userInfo)){
            $active = $this->find('first', array(
                'conditions' => array(
                    'SystemAuth.access_type' => SYSTEM_AUTH_ACTIVE,
                    //$app decentralized system. ex: uni_admin, kousu,...
                    // 'SystemAuth.system_name' => $app,
                    'SystemAuth.employee_id' => $userInfo['UserInfo']['employee_id'],
                )
            ));
        }
        return $active;
    }
}