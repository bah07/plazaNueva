<?php

abstract class dbAbstractModel {
    /********** VARIABLES DE LA CLASE **********/

    //Datos de conexion a la BBDD
    private static $serverName = "localhost";
    private static $userName = "root";
    private static $pass = "rootm";
    private static $dbName = "dbplazanueva";
    
    //Variable de conexion
    private $connection;

    //Consulta a BBDD
    protected $query;
    //Resultados en array
    protected $arrayRes = array();


    /********** METODOS DE LA CLASE ************/

    //Conexion a la base de datos
    private function dbConnect() {
        $this->connection = new mysqli(self::$serverName, self::$userName, self::$pass, self::$dbName);
        $this->connection->set_charset("utf-8");
    }

    //Cierra la conexion a la base de datos
    private function dbClose() {
        $this->connection->close();
    }

    /*** Metodos que van a usar las clases que hereden de esta ***/

    //Metodos implementados en las clases hijas
    abstract protected function get($id);
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    //Consulta simple a BBDD (INSERT, EDIT o DELETE)
    protected function dbQuery() {
        $this->dbConnect();
        $this->connection->query($this->query);
        $this->dbClose();
    }

    //Consulta devuelta en forma de array a BBDD
    protected function dbQueryArray() {
        $this->dbConnect();
        $result = $this->connection->query($this->query);

        //Se dispone el resultado de la query en forma de array
        while ($this->arrayRes[] = $result->fetch_assoc());

        $result->close();
        $this->dbClose();
        //Se elimina el ultimo elemento del array (NULL)
        array_pop($this->arrayRes);
    }
};

?>