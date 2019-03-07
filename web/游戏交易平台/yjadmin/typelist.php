<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

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
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong>商品分组</strong></li><li class="l2"></li></ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;1、每个分组的层级最少1级，最多3级。<br>
 &nbsp;2、但为了使网站的美观和实用性最佳，<span class="blue">我们推荐能使分组达到3级</span>。
 </div>

 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;大分类</li>
 <li class="l3">序号</li>
 <li class="l4">编辑时间</li>
 <li class="l5">操作&nbsp;</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="type1.php" class="a1">新增分类</a>
 <a href="javascript:checkDEL(4,'yjcode_type')" class="a2">删除</a>
 </li>
 </ul>
 <?
 while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="type1.php?action=update&id=".$row1[id];
 ?>
 <ul class="typelist1" onmouseover="this.className='typelist1 typelist11';" onmouseout="this.className='typelist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2" onclick="gourl('typelists.php?ty1id=<?=$row1[id]?>')">&nbsp;<strong><?=$row1[type1]?></strong></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5"><a href="type2.php?ty1id=<?=$row1[id]?>">添加子类</a> | <a href="<?=$nu?>">编辑</a> | <a href="typesxlist.php?typeid=<?=$row1[id]?>">附加选项</a>&nbsp;</li>
 </ul>
 <?
 }
 ?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>