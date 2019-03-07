<?
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$usertx="../../upload/".$rowuser[id]."/user.jpg";if(!is_file($usertx)){$usertx="../../user/img/nonetx.gif";}

?>
<div class="utop box">
 <div class="d1"><a href="../"><img src="../img/logo.png" /></a></div>
 <div class="d2">
 <a href="un.php">×¢Ïú</a>&nbsp;&nbsp;&nbsp;
 <a href="shezhi.php">ÉèÖÃ</a>&nbsp;&nbsp;&nbsp;
 <a href="sell.php">Âô¼Ò</a>
 </div>
</div>

<div class="itx box">
 <div class="d1"></div>
 <div class="d2"><a href="./"><img border="0" src="<?=$usertx?>" width="60" height="60" /></a></div>
 <div class="d1"></div>
</div>

<div class="nicheng box"><div class="d1"><?=$rowuser[nc]?></div></div>
<span id="webhttp" style="display:none"><?=weburl?></span>