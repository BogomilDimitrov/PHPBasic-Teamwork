<?php
include 'db_connect.php';

if($_SESSION['signed_in'] == true){
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_level']);
    unset($_SESSION['signed_in']);

    header('refresh: 0; url=index.php');
}else{
    header('refresh: 2; url=index.php');
}

?>