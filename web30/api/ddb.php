<?php
class DB{
    protected $dsn = "mysql:host=localhost;charsrt=utf8;dbname=db30";
    protected $pdo;
    protected $table;

    function __c($table){
        $this -> pdo = new PDO($this -> dsn, "root", '');
        $this -> table = $table;
    }

}

?>