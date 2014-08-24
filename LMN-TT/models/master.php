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
//        return var_dump($results);
        foreach ($results as $row)
        {
            print $row['user_id'] .' - '. $row['username'] . '<br />';
        }
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
               echo("pich ob1rkal si reysa");
           }
       }

    public function checkUser($username,$password){
        $dbConnect = new Database();
        $db = $dbConnect->get_db();

        $query = $db->prepare('SELECT username FROM users WHERE username = '.$username);

        var_dump($query);
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