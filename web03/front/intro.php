<?php $row=$Movie->find($_GET['id']); ?>
<div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="./upload/<?=$row['trailer'];?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="./upload/<?=$row['poster'];?>" width="200px" height="250px"
            style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$row['name'];?>
            <input type="button" value="線上訂票" onclick="lof('?do=ticket&id=<?=$row['id'];?>')"
            style="padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="icon/03C0<?=$row['rating'];?>.png" style="display:inline-block;"><?=DB::$rating[$row['rating']];?> </p>
        <p style="margin:3px">影片片長 ： <?=floor($row['length']/60);?>時 <?=$row['length']%60;?>分</p>
        <p style="margin:3px">上映日期 <?=$row['ondate'];?></p>
        <p style="margin:3px">發行商 ：<?=$row['publish'];?> </p>
        <p style="margin:3px">導演 ： <?=$row['director'];?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br><?=nl2br($row['intro']);?>
        </p>
        </font>
        <table width="100%" border="0">
        <tbody>
            <tr>
            <td align="center"><input type="button" value="院線片清單" onclick="lof('./index.php')"></td>
            </tr>
        </tbody>
        </table>
    </div>
</div>