<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."n".$userid;
intotable("yjcode_news","type1id,type2id,djl,sj,lastsj,uip,bh,ifjc,zt,iftp,indextop,userid","0,0,0,'".$sj."','".$sj."','".$uip."','".$bh."',0,99,0,0,".$userid."");
php_toheader("news.php?bh=".$bh);
?>
