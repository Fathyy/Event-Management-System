<?php
require_once '../library/config.php';
require_once '../library/functions.php';

// function from the functions.php to check whether a user is logged in or not
checkFDUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
    case 'LIST':
        $content = 'eventlist.php';
        $pageTitle = 'View Event Details';
        break;

    case 'USERS':
        $content = 'userlist.php';
        $pageTitle = 'Users List';
        break;

    case 'CREATE':
        $content = 'userform.php';
        $pageTitle = 'Create New User';
        break;

    case 'USER':
        $content = 'user.php';
        $pageTitle = 'View user Details';
        break;

    case 'HOLY':
        $content = 'holidays.php';
        $pageTitle = 'Holidays';
        break;
    
    default:
        $content = 'dashboard.php';
        $pageTitle = 'Calendar Dashboard';
        break;
}

require_once '../includes/template.php';

?>