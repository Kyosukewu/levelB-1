			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<?php
				include_once "marq.php";
				?>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<span class="t botli">更多最新消息顯示區</span>

				<?php
				$all = $News->count(['sh' => 1]);
				$div = 5;
				$pages = ceil($all / $div);
				$now = (isset($_GET['p'])) ? $_GET['p'] : 1;
				// $now=(isset($_GET['p']))??1;  //短寫法
				$start = ($now - 1) * $div;
				?>

				<ol start="<?= $start + 1; ?>">
					<?php
					foreach ($News->all(['sh' => 1], " limit $start,$div") as $key => $new) {
					?>
						<li class="sswww" style="margin:3px;"><?= mb_substr($new['text'], 0, 25); ?>
							<div class="all" style="display:none;"><?= $new['text']; ?></div>
						</li>

					<?php
					}
					?>
				</ol>
				<div style="text-align:center;">
					<?php
					if (($now - 1) > 0) {
					?>
						<a class="bl" style="font-size:30px;" href="?do=news&p=<?= $now - 1; ?>">&lt;&nbsp;</a>
					<?php
					}
					for ($i = 1; $i <= $pages; $i++) {
						if ($i == $now) {
							$font = "3.5rem";
						} else {
							$font = "30px";
						}
						echo "<a style='font-size:$font;' href='?do=news&p=$i'> ";
						echo $i;
						echo " </a>";
					}
					if (($now + 1) <= $pages) {
					?>
						<a class="bl" style="font-size:30px;" href="?do=news&p=<?= $now + 1; ?>">&nbsp;&gt;</a>
					<?php
					}
					?>
				</div>
			</div>
			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
			</div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>