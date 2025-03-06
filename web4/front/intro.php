<?php $row=$Good->find($_GET['id'])?>
<h1><?=$row['name'];?></h1>
<table class="pp">
    <tr>
        <td width=50%><img src="./upload/<?=$row['img'];?>" alt="" width=100%></td>
        <td>
            分類：<?=$Class->find($row['main'])['text'];?> > <?=$Class->find($row['sub'])['text'];?><br>
            編號：<?=$row['no'];?><br>
            價格：<?=$row['price'];?><br>
            詳細說明：<?=nl2br($row['name']);?><br>
            庫存量：<?=$row['stock'];?><br>
        </td>
    </tr>
</table>
<div class="ct tt">
    購買數量<input type="number" name="qt" id="qt" value=1>
    <img src="./icon/0402.jpg" alt="" onclick="buy()">
</div>
<div class="ct"><input type="button" onclick="lof('./index.php')" value="返回"></div>

<script>
    function buy(){
        let qt = $('#qt').val();
        lof(`?do=buycart&id=<?=$_GET['id'];?>&qt=${qt}`);
    }
</script>