<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if(sqlzhuru($_POST[yjcode])=="jfbank"){
 zwzr();
 $fs=intval($_POST[fsv]);
 $tnum=intval($_POST[tnum]);
 if($tnum<=0){echo "�һ���ֵ��Ч";exit;}
 if($fs==1){ //���ֻ������
  if($tnum>$rowuser[jf]){echo "�һ�ֵ�������Ŀ��û���";exit;}
  $m=sprintf("%.2f",$tnum/$rowcontrol[jfmoney]);
  PointIntoM($rowuser[id],"���ֶһ���Ǯ",$m);PointUpdateM($rowuser[id],$m);
  PointInto($rowuser[id],"���ֶһ���Ǯ",$tnum*(-1));PointUpdate($rowuser[id],$tnum*(-1));
 }elseif($fs==2){ //����һ�����
  if($tnum>$rowuser[money1]){echo "�һ�ֵ�������Ŀ������";exit;}
  $jf=sprintf("%.2f",$tnum*$rowcontrol[jfmoney]);
  PointIntoM($rowuser[id],"���ֶһ���Ǯ",$tnum*(-1));PointUpdateM($rowuser[id],$tnum*(-1));
  PointInto($rowuser[id],"���ֶһ���Ǯ",$jf);PointUpdate($rowuser[id],$jf);
 }
 echo "ok";exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
var fs=1;
function tj(){
 if(fs==1){zhi=document.f1.t1.value;}
 else if(fs==2){zhi=document.f1.t2.value;}
 if(zhi=="" || isNaN(zhi)){layer.alert('��������Ч�Ķһ�����', {icon:5});return false;}

 var flag = false;  
 layer.confirm("ȷ��Ҫ���жһ���", {icon: 3, title:'��ʾ'},  
  function(index){      //ȷ�Ϻ�ִ�еĲ��� 
   layer.close(index); 
   layer.msg('���ݴ�����', {icon: 16  ,time: 0,shade :0.25});
   $.post("jfbank.php",{fsv:fs,tnum:zhi,yjcode:"jfbank"},function(result){
   if(result=="ok"){location.href="jfbank.php?t=suc";}else{layer.alert(result, {icon:5});return false;}
   });
  },  
  function(index){      //ȡ����ִ�еĲ���  
   flag = false;  
  });  
 return false;
}

function jfxs(x){
fs=x;
document.getElementById("uk1").style.display="none";
document.getElementById("uk2").style.display="none";
document.getElementById("uk"+x).style.display="";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap8.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="g_ac0_h g_bc0_h";
 </script>
 
 <? systs("��ϲ���������ɹ�!","jfbank.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">�һ���ʽ��</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="1" onclick="jfxs(1)" checked="checked" /> ���ֻ������</label>
 <label><input name="R1" type="radio" value="2" onclick="jfxs(2)" /> ����һ�����</label>
 </li>
 </ul>

 <ul class="uk" id="uk1">
 <li class="l1">���û��֣�</li>
 <li class="l21"><strong class="red"><?=$rowuser[jf]?></strong>��</li>
 <li class="l1">������</li>
 <li class="l21"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ</li>
 <li class="l1">�һ�������</li>
 <li class="l21"><?=$rowcontrol[jfmoney]?>��=1Ԫ�����</li>
 <li class="l1">�һ����֣�</li>
 <li class="l2"><input type="text" name="t1" class="inp" /></li>
 </ul>

 <ul class="uk" id="uk2" style="display:none;">
 <li class="l1">������</li>
 <li class="l21"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ</li>
 <li class="l1">���û��֣�</li>
 <li class="l21"><strong class="red"><?=$rowuser[jf]?></strong>��</li>
 <li class="l1">�һ�������</li>
 <li class="l21">1Ԫ�����=<?=$rowcontrol[jfmoney]?>��</li>
 <li class="l1">�һ���</li>
 <li class="l2"><input type="text" name="t2" class="inp" /></li>
 </ul>
 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><input type="submit" class="btn1" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="�ύ�һ�" /></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>