<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","yjcode_gd where bh='".$bh."' and zt=99 and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("gdlist.php");}

//函数开始
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $txt=sqlzhuru($_POST[content]);
 updatetable("yjcode_gd","
			 sj='".$sj."',
			 zt=1,
			 mot='".sqlzhuru($_POST[tmot])."',
			 mail='".sqlzhuru($_POST[tmail])."',
			 orderbh='".sqlzhuru($_POST[torderbh])."',
			 txt='".$txt."',
			 gdzt=1
			 where bh='".$bh."' and userid=".$userid);
 php_toheader("gdlist.php");

}
//函数结果

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
<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
      id : 'content',
       resizeMode : 1,
       cssPath : '../ckeditor/examples/index.css',
       items : [
       'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
       'removeformat','image', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
       'insertunorderedlist']
});
function tj(){
tjwait();
f1.action="gd.php?bh=<?=$bh?>&control=update";
}
</script>

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 工单管理</li>
</ul>
<? $leftid=4;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap12.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l7"><span class="red">*</span> 问题描述：</li>
 <li class="l8"><textarea id="content" name="content" style="width:640px;height:440px;visibility:hidden;"></textarea></li>
 <li class="l1">订单编号：</li>
 <li class="l2"><input type="text" size="20" class="inp" name="torderbh" /> [<a href="order.php" target="_blank">查看我的订单</a>]</li>
 <li class="l1">手机号码：</li>
 <li class="l2"><input type="text" size="20" value="<?=$rowuser[mot]?>" class="inp" name="tmot" /></li>
 <li class="l1">邮箱号码：</li>
 <li class="l2"><input type="text" size="20" value="<?=$rowuser[email]?>" class="inp" name="tmail" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交问题","gdlist.php")?></li>
 </ul>
 </form>

 <!--E-->
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>