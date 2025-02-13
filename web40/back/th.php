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
        // 大分類開頭
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
        // 大分類結尾
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
    <button>新增商品</button>
</div>
<div class="ct">
    <select name="selbig" id="selbig">

    </select>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td width=25%>操作</td>
    </tr>
    <tr class="pp">
        <td class="ct">05</td>
        <td>造反</td>
        <td class="ct">優雅</td>
        <td class="ct">時尚</td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>