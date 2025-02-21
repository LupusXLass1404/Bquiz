<style>
    .detail{
        display: none;
    }
</style>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table class="aut">
        <tr class="ct">
            <td width=40%>標題</td>
            <td>內容</td>
            <td width=10%></td>
        </tr>
        <?php 
        $item = 5;
        $page = $_GET['page']??1;
        $start = ($page - 1) * $item;
        $rows = $$db->all(" limit $start, $item");
        foreach($rows as $row):
        ?>
        <tr>
            <td class="clo"><?=$row['title'];?></td>
            <td>
                <span class="intro"><?=mb_substr($row['text'],0, 20);?> ...</span>
                <span class="detail"><?=nl2br($row['text']);?></span>
            </td>
            <td>
                <?php
                    if(isset($_SESSION['user'])){
                        $good = $Good -> count(['news'=>$row['id'], 'user'=>$_SESSION['user']])? "收回讚" : "讚";
                        echo "<a class='like' data-id='{$row['id']}'>$good</a>";
                    }
                ?>

            </td>
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
</fieldset>

<script>
    $(".clo").on('click', function(){
        $(this).next().children('.intro, .detail').toggle();
    })

    $(".like").on('click', function(){
        const a = $(this);
        const news = a.data()['id'];
        // console.log(news);
        
        $.post('./api/good.php', {news}, function(res){
            console.log(res);
            
            let like = res ? "讚" : "收回讚";

            a.text(like);
        })
    })

</script>
    
