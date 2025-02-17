<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="selbig" id="selbig">
        
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>

<table class="all">
    <?php
        $rows = $Type -> all(['big_id'=>0]);
        foreach($rows as $row):
        // ========================大分類開頭========================
    ?>
    <tr class="tt">
        <td><?=$row['name'];?></td>
        <td class="ct" width=30%>
            <button onclick="editType('<?=$row['id'];?>', this)">修改</button>
            <button onclick="del('Type', '<?=$row['id'];?>')">刪除</button>
        </td>
    </tr>

    <?php
        $rows = $Type -> all(['big_id'=>$row['id']]);
        foreach($rows as $row):
        // 中分類開頭
    ?>
    <tr class="pp">
        <td class="ct"><?=$row['name'];?></td>
        <td class="ct">
            <button onclick="editType('<?=$row['id'];?>', this)">修改</button>
            <button onclick="del('Type', '<?=$row['id'];?>')">刪除</button>
        </td>
    </tr>
    <?php
        // 中分類開頭
        endforeach;
    ?>

    <?php
        // ========================大分類結尾========================
        endforeach;
    ?>

</table>

<script>
    getBigs();

    function addType(type){
        let name, big_id;
        switch(type){
            case 'big':
                name=$("#big").val();
                big_id=0;
                break;
                
            case 'mid':
                name=$("#mid").val();
                big_id=$("#selbig").val();
                break;
        }
        
        $.post("./api/save_types.php", {name, big_id}, function(){
            // if(type=='big'){
            //     getBigs();
            //     $("#big").val('');
            // }else{
            //     $("#mid").val('');
            // }
            location.reload();
        })
    }

    function getBigs(){
        $.get("./api/get_big.php", function(bigs){
            console.log(bigs);
            
            $("#selbig").html(bigs);
        })
    }

    function editType(id, dom){
        console.log(id);
        console.log(dom);
        
        let typeName = $(dom).parent().prev().text();
        let name = prompt("請輸入你要修改的分類名稱", typeName);
        if(name){
            $.post("./api/save_types.php", {id,name}, function(res){
                $(dom).parent().prev().text(name);
            })
        }
    }
</script>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="lof('?do=item_add')">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td width=25%>操作</td>
    </tr>
    <?php
        $rows = $Item -> all();
        foreach($rows as $row):
    ?>
    <tr class="pp">
        <td class="ct"><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td class="ct"><?=$row['stock'];?></td>
        <td class="ct"><?=$row['sh']==1?"販售中":"已下架";?></td>
        <td class="ct">
            <button onclick="lof('?do=item_edit&id=<?=$row['id'];?>')">修改</button>
            <button onclick="del('Item', <?=$row['id'];?>)">刪除</button>
            <!-- 如果用 location.reload() 就不用this -->
            <button onclick="sh(<?=$row['id'];?>, 1, this)">上架</button>
            <button onclick="sh(<?=$row['id'];?>, 0, this)">下架</button>
        </td>
    </tr>
    <?php
        endforeach;
    ?>
</table>

<script>
    function sh(id, sh, dom){
        // 如果用 location.reload() 就不用dom
        $.post("./api/sh.php", {id, sh}, function(){
            // location.reload();
            $(dom).parent().prev().text((sh)?'販售中':'已下架');
        })
    }
</script>