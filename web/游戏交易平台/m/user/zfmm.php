<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."' and ifemail=1";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("��δ�����䣬���Ƚ��а�","emailbd.php");}

if(sqlzhuru($_POST[jvs])=="zf"){
 zwzr();
 if(empty($_POST[t1])){Audit_alert("��֤������","zfmm.php");}
 if(panduan("uid,getpwd","yjcode_user where getpwd='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("��֤������","zfmm.php");}
 $zfmm=sha1(sqlzhuru($_POST[tzfmm]));
 updatetable("yjcode_user","zfmm='".$zfmm."',getpwd='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("../tishi/index.php?admin=2"); 

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
<script language="javascript">
function tj(){
 if((document.f1.tzfmm.value).replace("/\s/","")==""){alert("�������µİ�ȫ��");document.f1.tzfmm.focus();return false;}
 if((document.f1.t1.value).replace("/\s/","")==""){alert("��������֤��");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="zfmm.php";
}


//���Ϳ�ʼ
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
    response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="err"){clearInterval(sz);document.getElementById("sjzouv").innerHTML=120;document.getElementById("fsid1").style.display="none";document.getElementById("fsid2").style.display="";alert("���Ȱ�����");return false;}
   else{sz=setInterval("sjzou()",1000);return false;}
  }
}


function yzonc(){
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "../../user/mobtx.php";
 xmlHttp.open("post", url, true);
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

</script>

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - ֧������</div>
</div>

 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="zf" name="jvs" />
 <div class="uk box">
  <div class="d1"><img src="../img/pay.png" /></div>
  <div class="d2"><input type="text" placeholder="��������֧������" name="tzfmm" /></div>
 </div>
 <div class="uk box">
  <div class="d1"><img src="../img/suo.png" /></div>
  <div class="d2"><input type="text" placeholder="������������֤��" name="t1" /></div>
 </div>
 <div class="tishi box"><div class="d1">����ǰ�󶨵�������<?=$rowuser[email]?>����<a href="emailbd.php" class="feng">�޸�����</a>��</div></div>
 <div class="tishi box" id="fsid1" style="display:none;"><div class="d1">�����С���(<span id="sjzouv" class="red">120</span>��)</div></div>
 <div class="tishi box" id="fsid2"><div class="d1"><strong>[<a href="#" onClick="javascript:yzonc();" class="red">������֤��</a>]</strong></div></div>
 
 <div class="tjbutton box">
  <div class="d0"></div>
  <? tjbtnr_m("�ύ");?>
  <div class="d0"></div>
 </div>
 </form>

<? include("bottom.php");?>
</body>
</html>