<?php
	include("inc/rank_types.php");
	include("inc/database.php");
	include("inc/rank_data.php");
?>
<!html>
	<head>
		<title>PRORank Test</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div id="top_bg">
			<span id="logo">
				PRORanking - Updated Ladder
			</span>
		</div><br><br>
		<div id="buttons_holder">
			<span class="font1">Select a rank type bellow</span><br><br>
			<a href="/0"><?php if($ranktype == 0){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Ranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/1"><?php if($ranktype == 1){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Unranked</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/2"><?php if($ranktype == 2){echo '<button class="button_pressed">';}else{echo '<button class="button_normal">';}?>Hours</button></a>
		</div><br><br><br>
		<table id="rank_table">
			<tr class="rank_column">
				<th width="10%">Rank</th>
				<th width="40%">Nickname</th>
				<th width="50%">Data</th>
			</tr>
			<?php do_getrank($bd,$ranktype); ?>
		</table><br>
	</body>
</html>
