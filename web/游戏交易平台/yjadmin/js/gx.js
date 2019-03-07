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
function callServer(x) {
if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入后台登录密码！");document.f1.t1.focus();return false;}
if(x!="yjadmin"){alert("后台路径不对，如要升级，请先改为yjadmin");return false;}
tjwait();
xmlHttp.open("get", "yheckcusk.php?pwd="+document.f1.t1.value, true);
xmlHttp.onreadystatechange = updatePage;
xmlHttp.send(null);  
return false;
}

function updatePage() {
 if (xmlHttp.readyState == 4) {
 response=(xmlHttp.responseText).replace(/[\r\n]/g,'');
  if(response=="err1"){alert("密码验证有误，升级失败");gourl("default.php");return false;}
  else if(response=="ok"){gxupdate();return false;}
  else{alert("升级失败！请把弹出错误截图给售后技术协调解决或访问官网查找方法(www.yjcode.com)\n"+response);window.location.reload();return false;}
 }
}


var xmlHttp1 = false;
try {
  xmlHttp1 = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp1 = false;
  }
}
if (!xmlHttp1 && typeof XMLHttpRequest != 'undefined') {
  xmlHttp1 = new XMLHttpRequest();
}
function gxupdate() {
xmlHttp1.open("get", "rjydo.php?sersj="+serversj, true);
xmlHttp1.onreadystatechange = updatePagegx;
xmlHttp1.send(null);  
}

function updatePagegx() {
 if (xmlHttp1.readyState == 4) {
 response=(xmlHttp1.responseText).replace(/[\r\n]/g,'');
  if(response=="ok"){location.href="tohtml.php?admin=0&action=gx";return false;}
  else{alert("升级失败！请把弹出错误截图给售后技术协调解决或访问官网查找方法(www.yjcode.com)\n"+response);window.location.reload();return false;}
 }
}

var serversj;
var xmlHttp2 = false;
try {
  xmlHttp2 = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp2 = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp2 = false;
  }
}
if (!xmlHttp2 && typeof XMLHttpRequest != 'undefined') {
  xmlHttp2 = new XMLHttpRequest();
}
function gxchk() {
xmlHttp2.open("get", "yjuck.php", true);
xmlHttp2.onreadystatechange = updatePagechk;
xmlHttp2.send(null);  
}

function updatePagechk() {
 if (xmlHttp2.readyState == 4) {
 document.getElementById("gx3").style.display="none";
 response=trimStr(xmlHttp2.responseText);
  if(response=="zx"){document.getElementById("gx2").style.display="";return false;}
  else{document.getElementById("gx1").style.display="";serversj=response;return false;}
 }
}

function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}