<?php

App::uses('Controller', 'Controller');

class UsersController extends AppController {

	public function beforeFilter() {
		$this->Auth->user() ? $this->Auth->allow(array('runbatch')) : null;
		$this->Auth->allow(array('login', 'logout', 'runbatch'));
	}

	public function login() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Auth->login()) {
				$this->redirect(array('controller' => 'UserInfos', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Wrong username or password!', 'error');
			}
		}
		$this->layout = 'login';
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
		if ($this->request->is('post') || $this->request->is('put')) {
			$real_path = Configure::read('path_csv');
			if (!empty($real_path)) {	
                $csv_file_userinfo = $real_path . DS . '01_USERINFO.csv';
                $csv_file_qualification = $real_path . DS . '02_QUALIFICATION.csv';
                $csv_file_unitprice = $real_path . DS . '03_UNIT_PRICE.csv';
                $csv_file_unique_income = $real_path . DS . '04_ANNUAL_INCOME.csv';
                $csv_file_school_education = $real_path . DS . '05_SCHOOL_EDUCATION.csv';
                $csv_file_work_experience = $real_path . DS . '06_WORK_EXPERIENCE.csv';
                // check csv files exist
                if($this->is_url_exist($csv_file_userinfo) && 
	                $this->is_url_exist($csv_file_qualification) &&
                 	$this->is_url_exist($csv_file_unitprice) &&
                 	$this->is_url_exist($csv_file_unique_income) &&
                 	$this->is_url_exist($csv_file_school_education) &&
                  	$this->is_url_exist($csv_file_work_experience)){
	                	$path = substr(APP, 0, strlen(APP) - 1);
	                    $cake_path = $path . DS . 'Console' . DS . 'cake.php';
	                    $file_shell = 'ImportCSVtoDB';
	                    $shell = "php \"{$cake_path}\" -app {$path} {$file_shell} {$real_path} &";
	                    if (preg_match('/^win/i', PHP_OS)) {
	                        pclose(popen('start "ImportCSVtoDB" ' . $shell, "r"));
	                    } else {
	                        $handle = popen($shell, 'r');
	                        while (!feof($handle)) {
	                            $buffer1 = fgets($handle);	                            
	                        }
	                        $this->Session->setFlash('Input sucessful', 'success');
	                    }
                }else{
                    $this->Session->setFlash('Please input path contain csv file', 'error');
                }
			} else {
				$this->Session->setFlash('Please input path', 'error');
			}
		}
	}

	/*
	 * Check url exist
	 * @author BinhHoang
	 */
	function is_url_exist($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if($code == 200){
			$status = true;
		}else{
			$status = false;
		}
		curl_close($ch);
		return $status;
	}

}

?>
