<?php
	include("inc/rank_types.php");
	include("inc/database.php");
	include("inc/rank_data.php");
?>
<!html>
	<head>
		<title>PRO-Ranking</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div id="<?php if($divi == 0){echo "top_bg";}else{echo "top_bg2";}?>">
			<span id="logo">
				PRO-Ranking - Updated Ladder
			</span>
		</div><br><br>
		<div id="buttons_holder">
			<span class="<?php if($divi == 0){echo "font1";}else{echo "font12";}?>">Select a rank type bellow</span><br><br>
			<a href="/0"><?php if($ranktype == 0){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Ranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/1"><?php if($ranktype == 1){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Unranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/2"><?php if($ranktype == 2){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Hours</button></a><br><br>
			<a href="/3"><?php if($ranktype == 3){echo '<button class="button_pressed_2">';}else{echo '<button class="button_normal_2">';}?>Ranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/4"><?php if($ranktype == 4){echo '<button class="button_pressed_2">';}else{echo '<button class="button_normal_2">';}?>Unranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/5"><?php if($ranktype == 5){echo '<button class="button_pressed_2">';}else{echo '<button class="button_normal_2">';}?>Hours</button></a>
		</div><br><br><br>
		<table id="rank_table">
			<tr class="<?php if($divi == 0){echo "rank_column";}else{echo "rank_column2";}?>">
				<th width="10%">Rank</th>
				<th width="40%">Nickname</th>
				<th width="50%">Data</th>
			</tr>
			<?php do_getrank($bd,$ranktype); ?>
		</table><br>
	</body>
</html>