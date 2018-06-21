<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once './include/common.php';

	$array_data = array();

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

	$json_array_data = json_encode($array_data);

	

	echo $json_array_data;
?>
