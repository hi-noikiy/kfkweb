//�ֻ����ж�
function is_mobile() {
    var regex_match = /(nokia|iphone|android|motorola|^mot-|softbank|foma|docomo|kddi|up.browser|up.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte-|longcos|pantech|gionee|^sie-|portalmmm|jigs browser|hiptop|^benq|haier|^lct|operas*mobi|opera*mini|320x320|240x320|176x220)/i;
  var u = navigator.userAgent;
  if (null == u) {
   return true;
  }
  var result = regex_match.exec(u);

  if (null == result) {
   return false
  } else {
   return true
  }
 }
 
function gourl(x){location.href=x;}

//��������
var nsi=1;
function topftj(){
if((document.topf1.topt.value).replace("/\s/","")==""){alert("�����������ؼ���");document.topf1.topt.focus();return false;}
topf1.action="../search/index.php?admin="+nsi;
}

//�ȴ�
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//�����˵�
function yhifdis(x){
if(x==0){dis="none";}else{dis="";}
if(document.getElementById("typeallnum")){
 for(i=5;i<=document.getElementById("typeallnum").innerHTML;i++){
  document.getElementById("yhmenu"+i).style.display=dis;	 
 }
}	
}
function leftmenuover(){
 document.getElementById("leftmenu").style.display="";
 if(document.getElementById("leftnone")){yhifdis(1);}
}

function leftmenuout(){
 if(!document.getElementById("leftnone")){
  document.getElementById("leftmenu").style.display="none";	
 }else{
  yhifdis(0);	 
 }
}

function yhmenuover(x){
document.getElementById("yhmenu"+x).className="menu1 menu2";	
document.getElementById("rmenu"+x).style.display="";	
}

function yhmenuout(x){
document.getElementById("yhmenu"+x).className="menu1";	
document.getElementById("rmenu"+x).style.display="none";	
}

//����
function tangc(x){
if(1==x){document.getElementById("bghui").style.display="";document.getElementById("openw").style.display="";}
else if(0==x){document.getElementById("bghui").style.display="none";document.getElementById("openw").style.display="none";}
document.getElementById("bghui").style.width="100%";
st=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
if(!+[1,]){
document.getElementById("bghui").style.height=document.body.clientHeight;
document.getElementById("openw").style.left=document.body.clientWidth/2-151;
document.getElementById("openw").style.top=st+200;
}else{
document.getElementById("bghui").style.height=document.documentElement.clientHeight;
document.getElementById("openw").style.left=document.documentElement.clientWidth/2-151;
document.getElementById("openw").style.top=window.document.body.offsetHeight/2-170+st;
}
}

function objdis(x,y){
 if(0==x){document.getElementById(y).style.display="none";}	
 else if(1==x){document.getElementById(y).style.display="";}	
}

//��¼��֤
var xmlHttpses = false;
try {
  xmlHttpses = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpses = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpses = false;
  }
}
if (!xmlHttpses && typeof XMLHttpRequest != 'undefined') {
  xmlHttpses = new XMLHttpRequest();
}
function userCheckses(){
    url =document.getElementById("webhttp").innerHTML+"tem/sesCheck.php";
    xmlHttpses.open("get", url, true);
    xmlHttpses.onreadystatechange = updatePageses;
    xmlHttpses.send(null);
	}
function updatePageses() {
  if (xmlHttpses.readyState == 4) {
   response = xmlHttpses.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="0"){document.getElementById("notlogin").style.display="";document.getElementById("yeslogin").style.display="none";return false;}
   else{
   r=response.split(" ");
   document.getElementById("yeslogin").style.display="";
   document.getElementById("notlogin").style.display="none";
   document.getElementById("yesuid").innerHTML=r[0];
   if(r[1]=="yes"){document.getElementById("dontqd").style.display="";document.getElementById("needqd").style.display="none";}
   else{document.getElementById("dontqd").style.display="none";document.getElementById("needqd").style.display="";}
   return false;
   }
  }
}

//qq�ͷ�
function gdqqnover(){
document.getElementById("gdqqn").style.display="none";	
document.getElementById("gdqqh").style.display="";	
}
function gdqqhout(){
document.getElementById("gdqqn").style.display="";	
document.getElementById("gdqqh").style.display="none";	
}
var tips; 
var theTop = 210/*����Ĭ�ϸ߶�,Խ��Խ����*/; 
var old = theTop;
function initFloatTips() {
tips = document.getElementById('floatTips');
moveTips();
};
function moveTips() {
tt = 50;
if (window.innerHeight) {
pos = window.pageYOffset
}
else if (document.documentElement && document.documentElement.scrollTop) {
pos = document.documentElement.scrollTop
}
else if (document.body) {
pos = document.body.scrollTop;
}
pos = pos - tips.offsetTop + theTop;
pos = tips.offsetTop + pos / 10;
if (pos < theTop) pos = theTop;
if (pos != old) {
tips.style.top = pos + "px";
tt = 10;
}
old = pos;
setTimeout(moveTips, tt);
}
