<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();


if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,ifemail","yjcode_user where uid='".$_GET[email]."' and ifemail=1")==1){Audit_alert("认证失败，邮箱帐号已经认证过，无需重复认证","emailbd.php");}
 
 updatetable("yjcode_user","ifemail=1,bdemail='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}elseif($_GET[control]=="delbd"){
 if(panduan("uid,bdemail","yjcode_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("验证码输入有误，请重新提交","emailbd.php");
 }
 updatetable("yjcode_user","ifemail=0,bdemail='' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}


$sqluser="select uid,email,ifemail from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

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
<script language="javascript">
//认证开始
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
	if(response=="True"){
		alert("该邮箱已经被认证，请更换");
		document.getElementById("uk1").style.display="";document.getElementById("uk2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.getElementById("t1").value).replace("/\s/","")=="" || !isEmail(document.getElementById("t1").value)){alert("请输入邮件地址");document.getElementById("t1").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("uk1").style.display="none";
 document.getElementById("uk2").style.display="";
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "../../user/emailchk.php?email="+document.getElementById("t1").value;
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
 
 location.href="emailbd.php?control=bd&yz="+document.getElementById("t2").value;
}

//解绑开始
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
	delsz=setInterval("delsjzou()",1000);
  }
}

function delbd(){
 if(!confirm("确定要解除该邮箱的认证吗？")){return false;}
 document.getElementById("delsjzouv").innerHTML=120;
 document.getElementById("uk3").style.display="none";
 document.getElementById("uk4").style.display="";
 document.getElementById("fsid3").style.display=""; 
 document.getElementById("fsid4").style.display="none"; 
 var url = "../../user/emailchkdel.php";
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
 if((document.getElementById("t4").value).replace("/\s/","")==""){alert("请输入验证码");document.getElementById("t4").focus();return false;}
 location.href="emailbd.php?control=delbd&yz="+document.getElementById("t4").value;
}

//邮箱判断
function isEmail(str){//判断邮箱
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

</script>

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 绑定邮箱</div>
</div>

 <? if(1==$rowuser[ifemail]){?>
 <div id="uk3">
  <div class="tishi box blue"><div class="d1">已绑定邮箱：<strong><?=$rowuser["email"]?></strong></div></div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="delbd()" class="tjinput" value="解除邮箱绑定" /></div>
   <div class="d0"></div>
  </div>
 </div>

 <div id="uk4" style="display:none;">
  <div class="tishi box blue"><div class="d1">如果您的原邮箱地址已经丢失，请联系网站客服处理。</div></div>
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="t4" id="t4" placeholder="请输入验证码" /></div>
  </div>
  <div class="tishi box" id="fsid3"><div class="d1">请查看<?=$rowuser[email]?>邮箱内容,发送中……(<span id="delsjzouv" class="red">120</span>秒后重发)</div></div>
  <div class="tishi box" id="fsid4" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:delbd();">重新发送</a>]</div></div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="deltj()" class="tjinput" value="下一步" /></div>
   <div class="d0"></div>
  </div>
 </div>
 
 <? }else{?>
 <div id="uk1">
  <div class="uk box">
   <div class="d1"><img src="../img/regmail.png" /></div>
   <div class="d2"><input type="text" name="t1" id="t1" value="<?=$rowuser[email]?>" placeholder="请输入邮箱账号" /></div>
  </div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="bd()" class="tjinput" value="下一步" /></div>
   <div class="d0"></div>
  </div>
 </div>

 <div id="uk2" style="display:none;">
  <div class="uk box">
   <div class="d1"><img src="../img/suo.png" /></div>
   <div class="d2"><input type="text" name="t2" id="t2" placeholder="请输入验证码" /></div>
  </div>
  <div class="tishi box" id="fsid1"><div class="d1">发送中……(<span id="sjzouv" class="red">120</span>秒后重发)</div></div>
  <div class="tishi box" id="fsid2" style="display:none;"><div class="d1">[<a href="#" onClick="javascript:yzonc();">重新发送</a>]</div></div>
  <div class="tjbutton box">
   <div class="d0"></div>
   <div class="d1"><input type="button" onClick="bd()" class="tjinput" value="认证邮箱" /></div>
   <div class="d0"></div>
  </div>
 </div>
 
 <? }?>
 
 <div class="tishi box"><div class="d1">友情提示：由于每个邮箱系统安全设置不同，邮件有可能被过滤到垃圾箱里，如果没收到邮件，请通过邮箱垃圾箱找找看。</div></div>

<? include("bottom.php");?>
</body>
</html>