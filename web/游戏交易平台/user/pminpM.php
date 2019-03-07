<?
include("../config/conn.php");
include("../config/function.php");
if(empty($_SESSION[SHOPUSER])){echo "err1";exit;}
$id=$_GET[id];
$m=$_GET[m];
$sj=date("Y-m-d H:i:s");
if(empty($id) || !is_numeric($id)){echo "err2";exit;}
if(empty($m) || !is_numeric($m)){echo "err3";exit;}
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_pro where id=".$id." and userid=".$userid);if(!$row=mysql_fetch_array($res)){echo "err2";exit;}
$money1=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
while0("*","yjcode_pro where id=".$id);$row=mysql_fetch_array($res);
if(1==$row[yhxs]){updatetable("yjcode_pro","money2=".$m." where id=".$id);}
elseif(2==$row[yhxs]){updatetable("yjcode_pro","money3=".$m." where id=".$id);}
echo "ok";exit;
?>