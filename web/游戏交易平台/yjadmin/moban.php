<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="update"){
 if($ht1[1]!="yjadmin"){Audit_alert("��̨·�����ԣ���Ҫʹ��ģ�壬���ȸ�Ϊyjadmin","moban.php");}
 updatetable("yjcode_control","nowmb='".$_GET[mb]."'");
 php_toheader("tohtml.php?admin=0&action=gx");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function mbcha(x){
 if(confirm("�Ƿ�����"+x+"ģ��")){location.href="moban.php?control=update&mb="+x;}else{return false;}
}
</script>
</head>
<body>

<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>

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
 <li class="l1">��ǰλ�ã�<a href="default.php">��̨��ҳ</a> - <strong>ģ�����</strong></li><li class="l2"></li>
 </ul>
 
 <!--Begin-->
 <div class="rights">
 &nbsp;&nbsp;��ܰ��ʾ��<br>
 &nbsp;&nbsp;1��������վĿǰ��������<strong class="red" id="mbnum">...</strong>��ģ�壬����ģ�������<a href="http://www.yj99.cn" target="_blank" class="blue">�Ѽ۹���</a>��ȡ<br>
 &nbsp;&nbsp;2�����ģ��ͼƬ���Բ鿴ȫͼ����Ϊ�˽�ʡ���Ĵ���Ч��ͼ���ø�ѹ��ģʽ�������ú�������վ�Ǹ���Ч��<br>
 &nbsp;&nbsp;3����Ҫʹ��ģ�壬��̨·������Ϊyjadmin
 </div>
 <div class="mblist">
 <? $i=0;foreach(getDir("../tem/moban/") as $color){?>
  <div class="d1" onmouseover="this.className='d1 d11';" onmouseout="this.className='d1';"><? if($rowcontrol[nowmb]==$color){?><span class="s1">��ǰģ��</span><? }?><a href="../tem/moban/<?=$color?>/homeimg/moban_big.jpg" target="_blank"><img border="0" src="../tem/moban/<?=$color?>/homeimg/moban_small.jpg" width="120" height="120" /></a><br><?=$color?><br><a href="javascript:void(0);" onclick="mbcha('<?=$color?>')">�������</a></div>
 <? $i++;}?>
 </div>
 <script language="javascript">
 document.getElementById("mbnum").innerHTML=<?=$i?>;
 </script>
 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>

</body>
</html>