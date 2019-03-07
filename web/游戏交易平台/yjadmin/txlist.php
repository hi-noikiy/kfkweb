<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$userid=returnuserid($_GET[st1]);$ses=$ses." and userid=".$userid;}
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
location.href="txlist.php?st1="+$("st1").value+"&zt="+$("zt").value;	
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
 <li class="l1">当前位置：后台首页 - <strong>会员提现管理</strong></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;<span class="red">等待受理的提现申请无法删除，如要删除，请先将提现状态设为非等待受理</span>
 </div>
 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">会员帐号：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <select id="zt">
 <option value="">==不限==</option>
 <option value="1"<? if(1==$_GET[zt]){?> selected="selected"<? }?>>提现成功</option>
 <option value="2"<? if(2==$_GET[zt]){?> selected="selected"<? }?>>用户撤销提现</option>
 <option value="3"<? if(3==$_GET[zt]){?> selected="selected"<? }?>>提现失败</option>
 <option value="4"<? if(4==$_GET[zt]){?> selected="selected"<? }?>>等待受理</option>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;提现信息</li>
 <li class="l15">提现银行</li>
 <li class="l3">提现金额</li>
 <li class="l4">提现时间</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(10,'yjcode_tixian')" class="a2">删除</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_tixian","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="tx.php?id=".$row[id];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$au?>')">&nbsp;<?=returnuser($row[userid])?> | <?=returntxzt($row[zt],$row[sm])?></li>
 <li class="l15"><?=$row[txyh]?></li>
 <li class="l3"><?=$row[money1]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7">
 <a href="<?=$au?>">编辑</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="txlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>