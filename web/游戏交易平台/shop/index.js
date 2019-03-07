function topd2over(){
document.getElementById("lkuang").style.display="";
document.getElementById("d2div").className="d2 d21";
}
function topd2out(){
document.getElementById("lkuang").style.display="none";
document.getElementById("d2div").className="d2";
}

//店铺收藏
var xmlHttpfavs = false;
try {
  xmlHttpfavs = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpfavs = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpfavs = false;
  }
}
if (!xmlHttpfavs && typeof XMLHttpRequest != 'undefined') {
  xmlHttpfavs = new XMLHttpRequest();
}

function shopfavInto(x){
url = "../tem/favshopInto.php?id="+x;
xmlHttpfavs.open("get", url, true);
xmlHttpfavs.onreadystatechange = updatePagefavs;
xmlHttpfavs.send(null);
}

function updatePagefavs() {
 if(xmlHttpfavs.readyState == 4) {
 response = xmlHttpfavs.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){topd2out();tangc(1);return false;}
  else if(response=="err2"){alert("亲~不能收藏自己的店铺哦");return false;}
  else if(response=="ok"){
  document.getElementById("favsyes").style.display="";
  document.getElementById("favsno").style.display="none";
  document.getElementById("favsyes1").style.display="";
  document.getElementById("favsno1").style.display="none";
  }else{alert("未知错误，请刷新重试");return false;}
 }
}