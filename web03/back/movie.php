<button onclick="lof('?do=movie_add')">新增電影</button>
<hr>
<div class="tab">
    <table class="ct" width=100%>
        <tr>
            <td rowspan=3><img src="" alt=""></td>
            <td rowspan=3>分級：</td>
            <td>片名：</td>
            <td>片長：</td>
            <td>上映日期：</td>
        </tr>
        <tr>
            <!-- <td></td> -->
            <!-- <td></td> -->
            <td>
                <input type="button" value="隱藏" onclick="lof('./api/sh.php?do=movie&id=<?=$row['id'];?>')">
            </td>
            <td>
                <input type="button" value="往上" onclick="rank(<?=$row['id'];?>, <?=$prev;?>)">
                <input type="button" value="往下" onclick="rank(<?=$row['id'];?>, <?=$next;?>)">
            </td>
            <td>
                <input type="button" value="編輯電影" onclick="lof('?do=movie_add&id=<?=$row['id'];?>')">
                <input type="button" value="刪除電影" onclick="lof('./api/del.php?do=movie&id=<?=$row['id'];?>')">
            </td>
        </tr>
        <tr>
            <!-- <td></td>
            <td></td> -->
            <td colspan=3>劇情介紹：</td>
            <!-- <td></td>
            <td></td> -->
        </tr>
    </table>
    <hr>
</div>