<?php include_once "./api/db.php";?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
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
		<a title="" href="./index.php">
			<?php
				$row = $Title -> find(['sh'=>1]);
			?>
			<div class="ti" style="background:url(&#39;./upload/<?=$row['img'];?>&#39;); background-size:cover;" title="<?=$row['text'];?>"></div><!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor image cent">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
						$rows = $Menu -> all(['main_id'=>0]);
						foreach($rows as $row):
					?>
						<a href="<?=$row['url'];?>"><div class="mainmu"><?=$row['text'];?>
					<?php
							$mws = $Menu -> all(['main_id'=>$row['id']]);
							foreach($mws as $mw):
					?>
							<a class="mw" href="<?=$mw['url'];?>" style="display: none;"><div class="mainmu2"><?=$mw['text'];?></div></a>
					<?php
							endforeach;
					?>
						</div></a>
					<?php
						endforeach;
					?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<?php
						$row = $Total -> find(1);
					?>
					<span class="t">進站總人數 : <?=$row['total'];?> </span>
				</div>
			</div>
			<?php
				$do = $_GET['do'] ?? 'main';
				$file = "./front/{$do}.php";
				if(!file_exists($file)) $do = 'main';

				include("./front/{$do}.php")
			?> 
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
					onclick="lo(&#39;?do=login&#39;)"><?=isset($_SESSION['login']) ? "返回管理" : "管理登入";?></button>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="image">
						<?php
							$item = 3;
							$page = $_GET['page'] ?? 1;
							$start = ($page - 1);
							echo "<div style='height: 20px'>";
							if($page > 1){
								echo " <a href='?do={$do}&page=" . $page - 1 . "'> <img src='./icon/up.jpg' width=20px> </a> ";
							}			
							echo "</div>";
							
							$rows = $Image -> all(['sh'=>1], " limit $start, ${item}");
							foreach ($rows as $row){
								echo "<img src='./upload/{$row['img']}' width=150px style='height: 103px'>";
							}

							$num = ceil(($Image -> count(['sh'=>1])));
							if($page < $num - 2){
								echo " <a href='?do={$do}&page=" . $page + 1 . "'> <img src='./icon/dn.jpg' width=20px> </a> ";
							}
						?>
					</div>
					<script>
						var nowpage = 1, num = 3;
						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) { nowpage--; }
							if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) { nowpage++; }
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div
			style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;">
				<?php
					$row = $Bottom -> find(1);
					echo $row['bottom'];
				?>
			</span>
		</div>
	</div>

</body>

</html>