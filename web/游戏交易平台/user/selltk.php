<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="tk"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","yjcode_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("支付密码有误！","selltk.php?orderbh=".$orderbh);}
 if($row[ddzt]!="back"){Audit_alert("未知错误！","sellorderview.php?orderbh=".$orderbh);}
 while1("*","yjcode_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date("Y-m-d H:i:s");
 //同意B
 if(sqlzhuru($_POST[R1])=="yes"){
  $allmoney=$row[money1]*$row[num];
  PointUpdateM($row[userid],$allmoney);
  PointIntoM($row[userid],"卖家同意退款申请",$allmoney);
  updatetable("yjcode_order","ddzt='backsuc',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("yjcode_tk where orderbh='".$orderbh."' and selluserid=".$userid);
  deletetable("yjcode_db where orderbh='".$orderbh."' and selluserid=".$userid);
 //同意E
 //不同意B
 }elseif(sqlzhuru($_POST[R1])=="no"){
  updatetable("yjcode_order","ddzt='backerr',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("yjcode_tk where orderbh='".$orderbh."' and selluserid=".$userid);
 }
 //不同意E

 
 php_toheader("sellorderview.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 处理退款</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("sellzf.php");?>
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h">订单详情</li>
 <li class="l1"><a href="sellorder.php">所有订单</a></li>
 </ul>
 <? include("sellorderv.php");?>
 
 <? 
 if($row[ddzt]=="back"){
 while1("*","yjcode_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入支付密码");document.f1.t1.focus();return false;}
 if(!confirm("确定提交吗？")){return false;}
 tjwait();
 f1.action="selltk.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* 站长提示：</strong><br>
 * 请在 <span class="red"><?=$row1[tkoksj]?></span> 前处理，否则系统默认您接受退款申请，款项会自动退回买家帐户<br>
 * 如果不同意本次退款，请先与买家沟通，以免引起不必要的纷争<br>
 * 退款理由：<span class="blue"><?=$row1[tkly]?></span><br>
 * 申请时间：<?=$row1[sj]?>
 </li>
 <li class="l2">是否同意退款：</li>
 <li class="l3">
 <input name="R1" type="radio" value="yes" checked="checked" /> 同意 
 <input name="R1" type="radio" value="no" /> 不同意 
 </li>
 <li class="l2">原因：</li>
 <li class="l3"><input  name="t2" class="inp" size="80" type="text"/></li>
 <li class="l2">请输入您的支付密码：(<a href="zfmm.php" class="red">忘了支付密码？</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("提交")?></li>
 </ul>
 <input type="hidden" value="tk" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>