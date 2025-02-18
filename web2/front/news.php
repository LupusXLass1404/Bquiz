<fieldset class="tab aut">
    <legend>目前位置：首頁 > 最新文章</legend>
    <table>
        <tr>
            <td class="ct" width=30%>標題</td>
            <td class="ct">內容</td>
            <td width=10%></td>
        </tr>
        <?php
            $item = 5;
            $page = $_GET['page'] ?? "1";
            $start = ($page -1) * $item;

            $rows = $News -> all(['sh'=> 1], " limit ${start}, ${item}");
            foreach($rows as $idx => $row):
        ?>     
        <tr>
            <td class="clo"><?=$row['title'];?></td>
            <td>
                <span class="intro"><?=mb_substr($row['text'],0 ,10);?>...</span>
                <span class="detail"style="display:none;"><?=nl2br($row['text']);?></span>
            </td>
            <td class="ct">
                <?php
                    if(isset($_SESSION['login'])){
                        $chkGood = ['user' => $_SESSION['login'], 'news'=>$row['id']];
                        $like = $Good->count($chkGood) ? "收回讚" : "讚";
                        echo "<a class='like' data-id='{$row['id']}'>$like</a>";
                    }
                ?>
            </td>
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
            $max = $rows = ceil( ($News -> count()) / $item );
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
</fieldset>
<script>
    $(".clo").on("click",function(){
        // console.log($(this));
        // console.log($(this).next().children(".intro,.detail"));
        
        $(this).next().children(".intro, .detail").toggle();
    })

    $('.like').on('click', function(){
        let a = $(this);
        let id = a.data()['id'];
        $.post("./api/good.php", {id}, function(res){
            console.log(res);
            
            let like = res ? "收回讚" : "讚";
            a.text(like);
        })
    })

</script>