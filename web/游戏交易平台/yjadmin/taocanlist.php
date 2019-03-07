<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

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
document.getElementById("menu3").className="l31";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_product.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong>套餐管理</strong></li><li class="l2"></li></ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;当前编辑的商品为：<strong class="blue"><?=$row[tit]?></strong>
 </div>
 
 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;套餐说明</li>
 <li class="l3">序号</li>
 <li class="l3">原价</li>
 <li class="l3">优惠价</li>
 <li class="l5">操作&nbsp;</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="taocanlx.php?bh=<?=$bh?>" class="a1">新增套餐</a>
 <a href="javascript:checkDEL(33,'yjcode_taocan')" class="a2">删除</a>
 </li>
 </ul>
 <?
 while1("*","yjcode_taocan where probh='".$bh."' and zt=0 and admin is null order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="taocan.php?id=".$row1[id]."&bh=".$bh;
 ?>
 <ul class="typelist1" onmouseover="this.className='typelist1 typelist11';" onmouseout="this.className='typelist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;<strong><?=$row1[tit]?></strong></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l3"><?=$row1[money2]?></li>
 <li class="l3 feng"><?=$row1[money1]?></li>
 <li class="l5">
 <? if(4==$row1[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row1[id]?>&bh=<?=$bh?>" target="_blank">库存管理</a> | <? }?>
 <a href="taocan1lx.php?ty1id=<?=$row1[id]?>&bh=<?=$bh?>">添加二级套餐</a> | <a href="<?=$nu?>">编辑</a>&nbsp;
 </li>
 </ul>
 <?
 while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$bh."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="taocan1.php?id=".$row2[id]."&ty1id=".$row1[id]."&bh=".$bh; 
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="xcf<?=$row2[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;&nbsp;- <?=$row2[tit2]?></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l3"><?=$row2[money2]?></li>
 <li class="l3 feng"><?=$row2[money1]?></li>
 <li class="l5">
 <? if(4==$row2[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row2[id]?>&bh=<?=$bh?>" target="_blank">库存管理</a> | <? }?>
 <a href="<?=$nu?>">编辑</a>&nbsp;
 </li>
 </ul>
 <? }}?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>