<form action="./api/movie_save.php" class="tab" method="post" enctype="multipart/form-data">
    <table width=100%>
        <tr>
            <td class="clo" width=20%>片名：</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="clo">分級：</td>
            <td>
                <select name="rating" id="">
                    <option value="1">普遍級</option>
                    <option value="2">保護級</option>
                    <option value="3">輔導級</option>
                    <option value="4">限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="clo">片長：</td>
            <td><input type="text" name="length" id=""></td>
        </tr>
        <tr>
            <td class="clo">上映日期：</td>
            <td>
                <select name="year" id="">
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select> 年
                <select name="month" id="">
                    <?php
                        for($i = 1; $i <=12; $i++){
                            echo "<option value='$i'>";
                            echo $i;
                            echo "</option>";
                        }
                    ?>
                </select> 月
                <select name="day" id="">
                    <?php
                        for($i = 1; $i <=31; $i++){
                            echo "<option value='$i'>";
                            echo $i;
                            echo "</option>";
                        }
                    ?>
                </select> 日
            </td>
        </tr>
        <tr>
            <td class="clo">發行商：</td>
            <td><input type="text" name="publish" id=""></td>
        </tr>
        <tr>
            <td class="clo">導演：</td>
            <td><input type="text" name="director" id=""></td>
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
            <td><textarea name="intro" id=""></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
