<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
sesCheck();
while0("*","yjcode_user where uid='".$_SESSION[SHOPUSER]."'");if(!$row=mysql_fetch_array($res)){php_toheader("un.php");}
$userdj=returnuserdj($row[id]);
if(empty($userdj)){
while1("*","yjcode_userdj where zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$userdj=$row1[name1];}
}
$usertx="../upload/".$row[id]."/user.jpg";if(!is_file($usertx)){$usertx="img/nonetx.gif";}
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a></li>
</ul>
<? 
if($row[shopzt]==0){$leftid=2;}else{$leftid=1;}
include("left.php");
//任务触发放在这里，有点鸡肋，但目前暂无更好方案
while1("*","yjcode_task where userid=".$luserid." or useridhf=".$luserid." and taskty=0");while($row1=mysql_fetch_array($res1)){
taskok($row1[id]);
}
while1("*","yjcode_taskhf where useridhf=".$luserid." and taskty=1");while($row1=mysql_fetch_array($res1)){
while2("id,bh","yjcode_task where bh='".$row1[bh]."'");if($row2=mysql_fetch_array($res2)){
taskok($row2[id]);
}
}
//任务触发结束
?>

<!--右B-->
<div class="iright">

 <!--基本B-->
 <div class="jbuser">
  <div class="d1"><a href="touxiang.php"><img border="0" src="<?=$usertx?>" width="100" height="100" /></a></div>
  <div class="d2">
   <ul class="u1">
   <li class="l1"><?=$row[nc]?>,欢迎您！</li>
   <li class="l2">您的级别是：<a href="userdj.php"><?=$userdj?></a></li>
   <li class="l5">
   <? $xy=returnjgdw($row[xinyong],"",returnxy($row[id],1));$xy1=returnxy($row[id],2);?>
   <? if($row[shopzt]==2){?>卖家信息：<img title="信用值<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" />&nbsp;&nbsp;&nbsp;&nbsp;<? }?>
   买家信用：<img title="信用值<?=$xy1?>" src="../img/dj/<?=returnxytp($xy1)?>" />
   </li>
   <li class="l3">
   <a href="mobbd.php"><? if(1==$row[ifmot]){?><img src="img/sj1.gif"  /><span>手机已通过认证</span><? }else{?><img src="img/sj0.gif" /><span>手机未认证</span><? }?></a>
   <a href="emailbd.php"><? if(1==$row[ifemail]){?><img src="img/yx1.gif" /><span>邮箱已通过认证</span><? }else{?><img src="img/yx0.gif" /><span>邮箱未认证</span><? }?></a>
   </li>
   <li class="l4">
   上次登录：<?
   while1("*","yjcode_loginlog where userid=".$row[id]." and admin=1 order by id desc limit 2");$row1=mysql_fetch_array($res1);$psj=$row1[sj];$puip=$row1[uip];
   if($row1=mysql_fetch_array($res1)){$psj=$row1[sj];$puip=$row1[uip];}
   ?>
   <?=$psj?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.baidu.com/s?wd=<?=$puip?>" title="<?=$puip?>" target="_blank">登录IP：<?=$puip?></a>
   </li>
   </ul>
  </div>
 </div>
 <!--基本E-->
 <!--公告B-->
 <div class="gonggao">
 <ul class="u1">
 <li class="l1">网站公告</li><li class="l2"><a href="../help/gglist.html" target="_blank">更多></a></li>
 <? while1("*","yjcode_gg where zt<>99 order by sj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <li class="l3">·<a href="../help/ggview<?=$row1[id]?>.html" title="<?=$row1[tit]?>" target="_blank"><?=returntitdian($row1[tit],40)?></a></li>
 <? }?>
 </ul>
 </div>
 <!--公告E-->
 <!--余额B-->
 <div class="yue">
 <ul class="u1">
 <li class="l1">可用余额：<br /> 保证金：<br /> 冻结金额：</li>
 <li class="l2"><a href="paylog.php"><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></a>
 <br /> <div style="color: #999;font-size: 14px; line-height:14px;"><?=str_replace("-0.00","0",sprintf("%.2f",$row[baomoney]))?><br /> <span style=" line-height:28px;" ><?=str_replace("-0.00","0",sprintf("%.2f",$row[djmoney]))?></span>  </div> 
 </li>
 
 
 <li class="l3"><a href="pay.php" class="a1">立即充值</a><a href="../" class="a2">购买产品</a></li>
 <li class="l4">剩余积分：</li>
 <li class="l5"><?=$row[jf]?></li>
 </ul>
 </div>
 <!--余额E-->
 
 <!--推广B--><!--推广E-->

  <? if(2==$row[shopzt]){?>
  <!--卖家B-->
  <div class="sell">
   <div class="cap">店铺动态</div>
   <div class="d1">
   <span class="s1">交易提醒：</span>
   <a href="sellorder.php?ddzt=wpay">等待付款(<strong><?=returncount("yjcode_order where selluserid=".$row[id]." and ddzt='wpay'")?></strong>)</a>
   <a href="sellorder.php?ddzt=wait">等待发货(<strong><?=returncount("yjcode_order where selluserid=".$row[id]." and ddzt='wait'")?></strong>)</a>
   <a href="sellorder.php?ddzt=db">正在担保(<strong><?=returncount("yjcode_order where selluserid=".$row[id]." and ddzt='db'")?></strong>)</a>
   <a href="sellorder.php?ddzt=back">退款申请(<strong><?=returncount("yjcode_order where selluserid=".$row[id]." and ddzt='back'")?></strong>)</a>
   <a href="sellorder.php?ddzt=suc">交易成功(<strong><?=returncount("yjcode_order where selluserid=".$row[id]." and ddzt='suc'")?></strong>)</a>
   </div>
   
   <ul class="u1">
   <li class="l1"><strong>店铺信息</strong></li>
   <li class="l1">店铺状态：<?=returnshopztv($row[shopzt])?></li>
   <li class="l1">店铺流量：<?=$row[djl]?></li>
   <li class="l2">认证方式：</li>
   <li class="l3">
   <? if(1==$row[ifemail]){?><img src="img/rz1.gif" width="26" title="已通过邮箱认证" height="16" /><? }?>
   <? if(1==$row[ifmot]){?><img src="img/rz2.gif" title="已通过手机认证" width="17" height="16" /><? }?>
   <? if(2==$row[sfzrz]){?><img src="img/rz3.gif" title="已通过身份证认证" width="24" height="16" /><? }?>
   </li>
   </ul>
   
   <ul class="u2">
   <li class="l1"><strong>获得评价</strong></li>
   <li class="l2">好评<br><?=returncount("yjcode_propj where selluserid=".$row[id]." and pjlx=1")?></li>
   <li class="l3">中评<br><?=returncount("yjcode_propj where selluserid=".$row[id]." and pjlx=2")?></li>
   <li class="l4">差评<br><?=returncount("yjcode_propj where selluserid=".$row[id]." and pjlx=3")?></li>
   </ul>
   
   <ul class="u3">
   <li class="l1"><strong>综合评分</strong></li>
   <li class="l2">描述评分：<strong><?=sprintf("%.2f",$row[pf1])?></strong></li>
   <li class="l21"><span style="width:<?=sprintf("%.2f",$row[pf1]/5*125)?>px;"></span></li>
   <li class="l2">发货评分：<strong><?=sprintf("%.2f",$row[pf2])?></strong></li>
   <li class="l21"><span style="width:<?=sprintf("%.2f",$row[pf2]/5*125)?>px;"></span></li>
   <li class="l2">服务态度：<strong><?=sprintf("%.2f",$row[pf3])?></strong></li>
   <li class="l21"><span style="width:<?=sprintf("%.2f",$row[pf3]/5*125)?>px;"></span></li>
   </ul>
   
  </div>
  <!--卖家E-->
  <? }?>
  
  <!--买家B-->
  <div class="buy">
   <div class="cap">买家提醒</div>
   <div class="d1 dv"><span class="s1">等待付款</span><a class="s2" href="order.php?ddzt=wpay"><?=returncount("yjcode_order where ddzt='wpay' and userid=".$row[id])?></a></div>
   <div class="d2 dv"><span class="s1">正在交易</span><a class="s2" href="order.php?ddzt=db"><?=returncount("yjcode_order where ddzt='db' and userid=".$row[id])?></a></div>
   <div class="d3 dv"><span class="s1">正在退款</span><a class="s2" href="order.php?ddzb=back"><?=returncount("yjcode_order where ddzt='back' and userid=".$row[id])?></a></div>
  </div>
  <!--买家E-->

 
</div>
<!--右E-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>