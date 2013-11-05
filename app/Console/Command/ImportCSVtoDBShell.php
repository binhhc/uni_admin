<?php

class ImportCSVtoDBShell extends AppShell {
    public $uses = array('UserInfo');
    public function main() {
        $path = !empty($this->args[0]) ? $this->args[0] : null;

        $arr_filename = array(
            '01_USERINFO.csv',
            '02_QUALIFICATION.csv',
            '03_UNIT_PRICE.csv',
            '04_ANNUAL_INCOME.csv',
            '05_SCHOOL_EDUCATION.csv',
            '06_WORK_EXPERIENCE.csv'
        );

        switch ($arr_filename) {
            case '01_USERINFO.csv':
                $this->out('sdfsdfsdfdsfsdf');
        }
        $this->importUserInfo($path);
    }

    public function importUserInfo($path = null) {

        $userInfo = file($path . DS . '01_USERINFO.csv');
        $filename = WWW_ROOT . 'backup' . DS . strtotime(date('Y-m-d H:i:s')).'_01_USERINFO' . '.csv';

        $outstream = fopen($filename, 'w');
        $n = count($userInfo);        
        for ($i = 0; $i < $n; ++$i) {
            $line = trim($userInfo[$i]);
            if (!empty($line)) {
                $db = explode(',', $line);
                fputcsv($outstream, $db);
                if($i > 0){                   
                    $data['UserInfo']['employee_number'] = $db[0];
                    $data['UserInfo']['employee_name'] = mb_convert_encoding(trim($db[1]), "UTF-8", "SJIS-win");
                    $data['UserInfo']['employee_name_phonetic'] = $db[2];
                    $data['UserInfo']['employee_name_letter'] = $db[3];
                    $data['UserInfo']['email1'] = $db[4];
                    $data['UserInfo']['start_date'] = $db[5];
                    $data['UserInfo']['gender_code'] = $db[6];
                    $data['UserInfo']['sex'] = $db[7];
                    $data['UserInfo']['date_of_birth'] = $db[8];
                    $data['UserInfo']['working_years'] = $db[9];
                    $data['UserInfo']['age'] = $db[10];
                    $data['UserInfo']['employment_type_code'] = $db[11];
                    $data['UserInfo']['employment_type_name'] = $db[12];
                    $data['UserInfo']['zip_code'] = $db[13];
                    $data['UserInfo']['state'] = $db[14];
                    $data['UserInfo']['city'] = $db[15];
                    $data['UserInfo']['address'] = $db[16];
                    $data['UserInfo']['building'] = $db[17];
                    $data['UserInfo']['job_code'] = $db[18];
                    $data['UserInfo']['job_category'] = $db[19];
                    $data['UserInfo']['position_code'] = $db[20];
                    $data['UserInfo']['position_name'] = $db[21];
                    $data['UserInfo']['location_code'] = $db[22];
                    $data['UserInfo']['work_location'] = $db[23];
                    $data['UserInfo']['department_code'] = $db[24];
                    $data['UserInfo']['department_name'] = $db[25];
                    $data['UserInfo']['problem_type_code'] = $db[26];
                    $data['UserInfo']['problem_type_name'] = $db[27];
                    $data['UserInfo']['problem_grade'] = $db[28];
                    $data['UserInfo']['problem_content'] = $db[29];
                    $data['UserInfo']['recruit_type_code'] = $db[30];
                    $data['UserInfo']['recruit_type_name'] = $db[31];
                    $data['UserInfo']['recruit_place_code'] = $db[32];
                    $data['UserInfo']['recruit_place_name'] = $db[33];
                    $data['UserInfo']['introduction_type_code'] = $db[34];
                    $data['UserInfo']['introduction_type_name'] = $db[35];
                    $data['UserInfo']['introduction_person'] = $db[36];
                    $data['UserInfo']['introduction_related_code'] = $db[37];
                    $data['UserInfo']['introduction_related_name'] = $db[38];
                    $data['UserInfo']['face_auth_code'] = $db[39];
                    $data['UserInfo']['face_auth_name'] = $db[40];
                    $data['UserInfo']['rating_grade_code'] = $db[41];
                    $data['UserInfo']['rating_grade_name'] = $db[42];
                    
                    $this->out($data['UserInfo']['employee_name']);
                    
                    $this->UserInfo->create();
                    $this->UserInfo->save($data);
                }                
               
            }
        }
        fclose($outstream);
    }

    public function importQualitification($path = null) {
        if (file_exists($path)) {
            
        }
    }

    public function importUnitPrice($path = null) {
        if (file_exists($path)) {
            
        }
    }

    public function importSchoolEducation($path = null) {
        if (file_exists($path)) {
            
        }
    }

    public function importWorkExperience($path = null) {
        if (file_exists($path)) {
            
        }
    }

    public function importAnnualIncome($path = null) {
        if (file_exists($path)) {
            
        }
    }

}

?>
