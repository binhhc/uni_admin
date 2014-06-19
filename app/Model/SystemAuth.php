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
            'access_uni' => array(
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
     * @modified Bao Nam - 2014/05/09
     **/
    public function getActive($username){

        $userInfo = $this->UserInfo->find('first', array(
            'conditions' => array(
                'UserInfo.office_email' => $username,
                'UserInfo.delete_flg' => DELETE_FLG_OFF
            )
        ));
        $active = '';
        if (!empty($userInfo)) {
            $active = $this->find('first', array(
                'conditions' => array(
                    'SystemAuth.employee_id' => $userInfo['UserInfo']['employee_id'],
                    'SystemAuth.delete_flg' => DELETE_FLG_OFF
                )
            ));
        }
        return $active;
    }
}