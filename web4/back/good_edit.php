<?php $good = $Good->find($_GET['id']); ?>
<h1 class="ct">修改商品</h1>
<form action="./api/good.php" method="post" enctype="multipart/form-data">
    <table width=100%>
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
            <select name="main" id="class">
                <?php foreach($Class->all(['main_id'=>0]) as $row): ?>
                    <option value="<?=$row['id'];?>" <?=$good['main']==$row['id']?'selected':'';?>><?=$row['text'];?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="sub" id="sub">
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?=$good['no'];?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$good['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?=$good['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="size" value="<?=$good['size'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?=$good['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id=""><?=$good['intro'];?></textarea></td>
        </tr>
        <input type="hidden" name="id" value="<?=$good['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="lof('?do=good')">
    </div>
</form>
<script>
    get_sub();
    $('#class').on('change',function(){
        get_sub();
    })

    function get_sub(){
        let main = $('#class').val();
        $.post('./api/get_sub.php', {main}, function(res){
            console.log(res);
            
            $('#sub').html(res);
        })
    }
</script>