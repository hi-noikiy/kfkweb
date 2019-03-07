<?
include("../config/conn.php");
include("../config/function.php");
$bh=$_GET[bh];
if(empty($bh)){exit;}
if(empty($_SESSION["SHOPUSER"])){echo "err1";exit;}
while1("bh,userid","yjcode_news where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){exit;}
$pj=strip_tags(js_unescape($_GET[pj]));
if(empty($pj)){exit;}
$userid=returnuserid($_SESSION["SHOPUSER"]);
$fbuserid=returnjgdw($row1[userid],"",0);

while1("*","yjcode_newspj where newsbh='".$bh."' and userid=".$userid." order by sj desc");if($row1=mysql_fetch_array($res1)){
 $sj1=date("Y-m-d H:i:s",strtotime("-60 second"));
 if($row1[sj]>$sj1){echo "err2";exit;}
}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
intotable("yjcode_newspj","newsbh,fbuserid,userid,sj,uip,txt,hf,zt","'".$bh."',".$fbuserid.",".$userid.",'".$sj."','".$uip."','".$pj."','',1");
echo "ok";exit;
?>
