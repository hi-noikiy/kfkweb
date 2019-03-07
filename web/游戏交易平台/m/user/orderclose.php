<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="close"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","yjcode_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("支付密码有误！","orderclose.php?orderbh=".$orderbh);}
 if($row[ddzt]!="wait"){Audit_alert("未知错误！","orderview.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num]+$row[yunfei];
 PointUpdateM($userid,$allmoney);
 PointIntoM($userid,"取消订单",$allmoney);
 updatetable("yjcode_order","ddzt='close' where userid=".$userid." and id=".$row[id]);
 php_toheader("orderview.php?orderbh=".$orderbh); 

}
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 取消订单&nbsp;&nbsp;&nbsp;<?=$orderbh?></div>
</div>

 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入支付密码");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="orderclose.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="tishi box">
 <div class="d1">
 <strong>* 站长提示：</strong><br>
 * 首次注册用 户请联系客服办理激活，以便完成发货！！！    
 </div>
 </div>
 <div class="uk box"><div class="d1"><img src="../img/suo.png" /></div><div class="d2"><input placeholder="请输入您的支付密码" name="t1" class="inp" size="30" type="password"/></div></div>
 <div class="tjbutton box"><div class="d0"></div><? tjbtnr_m("取消订单");?><div class="d0"></div></div>
 <input type="hidden" value="close" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>


<? include("bottom.php");?>
</body>
</html>