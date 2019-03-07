<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付跳转�?..</title>
</head>
<?php
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
sesCheck();

require_once("yun.config.php");
require_once("lib/yun_md5.function.php");

$userid=returnuserid($_SESSION["SHOPUSER"]);
$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=sqlzhuru($_POST[t1]);
$ddbh=time().$userid.rnd_num(1000);	
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$ddbh."',".$userid.",'".$sj."','".$uip."',".$money1.",'wait','','yunpay',0");

		

/**************************请求参数**************************/
		
		//商户订单�?
        $out_trade_no =$ddbh;//商户网站订单系统中唯一订单号，必填

        //订单�᫧�
        $subject = weburl;//必填

        //付款金额
        $total_fee = $money1;//必填 需为整�?

        //订单描述

        $body = $subject;
		
		
		//���务器��步通知页���路��
        $nourl = weburl."user/yunpay/no_url.php";
        //需http://�ݼ���Є��整路径，不能��?id=123这类���定义参�?

        //页���跳转同步�͚知页���路��
        $reurl = weburl."user/paylog.php";
        //需http://�ݼ���Є��整路径，不能��?id=123这类���定义参数，不能写成http://localhost/
       
		//商品屿���地址
        $orurl = "";
        //需http://�ݼ���Є��整路径，不能��?id=123这类���定义参数，如�ʦ网站带有 参数请彩用伪�Ǚ态或短网址解决

        //商品形象�ƾ片地址
        $orimg = "";
        //需http://�ݼ���Є��整路径，必须为图片��整地址

/************************************************************/

//构造要请求�Є参数数组，�ߠ需改动
$parameter = array(
		"partner" => trim($yun_config['partner']),
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"nourl"	=> $nourl,
		"reurl"	=> $reurl,
		"orurl"	=> $orurl,
		"orimg"	=> $orimg
);

//建立请求

$html_text = i2e($parameter, "支付进行�?..");
echo $html_text;


?>
</body>
</html>