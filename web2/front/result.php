<?php
$title = $Que -> find(["id"=>$_GET['id']])['text'];
?>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查 > <?=$title;?></legend>
        <h2><?=$title;?></h2>
        <table>
        <?php
            $rows = $Que -> all(['main_id'=>$_GET['id']]);
            $votes = $Que->sum("vote",['main_id'=>$_GET['id']]);
            foreach($rows as $row):
                $p = round($row['vote']/$votes, 2)*100;
        ?>
        <tr>
            <td>
                <?=$row['text'];?>
            </td>
            <td width=10%>
                
                <span style='background-color:#333; width:<?=$p;?>%; display:inline-block'>&nbsp</span>
            </td>
            <td width=20%>
                <?=$row['vote'];?>票（<?=$p;?>%）
            </td>
        </tr>
        <?php
            endforeach;
        ?>
        </table>
        <div class="ct">
            <button onclick="to('?do=que')">返回</button>
        </div>
        
</fieldset>