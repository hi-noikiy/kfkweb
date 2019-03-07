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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 投稿中心</li>
</ul>
<? $leftid=3;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="typecap">
 <li class="l1">&nbsp;&nbsp;&nbsp;通知标题</li>
 
 <li class="l4">通知时间</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:NcheckDEL(14,'yjcode_tz')" class="a2">删除</a>
 
 </li>
 <li class="l3"></li>
 </ul>
  
 <?
 
 $ses=" where userid=0 or userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_msg","order by sj desc");while($row=mysql_fetch_array($res)){
  
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"> <input name="C1" type="checkbox" value="<?=$row[id]?>" /> </li>
 <li class="l1"><a href="msg.php?id=<?=$row[id]?>" ><?=strgb2312($row[title],0,60)?></a>  </li>
 
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="newslist.php";
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