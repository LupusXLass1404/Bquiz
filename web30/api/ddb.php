<?php
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db30";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this -> pdo = new PDO($this -> dsn, 'root', '');
        $this -> table = $table;
    }

    // 如果什麼都沒有就搜尋全部
    // 如果有Where就加上去[0]
    // 如果有更後面的也加上去[1]
    function all(...$arg){
        $spl = "Select * From `{$this -> table}`";
        if(empty($arg[0])){
            if(is_array($id)){
                // 如果是陣列
                $tmp = $this -> a2s($id);
                $spl .= " Where " . join(" && ", $tmp);
            } else {
                // 如果不是陣列
                $spl .= " Where `id` = '{$id}' ";
            }
        }

        if(empty($arg[1])){
            $spl .= $arg[1];
        }

        return $this -> fetchAll($spl);
    }

    function save($array){
        if(isset($array['id'])){
            // 修改
            $id = $array['id'];
            unset($array['id']);

            $set = $this -> a2s($array);

            $sql = "Update `{$this -> table}` Set" . join(", ", $set) . " Where `id` = '{$id}'";
        } else {
            // 新增
            $keys = array_keys($array);

            $sql = "Insert Into `{$this -> table}` (`" . join("`, `", $keys) . "`) Values('" . join("', '", $array) ."') ";
        }
        // return $sql;
        return $this -> pdo -> exec($sql);
    }

    function find($id){
        $sql = "Select * From `{$this -> table}` ";
        if(is_array($id)){
            // 如果是陣列
            $tmp = $this -> a2s($id);
            $sql .= " Where " . join(" && ", $tmp);
        } else {
            // 如果不是陣列
            $sql .= " Where `id` = '{$id}' ";
        }

        return $this -> fetchOne($spl);
    }

    function del($id){
        $spl = "Delete From `{$this -> table}` ";
        if(is_array($id)){
            // 如果是陣列
            $tmp = $this -> a2s($id);
            $spl .= " Where " . join(" && ", $tmp);
        } else {
            // 如果不是陣列
            $spl .= " Where `id` = '{$id}' ";
        }

        return $this -> pdo -> exec($spl);
    }

    function a2s($array){
        $tmp = [];
        foreach($array as $key => $value){
            $tmp[] = "`{$key}` = '{$value}'";
        }
        return $tmp;
    }

    protected function fetchOne($spl){
        return $this -> pdo -> query($spl) -> fetch(PDO::FETCH_ASSOC);
    }

    protected function fetchAll($spl){
        return $this -> pdo -> query($spl) -> fetchAll(PDO::FETCH_ASSOC);
    }

    // * Math組
    function sum($col, $where = []){
        return $this -> math('sum', $col, $where);
    }
    function avg($col, $where = []){
        return $this -> math('avg', $col, $where);
    }
    function min($col, $where = []){
        return $this -> math('min', $col, $where);
    }
    function max($col, $where = []){
        return $this -> math('max', $col, $where);
    }
    function count($where = []){
        return $this -> math('count', '*', $where);
    }

    protected function math($math, $col = 'id', $where = []){
        $sql = "Select $math($col) From `{$this -> table}`";
        if(!empty($where)){
            $tmp = $this -> a2s($where);
            $sql .= " Where " . join(" && ", $tmp);
        }
        
        return $this -> pdo -> query($sql) -> fetchcolumn();
    }
    
}

function q($sql){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db30";
    $pdo = new PDO($dsn, 'root', '');
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

// to("./dddb.php");

?>