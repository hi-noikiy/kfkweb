<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付跌�����?..</title>
</head>
<?php
include("../../config/conn.php");
include("../../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$sj=date("Y-m-d H:i:s");
include("../buycheck.php");
if(sqlzhuru($_POST[jvs])=="carpay"){
if($needmoney<=$usermoney){Audit_alert("��的可用余额儲���Q�请用余额直接支��㿽?,"../carpay.php?carid=".$carid);}
zwzr();
updatetable("yjcode_user","uqq='".sqlzhuru($_POST[tuqq])."' where uid='".$_SESSION[SHOPUSER]."'");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$ddbh=time()."|".$rowuser[id];	
$money1=($needmoney*10-$usermoney*10)/10;
$buyformarr=sqlzhuru($_POST[buyformv]);
$shdzarr=sqlzhuru($_POST[shdzv]);
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok,probh,pronum,tcid,buyform,shdz","'".$bh."','".$ddbh."',".$rowuser[id].",'".$sj."','".$uip."',".$money1.",'wait','','yunpay',0,'".$bharr."','".$numarr."','".$tcidarr."','".$buyformarr."','".$shdzarr."'");
}
require_once("yun.config.php");
require_once("lib/yun_md5.function.php");

		

/**************************��h��参数**************************/
		
		//商户订单�?
        $out_trade_no =$ddbh;//商户�|�站订单�p����中唯一订单��P��必填

        //订单�᫧�
        $subject = weburl;//必填

        //付款金额
        $total_fee = $money1;//必填 需为整�?

        //订单描述

        $body = subject;
		
		
		//���务器��步通知���Ǣ路�?
        $nourl = weburl."user/yunpay/buy_no_url.php";
        //需http://�ݼ���Є��整�\径，不能�?id=123����类���定义参�?

        //���Ǣ跌��{同步�͚知���Ǣ路�?
        $nourl = weburl."user/sms_sell.php";
        //需http://�ݼ���Є��整�\径，不能�?id=123����类���定义参数��不能写成http://localhost/
       
		//商品屿���地址
        $orurl = "";
        //需http://�ݼ���Є��整�\径，不能�?id=123����类���定义参数��如�ʦ�|�站带有 参数请彩用伪�Ǚ态或短网址解决

        //商品形象�Ƅ���地址
        $orimg = "";
        //需http://�ݼ���Є��整�\径，必须为图片��整地址

/************************************************************/

//构造要��h���Є参数数�l�，�ߠ需改动
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

//建立��h��

$html_text = i2e($parameter, "支付����行�?..");
echo $html_text;


?>
</body>
</html>