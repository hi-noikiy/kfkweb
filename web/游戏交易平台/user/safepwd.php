<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

//入库操作开始
if($_POST[jvs]=="safepwd"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 if(panduan("*","yjcode_user where uid='".$_SESSION[SHOPUSER]."' and zfmm='".$pwd."'")==0){Audit_alert("安全码验证失败，返回重试！","safepwd.php");}
 $_SESSION[SAFEPWD]=$pwd;
 php_toheader("safepwd.php");
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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 安全码登录</li>
</ul>
<? $leftid=5;include("left.php");?>
<!--RB-->
<div class="right">
 
 <? if(empty($_SESSION[SAFEPWD])){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入安全码");document.f1.t1.focus();return false;}	
 tjwait();
 f1.action="safepwd.php";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="safepwd" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 安全码：</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"></li>
 <li class="l21 blue">如果没有设置安全码，请用帐号密码进行登录，为了安全起见，建议您<a href="zfmm.php" class="red">设置独立的安全码</a></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("登录")?></li>
 </ul>
 </form>
 <? }else{?>
 <ul class="uk">
 <li class="l1"></li>
 <li class="l21 blue">您的安全码已经通过验证，可进行更多操作</li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>