<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="ret"){deletetable("yjcode_update");php_toheader("default.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("����������ʧ�ܵ�����²��ύ����������ȷ����")){location.href="default.php?control=ret";}else{return false;}	
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
 <li class="l1">��ǰλ�ã���̨��ҳ - ��ӭҳ</li><li class="l2"></li>
 </ul>
 
 
 
<script language="javascript">gxchk();</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<!--ͳ��B-->
<div class="tongji">
 <ul class="u1">
 <li class="l1">&nbsp;�û���Ϣͳ��</li>
 <li class="l2">
 <a href="userlist.php?shopzt=1"><strong class="red"><?=returncount("yjcode_user where shopzt=1")?></strong><br>�������</a>
 <a href="baomoneylist.php?zt=1"><strong class="red"><?=returncount("yjcode_baomoneyrecord where zt=1")?></strong><br>�ⶳ��֤��</a>
 <a href="txlist.php?zt=4"><strong class="red"><?=returncount("yjcode_tixian where zt=4")?></strong><br>��Ҫ��������</a>
 <a href="userlist.php?rz=xy"><strong class="red"><?=returncount("yjcode_user where sfzrz=0")?></strong><br>ʵ����֤���</a>
 <a href="renglist.php?zt=1"><strong class="red"><?=returncount("yjcode_payreng where ifok=1")?></strong><br>�˹��������</a>
 <a href="userlist.php?zt=0"><strong><?=returncount("yjcode_user where zt=0")?></strong><br>���û�Ա</a>
 <a href="userlist.php"><strong><?=returncount("yjcode_user")?></strong><br>���û���</a>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">&nbsp;��Ʒ/������Ϣͳ��</li>
 <li class="l2">
 <a href="productlist.php?zt=1"><strong class="red"><?=returncount("yjcode_pro where zt=1")?></strong><br>��Ҫ�����Ʒ</a>
 <a href="productlist.php"><strong><?=returncount("yjcode_pro where zt<>99")?></strong><br>������Ʒ</a>
 <? $ddztarr=array("wpay","wait","db","back","backsuc","backerr","suc","close");for($i=0;$i<count($ddztarr);$i++){?>
 <a href="orderlist.php?ddzt=<?=$ddztarr[$i]?>"><strong><?=returncount("yjcode_order where ddzt='".$ddztarr[$i]."'")?></strong><br><?=returnorderzt($ddztarr[$i])?></a>
 <? }?>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">&nbsp;������Ϣͳ��</li>
 <li class="l2">
 <a href="newslist.php?zt=1"><strong class="red"><?=returncount("yjcode_news where zt=1")?></strong><br>��Ҫ��˸��</a>
 <a href="tasklist.php?zt=1"><strong class="red"><?=returncount("yjcode_task where zt=1")?></strong><br>��Ҫ�������</a>
 <a href="tasklist.php?zt=8"><strong class="red"><?=returncount("yjcode_task where zt=8")?></strong><br>�о��׵�����</a>
 <a href="gdlist.php?gdzt=1"><strong class="red"><?=returncount("yjcode_gd where gdzt=1 and zt<>99")?></strong><br>�ȴ�������</a>
 <a href="newspjlist.php?zt=1"><strong class="red"><?=returncount("yjcode_newspj where zt=1")?></strong><br>�����Ѷ����</a>
 <a href="inf2.php"><strong<? if($rowcontrol[smskc]<=50){?> class="red"<? }?>><?=$rowcontrol[smskc]?></strong><br>���ö�������</a>
 <a href="tasklist.php"><strong><?=returncount("yjcode_task where zt<>99")?></strong><br>��������</a>
 <a href="taskhflist.php"><strong><?=returncount("yjcode_taskhf")?></strong><br>��������ظ�</a>
 </li>
 </ul>

</div>
<!--ͳ��E-->

 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>