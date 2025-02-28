<?php
    $row = $Movie->find($_GET['id']);
    list($year, $month, $day) = explode('-', $row['ondate']);
?>
<form action="./api/movie_save.php" class="tab" method="post" enctype="multipart/form-data">
    <table width=100%>
        <tr>
            <td class="clo" width=20%>片名：</td>
            <td><input type="text" name="name" id="" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="clo">分級：</td>
            <td>
                <select name="rating" id="">
                    <option value="1" <?=$row['rating']==1?'selected':'';?>>普遍級</option>
                    <option value="2" <?=$row['rating']==2?'selected':'';?>>保護級</option>
                    <option value="3" <?=$row['rating']==3?'selected':'';?>>輔導級</option>
                    <option value="4" <?=$row['rating']==4?'selected':'';?>>限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="clo">片長：</td>
            <td><input type="text" name="length" id="" value="<?=$row['length'];?>"></td>
        </tr>
        <tr>
            <td class="clo">上映日期：</td>
            <td>
                <select name="year" id="">
                    <option value="2025" <?=$year==2025?'selected':'';?>>2025</option>
                    <option value="2026" <?=$year==2026?'selected':'';?>>2026</option>
                </select> 年
                <select name="month" id="">
                    <?php
                        for($i = 1; $i <=12; $i++){
                            $select = $month == $i ? 'selected' : '';
                            echo "<option value='$i' $select>";
                            echo $i;
                            echo "</option>";
                        }
                    ?>
                </select> 月
                <select name="day" id="">
                    <?php
                        for($i = 1; $i <=31; $i++){
                            $select = $day == $i ? 'selected' : '';
                            echo "<option value='$i' $select>";
                            echo $i;
                            echo "</option>";
                        }
                    ?>
                </select> 日
            </td>
        </tr>
        <tr>
            <td class="clo">發行商：</td>
            <td><input type="text" name="publish" id="" value="<?=$row['publish'];?>"></td>
        </tr>
        <tr>
            <td class="clo">導演：</td>
            <td><input type="text" name="director" id="" value="<?=$row['director'];?>"></td>
        </tr>
        <tr>
            <td class="clo">預告影片：</td>
            <td><input type="file" name="trailer" id=""></td>
        </tr>
        <tr>
            <td class="clo">電影海報：</td>
            <td><input type="file" name="poster" id=""></td>
        </tr>
        <tr>
            <td class="clo">劇情簡介：</td>
            <td><textarea name="intro" id=""><?=$row['intro'];?></textarea></td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>
