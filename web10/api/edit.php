<?php
include_once "db.php";

$table=$_GET['table'];
$db=ucfirst($table);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id) {
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $$db->del($id);
        } else {
            $row=$$db->find($id);
            $row['text']=$_POST['text'][$idx];

            // $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            
            $$db->save($row);
            // echo "sh: {$_POST['sh']}; id: {$id}; ".($_POST['sh']==$id ? 'true' : 'false')."<br/>";
        }
    }
}

to("../admin.php?do=$table");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>