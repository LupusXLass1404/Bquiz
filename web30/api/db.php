<?php

date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charsrt=utf8;dbname=db30";
    protected $pdo;
    protected $table;
    public static $level=[
        1 => '普遍級',
        2 => '保護級',
        3 => '輔導級',
        4 => '限制級'
    ];


    function __construct($table){
        $this->pdo=new PDO($this->dsn,'root',''); 
        $this->table=$table;
    }

    /**
     * 撈出全部資料
     * 1. 整張資料表
     * 2. 有條件
     * 3. 其它SQL功能
     */

    function all(...$arg){
        $sql= "SELECT * FROM $this->table ";
        if(!empty($arg[0])){
            if(is_array($arg[0])){
                $where=$this->a2s($arg[0]);
                $sql=$sql. "WHERE" . join(" && ", $where);
            }else{
                //$sql=$sql.$arg[0];
                $sql .= $arg[0];
            }
        }

        if(!empty($arg[1])){
            $sql=$sql . $arg[1];
        }
        return $this->fetchAll($sql);
    }

    function find($id){
        $sql= "SELECT * FROM $this->table ";

        if(!empty($id)){
            if(is_array($id)){
                $where=$this->a2s($id);
                $sql=$sql. "WHERE" . join(" && ", $where);
            }else{
                $sql .= " WHERE `id`='$id' ";
            }
        }
        return $this->fetchOne($sql);
    }

    function del($id){
        $sql= "DELETE FROM $this->table ";

        if(!empty($id)){
            if(is_array($id)){
                $where=$this->a2s($id);
                $sql=$sql. "WHERE" . join(" && ", $where);
            }else{
                $sql .= " WHERE `id`='$id' ";
            }
        }
        return $this->pdo->exec($sql);
    }

    /**
     * 把陣列轉成條件字串陣列
     */

     function save($array){
        if(isset($array['id'])){
            //update
            $id=$array['id'];
            unset($array['id']);
            $set = $this->a2s($array);

            $sql = "UPDATE $this->table SET ".join(',',$set)." WHERE `id` = '$id'";
        } else {
            //insert
            $cols=array_keys($array);      

            $sql = "INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
     }

     function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
     }

    /**
     * 取得單筆資料
     */
    protected function fetchOne($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 取得多筆資料
     */
    
    protected function fetchAll($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
     }

     /**
      * 
      */

    function max($col, $where=[]){
        return $this->math('max', $col, $where);
    }

    function sum($col, $where=[]){
        return $this->math('sum', $col, $where);
    }

    function min($col, $where=[]){
        return $this->math('min', $col, $where);
    }

    function avg($col, $where=[]){
        return $this->math('avg', $col, $where);
    }

    function count($where=[]){
        return $this->math('count', '*', $where);
    }

    /**
     * 方便使用各種聚合函數
     */

    protected function math($math, $col='id', $where=[]){
        $sql= "SELECT $math($col) FROM $this->table";
        if(!empty($where)){
            $tmp=$this->a2s($where);
            $sql=$sql . " WHERE " . join("&&", $tmp);
        }
        return $this->pdo->query($sql)->fetchColumn();
     }
}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db30",'root','');
    return $pdo->query($sql)->fetchAll();
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to ($url){
    header("location:".$url);
}

$Poster=new DB('posters');
$Movie=new DB('movies');
$Order=new DB('orders');

// if(!isset($_SESSION['view'])){
//     if($Total->count(['date'=>date("Y-m-d")])>0){
//         $total=$Total->find(['date'=>date("Y-m-d")]);
//         $total['total']++;
//         $Total->save($total);
//     } else {
//         $Total->save(['date'=>date("Y-m-d"), 'total'=>1]);
//     }
//     $_SESSION['view']=1;
// }