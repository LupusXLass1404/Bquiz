<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table class="ct">
        <tr class="clo">
            <td width=10%>編號</td>
            <td>問卷題目</td>
            <td width=10%>投票<br>總數</td>
            <td width=10%>結果</td>
            <td width=10%>狀態</td>
        </tr>
        <?php foreach($$db->all(['main_id'=>0]) as $idx => $row): ?>
        <tr>
            <td><?=$idx+1;?>.</td>
            <td style="text-align: left"><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
            <td>
                <?=isset($_SESSION['user']) ? "<a href='?do=vote&id={$row['id']}'>參與<br>投票</a>" :"請先<br>登入";?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>