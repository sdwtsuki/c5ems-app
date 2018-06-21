<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once './include/common.php';


	$array_data = array();
	$i = 0 ;
	$sql = "SELECT distinct lou from c5_device";
	$query= $db->query($sql);
	while($device = $db->fetch_array($query)) {
		$array_data['lou'][$i]  =  $device['lou'];	
		$i = $i + 1;
	}
	
	
	$j = 0;
	$sql = "SELECT distinct floor from c5_device";
	$query= $db->query($sql);
	while($device = $db->fetch_array($query)) {
		//$array_data['records'][$i]['Id']    =  $device['id'];
		//$array_data['records'][$i]['ComID']    =  $device['comid'];
		if($device['floor'] != "0"){
			$array_data['floor'][$j]  =  $device['floor'];		
		}
		$j = $j + 1;
	}

	$array_data['count1'] = $i - 1;
	$array_data['count2'] = $j - 1;
	
	$json_array_data = json_encode($array_data);

	echo $json_array_data;
?>
