<?php
include("../../../config/conn.php");

$g_webname=iconv("GB2312","UTF-8//IGNORE",webname);
function php_toheader($nurlx){echo "<script>";echo "parent.location.href='".$nurlx."';";echo "</script>";exit;}
$ddbh=$_GET[ddbh];if(empty($ddbh)){php_toheader("../../car.php");exit;}
$sql="select * from yjcode_dingdang where ddbh='".$ddbh."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if(!$row=mysql_fetch_array($res)){php_toheader("../../car.php");exit;}
if(1==$row[ifok]){php_toheader("../../order.php");}
function updatetable($utable,$ures,$uwhere=""){$sqlupdate="update ".$utable." set ".$ures." ".$uwhere;mysql_query("SET NAMES 'GBK'");mysql_query($sqlupdate);}

ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';
$notify = new NativePay();

//模���?
/**
 * 流程�?
 * 1、调用统一��ɍ�，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支�?
 * 3、支����成之后，微信���务器�ϸ�͚知支付成功
 * 4、在支付成功�͚知中需要查卿���认是否真正支付成�ɟ�ֽ见�ϸnotify.php�?
 */
$input = new WxPayUnifiedOrder();
$input->SetBody($g_webname);
$input->SetAttach("test");
$wxddbh=WxPayConfig::MCHID.date("YmdHis");if(!empty($row[wxddbh])){$wxddbh=$row[wxddbh];}
$input->SetOut_trade_no($wxddbh);
$input->SetTotal_fee($row[money1]*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url(weburl."user/wxpay/example/buy_notify.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id($ddbh);
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
updatetable("yjcode_dingdang","wxddbh='".$wxddbh."' where ddbh='".$ddbh."'");
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<title><?=$g_webname?>微信支付</title>
<script language="javascript">
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}


function updatePage() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="ok"){
	 <? if($_GET[m]=="yes"){?>
	 parent.location.href="<?=weburl?>m/user/order.php";
	 <? }else{?>
	 parent.location.href="<?=weburl?>user/order.php";
	 <? }?>
    }else{setTimeout("yzonc()",2000);return false;}
  }
}

function yzonc(){
 url = "wxpd.php?ddbh=<?=$ddbh?>";
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

setTimeout("yzonc()",2000);
</script>
</head>
<body>
<img alt="模��二扫���支�? style="float:left;clear:both;margin:0 0 0 7px;" src="<?=weburl?>tem/getqr.php?u=<?=urlencode($url2)?>&size=9"/>
<br><br>
<img src="../img/ts.gif" width="261" height="88" style="margin:0 0 0 42px;float:left;clear:both;" >
</body>
</html>