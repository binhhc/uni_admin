<?php

class KousuUtility {

    /**
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     */
    public static function isEmail($str) {
        $emailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
        $res = preg_match($emailPattern, $str);
        return ( $res == 1 ) ? true : false;
    }

    /**
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     */
    public static function splitArray($delimiter, $str, $indexToGet) {
        $res = explode($delimiter, $str);
        return !empty($res[$indexToGet]) ? $res[$indexToGet] : false;
    }

    /**
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     */
    public static function routeToArray($url) {
        $arrUrl = array();

        $arr = explode('/', $url);
        if (count($arr) > 1)
            $arrUrl['action'] = $arr[1];
        else
            $arrUrl['action'] = 'index';
        $arrUrl['controller'] = $arr[0];
        return $arrUrl;
    }

    public static function formatWeeklyReportData($requestData) {
        $data = $requestData;
        // echo '<pre>';var_dump($data);exit;
        for ($i = 0; $i < count($data['DailyReport']); $i++) {
            if (array_key_exists('date_start_h', $data['DailyReport'][$i]) || array_key_exists('date_start_s', $data['DailyReport'][$i])) {
                $date_start_h = $data['DailyReport'][$i]['date_start_h'];
                $date_start_s = $data['DailyReport'][$i]['date_start_s'];
                $date_end_h = $data['DailyReport'][$i]['date_end_h'];
                $date_end_s = $data['DailyReport'][$i]['date_end_s'];
                $data['DailyReport'][$i]['start_date'] = $date_start_h . ':' . $date_start_s;
                $data['DailyReport'][$i]['end_date'] = $date_end_h . ':' . $date_end_s;
            }
        }

        if (isset($data['DailyReport'][5]['off_flg']) && $data['DailyReport'][5]['off_flg'] == 1 && $data['DailyReport'][5]['id'] == null) {
            unset($data['DailyReport'][5]);
        }
        if (isset($data['DailyReport'][6]['off_flg']) && $data['DailyReport'][6]['off_flg'] == 1 && $data['DailyReport'][6]['id'] == null) {
            unset($data['DailyReport'][6]);
        }

        return $data;
    }

    public static function formatValueHour() {
        $hour = array('00' => '00', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07',
            '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16',
            '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25',
            '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30');
        return $hour;
    }

    public static function formatValueSec() {
        $sec = array('00' => '00', '05' => '05', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35',
            '40' => '40', '45' => '45', '50' => '50', '55' => '55');
        return $sec;
    }

    public static function getDayOfWeek($date) {
        $result = '';
        if (!empty($date)) {
            $dayOfWeek = date('w', strtotime($date));
            $day_names_of_week = Configure::read('constants.day_names_of_week');
            $result = $day_names_of_week[$dayOfWeek];
        }
        return $result;
    }

    public function get_start_end_week($day) {
        $date = $day;
        $ts = strtotime($date);
        $dow = date('w', $ts);
        $offset = $dow - 1;
        if ($offset < 0) {
            $offset = 6;
        }
        $ts = $ts - $offset * 86400;
        $tsEndWeek = $ts + 86400 * 6;
        return array(date("Y/m/d", $ts), date("Y/m/d", $tsEndWeek));
    }

    /**
     * @author Chau Le - chaulhb@leverages.jp
     * @param string $year_month YYYY-mm
     * @return array list of weeks of a specified month
     * @Modified by : Hoang Nguyen
     */
    public static function getWeeksOfMonth($year_month) {

        //get first monday
        $monday = strtotime("first Monday of $year_month");

        //get month from param
        $month = explode('-', $year_month);
        $month = $month[1];

        //get time current
        $time_current = strtotime('now');

        //create week ofmonth
        $week_of_month = array();
        for ($i = 1; $i <= 5; ++$i) {

            if ($i > 1)
                $monday = strtotime("$sunday +1 day");
            if ($monday > $time_current)
                break;

            if ($i == 5 and date('m', $monday) > $month)
                break;

            //get sunday
            $format_monday = date("Y-m-d", $monday);
            $sunday = strftime('%Y-%m-%d', strtotime("$format_monday +6 day"));
            array_unshift($week_of_month, array($format_monday, $sunday));
        }
        return $week_of_month;
    }

    /**
     * @author Chau Le - chaulhb@leverages.jp
     * @param array $weeks array of weeks to report
     * @param array $reports array of reports in these weeks
     * @return array group of reports in weeks
     */
    public function groupReportInWeeks($weeks, $reports) {
        $result = array();

        if (empty($weeks) || empty($reports)) {
            return $result;
        }

        $index = 0;
        $arr = array();

        for ($i = 0; $i < count($weeks); $i++) {
            for ($j = 0; $j < 7; $j++) { // seven days in a week
                $report = array_shift($reports);
                $reportDate = $report['DailyReport']['report_date'];

                $date = date('Y-m-d', strtotime($weeks[$i][1] . ' -' . $j . ' day'));
                if ($date == $reportDate) {
                    $arr[] = $report;
                } else {
                    array_unshift($reports, $report);
                }
            }
            $result[] = empty($arr) ? array(1) : $arr;
            $arr = array();
        }
        return $result;
    }

    /**
     * getRootDepartmentId method
     * @author Hoang Cong Binh <binhhc@leverages.jp>
     * @return array
     * @since 2013/09/05
     */
    public function getAllDepartmentRoot($department_id = null, $data = '', $dash = '', $department_cd = '') {
        APP::import('Model', array('Department'));

        $this->Department = new Department();
        $this->Department->recursive = -1;

        $departments = $this->Department->find('all', array(
            'conditions' => array('Department.parent_department_id' => $department_id,
                'Department.delete_flg' => Configure::read('HAS_NOT_BEEN_DELETED')
            ),
            'order' => 'Department.department_cd',
            'fields' => array('Department.id', 'Department.department_name as name', 'Department.department_cd')
        ));
        if (empty($departments)) {
            return $data;
        }
        foreach ($departments as $dep) {
            if ($department_cd) {
                $data[$dep['Department']['id']] = array($dash . '-' . $dep['Department']['name'], $dep['Department']['department_cd']);
            } else {
                $data[$dep['Department']['id']] = $dash . '-' . $dep['Department']['name'];
            }
            $data += KousuUtility::getAllDepartmentRoot($dep['Department']['id'], $data, $dash . '-', $department_cd);
        }
        return $data;
    }

    /**
     * getRootDepartmentId method
     * @author Hoang Cong Binh <binhhc@leverages.jp>
     * @return array
     * @since 2013/10/17
     */
    static function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }

}