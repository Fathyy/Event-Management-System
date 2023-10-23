<?php
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
        $_SESSION['calendar_fd_user'] = $row;
        $_SESSION['calendar_fd_user_name'] = $row['username'];
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

?>