<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    public $useTable = false;

    /*
     * Check url exist
     * @author BinhHoang
     */
    public function is_url_exist($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 200)
            $status = true;
        else
            $status = false;

        curl_close($ch);
        return $status;
    }
}
?>
