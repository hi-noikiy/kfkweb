<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'utf8'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader(gloweb);}

//入库操作开始
if($_POST[jvs]=="bao"){
 zwzr();
 $t1=floatval($_POST[t1]);
 if($t1>$rowuser[baomoney]){Audit_alert("可用保证金不足","baomoney2.php");}
 if($t1<=0){Audit_alert("未知错误","baomoney1.php");}
 PointIntoB($rowuser[id],"解冻保证金",$t1*(-1),0,1);
 PointUpdateB($rowuser[id],$t1*(-1)); 
 php_toheader("baomoney2.php?t=suc");
}
//入库操作结束 

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
if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入保证金数量");document.f1.t1.focus();return false;}	
if(!confirm("确定要解冻保证金吗？")){return false;}
tjwait();
f1.action="baomoney2.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 缴纳保证金</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap15.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="g_ac0_h g_bc0_h";
 </script>

 <? systs("恭喜您，操作成功!","baomoney2.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="bao" name="jvs" />
 <ul class="uk">
 <li class="l1">剩余保证金：</li>
 <li class="l21"><?=$rowuser[baomoney]?>元</li>
 <li class="l1">可用余额：</li>
 <li class="l21"><?=$rowuser[money1]?>元</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 解冻保证金：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("解冻保证金")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>