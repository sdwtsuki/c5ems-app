<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once './include/common.php';
	$array_data = array();
	
	if($action=="getnewver"){
		//获取提交参数
		$c_appid   = $appid;   //$_POST['appid'];
		$c_ver     = $ver; //$_POST['version'];
		$c_imei    = $imei; //$_POST['imei'];
		$c_imsi    = "";//$imsi;
		$c_model   = $model;
		$c_vendor  = $vendor;
		$c_user    = $username;
	
		//当前版本信息
		//$appid   = "H52382B2A";
		$appver  = "2017.08.31";
		$title   = "更新提示";
		$note    = "操作界面优化;\n增加字体样式设置;";
		//$url     = "http://139.196.53.2/changhai/app_update/c5ems.".$appver.".apk";
	
		if($c_ver == $appver)
		{
			$t_status = "0";
		}
		else
		{
			$t_status = "1";
	
			$msg = "appid:".$c_appid." "."r:".$c_ver." "."t:".$appver;
			$shijian  = date('Y-m-d H:i:s',time());
			$db->query("INSERT INTO c5_app_updatehis(username,shijian,msg,imei,imsi,model,vendor) VALUES ('$c_user','$shijian','$msg','$c_imei','$c_imsi','$c_model','$c_vendor')");
	
		}
	
		$array_data['status'] = $t_status;
		$array_data['title']  = $title;
		$array_data['note']   = $note;
		//$array_data['url']    = $url;
		$array_data['appver'] = $appver;
		$array_data['appsize'] = intval(1582352);
	}
	







	if($action=="getverlist"){
		$thedata = array();
		$thedata['title'] = "2017.08.30";
		$thedata['data'][0] = "增加字体大小选择，自带大，中，小三种样式";
		$thedata['data'][1] = "增加软件自动登录功能";
		$array_data[] = $thedata;
	
		$thedata = array();
		$thedata['title'] = "2017.07.02";
		$thedata['data'][0] = "增加能耗排行功能";
		$thedata['data'][1] = "完善登录界面";
		$array_data[] = $thedata;
	}
	
	
	
	
	
	$json_array_data = json_encode($array_data);

	

	echo $json_array_data;
?>
