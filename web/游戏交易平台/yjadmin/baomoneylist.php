<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[st1]!=""){$userid=returnuserid($_GET[st1]);$ses=$ses." and userid=".$userid;}
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
function ser(){
location.href="baomoneylist.php?st1="+$("st1").value;	
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu2").className="l21";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_user.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>保证金管理</strong></li><li class="l2"></li>
 </ul>
 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">会员帐号：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;说明</li>
 <li class="l3">保证金</li>
 <li class="l4">操作时间</li>
 <li class="l15">操作IP</li>
 <li class="l7">会员</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(39,'yjcode_baomoneyrecord')" class="a2">删除</a>
 </li>
 </ul>
 <? pagef($ses,20,"yjcode_baomoneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){$au="baomoney.php?id=".$row[id];?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><? if(1<>$row[zt]){?><input name="C1" type="checkbox" value="<?=$row[id]?>" /><? }?></li>
 <li class="l2" onclick="gourl('<?=$au?>')">&nbsp;<?=$row[tit]?> [<?=returnztv($row[zt])?>]</li>
 <li class="l3"><? if($row[moneynum]>0){?><span class="blue"><?=$row[moneynum]?></span><? }else{?><span class="red"><?=$row[moneynum]?></span><? }?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l15"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 <li class="l7"><?=returnuser($row[userid])?></li>
 </ul>
 <? }?>
 <?
 $nowurl="baomoneylist.php";
 $nowwd="st1=".$_GET[st1]."&zt=".$_GET[zt];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>