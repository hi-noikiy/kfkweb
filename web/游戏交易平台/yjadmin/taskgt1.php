<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
$useridhf=$_GET[useridhf];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_task where taskty=1 and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("tasklist1.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">��ǰλ�ã���̨��ҳ - ������� - �������� - <strong>��ͨ��¼</strong> [<a href="task1.php?id=<?=$row[id]?>">����</a>]</li><li class="l2"></li>
 </ul>

 <!--B-->
 <div class="gdhflist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <ul class="u1">
  <li class="l1"><img src="<?=returntppd("../upload/".$row[userid]."/user.jpg","img/nonetx.jpg")?>" width="40" height="40" /></li>
  <li class="l2">[����] <?=$row[txt]?><br><?=$row[sj]?></li>
  </ul>
  <? 
  while1("*","yjcode_tasklog where bh='".$bh."' and useridhf=".$useridhf." order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.jpg");$sf="����";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[useridhf]."/user.jpg","img/nonetx.jpg");$sf="���ַ�";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? }?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>

</body>
</html>