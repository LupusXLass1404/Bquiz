<fieldset class="tab aut">
    <legend>最新文章管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="tab aut ct">
            <tr>
                <td width=10%>編號</td>
                <td>標題</td>
                <td width=10%>顯示</td>
                <td width=10%>刪除</td>
            </tr>
            <?php
                $item = 3;
                $page = $_GET['page']??1;
                $start = ($page - 1) * $item;
                $rows = $$db->all(" limit $start, $item");
                foreach($rows as $idx => $row):
            ?>
            <tr>
                <td class="clo"><?=$idx+1+$start;?>.</td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1 ? "checked":'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php endforeach; ?>
        </table>
    
        <style>
            .now {
                font-size: 2rem;
            }
        </style>
        <div class="ct">
            <?php
            if($page > 1) echo "<a href='?do=news&page=" . ($page-1) . "'> &lt </a>";
            
            $max = ceil($$db->count() /$item);
            for($i = 1; $i <= $max; $i++){
                $now = ($i == $page) ? "now" : "";
                echo "<a href='?do=news&page={$i}' class='{$now}'> {$i} </a>";
            }

            if($page < $max) echo "<a href='?do=news&page=" . ($page+1) . "'> &gt </a>";
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確認修改">
        </div>
    </form>
</fieldset>