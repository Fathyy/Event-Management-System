<?php
session_start();
require_once('database.php');

// function to log in a user
function doLogin(){
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];

    $errorMessage = '';

    $sql = "SELECT * FROM users WHERE name = '$name' AND pwd = '$pwd'";
    $result = db_query($sql);
    if (num_rows($result) == 1) {
        $row = fetch_assoc($result);
        $_SESSION['calendar_fd_user'] = array(
            'name' => $row['name'],
            'type' => $row['type']
        );
        header("Location: index.php");
        exit();
    }
    else {
        $errorMessage = "Invalid Username or Password";
    }
    return $errorMessage;
}

// Check whether session id exist or not, if not, redirect to the login page.
// if the user chooses to logout then log him out
function checkFDUser(){
    if (!isset($_SESSION['calendar_fd_user'])) {
        header("Location: " . WEB_ROOT . 'login.php');
        exit;
    }
    // user wants to log out
    if (isset($_GET['logout'])) {
        doLogout();
    }
}

// function to logout the user
function doLogout(){
    if (isset($_SESSION['calendar_fd_user'])) {
        unset($_SESSION['calendar_fd_user']);
    }
    header('Location:index.php');
    exit;
}

// get the existing holidays
function getHolidayRecords(){
    $per_page = 10;
    $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : 1;
    $start = ($page - 1) * $per_page;
    $sql = "SELECT * FROM holidays ORDER BY id DESC LIMIT $start, $per_page";
    $result = db_query($sql);
    $records = array();
    while ($row = fetch_assoc($result)) {
        $records[] = array(
            'hid'=>$id,
            'hdate'=>$date,
            'hreason'=>$reason
        );
        return $records;
    }
}

?>