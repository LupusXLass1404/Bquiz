<style>
    .poster_list{
        display: flex; 
        justify-content: space-between;
        text-align: center;
    }
    .poster_list div{
        width: 24%;
    }
</style>
<form action="./api/edit_poster.php" method="post">
    <div style="height: 260px; overflow:auto;">
        <h3 class="ct">新增預告片清單</h3>
        <div class="poster_list" style="">
            <div>預告片海報</div>
            <div>預告片片名</div>
            <div>預告片排序</div>
            <div>操作</div>
        </div>

        <?php
        $rows = $Poster->all(" order by rank");
        foreach($rows as $idx => $row):
            $prev = ($idx != 0) ? $rows[$idx - 1]['id'] : $row['id'];
            $next = ($idx != (count($rows) - 1)) ? $rows[$idx + 1]['id'] : $row['id'];
        ?>
        <div class="poster_list" style="">
            <div><img src="./upload/<?=$row['img']?>" alt="" style="width: 80px"></div>
            <div><input type="text" name="name[]" value="<?=$row['name'];?>"></div>
            <div>
                <input type="button" value="往上" class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$prev;?>">
                <input type="button" value="往下" class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$next;?>">
            </div>
            <div>
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>顯示
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>" >刪除
                <select name="ani[]" id="" >
                    <option value="1"  <?=($row['ani']==1)?"selected":"";?>>淡入淡出</option>
                    <option value="2"  <?=($row['ani']==2)?"selected":"";?>>縮放</option>
                    <option value="3"  <?=($row['ani']==3)?"selected":"";?>>滑入滑出</option>
                </select>
            </div>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </div>
        <hr>
        <?php
        endforeach;
        ?>
        
    </div>
    <div class="ct" style="height: 40px;">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>

<script>
    $(".sw").on("click", function(){
        let id = $(this).data('id');
        let sw = $(this).data('sw');

        $.post("./api/sw.php", {table: 'Poster', id, sw}, ()=>{
            location.reload();
        })
    })
</script>

<hr>

<div style="height: 170px;">
    <h3 class="ct">新增預告片海報</h3>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>預告片海報：</td>
                <td><input type="file" name="img" id=""></td>
                <td>預告片片名：</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
