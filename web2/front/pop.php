<style>
    .intro{
        position: relative;
    }
    .detail{
        background-color: rgba(0, 0, 0, 0.8);
        color: #fff;
        position: absolute;
        display: none;
        width: 400px;
        height: 300px;
        z-index: 9999;
        overflow: auto;
    }
</style>

<fieldset class="aut tab">
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td class="ct" width=30%>標題</td>
            <td class="ct">內容</td>
            <td class="ct" width=15%>人氣</td>
        </tr>
        <?php
            $item = 5;
            $page = $_GET['page'] ?? "1";
            $start = ($page -1) * $item;

            $rows = $News -> all(['sh'=> 1], "order by `like` desc limit ${start}, ${item} ");
            foreach($rows as $idx => $row):
        ?>     
        <tr>
           
            <td class="clo table-title">
                <?=$row['title'];?>
                <span class="detail">
                    <h2><?=$row['title'];?></h2>
                    <?=nl2br($row['text']);?><
                </span>
            </td>
            <td class="table-intro">
                <span class="intro"><?=mb_substr($row['text'],0 ,10);?>...</span>
                <span class="detail">
                    <h2><?=$row['title'];?></h2>
                    <?=nl2br($row['text']);?>
                </span>
            </td>
            <td class="ct">
                <?php
                    // $chkGood = ['user' => $_SESSION['login'], 'news'=>$row['id']];
                    $good =$Good->count(['news' => $row['id']]);
                    $News -> save(['like'=>$good, 'id'=>$row['id']]);
                    echo $good;
                ?>
                個人說<img src="./icon/02B03.jpg" alt="" width=20px>
                <?php
                    if(isset($_SESSION['login'])){
                        $chkGood = ['user' => $_SESSION['login'], 'news'=>$row['id']];
                        $like = $Good->count($chkGood) ? "收回讚" : "讚";
                        echo "- <a class='like' data-id='{$row['id']}'>$like</a>";
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
    $('.like').on('click', function(){
        let a = $(this);
        let id = a.data()['id'];
        $.post("./api/good.php", {id}, function(res){
            console.log(res);
            
            let like = res ? "收回讚" : "讚";
            a.text(like);
        })
    })

    $('.table-title, .table-intro').hover(
        function() {
            $(this).children('.detail').show();
        },
        function(){
            $(this).children('.detail').hide();
        });

</script>