<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt=0";
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
$("menu1").className="l11";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

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
 <li class="l1">��ǰλ�ã���̨��ҳ - <strong>�������ϵͳ</strong></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>��ʾ��</strong><br>
 &nbsp;<span class="red">�������ϵͳ���ۺ�������˵ģ��������������Ȩ��</span>
 </div>

 <!--B-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;���˵��</li>
 <li class="l3">�����</li>
 <li class="l15">��������</li>
 <li class="l4">������</li>
 <li class="l7">����</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(32,'yjcode_adlx')" class="a2">ɾ��</a>
 <a href="adlxlx.php" class="a1">������Ϣ</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_adlx","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="adlx.php?bh=".$row[bh];
 if($row[fflx]==1){$fflx="<span class='feng'>�̶�λ��</span>";}else{$fflx="<span class='green'>����λ�ñ䶯</span>";}
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')">&nbsp;<?=$row[tit]?></li>
 <li class="l3"><?=$row[adbh]?></li>
 <li class="l15"><?=$fflx?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="adlxlist.php";
 $nowwd="";
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>