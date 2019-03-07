<?
require("../config/conn.php");
require("../config/function.php");
AdminSes_audit();

$admin=$_GET[admin];
if(empty($admin)){$admin="0";}

switch($admin)
{
 case "0": //常规缓存清理
 html1();
 break;
 case "1": //订单/店铺状态触发变更
 $autoses="id>0";
 include("../user/auto.php");
 $sj=date("Y-m-d H:i:s");
 while1("id,uid,pwd,shopzt,dqsj","yjcode_user where dqsj<'".$sj."' and shopzt=2 and dqsj<>'' and dqsj is not null");while($row1=mysql_fetch_array($res1)){
 updatetable("yjcode_user","shopzt=4 where id=".$row1[id]);
 }
 break;
}
 echo "ok";
?>