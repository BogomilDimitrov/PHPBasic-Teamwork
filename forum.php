<?php
session_start();
require "db_connect.php";
//Checks if user is logged in
if(isset($_SESSION['signed_in'])&& isset($_SESSION['username'])){
    $login = true;
}else $login = false;
//get the page id
if(isset($_GET['id'])&&is_numeric($_GET['id'])){
    $id = $_GET['id'];
}else{
    die("ERROR");
}
//check to see if the id is valid
$idCheck = $db->query("SELECT * FROM forum_table WHERE forum_id='$id'");
if($idCheck->num_rows !== 1){
    die("ERROR");
}
$row = $idCheck->fetch_object();
$sql = "SELECT post_id, post_title FROM forum_post WHERE forum_id=? AND post_type='o'";
if($query = $db->prepare($sql)){
    $query->bind_param('s', $id);
    $query->bind_result($post_id, $post_title);
    $query->execute();
    $query->store_result();
}else{
    echo $db->error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $row->forum_name?></title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="container">
    <h2>My Forums</h2>
    <table style="width: 80%;">
    <h2><?=$row->forum_name?>'s Threads</h2>
        <?php if($query->num_rows != 0):?>
        <?php while($query->fetch()): ?>
        <tr>
            <td>
                <a href="view_post.php?pid=<?= $post_id?>&id=<?=$id?>"> <?= $post_title?></a>
            </td>
        </tr>
        <?php endwhile;?>
        <?php else:?>
        <tr>
            <td>
                <h2>No Posts Found</h2>
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <aside id="side-bar">
        <?php if(!$login):?>
            <h3>Login Please</h3>
            <form action="login-parse.php" method="post">
                <div>
                    <label>Username:</label>
                    <input type="text" name="user" id="user"/>
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="pass" id="pass"/>
                </div>
                <div>
                    <input type="submit" name="submit" value="Login"/>
                </div>
            </form>
        <?php else:?>
            <h2>Welcome Back! <?php echo $_SESSION['username'];?></h2>
        <?php endif;?>
    </aside>
</div>
</body>
</html>