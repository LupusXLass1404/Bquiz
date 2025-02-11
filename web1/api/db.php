<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dbn = "mysql:host=localhost;charset=utf8;dbname=db01";
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
                // 陣列
                $where = $this -> a2s($arg[0]);
                $sql .= " Where " . join(" && ", $where);
            } else {
                // 單個數
                $sql .= $arg[0];
            }
        }

        if(!empty($arg[1])){
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this -> fetchAll($sql);
    }
    function find($id){
        $sql = "Select * From `{$this -> table}` ";
        if(is_array($id)){
            // 陣列
            $where = $this -> a2s($id);
            $sql .= " Where " . join(" && ", $where);
        } else {
            // 單個數
            $sql .= " Where `id` = '{$id}' ";
        }

        return $this -> fetchOne($sql);
    }
    function del($id){
        $sql = "Delete From `{$this -> table}` ";
        if(is_array($id)){
            // 陣列
            $where = $this -> a2s($id);
            $sql .= " Where " . join(" && ", $where);
        } else {
            // 單個數
            $sql .= " Where `id` = '{$id}' ";
        }

        return $this -> pdo -> exec($sql);
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
            $keys = array_keys($array);

            $sql = "Insert Into `{$this -> table}` (`". join("`, `", $keys) ."`) Values('" . join("', '", $array) ."')";
        }
        // return $sql;
        return $this -> pdo -> exec($sql);
    }

    function count($where = []){
        return $this -> math('count', '*', $where);
    }
    function sum($col, $where = []){
        return $this -> math('sum', $col, $where);
    }
    function avg($col, $where = []){
        return $this -> math('avg', $col, $where);
    }
    function max($col, $where = []){
        return $this -> math('max', $col, $where);
    }
    function min($col, $where = []){
        return $this -> math('min', $col, $where);
    }

    protected function math($math, $col = 'id', $where = []){
        $sql = "Select $math($col) From `{$this -> table}` ";
        if(!empty($where)){
            $tmp = $this -> a2s($where);
            $sql .= "Where " . join(" && ", $tmp);
        }
        // echo $sql;
        return $this -> pdo -> query($sql) -> fetchColumn();
    }

    protected function fetchOne($sql){
        return $this -> pdo -> query($sql) -> fetch(PDO::FETCH_ASSOC);
    }
    protected function fetchAll($sql){
        return $this -> pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
    }

    function a2s($array){
        $tmp = [];
        foreach($array as $key => $value){
            $tmp[] = "`{$key}` = '{$value}'";
        }

        return $tmp;
    }
}

function q($sql){
    $dbn = "mysql:host=localhost;charset=utf8;dbname=db01";
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

function d(){
    return $_GET['do'];
}

$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$Total = new DB('total');
$Bottom = new DB('bottom');
$News = new DB('news');
$Admin = new DB('admin');
$Menu = new DB('menu');

if(!isset($_SESSION['view'])){
    $row = $Total -> find(1);
    $row['total']++;
    $Total -> save($row);
    $_SESSION['view'] = 1;
}

?>