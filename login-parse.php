<?php
include 'db_connect.php';
include 'config.php';
if(isset($_SESSION['signed_in'])){
    echo "You are already logged in";
    die();
}
$username = $_POST['user'];
$password = MD5($_POST['pass']);
$sql = "SELECT * FROM members WHERE username='$username' AND password='$password'";
$result = mysql_query($sql);
if(!$result){
    echo "Something went wrong.Please try again";
}else{
    $_SESSION['signed_in'] = true;

    while($row = mysql_fetch_array($result)){
        $_SESSION['user_id']    = $row['members_id'];
        $_SESSION['username']   = $row['username'];
        $_SESSION['user_level'] = $row['member_level'];
    }
    echo "You have succesfully logged in";
    header('refresh: 2; url=index.php');
}

?>