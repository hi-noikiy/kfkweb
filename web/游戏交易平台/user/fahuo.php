<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorder.php");}

if(sqlzhuru($_POST[jvs])=="fh"){
 zwzr();
 if($row[ddzt]!="wait"){Audit_alert("未知错误！","sellorderview.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s"); 
 $kdid=sqlzhuru($_POST[tkd]);
 if(!is_numeric($kdid)){$kdid=0;}
 updatetable("yjcode_order","fhsj='".$sj."',ddzt='db',kdid=".$kdid.",kddh='".sqlzhuru($_POST[tkddh])."' where ddzt='wait' and orderbh='".$orderbh."' and selluserid=".$userid);
 $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[dbsj]." day"));
 $c_tit="卖家已经发货，款项进入担保阶段，等待买家确认收货";
 intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$row[money1]*$row[num].",'".$sj."',".$row[selluserid].",".$row[userid].",'".$oksj."','".$row[probh]."','".$c_tit."','".$orderbh."'");
 php_toheader("sellorderview.php?orderbh=".$orderbh); 
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 订单管理</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("sellzf.php");?>
 <? include("sellorderv.php");?>
 
 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if(!confirm("确定要发货吗？")){return false;}
 tjwait();
 f1.action="fahuo.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* 温馨提示：</strong><br>
 * 尽可能快的发货速度将有助于提高买家对您的评价<br>
 * 发货后，请为买家提供优质的售后服务
 </li>
 <? if($row[fhxs]==5){?>
 <li class="l2"><span class="red">*</span> 快递公司：</li>
 <li class="l3">
 <select name="tkd" style="float:left;height:30px;font-size:14px;">
 <option value="0">无须快递</option>
 <? while1("*","yjcode_kuaidi where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tit]?></option>
 <? }?>
 </select>
 </li>
 <li class="l2">快递单号：</li>
 <li class="l3"><input  name="tkddh" class="inp" size="20" type="text"/></li>
 <? }?>
 <li class="l4"><?=tjbtnr("发货")?></li>
 </ul>
 <input type="hidden" value="fh" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>