<?
include("../config/conn.php");
include("../config/function.php");
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_task where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("./");}
$bh=$row[bh];
taskok($row["id"]);

$sqluser="select * from yjcode_user where id=".$row[userid]."";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);$rowuser=mysql_fetch_array($resuser);
$userid=0;
$xgnum=0;
if(!empty($_SESSION[SHOPUSER])){
$sqluserM="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuserM=mysql_query($sqluserM);$rowuserM=mysql_fetch_array($resuserM);
$userid=$rowuserM[id];
while1("*","yjcode_taskhf where bh='".$bh."' and useridhf=".$userid."");if($row1=mysql_fetch_array($res1)){$xgnum=$row1[xgnum];$mybh=$row1[mybh];$myid=$row1[id];$mymoney=$row1[money1];$mytxt=$row1[txt];}
}

if($_GET[control]=="add"){ //单人任务
 if(empty($_SESSION[SHOPUSER])){Audit_alert("请先登录！","../reg/");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(0!=$row[zt]){Audit_alert("该任务停止接收报价！","view".$id.".html");}
 if($xgnum>1){Audit_alert("您已经修改过该任务的报价，不能再修改！","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("无法给自己的任务提交报价！","view".$id.".html");}
 $money1=sqlzhuru($_POST[t1]);
 if(!is_numeric($money1)){Audit_alert("报价无效。","view".$id.".html");}
 if($money1<=0){Audit_alert("报价无效。","view".$id.".html");exit;}
 $txt=sqlzhuru($_POST[s1]);
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")==0){
 $mybh=time()."t".$userid;
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,0");
 }else{
 updatetable("yjcode_taskhf","money1=".$money1.",txt='".$txt."',xgnum=xgnum+1 where bh='".$row[bh]."' and useridhf=".$userid."");
 }
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../config/mailphp/sendmail.php");
 $str="有人给出报价了，请尽快处理。<br>任务：".$row[tit]."<br>报价：<font color='red' style='font-size:18px;'>".$money1."</font><br>【".webname."】<hr>该邮件为系统发出，请勿回复";
 @yjsendmail("任务接手提醒【".webname."】",$rowuser[email],$str);
 }

 php_toheader("../help/tslist_m1v_i".$id."v.html");

}elseif($_GET[control]=="add1"){ //多人任务
 if(empty($_SESSION[SHOPUSER])){Audit_alert("请先登录！","../reg/");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(101!=$row[zt]){Audit_alert("该任务停止报名参与！","view".$id.".html");}
 if($row[taskcy]>=$row[tasknum]){Audit_alert("该任务被抢光啦！","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("不能接手自己的任务！","view".$id.".html");}
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==1){Audit_alert("你有任务未完成，不能再次接单！","view".$id.".html");}
 $txt=sqlzhuru($_POST[s1]);
 $mybh=time()."t".$userid;
 $money1=$row[money1]/$row[tasknum];
 $rwdq=date("Y-m-d H:i:s",strtotime("+".$row[rwzq]." day"));
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty,zt,zbsj,rwdq","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,1,0,'".$sj."','".$rwdq."'");
 $uf=$row[useridhf]."yj".$userid."yj";
 updatetable("yjcode_task","useridhf='".$uf."' where id=".$id);
 $txt="接手成功，开始做任务，须在".$rwdq."前完成任务，并提交验收";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../config/mailphp/sendmail.php");
 $str="有人接手了你的任务，请关注任务进度。<br>任务：".$row[tit]."<br>【".webname."】<hr>该邮件为系统发出，请勿回复";
 @yjsendmail("任务接手提醒【".webname."】",$rowuser[email],$str);
 }

 php_toheader("../help/tslist_m2v_i".$id."v.html");
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>任务大厅 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
t1v=parseFloat(document.f1.t1.value);
if(isNaN(t1v)){alert("请输入有效的报价");return false;}
tjwait();
f1.action="view.php?control=add&id=<?=$id?>";
}
function tbxg(){
document.getElementById("tbedit").style.display="none";
document.getElementById("baojia").style.display="";
}
function tj1(){
if(!confirm("确定要接手该任务吗？")){return false;}
tjwait();
f1.action="view.php?control=add1&id=<?=$id?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">当前位置：<a href="<?=weburl?>">首页</a> > 任务大厅 > <?=$row[tit]?></li></ul>
 </div>
</div>

<div class="bfb bfbtask fontyh">
<div class="yjcode">
 
 <!--左B-->
 <div class="vleft">
 
  <div class="jbzl">
   <ul class="u1">
   <li class="l1">
    <h1><?=$row[tit]?></h1>
    <span class="s1"><?=returntaskjgxs($row[jgxs])?><strong><?=returntaskjg($row[jgxs],$row[money1],$row[money2])?></strong></span>
    <span class="s3"><?=returntaskxs($row[taskty])?><strong><? if($row[taskty]==1){echo "(需要".$row[tasknum]."人，单人佣金".$row[money1]/$row[tasknum]."元)";}?></strong></span>
	<? if($row[money4]>0){?><span class="s2">订金<strong><?=sprintf("%.2f",$row[money4])?></strong></span><? }?>
   </li>
   <li class="l2">
   <span class="s1">
   编号：<span class="feng"><?=$row[bh]?></span>&nbsp;&nbsp; 
   任务周期：<span class="feng"><?=$row[rwzq]?></span>天&nbsp;&nbsp; 
   发布于<?=dateYMD($row[sj])?>&nbsp;&nbsp; 
   </span>
   
   <?
   if($row[qqxs]==1){$qqxsvalue="投标服务商可查看LINE";}elseif($row[qqxs]==2){$qqxsvalue="中标服务商可查看LINE";}elseif(empty($row[qqxs])){$qqxsvalue="登录后查看LINE";}
   if($row[motxs]==1){$motxsvalue="投标服务商可查看电话";}elseif($row[motxs]==2){$motxsvalue="中标服务商可查看电话";}elseif(empty($row[motxs])){$motxsvalue="登录后查看电话";}
   ?>

   <? if(empty($row[qqxs]) && !empty($_SESSION[SHOPUSER])){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif(1==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif(2==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif($userid==$row[userid]){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }else{?>
   <a class="a4" href="../reg/"><?=$qqxsvalue?></a>
   <? }?>
   
   <? if(empty($row[motxs]) && !empty($_SESSION[SHOPUSER])){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif(1==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif(2==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif($userid==$row[userid]){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }else{?>
   <a class="a4" href="../reg/"><?=$motxsvalue?></a>
   <? }?>
   
   </li>
   </ul>
   <div class="zt">
   
   <? $bmnum=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
   <? if(0==$row[zt] && $bmnum==0){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>等待接手</strong></li>
   <li class="l3">雇主选标</li>
   <li class="l4">进行验收</li>
   <li class="l5">完成交易</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(0==$row[zt] && $bmnum>0){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>等待接手</strong></li>
   <li class="l3"><strong>雇主选标</strong></li>
   <li class="l4">进行验收</li>
   <li class="l5">完成交易</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(1==$row[zt] || 105==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>正在审核</strong></li>
   <li class="l3">接手报名</li>
   <li class="l4">雇主选标</li>
   <li class="l5">进行验收</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(2==$row[zt] || 106==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>审核不通过</strong></li>
   <li class="l3"><strong>任务关闭</strong></li>
   <li class="l4">--</li>
   <li class="l5">--</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(3==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>等待接手</strong></li>
   <li class="l3"><strong>雇主选标</strong></li>
   <li class="l4"><strong>接手方做任务</strong></li>
   <li class="l5">进行验收</li>
   </ul>
   <div class="ztok" id="ztok" style="width:529px;"></div>
   <? }elseif(4==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务被接手</strong></li>
   <li class="l3"><strong>接手方请求验收</strong></li>
   <li class="l4"><strong>等待雇主验收</strong></li>
   <li class="l5">交易完成</li>
   </ul>
   <div class="ztok" id="ztok" style="width:529px;"></div>
   <? }elseif(5==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务被接手</strong></li>
   <li class="l3"><strong>接手方请求验收</strong></li>
   <li class="l4"><strong>验收通过</strong></li>
   <li class="l5"><strong>交易完成</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(8==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务被接手</strong></li>
   <li class="l3"><strong>接手方请求验收</strong></li>
   <li class="l4"><strong>验收不通过</strong></li>
   <li class="l5"><strong>平台处理纠纷</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(9==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务被接手</strong></li>
   <li class="l3"><strong>任务验收不通过</strong></li>
   <li class="l4"><strong>平台处理</strong></li>
   <li class="l5"><strong>判定雇主胜诉</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(10==$row[zt] || 104==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务进行中</strong></li>
   <li class="l3"><strong>任务到期</strong></li>
   <li class="l4">--</li>
   <li class="l5">--</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(100==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>等待缴纳费用</strong></li>
   <li class="l3">接手方参与</li>
   <li class="l4">请求验收</li>
   <li class="l5">任务结束</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(101==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>雇主已缴费用</strong></li>
   <li class="l3"><strong>任务进行中</strong></li>
   <li class="l4">请求验收</li>
   <li class="l5">任务结束</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(102==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>发起任务</strong></li>
   <li class="l2"><strong>任务被接手</strong></li>
   <li class="l3"><strong>接手方请求验收</strong></li>
   <li class="l4"><strong>验收不通过</strong></li>
   <li class="l5"><strong>平台处理纠纷</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }?>
   
   </div>
   <ul class="u2">
   <li class="l1">任务描述</li>
   <li class="l2"></li>
   </ul>
   <div class="tasktxt"><?=$row[txt]?><br><? $fj="../upload/".$row[userid]."/".$row[bh]."/".$row[fj];if(is_file($fj)){?><a href="<?=$fj?>" class="downfj" target="_blank">下载附件</a><? }?></div>
  </div>
  
  <!--单人任务开始-->
  <? if(empty($row[taskty])){?>
  <div class="baojia" id="baojia"<? if(empty($userid) || (!empty($userid)) && $userid!=$row[userid] && $xgnum==0){?><? }else{?> style="display:none;"<? }?>>
   <form name="f1" method="post" onSubmit="return tj()">
   <ul class="u1">
   <li class="l1">任务报价：</li>
   <li class="l2"><input type="text" name="t1" value="<?=$mymoney?>" /> <span class="fd">元（雇主的报价为：<?=returntaskjg($row[jgxs],$row[money1],$row[money2])?>，平台中介费由<span class="blue"><? if(empty($row[yjfs])){echo "雇主支付";}elseif($row[yjfs]==1){echo "接手方支付";}else{echo "双方各承担50%";}?></span>，中介费为交易金额的<span class="red"><?=$rowcontrol[taskyj]*100?>%</span>）</span></li>
   <li class="l3">报价说明：</li>
   <li class="l4"><textarea name="s1"><?=$mytxt?></textarea></li>
   <li class="l5">
   <? if(!empty($userid)){?>
   <input type="submit" id="tjbtn" value="提交报价" /><input id="tjing" style="display:none;" class="inp1" type="button" value="正在提交" />
   <? }else{?>
   <input class="inp1" type="button" value="请先登录" onClick="gourl('../reg/')" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
 
  <? if(!empty($userid) && $userid!=$row[userid] && $xgnum==1){?>
  <div class="jisuan" id="tbedit">
  您的投标号：<?=$mybh?>，【<a href="#tb<?=$myid?>" class="blue">查看</a>】&nbsp;&nbsp;【<a href="javascript:void(0);" onClick="tbxg()" class="blue">修改</a>】
  </div>
  <? }?>
 
  <? if($userid==$row[userid]){$cy=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
  <? if($cy==0){?>
  <div class="jisuan">
  <strong>雇主您好，暂时没有人给出报价，请继续关注</strong><br>
  </div>
  <? }else{?>
  <div class="jisuan">
  <strong>雇主您好，当前共有<?=$cy;?>人参与了任务：</strong><br>
  <?
  $zh=returnsum("money1","yjcode_taskhf where bh='".$row[bh]."'");
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 desc");$row1=mysql_fetch_array($res1);$moneyg=$row1[money1];
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 asc");$row1=mysql_fetch_array($res1);$moneyd=$row1[money1];
  ?>
  均报价：<span class="feng"><?=sprintf("%.2f",$zh/$cy)?></span>元，最高报价：<span class="red"><?=$moneyg?></span>元，最低报价<span class="green"><?=$moneyd?></span>元。
  </div>
  <? }?>
  <? }?>
  <? }?>
  <!--单人任务结束-->
 
  <!--多人任务开始-->
  <? if($row[taskty]==1 && $userid!=$row[userid] && panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==0){?>
  <div class="baojia">
   <form name="f1" method="post" onSubmit="return tj1()">
   <ul class="u1">
   <li class="l1">任务佣金：</li>
   <li class="l2"><span class="fd"><strong class="red"><?=$row[money1]/$row[tasknum]?></strong>元，平台中介费由<span class="blue"><? if(empty($row[yjfs])){echo "雇主支付";}elseif($row[yjfs]==1){echo "接手方支付";}else{echo "双方各承担50%";}?></span>，中介费为交易金额的<span class="red"><?=$rowcontrol[taskyj]*100?>%</span></span></li>
   <li class="l3">接手说明：</li>
   <li class="l4"><textarea name="s1">我已接单，会按要求尽快完工^_^</textarea></li>
   <li class="l5">
   <? if(!empty($userid)){?>
   <input type="submit" id="tjbtn" value="接单" /><input id="tjing" style="display:none;" class="inp1" type="button" value="正在提交" />
   <? }else{?>
   <input class="inp1" type="button" value="请先登录" onClick="tclogin()" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
  <? }?>
  <!--多人任务结束-->
 
  <?
  while1("*","yjcode_taskhf where bh='".$bh."' order by sj desc");while($row1=mysql_fetch_array($res1)){
  while2("*","yjcode_user where id=".$row1[useridhf]);$row2=mysql_fetch_array($res2);
  ?>
  <a name="tb<?=$row1[id]?>"></a>
  <div class="taskhf">
   <ul class="u1">
   <li class="l1"><img src="<?=returntppd("../upload/".$row1[useridhf]."/user.jpg","../img/none60x60.gif")?>" width="60" height="60" /></li>
   <li class="l2">
   <strong><?=$row2[nc]?></strong><br>
   联系QQ：<? if($userid==$row[userid]){?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a><? }else{?>雇主可见<? }?>
   </li>
   <li class="l3">
   <? if($userid==$row[userid] && 0==$row[zt]){?><a href="../user/taskbjsel.php?bh=<?=$row[bh]?>&mid=<?=$row1[id]?>" class="xz">选此<br>投标</a><? }?>
   <? if($row[useridhf]==$row2[id]){?><img src="img/suc.gif" class="zb" /><? }?>
   </li>
   </ul>
   <div class="hftxt">任务报价：<strong class="feng"><? if($userid==$row[userid]){?><?=$row1[money1]?><? }else{?>雇主可见<? }?></strong><br><?=$row1[txt]?><br><br><span class="hui">投标编号：<?=$row1[mybh]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;参与时间：<?=$row1[sj]?></span></div>
  </div>
  <?
  }
  ?>
 
 </div>
 <!--左E-->
 
 <div class="listright">
  <? if(0==$row[zt]){?>
  <ul class="udq">
  <li class="l1">距任务报名结束还剩余</li>
  <? if($row[zt]!=4){$dqsj=str_replace("-","/",$row[yxq]);?>
  <li class="l2 fontyh">
  <span id="nowsj" style="display:none;"><?=str_replace("-","/",date("Y-m-d H:i:s"))?></span>
  <span id="dqsj" style="display:none;"><?=$dqsj?></span>
  <span class="djs" id="djs">正在加载</span>
  <script language="javascript">userChecksj();</script>
  </li>
  <? }else{?>
  <li class="l3 fontyh">已结束</li>
  <? }?>
  </ul>
  <? }?>
  <? include("right.php");?>
 </div> 
 
</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>