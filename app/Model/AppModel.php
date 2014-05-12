<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

     /**
     * Check record exists
     *
     * @author Nguyen Hoang
     * @since 2014/01/07
     */
    public function beforeSave($options = array()){
        $key = $this->alias;
        $data = $this->data;
        if(isset($data[$key]['beforeSave']) && $data[$key]['beforeSave'] == false) {
            unset($data[$key]['beforeSave']);
            return true;
        }

        $conditions = array();
        foreach($data as $model => $fields){
            foreach($fields as $field => $value){

                if($field=='id'){
                    $conditions[$field." <> "] = $value;
                }else if($field!='modified' and $field!='created'){
                    $conditions[$field] = $value;
                }
            }
        }
        $data = $this->find('first',array(
            'conditions' => $conditions,
            'recursive' => -1,
            'fields' => array('id')
        ));

        if(!empty($data)) {
            $this->log("[$model] record exists ".print_r($fields,true) , 'batch');
            App::uses('CakeSession','Model/Datasource');
            CakeSession::write('Message', array(
                    'flash' => array(
                        'message' => __('Record exists in database'),
                        'element' => 'default'
                    )
                )
            );
            return false;
        }
    }
}
