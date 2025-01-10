<style>
.movie_list li {
    padding: 4px 0;
}
.movie_list label{
    display: inline-block;
    width: 100px;
    text-align-last: justify;
}
</style>

<?php
$row= $Movie -> find($_GET['id']);

list($year, $month, $day) = explode("-", $row['ondate']);
?>

<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
    <table width=100% style="border: 1px soild #000; margin: 0 auto;">
        <tr>
            <td>影片資料</td>
            <td width=90%>
                <ul class="movie_list">
                    <li>
                        <label for="">片名</label>：
                        <input type="text" name="name" value="<?=$row['name'];?>">
                    </li>
                    <li>
                        <label for="">分級</label>：
                        <select name="level" id="">
                            <option value="1" <?=$row['level'] == 1 ? "selected" : "";?>>普通級</option>
                            <option value="2" <?=$row['level'] == 2 ? "selected" : "";?>>保護級</option>
                            <option value="3" <?=$row['level'] == 3 ? "selected" : "";?>>輔導級</option>
                            <option value="4" <?=$row['level'] == 4 ? "selected" : "";?>>限制級</option>
                        </select>
                    </li>
                    <li>
                        <label for="">片長</label>：
                        <input type="number" name="length" value="<?=$row['length'];?>">
                    </li>
                    <li>
                        <label for="">上映日期</label>：
                        <select name="year" id="">
                            <option value="2025" <?=$year == 2025 ? "selected" : "";?>>2025</option>
                            <option value="2026" <?=$year == 2026 ? "selected" : "";?>>2026</option>
                        </select>年
                        <select name="month" id="" >
                            <?php
                                for($i = 1 ; $i<=12; $i++){
                                    $selected = ($i == $month) ? "selected" : "";
                                    echo "<option value='{$i}' {$selected}>{$i}</option>";
                                }
                            ?>
                        </select>月
                        <select name="day" id="">
                            <?php
                                for($i = 1 ; $i <= 31; $i++){
                                    $selected = ($i == $day) ? "selected" : "";
                                    echo "<option value='{$i}' {$selected}>{$i}</option>";
                                }
                            ?> 
                        </select>日
                    </li>
                    <li>
                        <label for="">發行商</label>：
                        <input type="text" name="publish" value="<?=$row['publish'];?>">
                    </li>
                    <li>
                        <label for="">導演</label>：
                        <input type="text" name="director" value="<?=$row['director'];?>">
                    </li>
                    <li>
                        <label for="">預告影片</label>：
                        <input type="file" name="trailer">
                    </li>
                    <li>
                        <label for="">電影海報</label>：
                        <input type="file" name="poster">
                    </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                劇情介紹
            </td>
            <td>
                <textarea name="intro" style="width: 95%;"><?=$row['intro'];?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>