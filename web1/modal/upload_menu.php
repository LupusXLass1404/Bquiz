<?php include_once "../api/db.php";?>
<form method="post" action="./api/submune.php?do=<?=$_GET['do'];?>&id=<?=$_GET['id'];?>">
        <h2 class="cent">編輯次選單</h2>
        <hr>
        <table id="menu" class="cent" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="23%">次選單名稱</td>
                    <td width="23%">次選單連結網址</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                    $rows = $Menu -> all(" Where `main_id` = '{$_GET['id']}'");
                    
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
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
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
                    <td width="200px"><input type="button" onclick="add()" value="更多次選單">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
        
        <script>
            function add(){
                $('#menu').append(`
                    <tr>
                        <td>
                            <input type="text" name="add_text[]" value="" style="width: 95%">
                        </td>
                        <td>
                            <input type="text" name="add_url[]" value="" style="width: 95%">
                        </td>
                        <td></td>
                        <input type="hidden" name="main_id[]" value="<?=$_GET['id'];?>">
                    </tr>
                `)
            }
        </script>