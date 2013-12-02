<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('KousuUtility', 'Utility');

class LdapAuthenticate extends BaseAuthenticate {

    /**
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     * @modify Binh Hoang
     */
    public function authenticate(CakeRequest $request, CakeResponse $response) {
        $auth = $this->_ldapAuth($request['data']['User']); 
        if ($auth) {
            return array('username' => $request['data']['User']['username']);
        }
        return false;
    }

    /**
     * @author Nguyen Duong Hai Dang - dangndh@leverages.jp
     * 
     */
    private function _ldapAuth($request) {
        $username = $request['username'];
        $password = $request['password'];

        if (KousuUtility::isEmail($username))
            $username = KousuUtility::splitArray('@', $username, 0);

        if ($password == "")
            return false;

        $ldapConfig = Configure::read('ldap');
        $ds = @ldap_connect($ldapConfig['host'], $ldapConfig['port']);

        if (!$ds)
            return false;

        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

        $userDn = 'uid=' . $username . ',ou=' . $ldapConfig['ou'] . ',' . $ldapConfig['suffix'];

        $ldapbind = @ldap_bind($ds, $userDn, $password);

        if ($ldapbind)
            return true;
        return false;
    }

}
