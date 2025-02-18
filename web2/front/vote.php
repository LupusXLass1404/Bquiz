<?php
$title = $Que -> find(["id"=>$_GET['id']])['text'];
?>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查 > <?=$title;?></legend>
    <form action="./api/vote.php" method="post">
        <h2><?=$title;?></h2>
        <?php
            $rows = $Que -> all(['main_id'=>$_GET['id']]);
            foreach($rows as $row):
        ?>
        <div style="padding:8px 0;">
            <input type="radio" name="vote" id="<?=$row['id'];?>" value="<?=$row['id'];?>">
            <label for="<?=$row['id'];?>"><?=$row['text'];?></label>
        </div>
        <?php
            endforeach;
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>