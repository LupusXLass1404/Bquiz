<?php $main = $Que->find($_GET['id'])?>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查 > <?=$main['text'];?></legend>
    <h2><?=$main['text'];?></h2>
   
    <table class="ct">
        <?php 
            foreach($Que->all(['main_id'=>$_GET['id']]) as $idx => $row): 
            $p = ($row['vote']==0)? 0 : round($row['vote']/$main['vote']*100);
        ?>
        <tr>
            <td style="text-align: left"><?=$row['text'];?></td>
            <td width=30%><span style="display: block; background-color: #333; width: <?=$p;?>%"> &nbsp </span></td>
            <td width=20%><?=$row['vote'];?>票（<?=$p;?>%）</td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <input type="button" value="返回" onclick="lof('?do=que')">
    </div>

</fieldset>