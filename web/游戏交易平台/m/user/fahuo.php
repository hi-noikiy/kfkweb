<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
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
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top_sell.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 订单发货&nbsp;&nbsp;&nbsp;<?=$orderbh?></div>
</div>

 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if(!confirm("确定要发货吗？")){return false;}
 tjwait();
 f1.action="fahuo.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="tishi box">
 <div class="d1">
 <strong>* 站长提示：</strong><br>
 * 尽可能快的发货速度将有助于提高买家对您的评价<br>
 * 发货后，请为买家提供优质的售后服务
 </div>
 </div>
 <? if($row[fhxs]==5){?>
 <div class="listcap box"><div class="d2">快递公司：</div></div>
 <div class="uk box">
  <div class="d22">
 <select name="tkd" style="float:left;height:30px;font-size:14px;">
 <option value="0">无须快递</option>
 <? while1("*","yjcode_kuaidi where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tit]?></option>
 <? }?>
 </select>
  </div>
 </div>
 <div class="listcap box"><div class="d2">快递单号：</div></div>
 <div class="uk box">
  <div class="d22"><input  name="tkddh" placeholder="请输入快递单号" class="inp" size="20" type="text"/></div>
 </div>
 <? }?>
 <div class="tjbutton box"><div class="d0"></div><? tjbtnr_m("发货");?><div class="d0"></div></div>
 <input type="hidden" value="fh" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>


<? include("bottom.php");?>
</body>
</html>