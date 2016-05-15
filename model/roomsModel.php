<?php

require('./model/dbAbstractModel.php');

class roomsModel extends dbAbstractModel {
    private $room;

    public function __construct() {
    }

    public function get($id) {
        $this->query = "select * from roomstype where id=".$id;
        $this->dbQueryArray();

        return $this->arrayRes;
    }

    public function set() {
        
    }
    public function edit() {
        
    }
    public function delete() {
        
    }
}

?>