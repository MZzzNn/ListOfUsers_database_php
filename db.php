<?php
class DataBase{
    private $dbname="summerTranning";
    private $host="localhost";
    private $username="root";
    private $passwor="";
    private $connection=null;

    function __construct()
    {
        $this->connection=new pdo(
            "mysql:host=$this->host;dbname=$this->dbname",
            $this->username,
            $this->passwor
        );
    }
    function getConnection(){
        return $this->connection;
    }

    function insertData($tableName ,$setterData){
        $this->connection->query("insert into $tableName set $setterData");
    }
    function getAllData($tableName){
        $data = $this->connection->query("select * from $tableName");
        
        return $data;
    }

    function getView($tableName,$condition){
        $data = $this->connection->query("select * from $tableName where $condition");
        $row = $data->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function deleteStudent($tableName,$condition){
         $this->connection->query("delete from $tableName where $condition");
    }

    function updateStudent($tableName ,$setterData,$condition){
        $this->connection->query("update $tableName set $setterData where $condition");
    }
    function loginStudent($tableName,$condition){
        $data = $this->connection->query("select * from $tableName where $condition");
        $data = $data->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>