﻿<?php include_once "api/db.php";

if(!isset($_SESSION['login'])){
    echo "請從登入頁登入<a href='index.php?do=login'>管理登入</a>";
    exit();
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <div id="main">
        <a title="<?=$Title->find(['sh'=>1])['text'];?>" href="./index.php">
            <div class="ti"
                style="background:url('./upload/<?=$Title->find(['sh'=>1])['img'];?>'); background-size:cover;"></div>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">後台管理選單</span>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=title">
                        <div class="mainmu">
                            網站標題管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=ad">
                        <div class="mainmu">
                            動態文字廣告管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=mvim">
                        <div class="mainmu">
                            動畫圖片管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=image">
                        <div class="mainmu">
                            校園映象資料管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        onclick="op('#cover','#cvr','./modal/total.php')">
                        <div class="mainmu">
                            進站總人數管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;"
                        onclick="op('#cover','#cvr','./modal/bottom.php')">
                        <div class="mainmu">
                            頁尾版權資料管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=news">
                        <div class="mainmu">
                            最新消息資料管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin">
                        <div class="mainmu">
                            管理者帳號管理 </div>
                    </a>
                    <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=menu">
                        <div class="mainmu">
                            選單管理 </div>
                    </a>


                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?=$Total->find(1)['total'];?> </span>
                </div>
            </div>
            <?php
				$do = $_GET['do'] ?? 'title';
                $Do = ucfirst($do);
				$file="./backend/{$do}.php";

				if(!file_exists($file)) to("./admin.php?do=title");

				include $file;
			?>

        </div>
        <div style="clear:both;"></div>
        <div
            style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;">
                <?=$Bottom->find(1)['text'];?>
            </span>
        </div>
    </div>

</body>

</html>