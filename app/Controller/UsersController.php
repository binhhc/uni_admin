<?php
App::uses('AppController', 'Controller');
App::uses('CakeLogInterface', 'Log');
App::uses('Controller', 'Controller');
App::uses('Security', 'Utility');

class UsersController extends AppController {

    public function beforeFilter() {
        $action = ($this->action);
        if (!in_array($action, array('generateCookie', 'checkLogin'))) {
            parent::beforeFilter();
        };
        $this->Auth->user() ? $this->Auth->allow(array('status')) : null;
        $this->Auth->allow(array('login', 'logout', 'runbatch', 'logbatch', 'checkLogin', 'generateCookie'));
    }

    public function generateCookie () {
        $this->Cookie->httpOnly = true;
        if (isset($this->request->query[COOKIE_AUTH])) {
            $this->Cookie->write(COOKIE_AUTH, $this->request->query[COOKIE_AUTH], false);
            $data = array('data' => true);
        } else {
            $data = array('data' => false);
        }
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->response->type("jsonp");
        $this->response->body($_GET['callback'] . '(' . json_encode($data) . ')');
    }

    public function checkLogin() {
        $data = array();
        $error = '';
        if ($this->request->is('post') || $this->request->is('put')) {
            App::import('Model', 'SystemAuth');
            $this->SystemAuth = new SystemAuth();
            $access = (!empty($this->request->data['User']['username'])) ? $this->SystemAuth->getActive($this->request->data['User']['username']) : '';
            if(!empty($access)){
                $data = $access['SystemAuth'];
                $data['employee_name'] = $access['UserInfo']['employee_name'];
            }else{
                $error = __('UAD_ERR_MSG0021');
            }
        }
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->response->type("json");
        $this->response->body(json_encode(array("data" => $data, "error" => $error)));
    }

    public function login() {

        //check domain referer
        $url = parse_url($this->referer());
        if (!empty($this->request->data['Logins']['auth_hash']) && ($url['host']) == DOMAIN_LOGIN) {
            $authLogin = Security::cipher(base64_decode($this->request->data['Logins']['auth_hash']), Configure::read('Security.salt'));
            $this->request->data['User']['username'] = $authLogin;
            App::import('Model', 'UserInfo');
            $this->UserInfo = new UserInfo();
            //get access permission

            $access = $this->UserInfo->findByOfficeEmail($this->request->data['User']['username']);
            if(!empty($access)){
                if ($this->Auth->login($access['UserInfo'])) {
                    $this->Session->write('email_user', $this->Auth->user('office_email'));
                    $this->Cookie->httpOnly = true;
                    $this->Cookie->write(COOKIE_AUTH, $this->Auth->password($this->Auth->user('office_email')), false);
                    $this->redirect(array('controller' => 'UserInfos', 'action' => 'index'));
                } else {
                    $this->Session->setFlash(__('UAD_ERR_MSG0002'), 'error');
                }
            }else{
                $this->Session->setFlash(__('UAD_ERR_MSG0021'), 'error');
            }

        } else {
            if ($this->Auth->loggedIn()) {
                $this->redirect(array('controller' => 'UserInfos', 'action' => 'index'));
            } else {
                $this->redirect(CHECK_LOGIN_PAGE . '/url:'. KEY_LOGIN);
            }
        }
        $this->layout = 'login';
        $this->set(array(
            'title_for_layout' => 'ログイン',
        ));
    }

    public function logout() {
        $this->Auth->logout();
        $this->Session->destroy();
        $this->Cookie->delete(COOKIE_AUTH);
        return $this->redirect(URL_LOGOUT_PAGE);
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
            $csv_file_userinfo = $this->User->check_file_type($real_path . DS . FILE_USER_INFO);
            $csv_file_qualification = $this->User->check_file_type($real_path . DS . FILE_QUALIFICATION);
            $csv_file_unitprice = $this->User->check_file_type($real_path . DS . FILE_UNIT_PRICE);
            $csv_file_unique_income = $this->User->check_file_type($real_path . DS . FILE_ANNUAL_INCOME);
            $csv_file_school_education = $this->User->check_file_type($real_path . DS . FILE_SCHOOL_EDUCATION);
            $csv_file_work_experience = $this->User->check_file_type($real_path . DS . FILE_WORK_EXPERIENCE);

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

                    $this->Session->setFlash(__('UAD_COMMON_MSG0003'), 'success');
                    sleep(1);
            } else
                $this->Session->setFlash(__('UAD_ERR_MSG0004'), 'error');
        } else
            $this->Session->setFlash(__('UAD_ERR_MSG0004'), 'error');
    } else
        $this->Session->setFlash(__('UAD_ERR_MSG0005'), 'error');

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
        $logbatchs = @file_get_contents(TMP.DS.'logs/batch.log');
        $this->set(array(
            'logbatchs' => nl2br($logbatchs),
            'title_for_layout' => 'バッチ実行'
        ));
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
            $this->Session->setFlash(__('UAD_COMMON_MSG0004'), 'info');
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
