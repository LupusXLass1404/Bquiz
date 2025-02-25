<?php 
    $row = $Movie -> find($_GET['id']);
    list($year, $month, $day) = explode('-', $row['ondate']);
?>
<form class="tab" action="./api/movie_save.php" method="post" enctype="multipart/form-data">
    <table width=100% class="clo">
        <tr>
            <td>片名：</td>
            <td><input type="text" name="name" id="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td>分級：</td>
            <td>
                <select name="rating" id="rating">
                    <option value="1" <?=$row['rating']==1?'selected':'';?>>普遍級</option>
                    <option value="2" <?=$row['rating']==2?'selected':'';?>>保護級</option>
                    <option value="3" <?=$row['rating']==3?'selected':'';?>>輔導級</option>
                    <option value="4" <?=$row['rating']==4?'selected':'';?>>限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>片長：</td>
            <td><input type="text" name="lenght" id="lenght" value="<?=$row['lenght'];?>">（分）</td>
        </tr>
        <tr>
            <td>上映日期：</td>
            <td>
                <select name="year" id="year">
                    <option value="2025" <?=$year==2025?'selected':'';?>>2025</option>
                    <option value="2026" <?=$year==2026?'selected':'';?>>2026</option>
                </select> 年 
                <select name="month" id="month">
                    <?php for($i=1; $i <= 12; $i++) echo "<option value='$i' ". ($month==$i?'selected':'') .">$i</option>"; ?>
                </select> 月 
                <select name="day" id="day">
                    <?php for($i=1; $i <= 31; $i++) echo "<option value='$i' ". ($day==$i?'selected':'') .">$i</option>"; ?>
                </select> 日 
            </td>
        </tr>
        <tr>
            <td>發行商：</td>
            <td><input type="text" name="publish" id="publish" value="<?=$row['publish'];?>"></td>
        </tr>
        <tr>
            <td>導演：</td>
            <td><input type="text" name="director" id="director" value="<?=$row['director'];?>"></td>
        </tr>
        <tr>
            <td>預告影片：</td>
            <td><input type="file" name="trailer" id="trailer"></td>
        </tr>
        <tr>
            <td>電影海報：</td>
            <td><input type="file" name="poster" id="poster"></td>
        </tr>
        <tr>
            <td>劇情簡介：</td>
            <td><textarea name="intro" id="intro"><?=$row['intro'];?></textarea></td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id'];?>">
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </div>
</form>