<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

//入库操作开始
if($_POST[jvs]=="openshop"){
 zwzr();
 updatetable("yjcode_user","shopzt=0 where uid='".$_SESSION[SHOPUSER]."' and shopzt=3");
 php_toheader("openshop1.php");
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
function tj(){
if(confirm("确定重新提交开店申请吗？")){tjwait();f1.action="openshop3.php";}else{return false;}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">

<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 申请开店</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("kdcap.php");?>
 <script language="javascript">
 document.getElementById("step3").className="l1 l11";
 </script>

 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="openshop" name="jvs" />
 <ul class="uk">
 <li class="l1">审核结果：</li>
 <li class="l21"><?=returnshopztv($rowuser[shopzt])?></li>
 <li class="l1"></li>
 <li class="l21">如有疑问，请<a href="../help/aboutview4.html" class="blue" target="_blank">点击联系网站客服</a></li>
 <? if(3==$rowuser[shopzt]){?>
 <li class="l1">被拒原因：</li>
 <li class="l21"><?=$rowuser[shopztsm]?></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("重新提交")?></li>
 <? }?>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>