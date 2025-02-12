<form action="./api/edit.php?do=<?=$_GET['do'];?>" method="post">
    <table class= "tab aut">
        <tr class="clo ct">
            <td width=10%>編號</td>
            <td>標題</td>
            <td width=10%>顯示</td>
            <td width=10%>刪除</td>
        </tr>
        <?php
            $item = 3;
            $page = $_GET['page'] ?? "1";
            $start = ($page -1) * $item;

            $rows = $$db -> all(" limit ${start}, ${item}");
            foreach($rows as $idx => $row):
        ?>
        <tr c>
            <td class="clo ct"><?=$idx + 1 + $start;?>.</td>
            <td><?=$row['title'];?></td>
            <td class="ct"><input type="checkbox" name="sh[]" id="sh" value="<?=$row['id'];?>" <?=$row['sh']==1 ? "checked":"";?>></td>
            <td class="ct"><input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <div class="ct">
        
        <?php
            if($page > 1):
        ?>
            <a href="?do=<?=$_GET['do'];?>&page=<?=$page - 1;?>"> < </a>
        <?php
            endif;
        ?>

        <?php
            $max = $rows = ceil( ($$db -> count()) / $item );
            for($i = 1; $i <= $max; $i++):
                
        ?>
            <a href="?do=<?=$_GET['do'];?>&page=<?=$i;?>" style="font-size: <?=$page == $i ? "24" : "16";?>px;"> <?=$i;?> </a>
        <?php
            endfor;
        ?>

        <?php
            if($page < $max):
        ?>
            <a href="?do=<?=$_GET['do'];?>&page=<?=$page + 1;?>"> > </a>
        <?php
            endif;
        ?>

    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>
