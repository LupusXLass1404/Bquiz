<div class="ct">
    <button onclick="lof('?do=admin_add')">新增管理員</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
        $rows = $$db -> all();
        foreach($rows as $row):
    ?>
    <tr class="pp ct">
        <td><?=$row['name'];?></td>
        <td><?=$row['acc'];?></td>
        <td><?=date("Y-m-d",strtotime($row['regdate']));?></td>
        <td>
            <button onclick="lof('?do=mem_edit&id=<?=$row['id'];?>')">編輯</button>
            <button>刪除</button>
        </td>
    <?php
        endforeach;
    ?>
    </tr>
</table>

<?php
    // echo serialize([1,2,3,4,5]);
?>