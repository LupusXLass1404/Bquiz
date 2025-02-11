<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php?do=<?=$_GET['do'];?>">
        <table class="cent" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="23%">主選單名稱</td>
                    <td width="23%">主選單連結網址</td>
                    <td width="7%">次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td width="7%"></td>
                </tr>
                <?php
                    $rows = $$db -> all(" Where `main_id` = '0'");
                    foreach($rows as $row):
                ?>
                <tr>
                    <td>
                        <input type="text" name="text[]" value="<?=$row['text'];?>" style="width: 95%">
                    </td>
                    <td>
                        <input type="text" name="url[]" value="<?=$row['url'];?>" style="width: 95%">
                    </td>
                    <td>
                        <?= $$db->count(['main_id'=> $row['id']]);?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload_<?=$_GET['do'];?>.php?do=<?=$_GET['do'];?>&id=<?=$row['id'];?>&#39;)" value="編輯次選單">
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
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$_GET['do'];?>.php?do=<?=$_GET['do'];?>&#39;)" value="新增主選單">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>