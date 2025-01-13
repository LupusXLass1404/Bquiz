<?php
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db30";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this -> pdo = new PDO($this -> dsn, 'root', '');
        $this -> table = $table;
    }

    function all(){
        $spl = "Select * From {$this -> table}";
        return $this -> fetchAll($spl);
    }

    protected function fetchOne($spl){

        return $this -> pdo -> query($spl) -> fetch(PDO::FETCH_ASSOC);
    }

    protected function fetchAll($spl){
        return $this -> pdo -> query($spl) -> fetchAll(PDO::FETCH_ASSOC);
    }
    
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Movie = new DB('movies');
dd($Movie -> all());


?>