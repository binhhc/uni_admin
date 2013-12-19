<?php
/**
 * AppShell file
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Shell', 'Console');

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */
class AppShell extends Shell {

    public $start_time;
    public $lock_file;
    public $_logfile = 'console';

    public function startup() {
        parent::startup();

        $this->start_time = time();
        $this->lock_file = new File(BATCH_LOCK);
    }

    /**
     * Customized log
     *
     * @author Mai Nhut Tan
     * @since 2013/10/14
     */

    function logme($message, $type = 'ACTIVITY', $data = array()){
        $timestamp = time();
        $time = date('Y-m-d H:i:s', $timestamp);
        $type = trim(strtoupper($type));
        $console_out = "\n{$time} <info>{$type}</info>:\n{$message}";

        $start = $this->start_time;

        $this->out($console_out);
        CakeLog::write($this->_logfile, "{$type}\n{$message}\n");

        if($type != 'MUTED'){
            $object = compact('type', 'message', 'timestamp', 'time', 'start');
            $object = array_merge($object, $data);

            $this->lock_file->write(serialize($object), 'w', true);
        }
    }
}

