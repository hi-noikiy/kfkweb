<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$m=returnsx("m");
switch($m){
 case 1: $nurl=weburl."task/view".returnsx("i").".html";$nstr="���ã�����Ͷ����Ϣ�Ѿ����ͣ����ĵȴ�����ѡ��";break;
 case 2: $nurl=weburl."task/view".returnsx("i").".html";$nstr="���ã����ѽӵ��ɹ�������������һ����ʱ�ύ����";break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="refresh" content="10;url=<?=$nurl?>">  
<title>������ʾ - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="yjcode">
 <div class="succap">��ʾ</div>
 <div class="sucmain">
  <strong><?=$nstr?></strong><br>
  <a href="<?=$nurl?>">5���ϵͳ���Զ���ת��Ҳ�ɵ���˴�ֱ����ת</a>
 </div>
</div>

<? include("../tem/bottom.html");?>
</body>
</html>