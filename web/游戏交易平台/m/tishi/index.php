<?
include("../../config/conn.php");
include("../../config/function.php");
$a=intval($_GET[admin]);
if($a==1){
$str="�����޸ĳɹ������μ�����������";
$errdis="okts";
$bkurl="../user/";

}elseif($a==2){
$str="֧�������޸ĳɹ������μ�";
$errdis="okts";
$bkurl="../user/";

}elseif($a==3){
$str="���������޸ĳɹ�";
$errdis="okts";
$bkurl="../user/inf.php";

}elseif($a==4){
$str="��ϲ������Ʒ����ɹ�";
$errdis="okts";
$bkurl="../user/order.php";

}elseif($a==999){
$str="�����ɹ�";
$errdis="okts";
$bkurl=$_GET[b];

}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<meta http-equiv="refresh" content="5;url=<?=$bkurl?>">  
<title>������ʾ - �ֻ���<?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<style type="text/css">
body{background-color:#EBEBEB;}
</style>
</head>
<body>
<!--��ҳͷ��B-->
<div class="ntop">������ʾ</div>
<!--��ҳͷ��E-->

<div class="<?=$errdis?> box"><div class="dts"><strong><?=$str?></strong><br><a href="<?=$bkurl?>">5���ϵͳ���Զ���ת��Ҳ�ɵ���˴�ֱ����ת</a></div></div>

<? include("../tem/bottom.php");?>
</body>
</html>