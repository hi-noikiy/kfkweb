<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ty1id=$_GET[ty1id];
$ty2id=$_GET[ty2id];
$ty3id=$_GET[ty3id];
$ty1name=returntype(1,$ty1id);
$ty2name=returntype(2,$ty2id);
$ty3name=returntype(3,$ty3id);
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
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - 商品分组 - <strong><?=$ty1name?></strong> - <strong><?=$ty2name?></strong> - <strong><?=$ty3name?></strong>  [<a href="typelists.php?ty1id=<?=$ty1id?>">返回</a>]</li><li class="l2"></li></ul>
 
 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;分类列表</li>
 <li class="l3">序号</li>
 <li class="l4">编辑时间</li>
 <li class="l5">操作&nbsp;</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="type4.php?ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>&ty3id=<?=$ty3id?>" class="a1">新增分类</a>
 <a href="javascript:checkDEL('3a','yjcode_type')" class="a2">删除</a>
 </li>
 </ul>
 <?
 while1("*","yjcode_type where admin=4 and type1='".$ty1name."'and  type2='".$ty2name."' and  type3='".$ty3name."' order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="type4.php?ty1id=".$ty1id."&ty2id=".$ty2id."&ty3id=".$ty3id."&action=update&id=".$row1[id];
 ?>
 <ul class="typelist1" onmouseover="this.className='typelist1 typelist11';" onmouseout="this.className='typelist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;<strong><?=$row1[type4]?></strong></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5"><a href="type5.php?ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>&ty3id=<?=$ty3id?>&ty4id=<?=$row1[id]?>">添加五级分类</a> | <a href="<?=$nu?>">编辑</a>&nbsp;</li>
 </ul>
 <?
 while2("*","yjcode_type where admin=5 and type1='".$row1[type1]."' and type2='".$row1[type2]."' and type3='".$row1[type3]."' and type4='".$row1[type4]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="type5.php?action=update&id=".$row2[id]."&ty1id=".$ty1id."&ty2id=".$ty2id."&ty3id=".$ty3id."&ty4id=".$row1[id]; 
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="0xcf<?=$row2[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;&nbsp;- <?=$row2[type5]?></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[sj]?></li>
 <li class="l5"><a href="<?=$nu?>">编辑</a>&nbsp;</li>
 </ul>
 <?
 }
 }
 ?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>