<?php

App::import('Vendor', 'SimpleXlsx', array('file' => 'SimpleXlsx/Simplexlsx.php'));

class ImportCSVtoDBShell extends AppShell {

    public $uses = array('User', 'UserInfo', 'Qualification', 'UnitPrice', 'SchoolEducation', 'WorkExperience', 'AnnualIncome', 'SystemAuth');
    var $success = array();
    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function main() {
        $path = !empty($this->args[0]) ? $this->args[0] : null;
        $directory_year = WWW_ROOT . 'backupCSV' . DS . date('Y');
        $directory_month = WWW_ROOT . 'backupCSV' . DS . date('Y') . DS . date('m');

        if (!is_dir($directory_month)) {
            mkdir(WWW_ROOT, 0777, true);
            mkdir($directory_month, 0777, true);
        }

        if (!empty($path) && is_dir($directory_month)) {
            $this->logme('バッチ実行開始');
            sleep(1);
            $this->importUserInfo($path, $directory_month);
            sleep(1);
            $this->importQualitification($path, $directory_month);
            sleep(1);
            $this->importUnitPrice($path, $directory_month);
            sleep(1);
            $this->importAnnualIncome($path, $directory_month);
            sleep(1);
            $this->importSchoolEducation($path, $directory_month);
            sleep(1);
            $this->importWorkExperience($path, $directory_month);
            sleep(1);
            $this->logme('バッチ実行完了');
            $this->unlinkBatch();
        } else {
            $this->logme(__('UAD_ERR_MSG0004'));
            sleep(5);
            $this->unlinkBatch();
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/29
     */
    public function importUserInfo($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_USER_INFO);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));
            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);
                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_USER_INFO) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        $data['UserInfo']['created'] = date('Y-m-d H:i:s');

                        foreach ($columns as $key => $value) {
                            if (in_array($key, array('company_join_date', 'birthday')) && !empty($db[$value])) {
                                $db[$value] = date('Y/m/d', $dataxlsx->unixstamp($db[$value]));
                            }
                            $data['UserInfo'][$key] = $db[$value];
                        }
                        //check validate user before insert/update
                        $this->UserInfo->set($data);
                        $system_auth_id = $this->uniqueSystemAuthId($data['UserInfo']['employee_id']);
                            if (empty($system_auth_id)) {
                                $system_auth_data['SystemAuth']['employee_id'] = $data['UserInfo']['employee_id'];
                                $system_auth_data['SystemAuth']['access_uni'] = AUTH_ACTIVE;
                                $this->SystemAuth->set($system_auth_data);
                                $this->SystemAuth->create();
                                $this->SystemAuth->save($system_auth_data);
                            }
                        if ($this->UserInfo->customValidate()) {
                            if (in_array($data['UserInfo']['employee_id'], $input_id)) {
                                $this->log('[UserInfo] employee_id ' . $data['UserInfo']['employee_id'] . ' unique !', 'batch');
                            } else {
                                $input_id[] = $data['UserInfo']['employee_id'];
                                $id = $this->uniqueEmployeeId($data['UserInfo']['employee_id']);
                                if ($id) {
                                    $this->UserInfo->id = $id;
                                    $this->UserInfo->save($data);
                                } else {
                                    $this->UserInfo->create();
                                    $this->UserInfo->save($data);
                                }
                            }
                        } else {
                            //write log user
                            $this->write_log_validate($i, 'UserInfo');
                        }
                    }
                }
                $this->success[] = FILE_USER_INFO;
                $this->logme(__('UAD_COMMON_MSG0005'));
            } else {
                $this->logme(__('UAD_ERR_MSG0011'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $userInfo = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($userInfo);
                $input_id = array();
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($userInfo[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_USER_INFO) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }

                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            $data['UserInfo']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                $data['UserInfo'][$key] = $db[$value];
                            }

                            //check validate user before insert/update
                            $this->UserInfo->set($data);
                            $system_auth_id = $this->uniqueSystemAuthId($data['UserInfo']['employee_id']);
                                if (empty($system_auth_id)) {
                                    $system_auth_data['SystemAuth']['employee_id'] = $data['UserInfo']['employee_id'];
                                    $system_auth_data['SystemAuth']['access_uni'] = AUTH_ACTIVE;
                                    $this->SystemAuth->set($system_auth_data);
                                    $this->SystemAuth->create();
                                    $this->SystemAuth->save($system_auth_data);
                                }
                            if ($this->UserInfo->customValidate()) {
                                if (in_array($data['UserInfo']['employee_id'], $input_id)) {
                                    $this->log('[UserInfo] employee_id ' . $data['UserInfo']['employee_id'] . ' unique !', 'batch');
                                } else {
                                    $input_id[] = $data['UserInfo']['employee_id'];
                                    $id = $this->uniqueEmployeeId($data['UserInfo']['employee_id']);
                                    if ($id) {
                                        $this->UserInfo->id = $id;
                                        $this->UserInfo->save($data);
                                    } else {
                                        $this->UserInfo->create();
                                        $this->UserInfo->save($data);
                                    }
                                }
                            }else{
                                //write log user
                                $this->write_log_validate($i, 'UserInfo');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_USER_INFO;
                $this->logme(__('UAD_COMMON_MSG0005'));
            } else {
                $this->logme(__('UAD_ERR_MSG0011'));
            }
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function uniqueEmployeeId($emp_id) {
        if (empty($emp_id)) {
            return false;
        }
        $user = $this->UserInfo->find('first', array(
            'conditions' => array(
                'employee_id' => $emp_id,
            ),
            'fields' => array('id')
        ));
        if (empty($user)) {
            return false;
        }
        return $user['UserInfo']['id'];
    }

    public function uniqueSystemAuthId($emp_id) {
        if (empty($emp_id)) {
            return false;
        }
        $system_au = $this->SystemAuth->find('first', array(
            'conditions' => array(
                'SystemAuth.employee_id' => $emp_id,
            ),
            'fields' => array('SystemAuth.employee_id')
        ));
        if (empty($system_au)) {
            return false;
        }
        return $system_au['SystemAuth']['employee_id'];
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/29
     */
    public function importQualitification($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_QUALIFICATION);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));

            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);

                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_QUALIFICATION) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                            $data['Qualification']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                if (in_array($key, array('acquire_date', 'update_date', 'expire_date')) && !empty($db[$value])) {
                                    $db[$value] = date('Y/m/d', $dataxlsx->unixstamp($db[$value]));
                                }
                                $data['Qualification'][$key] = $db[$value];
                            }

                            //check Qualification validate
                            $this->Qualification->set($data);
                            if ($this->Qualification->customValidate()) {
                                $this->Qualification->create();
                                $this->Qualification->save($data);
                            } else {
                                //write log Qualification
                                $this->write_log_validate($i, 'Qualification');
                            }
                        } else {
                            $this->log('[Qualification] line '. ($i+1) .' employee_id ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                        }
                    }
                }
                $this->success[] = FILE_QUALIFICATION;
                $this->logme(__('UAD_COMMON_MSG0006'));
            } else {
                $this->logme(__('UAD_ERR_MSG0012'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $quanlity = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($quanlity);
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($quanlity[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, 'UTF-8', 'SJIS-win'));
                        $db = str_replace('"', '', $db);

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_QUALIFICATION) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }
                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                                $data['Qualification']['created'] = date('Y-m-d H:i:s');

                                foreach ($columns as $key => $value) {
                                    $data['Qualification'][$key] = $db[$value];
                                }

                                //check Qualification validate
                                $this->Qualification->set($data);
                                if ($this->Qualification->customValidate()) {
                                    $this->Qualification->create();
                                    $this->Qualification->save($data);
                                } else {
                                    //write log Qualification
                                    $this->write_log_validate($i, 'Qualification');
                                }
                            } else {
                                $this->log('[Qualification] line '. ($i+1) .' employee_id ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_QUALIFICATION;
                $this->logme(__('UAD_COMMON_MSG0006'));
            } else {
                $this->logme(__('UAD_ERR_MSG0012'));
            }
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/29
     */
    public function importUnitPrice($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_UNIT_PRICE);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));

            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);
                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_UNIT_PRICE) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                            $data['UnitPrice']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                if (in_array($key, array('revise_date')) && !empty($db[$value])) {
                                    $db[$value] = date('Y/m/d', $dataxlsx->unixstamp($db[$value]));
                                }
                                $data['UnitPrice'][$key] = $db[$value];
                            }

                            //check UnitPrice validate
                            $this->UnitPrice->set($data);
                            if ($this->UnitPrice->customValidate()) {
                                $this->UnitPrice->create();
                                $this->UnitPrice->save($data);
                            } else {
                                //write log UnitPrice
                                $this->write_log_validate($i, 'UnitPrice');
                            }
                        } else {
                            $this->log('[UnitPrice] line '.($i+1).' employee_id ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                        }
                    }
                }
                $this->success[] = FILE_UNIT_PRICE;
                $this->logme(__('UAD_COMMON_MSG0007'));
            } else {
                $this->logme(__('UAD_ERR_MSG0013'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $unitPrice = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($unitPrice);
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($unitPrice[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_UNIT_PRICE) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }
                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                                $data['UnitPrice']['created'] = date('Y-m-d H:i:s');

                                foreach ($columns as $key => $value) {
                                    $data['UnitPrice'][$key] = $db[$value];
                                }

                                //check UnitPrice validate
                                $this->UnitPrice->set($data);
                                if ($this->UnitPrice->customValidate()) {
                                    $this->UnitPrice->create();
                                    $this->UnitPrice->save($data);
                                } else {
                                    //write log UnitPrice
                                    $this->write_log_validate($i, 'UnitPrice');
                                }
                            } else {
                                $this->log('[UnitPrice] line '.($i+1).' employee_id ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_UNIT_PRICE;
                $this->logme(__('UAD_COMMON_MSG0007'));
            } else {
                $this->logme(__('UAD_ERR_MSG0013'));
            }
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/29
     */
    public function importAnnualIncome($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_ANNUAL_INCOME);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));

            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);
                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_ANNUAL_INCOME) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                            $data['AnnualIncome']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                $data['AnnualIncome'][$key] = $db[$value];
                            }

                            //check validate Annual Income
                            $this->AnnualIncome->set($data);
                            if ($this->AnnualIncome->customValidate()) {
                                $this->AnnualIncome->create();
                                $this->AnnualIncome->save($data);
                            } else {
                                $this->write_log_validate($i, 'AnnualIncome');
                            }
                        } else {
                            $this->log('[AnnualIncome] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                        }
                    }
                }
                $this->success[] = FILE_ANNUAL_INCOME;
                $this->logme(__('UAD_COMMON_MSG0008'));
            } else {
                $this->logme(__('UAD_ERR_MSG0014'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $annualIncome = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($annualIncome);
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($annualIncome[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_ANNUAL_INCOME) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }
                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                                $data['AnnualIncome']['created'] = date('Y-m-d H:i:s');

                                foreach ($columns as $key => $value) {
                                    $data['AnnualIncome'][$key] = $db[$value];
                                }

                                //check validate Annual Income
                                $this->AnnualIncome->set($data);
                                if ($this->AnnualIncome->customValidate()) {
                                    $this->AnnualIncome->create();
                                    $this->AnnualIncome->save($data);
                                }else{
                                    $this->write_log_validate($i, 'AnnualIncome');
                                }
                            } else {
                                $this->log('[AnnualIncome] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_ANNUAL_INCOME;
                $this->logme(__('UAD_COMMON_MSG0008'));
            } else {
                $this->logme(__('UAD_ERR_MSG0014'));
            }
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/29
     */
    public function importSchoolEducation($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_SCHOOL_EDUCATION);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));

            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);

                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_SCHOOL_EDUCATION) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                            $data['SchoolEducation']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                $data['SchoolEducation'][$key] = $db[$value];
                            }

                            //check validate School Education
                            $this->SchoolEducation->set($data);
                            if ($this->SchoolEducation->customValidate()) {
                                $this->SchoolEducation->create();
                                $this->SchoolEducation->save($data);
                            } else {
                                $this->write_log_validate($i, 'SchoolEducation');
                            }
                        } else {
                            $this->log('[SchoolEducation] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                        }
                    }
                }
                $this->success[] = FILE_SCHOOL_EDUCATION;
                $this->logme(__('UAD_COMMON_MSG0009'));
            } else {
                $this->logme(__('UAD_ERR_MSG0015'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $schoolEdu = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($schoolEdu);
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($schoolEdu[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_SCHOOL_EDUCATION) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }
                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                                $data['SchoolEducation']['created'] = date('Y-m-d H:i:s');

                                foreach ($columns as $key => $value) {
                                    $data['SchoolEducation'][$key] = $db[$value];
                                }

                                //check validate School Education
                                $this->SchoolEducation->set($data);
                                if ($this->SchoolEducation->customValidate()) {
                                    $this->SchoolEducation->create();
                                    $this->SchoolEducation->save($data);
                                } else {
                                    $this->write_log_validate($i, 'SchoolEducation');
                                }
                            } else {
                                $this->log('[SchoolEducation] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_SCHOOL_EDUCATION;
                $this->logme(__('UAD_COMMON_MSG0009'));
            } else {
                $this->logme(__('UAD_ERR_MSG0015'));
            }
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     * @modified Bao Nam - 2014/05/07
     */
    public function importWorkExperience($path, $directory_month) {
        $base = $this->User->check_file_type($path . DS . FILE_WORK_EXPERIENCE);
        $fileInfo = pathinfo($base);
        $filename = $directory_month . DS . $fileInfo['filename'] .'_' . strtotime(date('Y-m-d H:i:s')) . '.' . $fileInfo['extension'];

        if ($fileInfo['extension'] == 'xlsx') {
            $saveXlsx = @file_put_contents($filename, file_get_contents($base));

            if ($saveXlsx) {
                $dataxlsx = new SimpleXLSX($filename);
                $dbXlsx = $dataxlsx->rows();

                $n = count($dbXlsx);
                $input_id = array();
                $columns = array();

                for ($i = 0; $i < $n; $i++) {
                    $db = array_map('trim', $dbXlsx[$i]);

                    //Compare columns in CSV with columns in constants
                    if ($i==0) {
                        foreach (unserialize(CSV_WORK_EXPERIENCE) as $key => $value) {
                            $key_id = array_search($value, $db);
                            if (is_numeric($key_id)) {
                                $columns[$key] = $key_id;
                            }
                        }
                    } else {
                        $data = array();
                        $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                        if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                            $data['WorkExperience']['created'] = date('Y-m-d H:i:s');

                            foreach ($columns as $key => $value) {
                                if (in_array($key, array('join_date', 'leave_date')) && !empty($db[$value])) {
                                    $db[$value] = date('Y/m/d', $dataxlsx->unixstamp($db[$value]));
                                }
                                $data['WorkExperience'][$key] = $db[$value];
                            }

                            //check validate Work Experience
                            $this->WorkExperience->set($data);
                            if ($this->WorkExperience->customValidate()) {
                                $this->WorkExperience->create();
                                $this->WorkExperience->save($data);
                            }else{
                                $this->write_log_validate($i, 'WorkExperience');
                            }
                        } else {
                            $this->log('[WorkExperience] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                        }
                    }
                }
                $this->success[] = FILE_WORK_EXPERIENCE;
                $this->logme(__('UAD_COMMON_MSG0010'));
            } else {
                $this->logme(__('UAD_ERR_MSG0016'));
            }
        } else {
            $handle = @fopen($base, 'r');
            if ($handle) {
                $workExpert = file($base);
                $outstream = fopen($filename, 'w');
                $n = count($workExpert);
                $columns = array();
                for ($i = 0; $i < $n; $i++) {
                    $line = trim($workExpert[$i]);
                    if (!empty($line)) {
                        fputcsv($outstream, explode(',', $line));
                        $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));

                        //Compare columns in CSV with columns in constants
                        if ($i==0) {
                            foreach (unserialize(CSV_WORK_EXPERIENCE) as $key => $value) {
                                $key_id = array_search($value, $db);
                                if (is_numeric($key_id)) {
                                    $columns[$key] = $key_id;
                                }
                            }
                        } else {
                            $data = array();
                            $db[$columns['employee_id']] = str_pad(ereg_replace('[^0-9]', '', $db[$columns['employee_id']]), MAX_EMP_ID, 0, STR_PAD_LEFT);
                            if ($this->uniqueEmployeeId($db[$columns['employee_id']])) {

                                $data['WorkExperience']['created'] = date('Y-m-d H:i:s');

                                foreach ($columns as $key => $value) {
                                    $data['WorkExperience'][$key] = $db[$value];
                                }

                                //check validate Work Experience
                                $this->WorkExperience->set($data);
                                if ($this->WorkExperience->customValidate()) {
                                    $this->WorkExperience->create();
                                    $this->WorkExperience->save($data);
                                }else{
                                    $this->write_log_validate($i, 'WorkExperience');
                                }
                            }else{
                                $this->log('[WorkExperience] line ' . ($i+1) . ' employee_id  ' . $db[$columns['employee_id']] . ' not exist!', 'batch');
                            }
                        }
                    }
                }
                fclose($outstream);
                $this->success[] = FILE_WORK_EXPERIENCE;
                $this->logme(__('UAD_COMMON_MSG0010'));
            } else {
                $this->logme(__('UAD_ERR_MSG0016'));
            }
        }
    }

    public function unlinkBatch(){
        unlink(BATCH_LOCK);
        @unlink(BATCH_ENGINE_ALL);
    }

    /**
     * @author Nguyen Hoang
     * Write log validate
     * @since 01/2013
     */

    public function write_log_validate($line, $model){
        $line +=1;
        $error_fields = '';
        $errors = $this->$model->validationErrors;
        foreach($errors as $error_key => $error_value){
            $error_fields .= "$error_key : $error_value[0] ; ";
        }
        $this->log("[$model] line $line " . " ". $error_fields, "batch");
    }
}

?>
