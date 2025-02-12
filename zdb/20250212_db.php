<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB{
    protected $dbn = "mysql:host=localhost;charset=utf8;dbname=test";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this -> pdo = new PDO($this -> dbn, 'root', '');
        $this -> table = $table;
    }

    function all(...$arg){
        $sql = "Select * From `{$this -> table}` ";

        if(!empty($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this -> a2s($arg[0]);
    
                $sql .= " Where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if(!empty($arg[1])){
            $sql .= $arg[1];
        }

        return $this -> fetch_all($sql);
    }

    function find($id){
        $sql = "Select * From `{$this -> table}` ";

        if(is_array($id)){
            $tmp = $this -> a2s($id);

            $sql .= " Where " . join(" && ", $tmp);
        } else {
            $sql .= " Where `id` = '{$id}'";
        }
        // echo $sql;
        return $this -> fetch_one($sql);
    }

    function save($array){
        if(isset($array['id'])){
            // 修改
            $id = $array['id'];
            unset($array['id']);

            $tmp = $this -> a2s($array);
            
            $sql = "Update `{$this -> table}` set " . join(", ", $tmp) . " Where `id` = '{$id}'";
        } else {
            // 新增
            $key = array_keys($array);

            $sql = "Insert into `{$this -> table}`(`". join("`, `", $key)."`) Values('". join("', '", $array) ."')";
        }
        // echo $sql;
        return $this -> pdo -> exec($sql);
    }

    function del($id){
        $sql = "Delete From `{$this -> table}` ";

        if(is_array($id)){
            $tmp = $this -> a2s($id);

            $sql .= " Where " . join(" && ", $tmp);
        } else {
            $sql .= " Where `id` = '{$id}'";
        }
        // echo $sql;
        return $this -> pdo -> exec($sql);
    }

    function count($where = []){
        return $this -> math("count", "*", $where);
    }
    function sum($col, $where = []){
        return $this -> math("sum", $col, $where);
    }
    function avg($col, $where = []){
        return $this -> math("avg", $col, $where);
    }
    function max($col, $where = []){
        return $this -> math("max", $col, $where);
    }
    function min($col, $where = []){
        return $this -> math("min", $col, $where);
    }

    protected function math($math, $col = "*", $where = []){
        $sql = "Select $math($col) From `{$this -> table}` ";

        if(!empty($where)){
            $tmp = $this -> a2s($where);

            $sql .= " Where " . join(" && ", $tmp);
        }
        // echo $sql;
        return $this -> pdo -> query($sql) -> fetchColumn();
    }

    protected function fetch_one($sql){
        return $this -> pdo -> query($sql) -> fetch(PDO::FETCH_ASSOC);
    }
    protected function fetch_all($sql){
        return $this -> pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
    }

    function a2s($array){
        $tmp =[];

        foreach($array as $key => $value){
            $tmp[] = "`{$key}` = '{$value}'";
        }

        return $tmp;
    }
}

function q($sql){
    $dbn = "mysql:host=localhost;charset=utf8;dbname=test";
    $pdo = new PDO($dbn, 'root', '');
    return $pdo -> query($sql) -> fetchAll();
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:" . $url);
}

$Test = new DB('tests');

// $data = ["text"=>"你saddsadsa好", "sh"=>4];
// $Test -> save($data);
// $Test -> del($data);
// $rows = $Test -> find(3);
// $rows = $Test -> all("Where `text` = '你' ", " limit 3");
// $rows = q("SELECT * FROM `tests` ");
// echo $Test -> min("id");
// dd($rows);
// to('../web1');
?>