<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 选择自助广告位</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="adlxcap">
 <li class="l1">选择</li>
 <li class="l2">广告位编号</li>
 <li class="l3">广告位说明</li>
 <li class="l4">剩余位置</li>
 <li class="l5">排队人数</li>
 </ul>
 <?
 while0("*","yjcode_adlx where admin=1 and zt=0 order by sj asc");while($row=mysql_fetch_array($res)){
 if(empty($row[maxnum])){$sywz="储足";}
 else{
  $a=$row[maxnum]-returncount("yjcode_ad where adbh='".$row[adbh]."' and zt=0");
  if($a<0){$sywz=0;}else{$sywz=$a;}
 }
 if($row[fflx]==1){$adlxu="adgd.php?bh=".$row[bh];}
 elseif($row[fflx]==2){$adlxu="adfd.php?bh=".$row[bh];}
 ?>
 <ul class="adlxlist" onclick="gourl('<?=$adlxu?>');" onmouseover="this.className='adlxlist adlxlist1';" onmouseout="this.className='adlxlist';">
 <li class="l1"><input name="R1" type="radio" value="<?=$row[bh]?>" /></li>
 <li class="l2"><?=$row[adbh]?></li>
 <li class="l3"><?=$row[tit]?></li>
 <li class="l4"><?=$sywz?></li>
 <li class="l5"><?=returncount("yjcode_ad where adbh='".$row[adbh]."' and zt=1")?></li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>