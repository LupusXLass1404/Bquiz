<h2 class="ct">預告片清單</h2>
<form action="./api/poster_edit.php" method="post" enctype="multipart/data-form">
    <table class="ct" width=100%>
        <tr>
            <td class="clo" width=10%>預告片海報</td>
            <td class="clo">預告片片名</td>
            <td class="clo">預告片排序</td>
            <td class="clo">操作</td>
        </tr>
        <?php
            $rows = $$db->all(" Order by `rank`");
            foreach($rows as $idx => $row):
        ?>
        <tr>
            <td><img src="./upload/<?=$row['img'];?>" width=100%></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<hr>
<h2 class="ct">新增預告片海報</h2>
<form action="./api/poster_add.php" method="post" enctype="multipart/form-data">
    <table class="ct" width=100%>
        <tr>
            <td>預告片海報：<input type="file" name="img" id="img"></td>
            <td>預告片片名：<input type="text" name="name" id="name"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>