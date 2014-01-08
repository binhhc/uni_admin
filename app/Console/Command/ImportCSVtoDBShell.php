<?php

class ImportCSVtoDBShell extends AppShell {

    public $uses = array('User', 'UserInfo', 'Qualification', 'UnitPrice', 'SchoolEducation', 'WorkExperience', 'AnnualIncome');
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
     */
    public function importUserInfo($path, $directory_month) {
        $base = $path . DS . '01_USERINFO.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $userInfo = file($base);
            $filename = $directory_month . DS . '01_USERINFO_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($userInfo);
            $input_id = array();
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($userInfo[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));
                    if ($i > 0) {                      
                        $data['UserInfo']['employee_id'] = $db[0];
                        $data['UserInfo']['employee_name'] = $db[1];
                        $data['UserInfo']['employee_name_furigana'] = $db[2];
                        $data['UserInfo']['employee_name_alphabet'] = $db[3];
                        $data['UserInfo']['office_email'] = $db[4];
                        $data['UserInfo']['company_join_date'] = $db[5];
                        $data['UserInfo']['gender_code'] = $db[6];
                        $data['UserInfo']['sex'] = $db[7];
                        $data['UserInfo']['birthday'] = $db[8];
                        $data['UserInfo']['work_year'] = $db[9];
                        $data['UserInfo']['age'] = $db[10];
                        $data['UserInfo']['employment_type_cd'] = $db[11];
                        $data['UserInfo']['employment_type'] = $db[12];
                        $data['UserInfo']['zip_code'] = $db[13];
                        $data['UserInfo']['prefecture'] = $db[14];
                        $data['UserInfo']['ward'] = $db[15];
                        $data['UserInfo']['address'] = $db[16];
                        $data['UserInfo']['building'] = $db[17];
                        $data['UserInfo']['job_cd'] = $db[18];
                        $data['UserInfo']['job'] = $db[19];
                        $data['UserInfo']['position_cd'] = $db[20];
                        $data['UserInfo']['position'] = $db[21];
                        $data['UserInfo']['work_location_cd'] = $db[22];
                        $data['UserInfo']['work_location'] = $db[23];
                        $data['UserInfo']['department_cd'] = $db[24];
                        $data['UserInfo']['department'] = $db[25];
                        $data['UserInfo']['problem_type_cd'] = $db[26];
                        $data['UserInfo']['problem_type'] = $db[27];
                        $data['UserInfo']['problem_grade'] = $db[28];
                        $data['UserInfo']['problem_content'] = $db[29];
                        $data['UserInfo']['recruit_type_cd'] = $db[30];
                        $data['UserInfo']['recruit_type'] = $db[31];
                        $data['UserInfo']['recruit_place_cd'] = $db[32];
                        $data['UserInfo']['recruit_place'] = $db[33];
                        $data['UserInfo']['introduction_type_cd'] = $db[34];
                        $data['UserInfo']['introduction_type'] = $db[35];
                        $data['UserInfo']['introduction_person'] = $db[36];
                        $data['UserInfo']['introduction_related_cd'] = $db[37];
                        $data['UserInfo']['introduction_related'] = $db[38];
                        $data['UserInfo']['face_auth_cd'] = $db[39];
                        $data['UserInfo']['face_auth'] = $db[40];
                        $data['UserInfo']['rating_job_cd'] = $db[41];
                        $data['UserInfo']['rating_job'] = $db[42];
                        $data['UserInfo']['rating_grade_cd'] = $db[43];
                        $data['UserInfo']['rating_grade'] = $db[44];
                        $data['UserInfo']['created'] = date('Y-m-d H:i:s');
                        //check validate user before insert/update
                        $this->UserInfo->set($data);
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
            $this->success[] = '01_USERINFO.csv';
            $this->logme(__('UAD_COMMON_MSG0005'));
        } else {
            $this->logme(__('UAD_ERR_MSG0011'));
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
    
    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function importQualitification($path, $directory_month) {
        $base = $path . DS . '02_QUALIFICATION.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $quanlity = file($base);
            $filename = $directory_month . DS . '02_QUALIFICATION_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($quanlity);
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($quanlity[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, 'UTF-8', 'SJIS-win'));
                    $db = str_replace('"', '', $db);
                    if ($i > 0) {
                        if($this->uniqueEmployeeId($db[0])){
                            $data['Qualification']['employee_id'] = $db[0];
                            $data['Qualification']['license_type_cd'] = $db[1];
                            $data['Qualification']['license_type'] = $db[2];
                            $data['Qualification']['issuing_organization'] = $db[3];
                            $data['Qualification']['license_name'] = $db[4];
                            $data['Qualification']['acquire_date'] = $db[5];
                            $data['Qualification']['update_date'] = $db[6];
                            $data['Qualification']['expire_date'] = $db[7];
                            $data['Qualification']['certification_number'] = $db[8];
                            $data['Qualification']['attachment'] = $db[9];
                            $data['Qualification']['note'] = $db[10];
                            $data['Qualification']['allowance'] = $db[11];
                            $data['Qualification']['created'] = date('Y-m-d H:i:s');
                            //check Qualification validate 
                            $this->Qualification->set($data);
                            if ($this->Qualification->customValidate()) {
                                $this->Qualification->create();
                                $this->Qualification->save($data);
                            }else{
                                //write log Qualification 
                                $this->write_log_validate($i, 'Qualification');
                            }
                        }else{
                            $this->log('[Qualification] line '. ($i+1) .' employee_id ' . $db[0] . ' not exist!', 'batch');
                        }
                    }
                }
            }
            fclose($outstream);
            $this->success[] = '02_QUALIFICATION.csv';
            $this->logme(__('UAD_COMMON_MSG0006'));
        } else {
            $this->logme(__('UAD_ERR_MSG0012'));
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function importUnitPrice($path, $directory_month) {
        $base = $path . DS . '03_UNIT_PRICE.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $unitPrice = file($base);
            $filename = $directory_month . DS . '03_UNIT_PRICE_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($unitPrice);
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($unitPrice[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));
                    if ($i > 0) {
                        if($this->uniqueEmployeeId($db[0])){
                            $data['UnitPrice']['employee_id'] = $db[0];
                            $data['UnitPrice']['revise_date'] = $db[1];
                            $data['UnitPrice']['salary_type_cd'] = $db[2];
                            $data['UnitPrice']['salary_type'] = $db[3];
                            $data['UnitPrice']['note'] = $db[4];
                            $data['UnitPrice']['bonus'] = $db[5];
                            $data['UnitPrice']['adjust_salary'] = $db[6];
                            $data['UnitPrice']['support_allowance'] = $db[7];
                            $data['UnitPrice']['leader_allowance'] = $db[8];
                            $data['UnitPrice']['meal_allowance'] = $db[9];
                            $data['UnitPrice']['address_allowance'] = $db[10];
                            $data['UnitPrice']['absent_salary_cut'] = $db[11];
                            $data['UnitPrice']['late_salary_cut'] = $db[12];
                            $data['UnitPrice']['overtime_normal'] = $db[13];
                            $data['UnitPrice']['overtime_night'] = $db[14];
                            $data['UnitPrice']['overtime_holiday'] = $db[15];
                            $data['UnitPrice']['overtime_1'] = $db[16];
                            $data['UnitPrice']['overtime_2'] = $db[17];
                            $data['UnitPrice']['overtime_3'] = $db[18];
                            $data['UnitPrice']['overtime_4'] = $db[19];
                            $data['UnitPrice']['overtime_5'] = $db[20];
                            $data['UnitPrice']['basic_bonus'] = $db[21];
                            $data['UnitPrice']['created'] = date('Y-m-d H:i:s');

                            //check UnitPrice validate
                            $this->UnitPrice->set($data);
                            if ($this->UnitPrice->customValidate()) {
                                $this->UnitPrice->create();
                                $this->UnitPrice->save($data);
                            }else{
                                //write log UnitPrice 
                                $this->write_log_validate($i, 'UnitPrice');
                            }
                        }else{
                            $this->log('[UnitPrice] line '.($i+1).' employee_id ' . $db[0] . ' not exist!', 'batch');
                        }
                        
                    }
                }
            }
            fclose($outstream);
            $this->success[] = '03_UNIT_PRICE.csv';
            $this->logme(__('UAD_COMMON_MSG0007'));
        } else {
            $this->logme(__('UAD_ERR_MSG0013'));
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function importAnnualIncome($path, $directory_month) {
        $base = $path . DS . '04_ANNUAL_INCOME.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $annualIncome = file($base);
            $filename = $directory_month . DS . '04_ANNUAL_INCOME_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($annualIncome);
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($annualIncome[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));
                    if ($i > 0) {
                        if($this->uniqueEmployeeId($db[0])){
                            $data['AnnualIncome']['employee_id'] = $db[0];
                            $data['AnnualIncome']['yearly_amount'] = $db[1];
                            $data['AnnualIncome']['income_gross'] = $db[2];
                            $data['AnnualIncome']['income_net'] = $db[3];
                            $data['AnnualIncome']['total_cut'] = $db[4];
                            $data['AnnualIncome']['total_tax'] = $db[5];
                            $data['AnnualIncome']['note'] = $db[6];
                            $data['AnnualIncome']['created'] = date('Y-m-d H:i:s');

                            //check validate 
                            $this->AnnualIncome->set($data);
                            if ($this->AnnualIncome->customValidate()) {
                                $this->AnnualIncome->create();
                                $this->AnnualIncome->save($data);
                            }else{
                                $this->write_log_validate($i, 'AnnualIncome');
                            }
                        }else{
                            $this->log('[AnnualIncome] line ' . ($i+1) . ' employee_id  ' . $db[0] . ' not exist!', 'batch');
                        }                        
                    }
                }
            }
            fclose($outstream);
            $this->success[] = '04_ANNUAL_INCOME.csv';
            $this->logme(__('UAD_COMMON_MSG0008'));
        } else {
            $this->logme(__('UAD_ERR_MSG0014'));
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function importSchoolEducation($path, $directory_month) {
        $base = $path . DS . '05_SCHOOL_EDUCATION.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $schoolEdu = file($base);
            $filename = $directory_month . DS . '05_SCHOOL_EDUCATION_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($schoolEdu);
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($schoolEdu[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));
                    if ($i > 0) {
                        if($this->uniqueEmployeeId($db[0])){
                            $data['SchoolEducation']['employee_id'] = $db[0];
                            $data['SchoolEducation']['graduate_year'] = $db[1];
                            $data['SchoolEducation']['graduate_type_cd'] = $db[2];
                            $data['SchoolEducation']['graduate_type'] = $db[3];
                            $data['SchoolEducation']['edu_type_cd'] = $db[4];
                            $data['SchoolEducation']['edu_type'] = $db[5];
                            $data['SchoolEducation']['newest_edu_cd'] = $db[6];
                            $data['SchoolEducation']['newest_edu'] = $db[7];
                            $data['SchoolEducation']['school_type_cd'] = $db[8];
                            $data['SchoolEducation']['school_type'] = $db[9];
                            $data['SchoolEducation']['diploma_type_cd'] = $db[10];
                            $data['SchoolEducation']['diploma_type'] = $db[11];
                            $data['SchoolEducation']['school'] = $db[12];
                            $data['SchoolEducation']['faculty'] = $db[13];
                            $data['SchoolEducation']['subject'] = $db[14];
                            $data['SchoolEducation']['major'] = $db[15];
                            $data['SchoolEducation']['created'] = date('Y-m-d H:i:s');
                            $this->SchoolEducation->set($data);
                            if ($this->SchoolEducation->customValidate()) {
                                $this->SchoolEducation->create();
                                $this->SchoolEducation->save($data);
                            }else{
                                $this->write_log_validate($i, 'SchoolEducation');
                            }
                        }else{
                            $this->log('[SchoolEducation] line ' . ($i+1) . ' employee_id  ' . $db[0] . ' not exist!', 'batch');
                        }                        
                    }
                }
            }
            fclose($outstream);
            $this->success[] = '05_SCHOOL_EDUCATION.csv';
            $this->logme(__('UAD_COMMON_MSG0009'));
        } else {
            $this->logme(__('UAD_ERR_MSG0015'));
        }
    }

    /**
     * @author  Binh Hoang
     * @since 11/2013
     */
    public function importWorkExperience($path, $directory_month) {
        $base = $path . DS . '06_WORK_EXPERIENCE.csv';
        $handle = @fopen($base, 'r');
        if ($handle) {
            $workExpert = file($base);
            $filename = $directory_month . DS . '06_WORK_EXPERIENCE_' . strtotime(date('Y-m-d H:i:s')) . '.csv';
            $outstream = fopen($filename, 'w');
            $n = count($workExpert);
            for ($i = 0; $i < $n; ++$i) {
                $line = trim($workExpert[$i]);
                if (!empty($line)) {
                    fputcsv($outstream, explode(',', $line));
                    $db = explode(',', mb_convert_encoding($line, "UTF-8", "SJIS-win"));
                    if ($i > 0) {
                        if($this->uniqueEmployeeId($db[0])){
                            $data['WorkExperience']['employee_id'] = $db[0];
                            $data['WorkExperience']['join_date'] = $db[1];
                            $data['WorkExperience']['leave_date'] = $db[2];
                            $data['WorkExperience']['work_year'] = $db[3];
                            $data['WorkExperience']['company'] = $db[4];
                            $data['WorkExperience']['bussiness_type'] = $db[5];
                            $data['WorkExperience']['company_zip_code'] = $db[6];
                            $data['WorkExperience']['company_address'] = $db[7];
                            $data['WorkExperience']['abroad_type_cd'] = $db[8];
                            $data['WorkExperience']['abroad_type'] = $db[9];
                            $data['WorkExperience']['position'] = $db[10];
                            $data['WorkExperience']['retire_reason_cd'] = $db[11];
                            $data['WorkExperience']['retire_reason'] = $db[12];
                            $data['WorkExperience']['retire_content'] = $db[13];
                            $data['WorkExperience']['note'] = $db[14];
                            $data['WorkExperience']['created'] = date('Y-m-d H:i:s');

                            $this->WorkExperience->set($data);
                            if ($this->WorkExperience->customValidate()) {
                                $this->WorkExperience->create();
                                $this->WorkExperience->save($data);
                            }else{
                                $this->write_log_validate($i, 'WorkExperience');
                            }
                        }else{
                            $this->log('[WorkExperience] line ' . ($i+1) . ' employee_id  ' . $db[0] . ' not exist!', 'batch');
                        }                        
                    }
                }
            }
            fclose($outstream);
            $this->success[] = '06_WORK_EXPERIENCE.csv';
            $this->logme(__('UAD_COMMON_MSG0010'));
        } else {
            $this->logme(__('UAD_ERR_MSG0016'));
        }
    }

    public function unlinkBatch(){
        unlink(BATCH_LOCK);
        @unlink(BATCH_ENGINE_ALL);
    }
    /**
     * @author  Nguyen Hoang
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
