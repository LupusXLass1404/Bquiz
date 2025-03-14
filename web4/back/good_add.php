<h1 class="ct">新增商品</h1>
<form action="./api/good.php" method="post" enctype="multipart/form-data">
    <table width=100%>
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
            <select name="main" id="class">
                <?php foreach($Class->all(['main_id'=>0]) as $row): ?>
                    <option value="<?=$row['id'];?>"><?=$row['text'];?></option>
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
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="size" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id=""></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
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