<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,mot,ifmot","yjcode_user where mot='".$_GET[mob]."' and ifmot=1")==1){Audit_alert("��ʧ�ܣ��ú����Ѿ����󶨹�","mobbd.php");}
 
 updatetable("yjcode_user","mot='".$_GET[mob]."',ifmot=1,bdmot='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("mobbd.php?t=suc"); 

}elseif($_GET[control]=="delbd"){
 if(panduan("uid,bdmot","yjcode_user where bdmot='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("��֤�����������������ύ","mobbd.php");
 }
 updatetable("yjcode_user","mot='',ifmot=0,bdmot='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("mobbd.php"); 

}


$sqluser="select uid,mot,ifmot from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("un.php");}

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
 var url = "../../user/mobchk.php?mob="+document.getElementById("t1").value+"&yzm="+document.getElementById("tyzm").value;
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
 var url = "../../user/mobchkdel.php?yzm="+document.getElementById("tyzm").value;
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
 if((document.getElementById("t4").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("t4").focus();return false;}
 location.href="mobbd.php?control=delbd&yz="+document.getElementById("t4").value;
}

</script>

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - �ֻ���</div>
</div>

 <? if(1==$rowuser[ifmot]){?>
 <div id="uk3">
  <div class="tishi box blue"><div class="d1">�Ѱ��ֻ���<strong><?=$rowuser["mot"]?></strong></div></div>
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="tyzm" id="tyzm" placeholder="������ͼ����֤��" /></div>
   <div class="dyzm"><img src="../../config/getYZM.php" width="88" /></div>
  </div>

  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="delbd()" class="tjinput" value="����ֻ���" /></div>
   <div class="d0"></div>
  </div>
 </div>

 <div id="uk4" style="display:none;">
  <div class="tishi box blue"><div class="d1">�������ԭ�ֻ������Ѿ���ʧ������ϵ��վ�ͷ�����</div></div>
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="t4" id="t4" placeholder="��������֤��" /></div>
  </div>
  <div class="tishi box" id="fsid3"><div class="d1">��鿴<?=$rowuser[mot]?>�ֻ�����,�����С���(<span id="delsjzouv" class="red">120</span>����ط�)</div></div>
  <div class="tishi box" id="fsid4" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:delbd();">���·���</a>]</div></div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="deltj()" class="tjinput" value="��һ��" /></div>
   <div class="d0"></div>
  </div>
 </div>
 
 <? }else{?>
 <div id="uk1">
  <div class="uk box">
   <div class="d1"><img src="../img/mot.png" /></div>
   <div class="d2"><input type="text" name="t1" id="t1" value="<?=$rowuser[mot]?>" placeholder="�������ֻ�����" /></div>
  </div>
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="tyzm" id="tyzm" placeholder="������ͼ����֤��" /></div>
   <div class="dyzm"><img src="../../config/getYZM.php" width="88" /></div>
  </div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="bd()" class="tjinput" value="��һ��" /></div>
   <div class="d0"></div>
  </div>
 </div>

 <div id="uk2" style="display:none;">
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="t2" id="t2" placeholder="��������֤��" /></div>
  </div>
  <div class="tishi box" id="fsid1"><div class="d1">�����С���(<span id="sjzouv" class="red">120</span>����ط�)</div></div>
  <div class="tishi box" id="fsid2" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:yzonc();">���·���</a>]</div></div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="bd()" class="tjinput" value="���ֻ�" /></div>
   <div class="d0"></div>
  </div>
 </div>
 
 <? }?>
 
 <div class="tishi box"><div class="d1">������ʾ�����ڰ�ȫ��������ã������п��ܱ��ֻ���ȫ������أ����û�յ����ţ���鿴�������á�</div></div>


<? include("bottom.php");?>
</body>
</html>