<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and ddzt='suc' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}
if(panduan("bh","yjcode_pro where bh='".$row[probh]."'")==0){Audit_alert("该商品已被删除，无法进行评价！","order.php");}
$sqlpj="select * from yjcode_propj where orderbh='".$orderbh."' and userid=".$userid;mysql_query("SET NAMES 'GBK'");$respj=mysql_query($sqlpj);
if($rowpj=mysql_fetch_array($respj)){$ifpj=1;}else{$ifpj=0;}

if(sqlzhuru($_POST[jvs])=="pj"){
 zwzr();
 if(1==$ifpj){Audit_alert("您已评价过，无须重复点评！","orderpj.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("yjcode_propj","probh,selluserid,userid,sj,uip,pf1,pf2,pf3,txt,orderbh","'".$row[probh]."',".$row[selluserid].",".$row[userid].",'".$sj."','".$uip."',".sqlzhuru($_POST[hpjjf1]).",".sqlzhuru($_POST[hpjjf2]).",".sqlzhuru($_POST[hpjjf3]).",'".sqlzhuru($_POST[s1])."','".$row[orderbh]."'");$id=mysql_insert_id();
 if(empty($id)){Audit_alert("您已评价过，不能重复点评！","orderpj.php?orderbh=".$orderbh);}
 $sql1="select avg(pf1) as pf1v,avg(pf2) as pf2v,avg(pf3) as pf3v from yjcode_propj where probh='".$row[probh]."' and selluserid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$res1=mysql_query($sql1);
 $row1=mysql_fetch_array($res1);
 updatetable("yjcode_pro","pf1=".round($row1[pf1v],2).",pf2=".round($row1[pf2v],2).",pf3=".round($row1[pf3v],2)." where bh='".$row[probh]."'");
 PointInto($userid,"交易成功，点评商品获得积分",$rowcontrol[pjjf]);
 PointUpdate($userid,$rowcontrol[pjjf]); 

 $sqlp="select avg(pf1) pf1v,avg(pf2) pf2v,avg(pf3) pf3v from yjcode_pro where zt=0 and userid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");
 $resp=mysql_query($sqlp);$rowp=mysql_fetch_array($resp);
 updatetable("yjcode_user","pf1=".round($rowp[pf1v],2).",pf2=".round($rowp[pf2v],2).",pf3=".round($rowp[pf3v],2)." where id=".$row[selluserid]);

 php_toheader("orderpj.php?orderbh=".$orderbh);

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
<script language="javascript">
function tj(){
 if((document.f1.s1.value).replace(/\s/,"")==""){alert("请输入简要的点评内容");document.f1.s1.focus();return false;}
 tjwait();
 f1.action="orderpj.php?orderbh=<?=$orderbh?>";
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 订单评价&nbsp;&nbsp;&nbsp;<?=$orderbh?></div>
</div>

 <? if(0==$ifpj){?>
 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="pj" name="jvs" />
 <div class="listcap box"><div class="d2">填写评价，可获得<?=$rowcontrol[pjjf]?>积分</div></div>
 <div class="orderpj box"><div class="d1"><textarea name="s1"></textarea></div></div>
 <div class="pjdf box">
  <div class="d1">描述相符：</div>
  <div class="d2"><select name="hpjjf1"><? for($i=5;$i>=1;$i--){?><option value="<?=$i?>"><?=$i?>分</option><? }?></select></div>
 </div>
 <div class="pjdf box">
  <div class="d1">发货速度：</div>
  <div class="d2"><select name="hpjjf2"><? for($i=5;$i>=1;$i--){?><option value="<?=$i?>"><?=$i?>分</option><? }?></select></div>
 </div>
 <div class="pjdf box">
  <div class="d1">服务态度：</div>
  <div class="d2"><select name="hpjjf3"><? for($i=5;$i>=1;$i--){?><option value="<?=$i?>"><?=$i?>分</option><? }?></select></div>
 </div>
 <div class="tjbutton box"><div class="d0"></div><? tjbtnr_m("发表评论");?><div class="d0"></div></div>
 </form>
 
 <? }else{?>
 <div class="orderm box"><div class="d1">评价内容</div><div class="d2">您于 <?=$rowpj[sj]?> 对本次交易进行了评价：<br><strong class="feng">描述相符度<?=$rowpj[pf1]?>分，发货速度<?=$rowpj[pf2]?>分，卖家服务态度<?=$rowpj[pf3]?>分</strong><br>评价：<?=$rowpj[txt]?></div></div>
 <? }?>

<? include("orderv.php");?>

<? include("bottom.php");?>
</body>
</html>