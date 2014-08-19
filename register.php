<?php
session_start();

    //if($_SESSION['signed_in'] == true){
    //    echo "You are already logged in";
    //    die();
    //}

echo"
<meta charset='utf-8'/>
Регистрирай се:
<form method='post' action=''>
Име: <input type='text' name='username' /><br />
Парола: <input type='password' name='pass' /><br />
Повторете паролата: <input type='password' name='re-type'/><br/>
<input type='submit' name='submit' value='Регистрирай се'><br />
</form>
";



if(isset($_POST['submit'])){
    include "config.php";
    if($_POST['pass'] !== $_POST['re-type']){
        echo "Паролите не съвпадат, моля попълнете отново регистрационната форма.";
        header('refresh: 1; url=register.php');
        die();
    }

    $sql = "INSERT INTO members (members_id, username, password) VALUES (NULL, '$_POST[username]', MD5('$_POST[pass]'));";
    $result = mysql_query($sql) or die(mysql_error());
    if($result == 'true'){
        echo 'Успешна регисрация!';
        header('refresh: 2; url=index.php');
    }
    else {
        echo 'Нещо се обърка, моля пробвайте отново';
    }
}
?>
