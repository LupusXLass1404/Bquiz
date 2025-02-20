<fieldset class="tab aut">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="tab aut ct">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
                $items = 3;
                $page = $_GET['page']??1;
                $start = ($page - 1) * 3;
                $rows = $$db->all("limit $start, $items");
                foreach($rows as $row):
            ?>
            <tr>
                <td class="clo"><?=$idx+1;?></td>
                <td></td>
                <td><input type="checkbox" name="sh[]"></td>
                <td><input type="checkbox" name="del[]"></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
    
    <div class="ct">
        if($page > 1){
            echo "<a href='?do=news&page={$page-1}'> &lt </a>";
        }

        
    </div>
    <div class="ct">
        <input type="submit" value="確認修改">
    </div>
</fieldset>