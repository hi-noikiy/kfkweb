<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[zt]!=""){$ses=$ses." and ifok=".$_GET[zt]."";}
if($_GET[st1]!=""){$ses=$ses." and ddbh='".$_GET[st1]."'";}
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
location.href="renglist.php?st1="+$("st1").value;	
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
 <li class="l1">当前位置：后台首页 - <strong>会员充值人工对账</strong></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;<span class="red">建议不要删除对账记录</span>
 </div>
 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">单号搜索：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;单号核对</li>
 <li class="l15">会员</li>
 <li class="l3">金额核对</li>
 <li class="l4">时间</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(35,'yjcode_payreng')" class="a2">删除</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_payreng","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="reng.php?id=".$row[id];
 if(1==$row[type1]){$ty="支付宝";}
 elseif(2==$row[type1]){$ty="微信";}
 elseif(16==$row[type1]){$ty="My card";}
elseif(15==$row[type1]){$ty="橘子GASH";}
elseif(18==$row[type1]){$ty="MOL(马来)";}
 if(1==$row[ifok]){$dz="<span class='hui'>等待对账</span> | ";}
 elseif(2==$row[ifok]){$dz="<span class='blue'>对账成功</span> | ";}
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$au?>')">&nbsp;<?=$dz.$ty?> | <?=$row[ddbh]?></li>
 <li class="l15"><?=returnuser($row[userid])?></li>
 <li class="l3 feng"><?=sprintf("%.2f",$row[money1])?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7">
 <a href="<?=$au?>">详情</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="renglist.php";
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