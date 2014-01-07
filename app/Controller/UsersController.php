<?php
App::uses('AppController', 'Controller');
App::uses('CakeLogInterface', 'Log');
App::uses('Controller', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        $this->Auth->user() ? $this->Auth->allow(array('status')) : null;
        $this->Auth->allow(array('login', 'logout', 'status', 'runbatch','logbatch'));
    }

    public function login() {
        if ($this->request->is('post') || $this->request->is('put')) {            
            if(!empty($this->request->data['User']['username']) && !empty($this->request->data['User']['password'])){
                if ($this->Auth->login()) {
                    $this->redirect(array('controller' => 'UserInfos', 'action' => 'index'));
                } else {
                    $this->Session->setFlash('COMMON_MSG_004', 'error');
                }
            }else{
                $this->Session->setFlash('COMMON_MSG_005', 'error');
            }
        }
        $this->layout = 'login';
        $this->set(array(
            'title_for_layout' => 'ログイン',
        ));
    }

    public function logout() {
        $this->Session->destroy();
        $this->redirect(array('controller' => 'Users', 'action' => 'login'));
    }

    /*
     * Run batch in layout
     * Author Binh Hoang
     */

    public function runbatch() {
        if(!defined('BATCH_LOCK') || !file_exists(BATCH_LOCK)){
        $batchEngine = new File(BATCH_ENGINE_ALL);
        $batchEngine->write('Is running', 'w', true);
        $path = substr(APP, 0, strlen(APP) - 1);
        $cake_path = $path . DS . 'Console' . DS . 'cake.php';

        $real_path = Configure::read('path_csv');
        if (!empty($real_path)) {
            $csv_file_userinfo = $real_path . DS . '01_USERINFO.csv';
            $csv_file_qualification = $real_path . DS . '02_QUALIFICATION.csv';
            $csv_file_unitprice = $real_path . DS . '03_UNIT_PRICE.csv';
            $csv_file_unique_income = $real_path . DS . '04_ANNUAL_INCOME.csv';
            $csv_file_school_education = $real_path . DS . '05_SCHOOL_EDUCATION.csv';
            $csv_file_work_experience = $real_path . DS . '06_WORK_EXPERIENCE.csv';
            // check csv files exist
            if($this->User->is_url_exist($csv_file_userinfo) && 
                $this->User->is_url_exist($csv_file_qualification) &&
                $this->User->is_url_exist($csv_file_unitprice) &&
                $this->User->is_url_exist($csv_file_unique_income) &&
                $this->User->is_url_exist($csv_file_school_education) &&
                $this->User->is_url_exist($csv_file_work_experience)){
                    $path = substr(APP, 0, strlen(APP) - 1);
                    $cake_path = $path . DS . 'Console' . DS . 'cake.php';
                    $file_shell = 'ImportCSVtoDB';
                    $shell = "php \"{$cake_path}\" -app {$path} {$file_shell} {$real_path}";
                    if (preg_match('/^win/i', PHP_OS))
                        pclose(popen('start "ImportCSVtoDB" ' . $shell, "r"));
                    else
                        shell_exec($shell . ' > /dev/null 2>/dev/null &');                        
                    
                    $this->Session->setFlash(__('COMMON_MSG_006'), 'success');
                    sleep(1);
            } else
                $this->Session->setFlash('COMMON_MSG_007', 'error');
        } else
            $this->Session->setFlash('COMMON_MSG_008', 'error');
    } else
        $this->Session->setFlash(__('COMMON_MSG_009'), 'error');

    return $this->redirect('status');
    }    

	/**
     * Function logbatch
     * Show log batch monitor of batch
     *
     * @author             Nguyen Hoang
     * @date created       2014/01/07
     */
    function logbatch($clear = null){
		if(!empty($clear)){
			file_put_contents(TMP.DS.'logs/batch.log','');
			return $this->redirect('logbatch');
		}
		$logs = @file_get_contents(TMP.DS.'logs/batch.log');
		$this->set('logs',nl2br($logs));
		$this->render('logbatch');
	}
     /**
     * Leverages Vietnam Co., Ltd
     * This will show the page to execute and monitor running batch
     *
     * @author             Mai Nhut Tan
     * @date created       2013/10/24
     */
    function status(){
        $batchStatus = array(
            'all' => array('running' => false),
            'running' => false,
        );
        if(file_exists(BATCH_LOCK)){
            $lock = new File(BATCH_LOCK);

            $batchStatus = unserialize($lock->read());
            $batchStatus['all']['running'] = false;
            if(file_exists(BATCH_ENGINE_ALL)){
                $batchStatus['all']['running'] = true;
            }
            $batchStatus['running'] = true;
            $batchStatus['running_time'] = gmdate('H:i:s', time() - $batchStatus['start']);

            if(isset($batchStatus['message'])) $batchStatus['message'] = nl2br($batchStatus['message']);
        }else if(isset($this->request->query['done'])){
            $this->Session->setFlash(__('COMMON_MSG_010'), 'info');
        }

        if($this->request->is('ajax')){
            header('Content-type: text/json');
            echo json_encode($batchStatus);
            die();
        }

        $this->set(array(
            'batchStatus' => $batchStatus,
            'title_for_layout' => 'バッチ実行'
        ));
    }
}
?>
