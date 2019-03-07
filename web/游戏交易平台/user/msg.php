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
<?
 
sesCheck();
$bh=$_GET[id];
$userid=returnuserid($_SESSION[SHOPUSER]);

while0("*","yjcode_msg where id= ".$bh );if(!$row=mysql_fetch_array($res)){
	 
	 php_toheader("msglist.php");}
	 
 
?>
<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 投稿中心</li>
</ul>
<? $leftid=6;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="g_ac0_h g_bc0_h";
 </script>

 <div style="text-align:center; line-height:30px; border-bottom: solid dotted #CCCCCC; display:block; clear:both; width:100%">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"> <h1 ><?=$row[title]?></h1></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><?=$row[nr]?></td>
  </tr>
</table>

 </div>

 </div>
 
  

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>