<?php
/*
 *  $dbConnect = new Database();
        $db = $dbConnect->get_db();
napravi gi kato konstruktor moje bi
 */
include_once('lib/database.php');
class MasterModel
{
    public function get( $id ) {
        $results = $this->find( array( 'where' => 'id = ' .$id ) );

        return $results;
    }

    public function find( $args = array() ) {
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $args = array_merge( array(
            'table' => '',
            'where' => '',
            'columns' => '*',
            'limit' => 0
        ), $args );

        $columns = $args['columns'];
        $table = $args['table'];
        $where = $args['where'];
        $limit = $args['limit'];

        $query = "select {$columns} from {$table}";

        if( ! empty( $where ) ) {
            $query .= ' where ' . $where;
        }

        if( ! empty( $limit ) ) {
            $query .= ' limit ' . $limit;
        }
        $results = $db->query( $query );
        var_dump($results -> fetchAll());
//        foreach ($results as $row)
//        {
//            print $row['user_id'] .' - '. $row['username'] . '<br />';
//        }
    }

       public function add($table,$arrayToSelect = array(),$arrayToInput = array()){
           $dbConnect = new Database();
           $db = $dbConnect->get_db();

           $table = $table;
           if(count($arrayToSelect) == count($arrayToInput)){
               $query = 'INSERT INTO ' . $table . '(';
               $query .= implode(', ', $arrayToSelect);
               $query .= ') VALUES(';
                for($i = 0; $i < count($arrayToInput);$i++){
                    if($i < count($arrayToInput) - 1){
                        $query .= "'" . $arrayToInput[$i] . "', ";
                    }else{
                        $query .= "'" . $arrayToInput[$i] . "'";
                    }
                }
               $query .= ')';
               echo($query);
                 $db->exec($query);
           }else{
               echo("Error, you can't insert this object");
           }
       }

    public function checkUser($username,$password){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();
//        $query = $db->prepare("SELECT username FROM users WHERE 'username' =".'Shukri');
//        var_dump($query->rowCount());

        $sql= "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_INT);
        $stmt->execute();
        var_dump($stmt->fetchAll());
    }
    //$this->table trqbva da go opravish

//    public function delete( $id ) {
//        $dbConnect = new Database();
//        $db = $dbConnect->get_db();
//        $table = "users";
//        $query = "DELETE FROM {$table} WHERE id=" . intval( $id );
//
//        $db->query( $query );
//
//        return $db->affected_rows;
//    }

}