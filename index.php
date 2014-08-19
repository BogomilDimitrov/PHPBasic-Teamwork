<?php
session_start();
require "db_connect.php";
$sql = "SELECT forum_id, forum_name FROM forum_table";
if($query = $db->prepare($sql)){
    $query->bind_result($f_id, $f_name);
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
    <title>My Forum</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="container">
    <h2>My Forums</h2>
    <table>
        <?php if($query->num_rows !==0):
        while($row = $query->fetch()):
        ?>
        <tr>
            <td>
                <a href="forum.php?id=<?php echo $f_id?>">
                    <?php echo $f_name;?>
                </a>
            </td>
        </tr>
        <?php endwhile; endif; ?>
    </table>
</div>
</body>
</html>