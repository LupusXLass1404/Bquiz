<div class="ct">
    <button onclick="lof('?do=admin_add')">新增管理員</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
        $rows = $$db -> all();
        foreach($rows as $row):
    ?>
    <tr class="pp ct">
        <td><?=$row['acc'];?></td>
        <td><?=str_repeat("*", strlen($row['pw']))?></td>
        <td>
        <?php
            if($row['acc'] == 'admin'):
                echo "此帳號為最高權限";
            else:
        ?>
                <button onclick="lof('?do=admin_edit&id=<?=$row['id'];?>')">編輯</button>
                <button onclick="lof('./api/del_admin.php?id=<?=$row['id'];?>')">刪除</button>
        <?php 
            endif;
        ?>
        </td>
    <?php
        endforeach;
    ?>
    </tr>
</table>

<?php
    // echo serialize([1,2,3,4,5]);
?>