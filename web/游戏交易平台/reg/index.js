//注册开始 
var ifuidok=0;
var ifpwd1ok=0;
var ifpwd2ok=0;
var ifncok=0;
var ifqqok=0;
var ifyxok=0;
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
	if(response=="True"){document.getElementById("ts1").innerHTML="<font color=red>很遗憾，该帐号已存在</font>";document.getElementById("imgts1").innerHTML="<img src='img/err.gif' />";}
   else if(response=="False"){document.getElementById("ts1").innerHTML="恭喜你，帐号可以使用";document.getElementById("imgts1").innerHTML="<img src='img/suc.gif' />";ifuidok=1;}
  }
}

function userCheck(){
ifuidok=0;
document.getElementById("imgts1").innerHTML="";
t1v =document.f1.t1.value;
re = /^[0-9a-z_]+$/gi;
if(t1v.length<4 || t1v.length>20 || !re.test(t1v)){document.getElementById("ts1").innerHTML="<span class='red'>请输入有效的帐号(4-20位字母、数字或下划线组合)</span>";document.getElementById("imgts1").innerHTML="<img src='img/err.gif' />";return false;}	
document.getElementById("ts1").innerHTML="用户名正在检测……";
var url = "userCheck.php?uid="+t1v;
xmlHttp.open("get", url, true);
xmlHttp.onreadystatechange = updatePage;
xmlHttp.send(null);
}

function pwd1chk(){
ifpwd1ok=0;
t2v =document.f1.t2.value;
if(t2v.length<6 || t2v.length>20){
document.getElementById("ts2").innerHTML="<span class='red'>6-20个字母、数字、下划线的组合</span>";document.getElementById("imgts2").innerHTML="<img src='img/err.gif' />";return false;
}else{
document.getElementById("ts2").innerHTML="6-20个字母、数字、下划线的组合";document.getElementById("imgts2").innerHTML="<img src='img/suc.gif' />";ifpwd1ok=1;return false;
}
}
function pwd2chk(){
ifpwd2ok=0;
t3v =document.f1.t3.value;
t2v =document.f1.t2.value;
if(0==ifpwd1ok || t2v!=t3v){document.getElementById("ts3").innerHTML="<span class='red'>确保密码输入正确</span>";document.getElementById("imgts3").innerHTML="<img src='img/err.gif' />";return false;}
else{document.getElementById("ts3").innerHTML="密码输入一致";document.getElementById("imgts3").innerHTML="<img src='img/suc.gif' />";ifpwd2ok=1;return false;}
}

var xmlHttpnc = false;
try {
  xmlHttpnc = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpnc = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpnc = false;
  }
}
if (!xmlHttpnc && typeof XMLHttpRequest != 'undefined') {
  xmlHttpnc = new XMLHttpRequest();
}

function updatePagenc() {
  if (xmlHttpnc.readyState == 4) {
    response = xmlHttpnc.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){document.getElementById("ts4").innerHTML="<font color=red>很遗憾，该昵称已被用户使用</font>";document.getElementById("imgts4").innerHTML="<img src='img/err.gif' />";}
   else if(response=="False"){document.getElementById("ts4").innerHTML="恭喜你，昵称可以使用";document.getElementById("imgts4").innerHTML="<img src='img/suc.gif' />";ifncok=1;}
  }
}

function ncCheck(){
ifncok=0;
t4v =document.f1.t4.value;
if(t4v.replace(/\s/,"")==""){document.getElementById("ts4").innerHTML="<span class='red'>请输入您在本站的昵称</span>";document.getElementById("imgts4").innerHTML="<img src='img/err.gif' />";return false;}	
document.getElementById("ts4").innerHTML="昵称正在检测……";
var url = "ncCheck.php?nc="+t4v;
xmlHttpnc.open("get", url, true);
xmlHttpnc.onreadystatechange = updatePagenc;
xmlHttpnc.send(null);
}

function qqCheck(){
ifqqok=0;
t6v =document.f1.t6.value;
if(t6v.replace(/\s/,"")==""){document.getElementById("ts6").innerHTML="<span class='red'>请填写正确的联系QQ</span>";document.getElementById("imgts6").innerHTML="<img src='img/err.gif' />";return false;}	
else{document.getElementById("ts6").innerHTML="常用QQ号码";document.getElementById("imgts6").innerHTML="<img src='img/suc.gif' />";ifqqok=1;}
}

function yxCheck(){
ifyxok=0;
t7v =document.f1.t7.value;
if(t7v.replace(/\s/,"")=="" || !isEmail(t7v)){document.getElementById("ts7").innerHTML="<span class='red'>请填写正确的邮箱</span>";document.getElementById("imgts7").innerHTML="<img src='img/err.gif' />";return false;}	
else{document.getElementById("ts7").innerHTML="邮箱";document.getElementById("imgts7").innerHTML="<img src='img/suc.gif' />";ifyxok=1;}
}

function tj(){
if(0==ifuidok){userCheck();return false;}
if(0==ifpwd1ok){pwd1chk();return false;}
if(0==ifpwd2ok){pwd2chk();return false;}
if(0==ifncok){ncCheck();return false;}
if(0==ifqqok){qqCheck();return false;}
if(0==ifyxok){yxCheck();return false;}
if((document.f1.t5.value).replace(/\s/,"")==""){alert("请输入验证码");document.f1.t5.focus();return false;}
tangc(1);
f1.action="reg.php?action=add";
}
//注册结束

//登录开始
function login(){
 document.getElementById("ts").innerHTML="";
 document.getElementById("ts").className="";
 if((document.f1.t1.value).replace(/\s/,"")==""){document.getElementById("ts").innerHTML="请输入登录账号";document.getElementById("ts").className="dts";document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){document.getElementById("ts").innerHTML="请输入登录密码";document.getElementById("ts").className="dts";document.f1.t2.focus();return false;}
 tjwait();
 f1.action="index.php?action=login";
}
function caponc(x){
 document.getElementById("cap1").className="a2";
 document.getElementById("cap2").className="a2";
 document.getElementById("loginmod1").style.display="none";
 document.getElementById("loginmod2").style.display="none";
 document.getElementById("cap"+x).className="a1";
 document.getElementById("loginmod"+x).style.display="";
}
//登录结束

//邮箱找回密码
function getpwdtj(){
 if((document.f1.t0.value).replace(/\s/,"")==""){alert("请输入帐号!");document.f1.t0.focus();return false;}
 if((document.f1.t1.value).replace(/\s/,"")=="" || !isEmail(document.f1.t1.value)){alert("请输入有效的邮箱!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("请输入验证码!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="getpasswd.php"
}

function repwdtj(x,y,z){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入密码!");document.f1.t1.focus();return false;}
 if(document.f1.t1.value!=document.f1.t2.value){alert("两次密码输入不一致!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="repwd.php?id="+x+"&chk="+y+"&tmp="+z
}

//邮箱判断
function isEmail(str){//判断邮箱
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//手机找回密码

function getmobtj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入有效的帐号!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("请输入手机号码!");document.f1.t2.focus();return false;}
 if((document.f1.t3.value).replace(/\s/,"")==""){alert("请输入验证码!");document.f1.t3.focus();return false;}
 tjwait();
 f1.action="getmob.php"
}
