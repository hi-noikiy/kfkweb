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
<title><?=webname?>管理系统</title>
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
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>会员等级列表</strong></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;<span class="red">排序第一位的等级便是用户注册后默认的等级</span>
 </div>

 <!--B-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;等级信息</li>
 <li class="l15">等级费用</li>
 <li class="l3">排序</li>
 <li class="l4">最后更新</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(36,'yjcode_userdj')" class="a2">删除</a>
 <a href="userdjlx.php" class="a1">新增等级</a>
 </li>
 </ul>
 <?
 while0("*","yjcode_userdj where zt=0 order by xh asc");while($row=mysql_fetch_array($res)){
 $aurl="userdj.php?bh=".$row[bh];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')">&nbsp;<strong><?=$row[name1]?></strong> [<?=$row[zhekou]?>折]</li>
 <li class="l15"><?=$row[money1]?>元/<? if(empty($row[jgdw])){echo "月";}else{echo "年";}?></li>
 <li class="l3"><?=$row[xh]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7"><a href="<?=$aurl?>">修改</a></li>
 </ul>
 <? }?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>