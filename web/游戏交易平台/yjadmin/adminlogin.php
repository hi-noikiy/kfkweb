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
<title><?=webname?>�����̨</title>
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
 <ul class="wz"><li class="l1">��ǰλ�ã�<a href="./" class="a2">��̨��ҳ</a> - <strong>����Ա��¼��־</strong></li><li class="l2"></li></ul>

 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;����Ա</li>
 <li class="l3">����</li>
 <li class="l4">��¼ʱ��</li>
 <li class="l5">��¼IP&nbsp;</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(37,'yjcode_loginlog')" class="a2">ɾ��</a>
 </li>
 </ul>
 <?
 pagef(" where admin=2",20,"yjcode_loginlog","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2">&nbsp;<strong><?=returnadmin($row[userid])?></strong></li>
 <li class="l3">��¼</li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 </ul>
 <? }?>
 <?
 $nowurl="adminlogin.php";
 $nowwd="";
 include("page.html");
 ?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>