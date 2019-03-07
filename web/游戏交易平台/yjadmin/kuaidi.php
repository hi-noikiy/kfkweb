<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","yjcode_kuaidi where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("kuaidilist.php");}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_kuaidi where tit='".sqlzhuru($_POST[ttit])."' and bh<>'".$bh."'")==1)
 {Audit_alert("该快递公司已存在！","kuaidi.php?bh=".$bh);}
 updatetable("yjcode_kuaidi","tit='".sqlzhuru($_POST[ttit])."',kdweb='".sqlzhuru($_POST[tkdweb])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",zt=0 where bh='".$bh."'");
 php_toheader("kuaidi.php?t=suc&bh=".$bh);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong>快递管理</strong> [<a href="kuaidilist.php">返回</a>]</li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","kuaidi.php?bh=".$bh);}?>
 
 <!--begin-->
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入快递公司名称！");document.f1.ttit.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="kuaidi.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 快递公司名称：</li>
 <li class="l2"><input type="text" value="<?=$row[tit]?>" class="inp" name="ttit" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">快递网址：</li>
 <li class="l2"><input type="text" value="<?=$row[kdweb]?>" class="inp" size="80" name="tkdweb" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1"><span class="red">*</span> 排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">序号越小，越靠前</span></li>
 <li class="l3"><? tjbtnr("保存修改","kuaidilist.php");?></li>
 </ul>
 </form>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>