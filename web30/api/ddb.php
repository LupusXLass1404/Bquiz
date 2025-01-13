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
            echo "id: $id";

            $tmp = "";
            foreach($keys as $key){
                $tmp .= "`{$key}` => '{$array[$key]}', ";
                echo $tmp . "<br>";
            }
            $sql = "Update Set ";

        } else {
            // 新增

            $keys = array_keys($array);
            
        }
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

$array = ['a' => 'aa', 'b' => 'bb'];

// dd(array_keys($array));



// echo join("-",$array);
// dd($array);

$Movie = new DB('movies');
$Test = new DB('test');
// dd();
$Movie -> save($array)

?>