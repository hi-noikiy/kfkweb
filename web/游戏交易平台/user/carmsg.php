<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$id=$_GET[id];
while0("*","yjcode_car where id=".$id." and userid=".$userid);if(!$row=mysql_fetch_array($res)){Audit_alert("·������","car.php",".parent");}

if($_GET[control]=="update"){
 $sj=date("Y-m-d H:i:s");	
 updatetable("yjcode_car","bz='".sqlzhuru($_POST[s1])."' where id=".$id." and userid=".$userid);
 php_toheader("carmsg.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ﳵ����</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.red{color:#ff0000;}
.uk{float:left;width:300px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:300;height:142px;}
.uk .l1 textarea{float:left;width:300px;height:142px;}
.uk .l2{width:300px;height:55px;padding:13px 0 0 0;}
.uk .l2 input{cursor:pointer;float:left;width:300px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('���ڱ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="carmsg.php?control=update&id=<?=$id?>";
}
<? if($_GET["t"]=="suc"){?>
parent.document.getElementById("text<?=$row[id]?>").value="<?=$row[bz]?>";
var index = parent.layer.getFrameIndex(window.name); //��ȡ��������
parent.layer.close(index);
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()">
<input type="hidden" value="carmsg" name="jvs" />
<ul class="uk">
<li class="l1"><textarea name="s1"><?=$row[bz]?></textarea></li>
<li class="l2"><?=tjbtnr("����")?></li>
</ul>
</form>
</body>
</html>