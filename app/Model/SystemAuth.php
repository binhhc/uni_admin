<?php

App::uses('AppModel', 'Model');

class SystemAuth extends AppModel {

    public $useTable = 'system_auths';

    public function customValidate() {
        $validate = array(
            'system_name' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'allowEmpty' => false,
                    'message' => __('UAD_ERR_MSG0020')
                ),
                'unique' => array(
                    'rule' => array('uniqueName'),
                    'message' => __('UAD_ERR_MSG0019'),
                    'on' => 'create'
                )
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

    public function uniqueName(){        
        $system = $this->find('first', array(
            'conditions' => array(
                'SystemAuth.system_name' => $this->data['SystemAuth']['system_name']
            )
        ));
        if(!empty($system)){
            return false;
        }
        return true;
    }

    /**
     * get active of application
     * @author BinhHoang
     **/
    public function getActive($app){
        $active = $this->find('first', array(
            'conditions' => array(
                'SystemAuth.access_type' => 1,
                'SystemAuth.system_name' => $app
            )
        ));
        return $active;
    }
}