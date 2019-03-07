<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="update"){
 if($ht1[1]!="yjadmin"){Audit_alert("后台路径不对，如要使用模板，请先改为yjadmin","moban.php");}
 updatetable("yjcode_control","nowmb='".$_GET[mb]."'");
 php_toheader("tohtml.php?admin=0&action=gx");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function mbcha(x){
 if(confirm("是否启用"+x+"模板")){location.href="moban.php?control=update&mb="+x;}else{return false;}
}
</script>
</head>
<body>

<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：<a href="default.php">后台首页</a> - <strong>模板管理</strong></li><li class="l2"></li>
 </ul>
 
 <!--Begin-->
 <div class="rights">
 &nbsp;&nbsp;温馨提示：<br>
 &nbsp;&nbsp;1、您的网站目前共配置了<strong class="red" id="mbnum">...</strong>套模板，更多模板请访问<a href="http://www.yj99.cn" target="_blank" class="blue">友价官网</a>获取<br>
 &nbsp;&nbsp;2、点击模板图片可以查看全图，但为了节省您的带宽，效果图采用高压缩模式，但启用后您的网站是高清效果<br>
 &nbsp;&nbsp;3、如要使用模板，后台路径必须为yjadmin
 </div>
 <div class="mblist">
 <? $i=0;foreach(getDir("../tem/moban/") as $color){?>
  <div class="d1" onmouseover="this.className='d1 d11';" onmouseout="this.className='d1';"><? if($rowcontrol[nowmb]==$color){?><span class="s1">当前模板</span><? }?><a href="../tem/moban/<?=$color?>/homeimg/moban_big.jpg" target="_blank"><img border="0" src="../tem/moban/<?=$color?>/homeimg/moban_small.jpg" width="120" height="120" /></a><br><?=$color?><br><a href="javascript:void(0);" onclick="mbcha('<?=$color?>')">点击启用</a></div>
 <? $i++;}?>
 </div>
 <script language="javascript">
 document.getElementById("mbnum").innerHTML=<?=$i?>;
 </script>
 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>

</body>
</html>