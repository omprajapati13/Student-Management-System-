<?php

$db_conn = mysqli_connect('localhost', 'root', '', 'sms_project');

if (!$db_conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

session_start();

date_default_timezone_set('Asia/Kolkata');

include('functions.php');
?>
