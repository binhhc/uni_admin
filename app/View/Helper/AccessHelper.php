<?php

/**
 * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
 *
 */
class AccessHelper extends AppHelper {

    public $helpers = array("Session");

    /**
     * Check if user has logged in
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     * usage: in view:  $this->Access->isLoggedIn()
     */
    public function isLoggedIn() {
        $user = $this->Session->read('Auth.User');
        return !empty($user);
    }

    /**
     * Get user's properties
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     * @param $field string - user's property to get
     * usage: in view - get username:  $this->Access->user('username')
     */
    public function user($field) {
        if (!$this->isLoggedIn())
            return false;

        return $this->Session->read('Auth.User.' . $field);
    }

    function CheckFont($str) {
        $str = trim(strip_tags($str));
        $str = trim($str);
        $str = str_replace("　", "", $str);
        $lengthJP = mb_strlen($str);
        $lengthVN = strlen($str);
        if ($lengthVN > $lengthJP)
            return 1;
        return 0;
    }

    function getShortText($str, $max_cut = 35) {

        $checkFont = $this->CheckFont($str);
        if ($checkFont == 1) {
            $lengthJP = mb_strlen($str);
            if ($lengthJP <= $max_cut)
                return $str;
            return mb_substr($str, 0, ($max_cut / 2) + 4, 'utf-8')  ." ... " ;
        } else {
            $value = trim($str);
            $value = str_replace("　", " ", $value);
            $lengthVN = strlen($value);
            if ($lengthVN <= $max_cut)
                return $str;
            $count =8;
            if($max_cut==50)
                $count= $count+22;
             return substr($str, 0, $max_cut + $count) . " ... " ;
        }
        return $str;
    }

    /**
     * check if menu item should be highlighted
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     * @param $params request parameters
     * @param $route route of menu item
     */
    public function isHighlight($params, $route) {
        $current = strtolower($this->params['controller']) == strtolower($route['controller']);

        if ($current && ( strtolower($route['controller']) == 'dailyreports' || strtolower($route['controller']) == 'weeklyreports' )) {
            $current = false;
            if ($this->user('group_id') == Configure::read('constants.group.User')) {
                if (strtolower($route['action']) == 'index' && ( strtolower($this->params['action']) == 'index' || strtolower($this->params['action']) == 'edit' ))
                    $current = true;
                else if (strtolower($route['action']) == 'add' && strtolower($this->params['action']) == 'add')
                    $current = true;
            }
            else if ($this->user('group_id') == Configure::read('constants.group.Assistant')
                    || $this->user('group_id') == Configure::read('constants.group.Manager')) {

                if ($this->params['action'] == 'add' || $this->params['action'] == 'edit' || $this->params['action'] == 'index')
                    $current = true;
            }
        }

        return $current;
    }

}