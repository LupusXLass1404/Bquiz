<fieldset class="tab aut">
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr class="ct">
            <td width=10%>編號</td>
            <td>問卷題目</td>
            <td width=10%>投票<br>總數</td>
            <td width=10%>結果</td>
            <td width=10%>狀態</td>
        </tr>
        <?php
            $rows = $Que->all(['main_id'=>0]);
            foreach($rows as $idx => $row):
        ?>
        <tr>
            <td class="ct"><?=$idx+1;?></td>
            <td><?=$row['text'];?></td>
            <td class="ct"><?=$Que->sum("vote",['main_id'=>$row['id']]);?></td>
            <td class="ct"><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
            <td class="ct">
                <?php
                    if(isset($_SESSION['login'])){
                        echo "<a href='?do=vote&id={$row['id']}'>參與<br>投票</a>";
                    } else {
                        echo "請先<br>登入";
                    }
                ?>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
</fieldset>