<?php
    $type = $_GET['type']??1;
?>
<div>
    目前位置：首頁 > 分類網誌 > <?=DB::$type[$type];?>
</div>

<div class="tab aut" style="display: flex">
    <fieldset style="width:30%">
        <legend>分類網誌</legend>
        <ul style="padding: 2px 0; list-style: none;">
            <li><a href="?do=po&type=1">健康新知</a></li>
            <li><a href="?do=po&type=2">菸害防治</a></li>
            <li><a href="?do=po&type=3">癌症防治</a></li>
            <li><a href="?do=po&type=4">慢性病防治</a></li>
        </ul>
    </fieldset>
    <fieldset style="width:70%">
        <?php if(isset($_GET['id'])): ?>
            <?php $row = $News -> find(['sh'=>1, 'id'=>$_GET['id']]);?>
            <legend><?=$row['title'];?></legend>
            <pre><?=$row['text'];?></pre>
        <?php else: ?>
            <legend>文章列表</legend>
            <?php foreach($News -> all(['sh'=>1, 'type'=>$type]) as $row): ?>
                <p>
                    <a href="?do=po&type=<?=$type;?>&id=<?=$row['id'];?>"><?=$row['title'];?></a>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
    </fieldset>
</div>