<?php $row = $Que->find($_GET['id'])?>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查 > <?=$row['text'];?></legend>
    <h2><?=$row['text'];?></h2>
    <form action="./api/vote.php?id=<?=$_GET['id'];?>" method="post">
        <table class="ct">
            <?php foreach($Que->all(['main_id'=>$_GET['id']]) as $idx => $row): ?>
            <tr>
                <td style="text-align: left">
                    <input type="radio" name="vote" id="vote-<?=$row['id'];?>" value="<?=$row['id'];?>">
                    <label for="vote-<?=$row['id'];?>"><?=$row['text'];?></label>
                </td>
                <td></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>