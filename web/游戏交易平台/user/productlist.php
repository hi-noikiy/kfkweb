<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$ncapv=1;
$ses=" where zt<>99 and userid=".$rowuser[id];
if($_GET[zt]=="1"){$ses=$ses." and zt=1";}
elseif($_GET[zt]=="2"){$ses=$ses." and zt=2";}
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";}
$t2v=$_GET[t2v];if(is_numeric($t2v)){$ses=$ses." and id=".$t2v;}
$t3v=$_GET[t3v];if(is_numeric($t3v)){$ses=$ses." and money2>=".$t3v."";}
$t3v=$_GET[t3v];if(is_numeric($t3v)){$ses=$ses." and money2>=".$t3v."";}
$t5v=$_GET[t5v];if(is_numeric($t5v)){$ses=$ses." and xsnum>=".$t5v."";}
$t6v=$_GET[t6v];if(is_numeric($t6v)){$ses=$ses." and xsnum<=".$t6v."";}
if($_GET[sd1v]!=""){$ses=$ses." and ty1id=".$_GET[sd1v]."";}
if($_GET[ifxj]=="1"){$ses=$ses." and ifxj=1";$ncapv=3;}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
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
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&t5v="+document.getElementById("t5").value;
 str=str+"&t6v="+document.getElementById("t6").value;
 str=str+"&sd1v="+document.getElementById("sd1").value;
 location.href="productlist.php?"+str;
}

//�޸ļ۸�
var nSID; //���嵱ǰҪ�޸ĵ�ID
var ifOK=1; //���Ϊ0����ʾ������
var xmlHttpm = false;
try {
  xmlHttpm = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpm = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpm = false;
  }
}
if (!xmlHttpm && typeof XMLHttpRequest != 'undefined') {
  xmlHttpm = new XMLHttpRequest();
}


function updatePagem() {
  if (xmlHttpm.readyState == 4) {
    response = xmlHttpm.responseText;
	response=response.replace(/[\r\n]/g,'');
	ifOK=1;
	if(response=="err1"){alert("��¼��ʱ�������µ�¼");location.href="../reg/";return false;}
	else if(response=="err2"){alert("�Ƿ�����");return false;}
	else if(response=="err3"){alert("�۸��ʽ����ȷ");return false;}
	else if(response=="ok"){
    document.getElementById("pminp"+nSID).className="";
	}
	
  }
}

function pminpblur(x){
 if(ifOK==0){alert("���Եȣ��м۸�������δ���");return false;}
 ifOK=0;
 nSID=x;
 url = "pminpM.php?id="+x+"&m="+document.getElementById("pminp"+x).value;
 xmlHttpm.open("post", url, true);
 xmlHttpm.onreadystatechange = updatePagem;
 xmlHttpm.send(null);
}

//�޸Ŀ��
var nSIDK; //���嵱ǰҪ�޸ĵ�ID
var ifOKK=1; //���Ϊ0����ʾ������
var xmlHttpK = false;
try {
  xmlHttpK = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpK = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpK = false;
  }
}
if (!xmlHttpK && typeof XMLHttpRequest != 'undefined') {
  xmlHttpK = new XMLHttpRequest();
}


function updatePageK() {
  if (xmlHttpK.readyState == 4) {
    response = xmlHttpK.responseText;
	response=response.replace(/[\r\n]/g,'');
	ifOKK=1;
	if(response=="err1"){alert("��¼��ʱ�������µ�¼");location.href="../reg/";return false;}
	else if(response=="err2"){alert("�Ƿ�����");return false;}
	else if(response=="err3"){alert("�����Ч");return false;}
	else if(response=="ok"){
    document.getElementById("pkinp"+nSIDK).className="";
	}
	
  }
}

function pkinpblur(x){
 if(ifOKK==0){alert("���Եȣ��п��������δ���");return false;}
 ifOKK=0;
 nSIDK=x;
 url = "pkinpK.php?id="+x+"&k="+document.getElementById("pkinp"+x).value;
 xmlHttpK.open("post", url, true);
 xmlHttpK.onreadystatechange = updatePageK;
 xmlHttpK.send(null);
}

