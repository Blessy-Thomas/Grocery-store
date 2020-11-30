<?php
session_start();
// Include function and connect to the database using PDO MySQL
include 'function1.php';
$pdo = pdo_connect_mysql();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") 
{

    // Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'cust-index';
    // Include and show the requested page
    include $page . '.php';
}
?>