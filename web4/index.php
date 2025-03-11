<?php include_once './api/db.php';?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg" width="40%">
            </a>
            <div style="padding:10px; display: inline-block;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                    if(isset($_SESSION['mem'])){
                        echo "<a href='./api/logout.php?do=mem'>登出</a>";
                    } else {
                        echo "<a href='?do=login'>會員登入</a>";
                    }
                ?> |
                <?php
                    if(isset($_SESSION['admin'])){
                        echo "<a href='./admin.php'>返回管理</a>";
                    } else {
                        echo "<a href='?do=admin'>管理登入</a>";
                    }
                ?>
            </div>
            <br>
            <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="?type=0">全部商品(<?=$Good->count(['sh'=>1]);?>)</a>
                <?php foreach($Class->all(['main_id'=>0]) as $row): ?>
                    <div class="ww">
                        <a href="?type=<?=$row['id'];?>"><?=$row['text'];?>(<?=$Good->count(['sh'=>1,'main'=>$row['id']]);?>)</a>
                        <div class="s">
                            <?php foreach($Class->all(['main_id'=>$row['id']]) as $row): ?>
                                <a href="?type=<?=$row['id'];?>" style="background-color:#CCC"><?=$row['text'];?>(<?=$Good->count(['sh'=>1,'sub'=>$row['id']]);?>)</a>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">00005</div>
            </span>
        </div>
        <div id="right" style="height:300px; overflow:auto;">
            <?php
                $do = $_GET['do']??'main';
                $file = "./front/$do.php";

                if(!file_exists($file)) $do = 'main';
                $db = ucfirst($do);

                include "./front/$do.php";
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            <?=$Bot->find(1)['text'];?> </div>
    </div>

</body>

</html>