<?
include("../config/conn.php");
include("../config/function.php");
if(empty($_SESSION[SHOPUSER])){echo "err1";exit;}
$id=$_GET[id];
$k=$_GET[k];
$sj=date("Y-m-d H:i:s");
if(empty($id) || !is_numeric($id)){echo "err2";exit;}
if(empty($k) || !is_numeric($k)){echo "err3";exit;}
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_pro where id=".$id." and userid=".$userid);if(!$row=mysql_fetch_array($res)){echo "err2";exit;}
if(4!=$row[fhxs]){updatetable("yjcode_pro","kcnum=".$k." where id=".$id);}
echo "ok";exit;
?>