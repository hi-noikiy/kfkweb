<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","yjcode_payreng where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("renglist.php");}
if(1==$row[type1]){$ty="֧����";}
elseif(2==$row[type1]){$ty="΢��";}
elseif(16==$row[type1]){$ty="My card";}
elseif(15==$row[type1]){$ty="����GASH";}
elseif(18==$row[type1]){$ty="MOL(����)";}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
 
if($_GET[control]=="update"){
 $zt=intval(sqlzhuru($_POST[R1]));
 $money1=$_POST[tmoney1];
 $ddbh=$_POST[tddbh];
 if(1==$zt && 2!=$row[ifok]){
  $tit=$ty."�˹�����";
  intotable("yjcode_moneyrecord","bh,userid,tit,moneynum,sj,uip,admin,rengbh","'".time()."',".$row[userid].",'".$tit."',".$money1.",'".$sj."','".$uip."',".$row[type1].",'".$ddbh."'");
  updatetable("yjcode_user","money1=money1+".$money1." where id=".$row[userid]);
  updatetable("yjcode_payreng","money1=".$money1.",ddbh='".$ddbh."',ifok=2 where id=".$id);
 }elseif(2==$zt){
 deletetable("yjcode_payreng where id=".$id);
 }
php_toheader("renglist.php");
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
function tj(){
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
if(confirm("ȷ��ִ�иò�����")){tjwait();f1.action="reng.php?id=<?=$id?>&control=update";}else{return false;}
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu2").className="l21";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_user.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">��ǰλ�ã���̨��ҳ - <strong>�˹����˹���</strong> [<a href="renglist.php">�����б�</a>]</li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>��ʾ��</strong><br>
 &nbsp;<span class="green">����ʧ�ܣ����Զ�ɾ���ü�¼������˶���ʵ��������һ����ֵ��¼����Ա����</span>
 </div>
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա��Ϣ��</li>
 <li class="l2">
 <? while1("uid,nc","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);?>
 <input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row1[uid]?> �ǳ�:<?=$row1[nc]?>" /> 
 <a href="user_ses.php?uid=<?=$row1[uid]?>" target="_blank">����̨</a>
 </li>
 <li class="l1">���˷�ʽ��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$ty?>" /></li>
 <li class="l1">�ύʱ�䣺</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[sj]?>" /></li>
 <li class="l1">���˽�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" size="40" value="<?=$row[money1]?>" /></li>
 <li class="l1">��ֵ�����ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tddbh" size="40" value="<?=$row[ddbh]?>" /></li>
 </ul>
 
 <ul class="rightcap">
 <li class="l1 red">����Ա����</li>
 </ul>
 <ul class="uk">
 <li class="l1">������</li>
 <li class="l2">
 <span class="finp">
 <? if(1==$row[ifok]){?>
 <label class="blue"><input name="R1" type="radio" value="1" />���˳ɹ����Ѿ��յ�Ǯ</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <? }else{?>
 <label class="blue"><input name="R1" type="radio" value="" disabled="disabled" />�Ѿ��Թ��ˣ������ظ�����</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <? }?>
 <label class="red"><input name="R1" type="radio" value="2" />����ʧ��</label>
 </span>
 </li>
 </ul>
 <ul class="uk">
 <li class="l3"><? tjbtnr("��һ��","renglist.php")?></li>
 </ul>
 </form>
 <!--E-->

</div>

</div>

<?php include("bottom.html");?>
</body>
</html>