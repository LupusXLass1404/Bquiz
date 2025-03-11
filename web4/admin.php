<?php include_once './api/db.php';?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
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
			<a href="./index.php">
				<img src="./icon/0416.jpg" width=45%>
			</a>
			<img src="./icon/0417.jpg" width=20%>
		</div>
		<div id="left" class="ct">
			<div style="min-height:300px;">
				<a href="?do=admin">管理權限設置</a>
				<?php
				$row=$Admin->find(['acc'=>$_SESSION['admin']]);
				$per=unserialize($row['per']);
				?>
				<?php if(in_array(1,$per)) echo "<a href='?do=th'>商品分類與管理</a>";?>
				<?php if(in_array(2,$per)) echo "<a href='?do=order'>訂單管理</a>";?>
				<?php if(in_array(3,$per)) echo "<a href='?do=mem'>會員管理</a>";?>
				<?php if(in_array(4,$per)) echo "<a href='?do=bot'>頁尾版權管理</a>";?>
				<?php if(in_array(5,$per)) echo "<a href='?do=news'>最新消息管理</a>";?>
				<a href="./api/logout.php?do=admin" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right" style="height:300px; overflow:auto;">
			<?php
                $do = $_GET['do']??'main';
                $file = "./back/$do.php";

                if(!file_exists($file)) $do = 'main';
                $db = ucfirst($do);

                include "./back/$do.php";
            ?>
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
			<?=$Bot->find(1)['text'];?> </div>
	</div>

</body>

</html>