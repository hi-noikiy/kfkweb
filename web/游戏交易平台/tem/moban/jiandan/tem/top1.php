<?
include("../config/conn.php");
include("../config/function.php");
?>
<!--导航B-->
<div class="bfb bfbtop1 fontyh">
<div class="yjcode">
 <div class="logo"><a href="<?=weburl?>"><img alt="<?=webname?>" border="0" src="<?=weburl?>img/logo.png" /></a></div>
 <div class="menu">
 <a href="<?=weburl?>">首页</a>
 <? while1("*","yjcode_ad where adbh='ADI02' and type1='文字' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>"><?=$row1[tit]?></a>
 <? }?>
 </div>
</div>
</div>
<!--导航E-->
