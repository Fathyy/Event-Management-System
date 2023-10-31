<?php
require_once './library/config.php';
require_once './library/functions.php';

// check if someone is logged in or not
checkFDUser();

$content = 'views/dashboard.php';
$pageTitle = "Event Management";
$script = array();

require_once 'includes/template.php';

?>