<?
include("../config/conn.php");
include("../config/function.php");
$mob=$_GET[mob];
if(strtolower($_SESSION["authnum_session"])!=strtolower($_GET[tpicyzm])){echo "err1";exit;}
if(empty($mob)){echo "True";exit;}
if(panduan("mot,ifmot","yjcode_user where mot='".$mob."' and ifmot=1")==0){echo "True";exit;}

while1("*","yjcode_smsmb where mybh='006'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在通过手机验证直接登录，如果不是本人操作，请忽略此信息。";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mob,$str);
}else{
 $sms_txt="{yzm:'".$yz."'}";
 $sms_mot=$mob;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

updatetable("yjcode_control","smskc=smskc-1");
updatetable("yjcode_user","bdmot='".$yz."' where mot='".$mob."' and ifmot=1");echo "ok";exit;

?>