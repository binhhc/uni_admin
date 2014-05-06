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

?>