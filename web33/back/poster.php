<h2 class="ct">預告片清單</h2>
<form action="./api/poster_edit.php" method="post">
    <div style="height:240px;overflow:auto">
        <table class="ct" width=100%>
            <tr class="clo">
                <td width=12%>預告片海報</td>
                <td>預告片片名</td>
                <td>預告片排序</td>
                <td>操作</td>
            </tr>
            <?php
                $rows=$$db->all();
                foreach($rows as $idx=>$row):
            ?>
            <tr>
                <td><img src="./upload/<?=$row['poster'];?>" alt="" width=90%></td>
                <td><input type="text" name="name[]" value="<?=$row['name'];?>"></td>
                <td>
                    <input type="button" value="往上">
                    <input type="button" value="往下">
                </td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?'checked':'';?>>顯示
                    <input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
                    <select name="ani[]">
                        <option value="1" <?=$row['ani']==1?'selected':'';?>>淡入淡出</option>
                        <option value="2" <?=$row['ani']==2?'selected':'';?>>滑入滑出</option>
                        <option value="3" <?=$row['ani']==3?'selected':'';?>>放大縮小</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <p class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </p>
</form>

<h2 class="ct">新增預告片海報</h2>
<form action="./api/poster_add.php" method="post" enctype="multipart/form-data">
    <table class="ct" width=100%>
        <tr>
            <td>預告片海報：<input type="file" name="poster" id="poster"></td>
            <td>預告片片名：<input type="text" name="name"></td>
        </tr>
    </table>
    <p class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </p>
    <p>&nbsp</p>
</form>