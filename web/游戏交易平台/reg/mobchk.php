<?
include("../config/conn.php");
include("../config/function.php");
$mob=$_GET[mob];
if(empty($mob) || empty($_GET[uid])){echo "True";exit;}
if(panduan("uid,mot","yjcode_user where mot='".$mob."' and uid='".$_GET[uid]."'")==0){echo "True";exit;}
if(strtolower($_SESSION["authnum_session"])!=strtolower($_GET[tyzm])){echo "err1";exit;}

while1("*","yjcode_smsmb where mybh='001'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="��֤�룺${yzm},�������һ����룬������Ǳ��˲���������Դ���Ϣ��";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mob,$str);
}else{
 if(1==$rowcontrol[smsmode]){$sms_txt="{yzm:'".$yz."'}";}else{$sms_txt="{\"yzm\":\"".$yz."\"}";}
 $sms_mot=$mob;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

updatetable("yjcode_control","smskc=smskc-1");
updatetable("yjcode_user","getpwd='".$yz."' where uid='".$_GET[uid]."'");echo "ok";exit;

?>