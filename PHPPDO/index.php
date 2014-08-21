<?php
require 'connect.php';

class GuestbookEntry{
    public $id, $name, $message, $posted, $entry;

    public function __construct(){
        $this->entry = "{$this->name} posted: {$this->message}";
    }
}

$query = $handler->query('SELECT * FROM guestbook');
$query->setFetchMode(PDO::FETCH_CLASS, 'GuestbookEntry');
if($query->rowCount()){
    $r=$query->fetchAll(PDO::FETCH_OBJ);
    echo '<pre>', print_r($r), '</pre>';
}else{
    echo "No results";
}

/**------------------------**/
//$name = 'Eric';
//$message = 'Test';
//
//$sql = "INSERT INTO guestbook (name, message, posted)
//        VALUES (:name, :message, NOW())";
//$query = $handler->prepare($sql);
//$query->execute(array(
//    ':name' => $name,
//    ':message' => $message
//));
//
//echo $handler->lastInsertId();



