<?php
session_start();
require "db_connect.php";
//Checks if user is logged in
if(isset($_SESSION['logged-in'])&& isset($_SESSION['username'])){
    $login = true;
}else $login = false;
//Checks if the post_id and forum_id is set and is a numeric value
if(isset($_GET['pid'])&& is_numeric($_GET['pid'])&& isset($_GET['id'])&&is_numeric($_GET['id'])){
    $pid = $_GET['pid'];
    $id = $_GET['id'];
}
//Check if there is a post that has name, id and forum_id with the type of 'o'
$postCheck = $db->
    query("SELECT * FROM forum_post WHERE post_id='$pid' AND forum_id='$id' AND post_type='o'")->num_rows;
if($postCheck === 0) die("Error: Sorry no such post found");
//grab the original post to be displayed
$sql = "SELECT post_title, post_body, post_author FROM forum_post WHERE post_id=? AND forum_id=? AND post_type='o'";
if($topicPost=$db->prepare($sql)){
    $topicPost->bind_param('ss',$pid,$id);
    $topicPost->bind_result($post_title, $post_body, $post_author);
    $topicPost->execute();
    $topicPost->store_result();
}else{
    echo"ERROR: ".$db->error;
    exit();
}
//display the topic post
$row = $topicPost->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>My Forum</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="container">
    <div id="header">
    <h2>My Forums</h2>
    </div>
    <div id="primary">
        <div id="copie_post" class="post">
            <header>
                <h3><?=$post_title?></h3>
            </header>
            <article>
                <?=$post_body?>
            </article>
            <footer>
                <h4>By:&nbsp;<?=$post_author?></h4>
            </footer>
        </div>
    </div>
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