<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once './include/common.php';

	$array_data = array();
	$i = 1 ;
	
	if($alarmType == "comAlarm"){
		
		$array_data['parcount']  = 3;
		$array_data['records'][0]['par01']  = "排名";
		$array_data['records'][0]['par02']  =  "地址";
		$array_data['records'][0]['par03']  =  "日期";
		
		$sql = "SELECT * FROM c5_device order by ytime desc limit 0,1";
		$item1 = $db->fetch_one_array($sql);
		$std_time    = $item1['riqi']." ".$item1['shijian'].":00";
		
		$sql = "SELECT * from c5_device";
		$query= $db->query($sql);
		while($device = $db->fetch_array($query)) {
			
			
			$t_thetime  = $device['riqi']." ".$device['shijian'];
			$t_mincount = (strtotime($std_time) - strtotime($t_thetime))/60 ;
			if($t_mincount>60*24)
			{
				$array_data['records'][$i]['Id']    =  $device['id'];
				$array_data['records'][$i]['ComID']    =  $device['comid'];
				$array_data['records'][$i]['par01']  = $i;
				$array_data['records'][$i]['par02']  =  $device['lou']."楼".$device['roomno']."室";
				$array_data['records'][$i]['par03']  =  $device['riqi'];
				$array_data['records'][$i]['par001']  =  $device['par001'];
				$array_data['records'][$i]['energytype']  =  $device['energytype'];
				
				
				$i = $i + 1;
				
				
			}
		}
		

	}else if($alarmType == "dataAlarm"){
		
		$array_data['parcount']  = 3;
		$array_data['records'][0]['par01']  = "排名";
		$array_data['records'][0]['par02']  =  "地址";
		$array_data['records'][0]['par03']  =  "用量";
		
		
		
		$sql = "SELECT * from c5_device order by par001 desc limit 0,5";
		$query= $db->query($sql);
		while($device = $db->fetch_array($query)) {
			
			$array_data['records'][$i]['Id']    =  $device['id'];
			$array_data['records'][$i]['ComID']    =  $device['comid'];
			$array_data['records'][$i]['par01']  = $i;
			$array_data['records'][$i]['par02']  =  $device['lou']."楼".$device['roomno']."室";
			$array_data['records'][$i]['par03']  =  $device['par001'];
			$array_data['records'][$i]['energytype']  =  $device['energytype'];
			
			$i = $i + 1;
	
		}
		
		
	}
	
	
	$array_data['count'] = $i-1;	
	$array_data['tablewidth'] = "345px";	
	$json_array_data = json_encode($array_data);

	echo $json_array_data;
?>