<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$pdpwd=1;

//入库操作开始
if($_POST[jvs]=="password"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $pwd1=sha1(sqlzhuru($_POST[t2]));
 $pwd2=sqlzhuru($_POST[t2]);
 $uid=$_SESSION[SHOPUSER];
 if(panduan("*","yjcode_user where uid='".$uid."' and pwd='".$pwd."'")==0){Audit_alert("原密码验证失败，返回重试！","pwd.php");}
 updatetable("yjcode_user","pwd='".$pwd1."' where uid='".$_SESSION[SHOPUSER]."'");
 include("../tem/uc/pwd.php");
 php_toheader("pwd.php?t=suc");
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
 v=document.f1.t1.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("请输入旧密码");document.f1.t1.focus();return false;}	
 v=document.f1.t2.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("请输入新密码");document.f1.t2.focus();return false;}	
 if(document.f1.t2.value!=document.f1.t3.value){alert("两次输入的新密码不一致");document.f1.t3.focus();return false;}	
 tjwait();
 f1.action="pwd.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 修改登录密码</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("恭喜您，操作成功!","pwd.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="password" name="jvs" />
 <ul class="uk">
 <? 
 while1("id,uid,pwd,shopzt","yjcode_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);
 if(strcmp(sha1("123456"),$row1[pwd])==0){
 ?>
 <li class="l1">提示：</li>
 <li class="l21">尊敬的 <strong class="blue"><?=returnnc($luserid)?></strong>，为了您的帐户安全，请先修改密码(请勿使用123456这类简单的密码)</li>
 <? }?>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 当前密码：</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 新密码：</li>
 <li class="l2"><input type="password" class="inp" name="t2" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 确认密码：</li>
 <li class="l2"><input type="password" class="inp" name="t3" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("保存修改")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>