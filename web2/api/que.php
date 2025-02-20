<?php include_once "./db.php";
// dd($_POST);
$main = $_POST['text'];
$Que -> save(['text'=>$main]);
$row = $Que -> find(['text'=>$_POST['text']]);
$main_id = $row['id'];

foreach($_POST['opt'] as $text){
    if(!empty($text)){
        $Que -> save(['text' => $text, 'main_id' => $main_id]);
    }
}

to("../admin.php?do=que");
?>