</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ�б�</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">

 <!--B-->
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$ncapv?>").className="g_ac0_h g_bc0_h";
 </script>
 <div class="rts">��ܰ��ʾ��5��������Ʒ���ܸ���һ��</div>
 
 <!--����B-->
 <ul class="prosel">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" style="width:150px;" /></li>
 <li class="l1">����ID��</li>
 <li class="l2"><input type="text" value="<?=$_GET[t2v]?>" id="t2" style="width:150px;"/></li>
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <select id="sd1">
 <option value="">����</option>
 <? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"<? if($row1[id]==$_GET[sd1v]){?> selected="selected"<? }?>><?=$row1[type1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">�۸�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t3v]?>" style="width:60px;" id="t3" /><span class="fd"> �� </span><input type="text" value="<?=$_GET[t4v]?>" style="width:60px;" id="t4"/></li>
 <li class="l1">��������</li>
 <li class="l2"><input type="text" value="<?=$_GET[t5v]?>" style="width:60px;" id="t5"/><span class="fd"> �� </span><input type="text" value="<?=$_GET[t6v]?>" style="width:60px;" id="t6"/></li>
 <li class="ltj"><input type="button" onclick="psel()" value="����" /> <input type="button" onclick="gourl('productlist.php')" value="����" /></li>
 </ul>
 <!--����E-->
 
 <ul class="typecap">
 <li class="l1">��Ʒ��Ϣ</li>
 <li class="l2">�ۼ�</li>
 <li class="l3">���</li>
 <li class="l4">����</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:NcheckDEL(1,'yjcode_pro')" class="a1">�ϼ�/�¼�</a>
 <a href="javascript:NcheckDEL(2,'yjcode_pro')" class="a2">ɾ��</a>
 <a href="javascript:NcheckDEL(7,'yjcode_pro')" class="a1">������Ʒ</a>
 <a href="javascript:gourl('productlx.php')" class="a1">������Ʒ</a>
 </li>
 <li class="l3"></li>
 </ul>
 <?
 pagef($ses,10,"yjcode_pro","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $aurl="product.php?bh=".$row[bh];
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[lastsj]?> | <?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])?></li>
 </ul>
 <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
 <li class="l0"></li>
 <li class="l1">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."' order by xh asc","-2"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="../product/view<?=$row[id]?>.html" target="_blank" class="a1"><?=returntitdian($row["tit"],75)?></a><br>
 <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
 </li>
 <li class="l2">
 <input type="text" onfocus="this.className='inp';" value="<?=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id])?>" id="pminp<?=$row[id]?>" onblur="pminpblur(<?=$row[id]?>)" /><br>
 <s class="hui">ԭ��<?=returnjgdw($row[money1],"Ԫ","����")?></s>
 </li>
 <li class="l3">
 <? if(4==$row[fhxs]){?><?=$row[kcnum]?><br>��<a href="kclist.php?bh=<?=$row[bh]?>" class="blue">������</a>��<? }else{?>
 <input type="text" onfocus="this.className='inp';" value="<?=$row[kcnum]?>" id="pkinp<?=$row[id]?>" onblur="pkinpblur(<?=$row[id]?>)" />
 <? }?>
 </li>
 <li class="l4"><?=$row[xsnum]?></li>
 <li class="l5">
 <a href="<?=$aurl?>">�޸�</a><br>
 <a href="../product/view<?=$row[id]?>.html" target="_blank">Ԥ��</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="productlist.php";
 $nowwd="zt=".$_GET[zt]."&t1v=".$_GET[t1v]."&t2v=".$_GET[t2v]."&t3v=".$_GET[t3v]."&t4v=".$_GET[t4v]."&t5v=".$_GET[t5v]."&t6v=".$_GET[t6v]."&sd1v=".$_GET[sd1]."&ifxj=".$_GET[ifxj];
 include("page.html");
 ?>
 <!--E-->
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>