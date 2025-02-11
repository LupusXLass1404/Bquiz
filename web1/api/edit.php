<?php include_once "./db.php";

$db = ucfirst($_GET['do']);
dd($_POST);

if(isset($_POST['id']) && is_array($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del']) && in_array($id, $_POST['del'])){
            $$db -> del($id);
        } else {
            $row['id'] = $id;
    
            switch ($_GET['do']){
                case 'admin':
                    $row['acc'] =  $_POST['acc'][$idx];
                    $row['pw'] =  $_POST['pw'][$idx];
                    break;
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
} else {
    $row = $$db -> find(1);
    $do = $_GET['do'];
    $row[$do] = $_POST[$do];

    dd($row);
    $$db -> save($row);
}

to("../admin.php?do={$_GET['do']}");
?>