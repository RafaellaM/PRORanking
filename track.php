<?php
	include("inc/database.php");
?>
<!html>
	<head>
		<title>PRO Rank Tracker</title>
		<link rel="stylesheet" type="text/css" href="css/track.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/graphs.js"></script>
		<script type="text/javascript" src="js/graphcat.js"></script>
		<script type="text/javascript">
			$(function() {
				var rank = [
					<?php
						function do_getdata($database, $nickname, $cat) {
    						$stmt = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `rtype` = '$cat' AND `nickname` = '$nickname'");
    						$stmt->execute();
    						if($stmt->rowCount() < 1){
    							return -1;
    						}
    						else{
								$rank = $stmt->fetch(PDO::FETCH_OBJ);
								return $rank->rdata;
							}
						}
						if(!isset($_GET['u']) && !isset($_GET['c'])){
							die("");
						}
						else{
							$rank_raw = do_getdata($bd, $_GET['u'], $_GET['c']);
							if($rank_raw == -1){
								die("");
							}
							else{
								$rank_pt1 = explode("!", $rank_raw);
								date_default_timezone_set('UTC');
								$rank_dte = date("j/n/y");
								$rank_pos = array_search($rank_dte, $rank_pt1);
								$rank_pt2 = explode("|", $rank_pt1[$rank_pos+1]);
								$rank_pt3 = explode("#", $rank_pt2[1]);
								foreach($rank_pt3 as $rank_hdt){
									$rank_pt4 = explode("-", $rank_hdt);
									echo '["'.$rank_pt4[0].'", '.$rank_pt4[1].'],';
								}
							}
						}
					?>
							];
				$.plot("#rankholder", 
							[ rank ], 
							{
								xaxis: {
    								mode: "categories"
								},
								grid: {
									hoverable: true
								},
								yaxis: {  
									tickDecimals: 0,
									min: 1,
									max: 25,
									ticks: 10,
        								transform: function (v) { return -v; },  
        								inverseTransform: function (v) { return -v; }  
    								}
							}
				);
			});
		</script>
	</head>
	<body>
		<?php
			if($_GET['c'] > 2){
				date_default_timezone_set('UTC');
				echo '
					<span class="font12">'.$_GET['u'].' Rank data</span><br>
					<span class="font22">'.date("F, d").' - PRO Servertime</span><br><br>
					<div id="rankholder"></div>
				';
			}
			else{
				date_default_timezone_set('UTC');
				echo '
					<span class="font1">'.$_GET['u'].' Rank data</span><br>
					<span class="font2">'.date("F, d").' - PRO Servertime</span><br><br>
					<div id="rankholder"></div>
				';
			}
		?>
	</body>
</html>