<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[st1]!=""){$ses=$ses." and (nc like '%".$_GET[st1]."%' or uid like '%".$_GET[st1]."%')";}
if($_GET[shopzt]!=""){$ses=$ses." and shopzt=".$_GET[shopzt];}
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[rz]!=""){$ses=$ses." and sfzrz=0";}
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
location.href="userlist.php?st1="+$("st1").value;	
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
 <li class="l1">当前位置：后台首页 - <strong>用户管理</strong><? if($_GET[ut]!=""){?> - <?=returnuty($_GET[ut])?><? }?></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;<span class="red">删除会员会删除该会员名下所有信息，且不可恢复，请慎重</span>
 </div>

 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l8">&nbsp;会员帐号</li>
 <li class="l8">会员昵称</li>
 <li class="l17">会员等级</li>
 <li class="l15">开店状态</li>
 <li class="l3">可用余额</li>
 <li class="l17">时间/IP</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(9,'yjcode_user')" class="a2">删除</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_user","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="user.php?id=".$row[id];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l8"><? if(0==$row[zt]){?><span class="red">[禁]</span> <? }?><a class="blue" href="<?=$aurl?>"><?=$row[uid]?></a></li>
 <li class="l8"><?=$row[nc]?></li>
 <li class="l17"><?=returnuserdj($row[id])?></li>
 <li class="l15"><?=returnshopztv($row[shopzt])?></li>
 <li class="l3"><?=sprintf("%.2f",$row[money1])?></li>
 <li class="l17"><?=$row[sj]?>/<a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank">IP</a></li>
 <li class="l7">
 <a href="usermoney.php?id=<?=$row[id]?>">钱</a>|<a href="userbao.php?id=<?=$row[id]?>">保</a>|<a href="userjf.php?id=<?=$row[id]?>">分</a>|<a href="userrz.php?id=<?=$row[id]?>">证</a>|<a href="user_ses.php?uid=<?=$row[uid]?>" target="_blank">后台</a>|<a href="tz.php?uid=<?=$row[uid]?>&userid=<?=$row[id]?>" target="_blank">通知</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="userlist.php";
 $nowwd="st1=".$_GET[st1]."&shopzt=".$_GET[shopzt]."&zt=".$_GET[zt]."&rz=".$_GET[rz];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>