<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 运费模板</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("sellzf.php");?>
 
 <ul class="typecap">
 <li class="l1">模板名称</li>
 <li class="l4">运费</li>
 <li class="l4">编辑时间</li>
 <li class="l4">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:NcheckDEL(11,'yjcode_yunfei')" class="a2">删除</a>
 <a href="yunfeilx.php" class="a1">新增模板</a>
 </li>
 <li class="l3"></li>
 </ul>
   
 <?
 $ses=" where zt=0 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_yunfei","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><a href="yunfei.php?bh=<?=$row[bh]?>"><strong><?=$row[tit]?></strong></a></li>
 <li class="l4"><?=$row[money1]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l4"><a href="yunfei.php?bh=<?=$row[bh]?>" class="blue">编辑</a> | <a href="yunfeiarea.php?id=<?=$row[id]?>" class="blue">管理区域</a></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="yunfeilist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>