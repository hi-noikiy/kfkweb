<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$orderbh=$_GET[orderbh];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("./");}

if($_GET[control]=="update"){
 updatetable("yjcode_tp","xh=".$_GET[xh]." where id=".$_GET[id]);
 php_toheader("orderpjtp.php?t=suc&orderbh=".$orderbh);
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
<script language="javascript">
function xhonc(x){
location.href="orderpjtp.php?id="+x+"&orderbh=<?=$orderbh?>&control=update&xh="+document.getElementById("xh"+x).value;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 订单评价</li>
</ul>
<? $leftid=2;include("left.php");?>
<!--RB-->
<div class="right">

 <? systs("恭喜您，操作成功!","orderpjtp.php?orderbh=".$orderbh)?>
 <ul class="protpcap">
 <li class="l1">图片</li>
 <li class="l2">排序</li>
 <li class="l3">最后更新</li>
 <li class="l4">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="NcheckDEL(13,'yjcode_tp')" class="a2">删除</a>
 </li>
 <li class="l3"></li>
 </ul>
 <? while1("*","yjcode_tp where bh='".$orderbh."' and userid=".$userid." order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../".str_replace(".","-1.",$row1[tp]);?>
 <ul class="protplist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2"><a href="../<?=$row1[tp]?>" target="_blank"><img border="0" class="imgtp" src="<?=$tp?>" width="52" height="52" align="left" /></a></li>
 <li class="l3"><input type="text" value="<?=$row1[xh]?>" id="xh<?=$row1[id]?>" style="width:30px;margin:0 0 8px 0;text-align:center;" /><br><a href="javascript:void(0);" class="blue" onclick="xhonc(<?=$row1[id]?>)">【保存】</a></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5"><a href="../<?=$row1[tp]?>" target="_blank">查看图片</a></li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>