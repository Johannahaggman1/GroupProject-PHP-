<?php

include("database_connections.php")



class GBpost{

    private $data_base_handler;
    private $order = 'desc';
    private $posts;

    public function __construct($dbh){

    $this->data_base_handler = $dbh;

    }

    public function fetchAll(){
        $query = "SELECT id, content, date, postID, userID FROM comments ORDER BY date_posted $this->order";
       
        $return_array = $this->data_base_handler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);
        
        $this->posts = $return_array;
        
    }

    public function getPosts(){

        return $this->posts;

    }

};

?>