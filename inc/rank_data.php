<?php 
	function do_getrank($database,$cat) {
    	$stmt = $database->prepare("SELECT `rank`,`nickname`,`data` FROM `rank_new` WHERE `cat` = '$cat'");
    	$stmt->execute();
    	$rank = $stmt->fetchAll(PDO::FETCH_OBJ);
    	foreach($rank as $rankdata){
    		$stmt2 = $database->prepare("SELECT `rank` FROM `rank_old` WHERE `nickname` = '$rankdata->nickname'");
    		$stmt2->execute();
    		$rankdata2 = $stmt2->fetch(PDO::FETCH_OBJ);
    		if($rankdata->rank % 2 < 1){
    			$header = '<tr class="rank_white">';
    		}
    		else{
    			$header = '<tr class="rank_red">';
    		}
    		echo '
				'.$header.'
					<td width="10%">'.$rankdata->rank.'
			';
			if($rankdata->rank > $rankdata2->rank){
				$proccessed = $rankdata->rank - $rankdata2->rank;
				echo '<span style="color:red">- '.$proccessed.'</span>';
			}
			elseif($rankdata->rank < $rankdata2->rank){
				$proccessed = $rankdata2->rank - $rankdata->rank;
				echo '<span style="color:green">+ '.$proccessed.'</span>';
			}
			else{
				echo '';
			}
			echo '</td>
					<td width="40%">'.$rankdata->nickname.'</td>
					<td width="50%">
			';
			switch($cat){
				case 0:
				case 1:
					$Rank_2 = explode("-",$rankdata->data);
					$data_format = "Ratting: $Rank_2[0] - W: $Rank_2[1] - L: $Rank_2[2]";
					break;
				case 2:
					$data_format = "$rankdata->data Hours";
					break;
			}
			echo ''.$data_format.'</td>
				</tr>
    		';
    	}
	}