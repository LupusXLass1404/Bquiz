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

    function del(){

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
    
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$array = ['text' => '你不好', 'id' => '1'];

// dd(array_keys($array));



// echo join("-",$array);
// dd($array);

$Movie = new DB('movies');
$Test = new DB('test');
// dd();
echo $Test -> save($array)

?>