<?
header("Content-Type:text/html;charset=GB2312");
session_start();
include("../config/conn.php");
include("../config/function.php");
$t1=$_GET[t1];
$t2=$_GET[t2];
if(empty($t1) && empty($t2)){
 if(empty($_SESSION[SHOPUSER])){echo "err2";exit;}
 $ses="uid='".$_SESSION[SHOPUSER]."'";
}else{
 $ses="uid='".$t1."' and pwd='".sha1($t2)."'";
}
while1("*","yjcode_user where ".$ses);
if(!$row1=mysql_fetch_array($res1)){echo "err1";exit;}
$_SESSION[SHOPUSER]=$row1[uid];
$money1=$row1[money1]; //���ý��
$jf=$row1[jf]; //���û���
$djmoney=$row1[djmoney]; //������
$moneya=$money1+$djmoney;
echo "ok|".$row1[uid]."|".sprintf("%.2f",$moneya)."|".sprintf("%.2f",$djmoney)."|".sprintf("%.2f",$money1)."|".$jf;
?>