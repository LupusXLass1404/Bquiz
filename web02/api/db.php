<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB{
    protected $dbn="mysql:host=localhost;charset=utf8;dbname=db2";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->pdo = new PDO($this->dbn, 'root','');
        $this->table = $table;
    }

    function all(...$arg){
        $sql = "Select * From `$this->table` ";
        
    }

    function find($id){
        $sql = "Select * From `$this->table` ";

        if(is_array($id)){
            $tmp = $this -> a2s($id);
            
        } else {

        }
    }

    function save($array){
        if(isset($array['id'])){
            $id = $array['id'];
            unset($array['id']);

            $tmp = $this -> a2s($array);

            $sql = "Update `$this->table` set ".join(", ", $tmp)." Where `id` = '$id'";
        } else {
            $key = array_keys($array);

            $sql = "Insert into `$this->table`(`".join("`, `", $key)."`) Values ('".join("', '", $array)."')";
        }
        echo $sql;
        return $this -> pdo -> exec($sql);
    }

    function del($id){
        
        return $this -> pdo -> exec($sql);
    }

    function count($where = []){
        $this->math('count', "*", $where);
    }
    function sum($col, $where = []){
        $this->math('sum', $col, $where);
    }

    protected function math($math, $col = "*", $where = []){
        $sql = "Select * From `$this->table` "

    }

    function fetch_one($sql){

    }

    function a2s($array){
        $tmp = [];

        foreach($array as $key => $value){
            $tmp[] = "`$key` = '$value'";
        }

        return $tmp;
    }
}

function q($sql){

}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:" . $url);
}

$Test = new DB('test');
$data = [
    'text'=> '抄怪fDdsfdsfds好',
    'sh'=>5,
    'id'=>9
];

$Test->save($data);