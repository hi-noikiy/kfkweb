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
$("menu5").className="l51";
</script>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>广告管理</strong></li><li class="l2">&nbsp;</li>
 </ul>
 
 <? include("rightcap2.php");?>
 <script language="javascript">$("rtit1").className="l1";</script>

 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l2">&nbsp;广告定位编号</li>
 <li class="l2">&nbsp;说明</li>
 <li class="l9">管理</li>
 </ul>
 
 <?
 $adbh=array("ADDL","ADLP","ADI00","ADI01","ADI02","shang_01","ADI05","ADI13","ADI14","ADTOP");
 $adtit=array("对联广告","首页拉屏广告","首页顶部广告","底部广告","导航菜单","首页切换图片","顶部搜索框右方广告","首页底部合作伙伴","首页底部友情链接","全部顶部广告");
 $adsize=array("100*?","1150*?","1150*?","1150*?","","1920*350","250*75","100*35","","1150*?");
 $admust=array("pic","pic","","","font","pic","","pic","font","");
 
 for($i=0;$i<count($adbh);$i++){
 $adurl="adlist.php?bh=".$adbh[$i]."&sm=".urlencode($adtit[$i]."-".$adsize[$i])."&must=".$admust[$i];
 ?>
 <ul class="typelist1" onMouseOver="this.className='typelist1 typelist11';" onMouseOut="this.className='typelist1';">
 <li class="l2" onclick="gourl('<?=$adurl?>')">&nbsp;<?=$adbh[$i]?></li>
 <li class="l2">&nbsp;<?=$adtit[$i]." ".$adsize[$i]?></li>
 <li class="l9">
 <a href="<?=$adurl?>">列表</a> | 
 <a href="ad.php?bh=<?=$adbh[$i]?>&sm=<?=urlencode($adtit[$i]."-".$adsize[$i])?>&must=<?=$admust[$i]?>">新增</a>
 </li>
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