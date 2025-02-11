<?php include_once "./db.php";
dd($_POST);
dd($_GET);

$db = ucfirst($_GET['do']);

// 修改
foreach($_POST['id'] as $idx => $id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $$db -> del($id);
    } else {
        $row['id'] = $id;

        switch ($_GET['do']){
            default:
                if(isset($_POST['text'])){
                    $row['text'] = $_POST['text'][$idx];
                }
                
                if(isset($_POST['url'])){
                    $row['url'] = $_POST['url'][$idx];
                }
                
                $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']) ? 1 : 0;
                break;
        }
        // dd($row);
        $$db -> save($row);
    }
}

// 新增
if(!empty($_POST['main_id'])){
    foreach($_POST['main_id'] as $idx => $id){
        if(!empty($_POST['add_text'][$idx]) || !empty($_POST['add_url'][$idx])){
            $add = [];
            $add['text'] = $_POST['add_text'][$idx];
            $add['url'] = $_POST['add_url'][$idx];
            $add['main_id'] = $_GET['id'];
    
            dd($add);
            $$db -> save($add);
        }
    }
}

to("../admin.php?do={$_GET['do']}");

?>