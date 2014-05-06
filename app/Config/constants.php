<?php

/**
 * Initial constants
 *
 * @package     app.Config
 * @author      Le Thuy Oanh
 * @since       2013-10-03
 */

/*CSV extention*/
define('UPLOAD_FILETYPE_CSV', 'csv');
define('GOOGLE', '0');
define('YAHOO', '1');

/* batch lock */
define('BATCH_LOCK', TMP . 'batch.lock');
define('BATCH_ENGINE_GOOGLE', TMP . 'google.lock');
define('BATCH_ENGINE_YAHOO', TMP . 'yahoo.lock');
define('BATCH_ENGINE_ALL', TMP . 'all.lock');

define('DELETE_FLG_ON', '1');
define('DELETE_FLG_OFF', '0');
define('MAX_EMP_ID', '6');
define('GENDER_CODE', serialize(array(
    '0' => '男性',
    '1' => '女性',
)));
define('EMPLOYMENT_TYPE', serialize(array(
    '1' => '正社員',
    '2' => 'アルバイト',
    '3' => '業務委託',
    '4' => '派遣社員',
)));
define('JOB_CD', serialize(array(
    '0' => '',
    '1' => '営業',
    '2' => '開発',
    '3' => 'マーケティング',
    '10' => '管理',
    '11' => '企画',
)));
define('POSITION', serialize(array(
    '1' => '代表取締役',
    '10' => '事業部長',
    '11' => '部長',
    '12' => 'リーダー',
    '99' => '一般',
)));
define('WORK_LOCATION', serialize(array(
    '1' => '東京本社',
    '2' => '大阪支店',
    '3' => '福岡支店',
    '4' => '名古屋支店',
    '5' => '佐賀支店',
    '6' => 'ベトナム支社',
    '7' => 'さいたま支店',
    '8' => '広島支店',
)));
?>