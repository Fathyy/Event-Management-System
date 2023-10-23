<!-- define database configurations -->
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'Event-management';

// define project data
$site_title = 'Event Management';
$email = 'fathiabdi254@gmail.com';

// replace double forward slashes with single back slash
$this_file = str_replace('\\', '/', __FILE__);

// variable to hold the root directory of the web server
$doc_root = $_SERVER['DOCUMENT_ROOT'];

// extracts the relative path from the document root to the directory where the current script is located
$web_root = str_replace(array($doc_root, 'library/config.php'), '', $this_file);

// extracts the path from the current script to the directory without considering the document root.
$srv_root = str_replace('library/config.php', '', $this_file);

define('WEB_ROOT', $web_root);
define('SRV_ROOT', $srv_root);

require_once 'database.php';
// require_once 'common.php';

?>