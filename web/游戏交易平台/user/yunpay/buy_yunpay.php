<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>æ”¯ä»˜è·Œï¿½ï¿ÌÐï¿?..</title>
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
if($needmoney<=$usermoney){Audit_alert("Õò¨çš„å¯ç”¨ä½™é¢å„²ï¿½ï¿½ï¿½Qï¿½è¯·ç”¨ä½™é¢ç›´æŽ¥æ”¯ä»èã¿½?,"../carpay.php?carid=".$carid);}
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

		

/**************************ï¿½ï¿½hï¿½ï¿½å‚æ•°**************************/
		
		//å•†æˆ·è®¢å•ï¿?
        $out_trade_no =$ddbh;//å•†æˆ·ï¿½|ï¿½ç«™è®¢å•ï¿½p»çï¿½ï¿½ä¸­å”¯ä¸€è®¢å•ï¿½ï¿½Pï¿½ï¿½å¿…å¡«

        //è®¢å•åá«§°
        $subject = weburl;//å¿…å¡«

        //ä»˜æ¬¾é‡‘é¢
        $total_fee = $money1;//å¿…å¡« éœ€ä¸ºæ•´ï¿?

        //è®¢å•æè¿°

        $body = subject;
		
		
		//Á´åŠ¡å™¨åç£æ­¥é€šçŸ¥ï¿½ï¿½ãÇ¢è·¯å¾?
        $nourl = weburl."user/yunpay/buy_no_url.php";
        //éœ€http://ïÝ¼å·ÄïÐ„åî´æ•´ï¿½\å¾„ï¼Œä¸èƒ½ï¿?id=123ï¿ÈÞï¿½ç±»Ä÷ªå®šä¹‰å‚ï¿?

        //ï¿½ï¿½ãÇ¢è·Œï¿½ï¿½{åŒæ­¥ãÍšçŸ¥ï¿½ï¿½ãÇ¢è·¯å¾?
        $nourl = weburl."user/sms_sell.php";
        //éœ€http://ïÝ¼å·ÄïÐ„åî´æ•´ï¿½\å¾„ï¼Œä¸èƒ½ï¿?id=123ï¿ÈÞï¿½ç±»Ä÷ªå®šä¹‰å‚æ•°ï¼ï¿½ä¸èƒ½å†™æˆhttp://localhost/
       
		//å•†å“å±¿õ¤ºåœ°å€
        $orurl = "";
        //éœ€http://ïÝ¼å·ÄïÐ„åî´æ•´ï¿½\å¾„ï¼Œä¸èƒ½ï¿?id=123ï¿ÈÞï¿½ç±»Ä÷ªå®šä¹‰å‚æ•°ï¼ï¿½å¦‚åÊ¦ï¿½|ï¿½ç«™å¸¦æœ‰ å‚æ•°è¯·å½©ç”¨ä¼ªãÇ™æ€æˆ–çŸ­ç½‘å€è§£å†³

        //å•†å“å½¢è±¡ïÆ„ï¿½ï¿½ï¿½åœ°å€
        $orimg = "";
        //éœ€http://ïÝ¼å·ÄïÐ„åî´æ•´ï¿½\å¾„ï¼Œå¿…é¡»ä¸ºå›¾ç‰‡åî´æ•´åœ°å€

/************************************************************/

//æž„é€ è¦ï¿½ï¿½hï¿½ï¿½ïÐ„å‚æ•°æ•°ï¿½lï¿½ï¼Œïß éœ€æ”¹åŠ¨
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

//å»ºç«‹ï¿½ï¿½hï¿½ï¿½

$html_text = i2e($parameter, "æ”¯ä»˜ï¿ÈÞï¿½è¡Œï¿?..");
echo $html_text;


?>
</body>
</html>