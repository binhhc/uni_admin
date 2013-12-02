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
				$this->redirect(array('controller' => 'SchoolEducations', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('Wrong username or password!', 'error'));
			}
		}
		$this->layout = 'login';
	}

	public function logout() {
		$this->Session->destroy();
		$this->redirect(array('controller' => 'Users', 'action' => 'login'));
	}

	/*
	 * Author Binh Hoang
	 */

	public function runbatch() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if (!empty($this->request->data['Batch']['patch'])) {

				$real_path = $this->request->data['Batch']['patch'];
				$csv_file = $real_path . DS . '01_USERINFO.csv';
				// check csv files exist
				if($this->is_url_exist($csv_file)){

					$path = substr(APP, 0, strlen(APP) - 1);
					$cake_path = $path . DS . 'Console' . DS . 'cake.php';
					$file_shell = 'ImportCSVtoDB';
					$command = $this->request->data['Batch']['patch'];
					$shell = "php \"{$cake_path}\" -app {$path} {$file_shell} {$command} &";
					if (preg_match('/^win/i', PHP_OS)) {
						pclose(popen('start "ImportCSVtoDB" ' . $shell, "r"));
					} else {
						$handle = popen($shell, 'r');
						while (!feof($handle)) {
							$buffer1 = fgets($handle);
							if (!empty($buffer1)) {
								$buffer = trim(htmlspecialchars($buffer1));
							}
						}
						$this->Session->setFlash($buffer);
					}
				}else{
					$this->Session->setFlash('Please input path contain csv file');
				}
			} else {
				$this->Session->setFlash('Please input path');
			}
		}
	}

	/*
	 * Check url exist
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
