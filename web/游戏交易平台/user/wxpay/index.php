<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
if(empty($_SESSION["SHOPUSER"])){Audit_alert("��¼��ʱ!","./","parent.");}

$userid=returnuserid($_SESSION["SHOPUSER"]);
$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=$_GET[m];
$ddbh=time().$userid.rnd_num(1000);	
//intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$ddbh."',".$userid.",'".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','΢��֧��',0");
$tk=sqlzhuru($_POST["ddbh"]);
$tm=sqlzhuru($_POST["ddmm"]);
$money=$_POST["money"];
$t1=$_POST["type"];
 $t2="��ţ�".$tk." ���ܣ�".$tm;
 intotable("yjcode_payreng","money1,type1,userid,ddbh,sj,ifok","".$money.",".$t1.",".$userid.",'".$t2."','".$sj."',1");
 php_toheader("/m/user/dkcz.php?t=suc");
?>
