<?php
    $type = $_GET['type'] ?? "1";
?>

目前位置 首頁 > 分類網誌 > <?=DB::$type[$type];?>
<div class="tags">
    <h3>分類網誌</h3>
    <button class="tag" onclick="to('?do=po&type=1')">健康新知</button>
    <button class="tag" onclick="to('?do=po&type=2')">菸害防治</button>
    <button class="tag" onclick="to('?do=po&type=3')">癌症防治</button>
    <button class="tag" onclick="to('?do=po&type=4')">慢性病防治</button>
</div>
<hr>
<h3>文章列表</h3>

<?php
    $rows = $News -> all(['type'=> $type]);
    foreach($rows as $row):
?>

    <a href="?do=text&id=<?=$row['id']?>"><?=$row['title']?></a><br>

<?php
    endforeach;
?>
