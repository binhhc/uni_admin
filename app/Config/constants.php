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
define('AUTH_ACTIVE', '1');
define('AUTH_BANNED', '0');
define('MAX_EMP_ID', '6');

/* File to import into database */

define('FILE_USER_INFO', '01_USERINFO');
define('FILE_QUALIFICATION', '02_QUALIFICATION');
define('FILE_UNIT_PRICE', '03_UNIT_PRICE');
define('FILE_ANNUAL_INCOME', '04_ANNUAL_INCOME');
define('FILE_SCHOOL_EDUCATION', '05_SCHOOL_EDUCATION');
define('FILE_WORK_EXPERIENCE', '06_WORK_EXPERIENCE');


define('GENDER_CODE', serialize(array(
    '0' => '男性',
    '1' => '女性',
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

/*CSV import - Updated: 2014-08-14*/

define('CSV_USER_INFO', serialize(array(
    'employee_id' => '社員番号',
    'employee_name' => '氏名',
    'employee_name_furigana' => '氏名(フリガナ)',
    'employment_type_cd' => '雇用区分コード',
    'gender_code' => '性別コード',
    'company_join_date' => '入社年月日',
    'birthday' => '生年月日',
    'work_place_name' => '職場氏名',
    'work_place_name_furigana' => '職場氏名(フリガナ)',
    'prev_employment_type_cd' => '前回雇用区分コード',
    'prev_company_join_date' => '前回入社年月日',
    'prev_company_leave_date' => '前回退職年月日',
    'prev_last_work_date' => '特記事項１',
    'zip_code' => '郵便番号',
    'prefecture' => '都道府県',
    'ward' => '市区町村',
    'address' => '番地',
    'building' => 'マンション／ビル等',
    'department_cd' => '所属コード',
    'job_cd' => '職種コード',
    'position_cd' => '役職コード',
    'work_location_cd' => '勤務地コード',
    'office_email' => '社用e-Mail１',
    'leave_start_date' => '休職開始年月日',
    'leave_end_date' => '休職終了年月日',
    'face_auth_cd' => '顔ナビ権限コード',
    'face_auth' => '顔ナビ権限',
    'rating_job_cd' => '評価職種コード',
    'rating_job' => '評価職種',
    'rating_grade_cd' => '評価等級コード',
    'rating_grade' => '評価等級',
    'TMS_auth_group_cd' => 'TMS権限グループコード',
    'TMS_offday_apply_possible_cd' => 'TMS休日出勤申請可否コード',
    'TMS_attendance_approver' => 'メモ内容',
    'leave_plan_date' => '退職予定日'
)));

define('CSV_USER_INFO_DATE', serialize(array(
    'company_join_date',
    'prev_company_join_date',
    'prev_company_leave_date',
    'prev_last_work_date',
    'leave_start_date',
    'leave_end_date',
    'leave_plan_date',
    'birthday'
)));



define('CSV_QUALIFICATION', serialize(array(
    'employee_id' => '社員番号',
    'license_type_cd' => '免許資格区分コード',
    'license_type' => '免許資格区分',
    'issuing_organization' => '発行団体',
    'license_name' => '資格名称',
    'acquire_date' => '取得年月日',
    'update_date' => '更新年月日',
    'expire_date' => '有効期限',
    'certification_number' => '認定番号',
    'attachment' => '資格添付ファイル',
    'note' => '備考',
    'allowance' => '資格手当'
)));

define('CSV_UNIT_PRICE', serialize(array(
    'employee_id' => '社員番号',
    'revise_date' => '改定年月日',
    'salary_type_cd' => '給与区分コード',
    'salary_type' => '給与区分',
    'note' => '備考',
    'bonus' => '報酬額',
    'adjust_salary' => '調整給',
    'support_allowance' => '扶養手当',
    'leader_allowance' => 'リーダー手当',
    'meal_allowance' => '食事手当',
    'address_allowance' => 'ご近所手当',
    'absent_salary_cut' => '欠勤控除減額',
    'late_salary_cut' => '遅早控除減額',
    'overtime_normal' => '普通残業',
    'overtime_night' => '深夜残業',
    'overtime_holiday' => '休出残業',
    'overtime_1' => '残業予備１',
    'overtime_2' => '残業予備２',
    'overtime_3' => '残業予備３',
    'overtime_4' => '残業予備４',
    'overtime_5' => '残業予備５',
    'basic_bonus' => '基本賞与'
)));

define('CSV_ANNUAL_INCOME', serialize(array(
    'employee_id' => '社員番号',
    'yearly_amount' => '年分',
    'income_gross' => '支払金額',
    'income_type' => '給与所得控除後',
    'total_cut' => '所得控除合計額',
    'total_tax' => '源泉徴収税額',
    'note' => '備考'
)));

define('CSV_SCHOOL_EDUCATION', serialize(array(
    'employee_id' => '社員番号',
    'graduate_year' => '入卒年月',
    'graduate_type_cd' => '入卒区分コード',
    'graduate_type' => '入卒区分',
    'edu_type_cd' => '学歴区分コード',
    'edu_type' => '学歴区分',
    'newest_edu_cd' => '最終学歴コード',
    'newest_edu' => '最終学歴',
    'school_type_cd' => '公私区分コード',
    'school_type' => '公私区分',
    'diploma_type_cd' => '文理区分コード',
    'diploma_type' => '文理区分',
    'school' => '学校名',
    'faculty' => '学部名',
    'subject' => '学科名',
    'major' => '専攻名'
)));

define('CSV_WORK_EXPERIENCE', serialize(array(
    'employee_id' => '社員番号',
    'join_date' => '入社年月日',
    'leave_date' => '退社年月日',
    'work_year' => '勤続年数',
    'company' => '会社名',
    'bussiness_type' => '業種',
    'company_zip_code' => '郵便番号',
    'company_address' => '会社住所',
    'abroad_type_cd' => '国内外区分コード',
    'abroad_type' => '国内外区分',
    'position' => '役職',
    'retire_reason_cd' => '退職の事由コード',
    'retire_reason' => '退職の事由',
    'retire_content' => '退職理由',
    'note' => '備考'
)));


define('IDENT_ANNUAL_INCOME', serialize(array(
    'employee_id',
    'yearly_amount'
)));

define('IDENT_QUALIFICATION', serialize(array(
    'employee_id',
    'license_type_cd',
    'license_name'
)));

define('IDENT_SCHOOL_EDUCATION', serialize(array(
    'employee_id',
    'graduate_year',
    'graduate_type_cd',
    'edu_type_cd'
)));

define('IDENT_UNIT_PRICE', serialize(array(
    'employee_id',
    'revise_date',
    'salary_type_cd'
)));

define('IDENT_WORK_EXPERIENCE', serialize(array(
    'employee_id',
    'join_date',
    'leave_date',
    'company'
)));

define('EMPLOYEE_ADMIN', '999999');

define('SYS_AUTH_TMS_EMP_TYPE', serialize(array('1', '2')));
define('SYS_AUTH_TMS_DEP_EXCEPT', 'SI220000');

define('SYS_AUTH_UNI_EMP_ID', serialize(array('8', '182', '244', '999999')));

define('CHECK_LOGIN_PAGE', 'http://uni.a.srv/Logins/checkLogin');
define('URL_LOGOUT_PAGE', 'http://uni.a.srv/Logins/logout');
define('DOMAIN_LOGIN', 'uni.a.srv');
define('KEY_LOGIN', 'uni');
define('COOKIE_AUTH', 'cookie_auth');


?>