<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and (ddzt='db' or ddzt='backerr') and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="sh"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if($row[ddzt]!="db" && $row[ddzt]!="backerr"){Audit_alert("δ֪����","orderview.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num]+$row[yunfei];
 $sellblm=returnsellbl($row[selluserid],$row[probh])*$allmoney; //���ҿɵý��
 $ptyj=$allmoney-$sellblm;
 PointUpdateM($row[selluserid],$sellblm);
 PointIntoM($row[selluserid],"�ɹ�������Ʒ������ȷ���ջ������Զ��۳�ƽ̨Ӷ��".$ptyj."Ԫ",$sellblm);
 //�Ƽ�B
 $v=returntjuserid($userid);
 $tjmoney=returntjmoney($row[probh]);
 if(!empty($v) && !empty($tjmoney)){
 $tjm=$allmoney*$rowcontrol[tjmoney];
 PointUpdateM($v,$tjm);
 PointIntoM($v,"���Ƽ�����ҳɹ�������".$allmoney."Ԫ���������ӦӶ��",$tjm);
 PointUpdateM($row[selluserid],$tjm*(-1));
 PointIntoM($row[selluserid],"����������û��Ƽ�����(�Ƽ���ID:".$v.")���۳�Ӷ��",$tjm*(-1));
 }
 //�Ƽ�E
 $sj=date("Y-m-d H:i:s");
 updatetable("yjcode_order","ddzt='suc',oksj='".$sj."' where userid=".$userid." and id=".$row[id]);
 deletetable("yjcode_db where userid=".$userid." and orderbh='".$orderbh."'");
 php_toheader("orderview.php?orderbh=".$orderbh); 

}
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - ȷ���ջ�&nbsp;&nbsp;&nbsp;<?=$orderbh?></div>
</div>

 <? if($row[ddzt]=="db" || $row[ddzt]=="backerr"){?>
 <script language="javascript">
 function tj(){
 if(!confirm("ȷ���ջ���")){return false;}
 tjwait();
 f1.action="shouhuo.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="tishi box">
 <div class="d1">
 <strong>* վ����ʾ��</strong><br>
 * �������ú�������������Ʒ����ȷ���ջ�<br>
 * �����Ʒ�����⣬���ۺ��޷���ɹ�ʶ��������<a href="ordertk.php?orderbh=<?=$orderbh?>">�����˿�</a>
 </div>
 </div>
 <div class="tjbutton box"><div class="d0"></div><? tjbtnr_m("ȷ���ջ�");?><div class="d0"></div></div>
 <input type="hidden" value="sh" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 
 <? include("orderv.php");?>
 <? }?>


<? include("bottom.php");?>
</body>
</html>