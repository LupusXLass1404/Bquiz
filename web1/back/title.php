<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php?do=<?=$db;?>">
        <table class="cent" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                    $rows = $$db -> all();
                    foreach($rows as $row):
                ?>
                <tr>
                    <td>
                        <img src="./upload/<?=$row['img'];?>" alt="" width=100%>
                    </td>
                    <td>
                        <input type="text" name="text[]" value="<?=$row['text'];?>">
                    </td>
                    <td>
                        <input type="radio" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload_<?=$_GET['do']??'title';?>.php?do=<?=$_GET['do']??'title';?>&id=<?=$row['id'];?>&#39;)" value="更新圖片">
                    </td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php
                    endforeach;
                ?>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$_GET['do'] ??'title';?>.php?do=<?=$_GET['do']??'title';?>&#39;)" value="新增網站標題圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>