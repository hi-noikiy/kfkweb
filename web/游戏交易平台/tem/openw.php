<?
include("../config/conn.php");
include("../config/function.php");

//��¼��֤��ʼ
if($_GET[control]=="dl"){
 zwzr();
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 if(empty($uid) || empty($pwd)){Audit_alert("�ʺŻ������������󣬷�������","openw.php");}
 while0("id,uid,pwd,zt","yjcode_user where uid='".$uid."' and pwd='".sha1($pwd)."'");if(!$row=mysql_fetch_array($res)){Audit_alert("�ʺ������������󣬷�������","openw.php");}
 if(0==$row[zt]){Audit_alert("�����ʺ��ѱ����ã�����ϵ��վ�ͷ�����","openw.php");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$uid;
 php_toheader("openw.php?t=suc");
}
//��¼��֤����

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��¼/ע�ᵯ��</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:left;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
a{color:#333;text-decoration:none;}
a:hover{color:#ff6600;}
.blue{color:#3366CC;}
ul{list-style-type:none;margin:0;padding:0;}
.yjcode{float:left;width:300px;height:248px;background-color:#fff;}
.dl{float:left;width:240px;padding:10px 30px 0 30px;}
.dl .suc{float:left;width:240px;color:#6B6B6B;background:url(../img/suc.jpg) center top no-repeat;padding:100px 0 0 0;height:50px;line-height:25px;text-align:center;}
.dl .u2{float:left;width:240px;}
.dl .u2 li{float:left;}
.dl .u2 .l1{width:120px;height:17px;}
.dl .u2 .l2{width:120px;height:17px;text-align:right;}
.dl .u2 .l3{height:37px;width:240px;}
.dl .u2 .l3 input{float:left;border:#CBCBCB solid 1px;height:24px;width:238px;outline:medium;}
.dl .u2 .l4{height:37px;width:240px;}
.dl .u2 .l4 input{float:left;color:#fff;font-weight:700;border:#E5810E solid 1px;background-color:#F3A01A;width:240px;height:29px;cursor:pointer;}
</style>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("�������ʺ�");document.f1.t1.focus();return false;}	
 if((document.f1.t2.value).replace("/\s/","")==""){alert("����������");document.f1.t2.focus();return false;}	
 document.getElementById("tjbtn").style.display="none";
 document.getElementById("tjing").style.display="";	
 f1.action="openw.php?control=dl";
}
function miaos(){
parent.location.reload();
}
</script>
</head>
<body>
<div class="yjcode">

<form name="f1" method="post" onsubmit="return tj()">
<div class="dl">
 <? if($_GET[t]=="suc"){?>
 <div class="suc">
 <strong>��¼�ɹ��������֮ǰ�Ĳ���</strong><br>
 <span id="miao">5</span>����Զ���ת(��δ��ת,��ˢ��)
 </div>
 <? }else{?>
 <ul class="u2">
 <li class="l1">��¼����</li>
 <li class="l2"></li>
 <li class="l3"><input type="text" name="t1" autocomplete="off" disableautocomplete /></li>
 <li class="l1">��¼���룺</li>
 <li class="l2"><a href="<?=weburl?>reg/getpasswd.php" class="blue" target="_blank">���ǵ�¼����?</a></li>
 <li class="l3"><input type="password" name="t2" autocomplete="off" disableautocomplete /></li>
 <li class="l4"><? tjbtnr("�� ¼")?></li>
 <li class="l1"><a href="<?=weburl?>config/qq/oauth/index.php" target="_blank" class="blue">QQ��¼</a></li>
 <li class="l2"><a href="<?=weburl?>reg/reg.php" class="blue" target="_blank">���ע��</a></li>
 </ul>
 <? }?>
</div>
</form>
<? if($_GET[t]=="suc"){?>
<script language="javascript">
setTimeout("miaos()",4000);
</script>
<? }?>
</div>
</body>
</html>