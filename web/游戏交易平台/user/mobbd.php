<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,mot,ifmot","yjcode_user where mot='".$_GET[mob]."' and ifmot=1")==1){Audit_alert("��ʧ�ܣ��ú����Ѿ����󶨹�","mobbd.php");}
 
 
 updatetable("yjcode_user","mot='".$_GET[mob]."',ifmot=1,bdmot='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("mobbd.php?t=suc"); 

}elseif($_GET[control]=="delbd"){
  
 updatetable("yjcode_user","mot='',ifmot=0,bdmot='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("mobbd.php?t=suc"); 

}


$sqluser="select uid,mot,ifmot from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("un.php");}
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
//�󶨿�ʼ
var sz;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}


function updatePage() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){alert("�ú����Ѿ����󶨣������");document.getElementById("uk1").style.display="";document.getElementById("uk2").style.display="none";return false;	}
	else if(response=="err1"){alert("ͼ����֤�벻��ȷ");location.reload();return false;}
	else{sz=setInterval("sjzou()",1000);return false;}
  }
}

function yzonc(){
 if((document.getElementById("t1").value).replace("/\s/","")==""){alert("�������ֻ�����");document.getElementById("t1").focus();return false;}
 if((document.getElementById("tyzm").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("tyzm").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("uk1").style.display="none";
 document.getElementById("uk2").style.display="";
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "mobchk.php?mob="+document.getElementById("t1").value+"&yzm="+document.getElementById("tyzm").value;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function bd(){
 
 location.href="mobbd.php?control=bd&yz="+document.getElementById("t2").value+"&mob="+document.getElementById("t1").value;
}

//���ʼ
var delsz;
var delxmlHttp = false;
try {
  delxmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    delxmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    delxmlHttp = false;
  }
}
if (!delxmlHttp && typeof XMLHttpRequest != 'undefined') {
  delxmlHttp = new XMLHttpRequest();
}


function delupdatePage() {
  if (delxmlHttp.readyState == 4) {
    response = delxmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="err1"){alert("ͼ����֤�벻��ȷ");location.reload();return false;}
	delsz=setInterval("delsjzou()",1000);
  }
}

function delbd(){
 if((document.getElementById("tyzm").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("tyzm").focus();return false;}
 if(!confirm("ȷ��Ҫ������ֻ�����İ���")){return false;}
 document.getElementById("delsjzouv").innerHTML=120;
 document.getElementById("uk3").style.display="none";
 document.getElementById("uk4").style.display="";
 document.getElementById("fsid3").style.display=""; 
 document.getElementById("fsid4").style.display="none"; 
 var url = "mobchkdel.php?yzm="+document.getElementById("tyzm").value;
 delxmlHttp.open("post", url, true);
 delxmlHttp.onreadystatechange = delupdatePage;
 delxmlHttp.send(null);
}

function delsjzou(){
 s=parseInt(document.getElementById("delsjzouv").innerHTML);
 if(s<=0){
  clearInterval(delsz);
  document.getElementById("fsid3").style.display="none"; 
  document.getElementById("fsid4").style.display=""; 
  return false;
 }else{document.getElementById("delsjzouv").innerHTML=s-1;}
}

function deltj(){
  
 location.href="mobbd.php?control=delbd&yz="+document.getElementById("t4").value;
}

</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ֻ���</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? $leftid=3;include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="g_ac0_h g_bc0_h";
 </script>

 <? systs("��ϲ���������ɹ�!","mobbd.php")?>

 <? if(1==$rowuser[ifmot]){?>
 <ul class="uk" id="uk3">
 <li class="l1">�Ѱ��ֻ���</li>
 <li class="l21"><?=strgb2312($rowuser[mot],0,6)?>*****</li>
 <li class="l1">ͼ����֤�룺</li>
 <li class="l2"><input id="tyzm" class="inp" type="text" style="width:84px;" /> <img style="margin:0 0 0 10px;" src="../config/getYZM.php" width="88" /></li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="deltj()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="����ֻ���" /></li>
 </ul>

 <ul class="uk" id="uk4" style="display:none;">
 <li class="l1"></li>
 <li class="l21 blue">�������ԭ�ֻ������Ѿ���ʧ������ϵ��վ�ͷ�����</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>��֤�룺</li>
 <li class="l2"><input type="text" class="inp" id="t4"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid3">��鿴<?=strgb2312($rowuser[mot],0,6)?>*****�ֻ�����,�����С���(<span id="delsjzouv" class="red">120</span>����ط�)</li>
 <li class="l21" id="fsid4" style="display:none;">[<a href="#" onclick="javascript:delbd();">���·���</a>]</li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="deltj()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="��һ��" /></li>
 </ul>
 
 
 <? }else{?>
 <ul class="uk" id="uk1">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>�ֻ����룺</li>
 <li class="l2"><input type="text" class="inp" name="t1" id="t1"  /></li>
 <li class="l1">ͼ����֤�룺</li>
 <li class="l2"><input id="tyzm" class="inp" type="text" style="width:84px;" /> <img style="margin:0 0 0 10px;" src="../config/getYZM.php" width="88" /></li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="bd()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="��һ��" /></li>
 </ul>
 <ul class="uk" id="uk2" style="display:none;">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>��֤�룺</li>
 <li class="l2"><input type="text" class="inp" name="t2" id="t2"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid1">�����С���(<span id="sjzouv" class="red">120</span>����ط�)</li>
 <li class="l21" id="fsid2" style="display:none;">[<a href="#" onclick="javascript:yzonc();">���·���</a>]</li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="bd()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="���ֻ�" /></li>
 </ul>
 
 <? }?>
 
 <ul class="uk">
 <li class="l1">������ʾ��</li>
 <li class="l21 red">���ڰ�ȫ��������ã������п��ܱ��ֻ���ȫ������أ����û�յ����ţ���鿴�������á�</li>
 </ul>


</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>