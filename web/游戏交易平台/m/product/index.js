var npage=1; //��ǰҳ��
var isjz="n"; //n��ʾ���ڼ��� y��ʾ���ڼ���
var allpage=0; //����ҳ��
var tj="";
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
  response=response.replace(/\s+/g,"");
  rev=response.split("_yjcode_");
  if(rev[0]!="ok"){document.getElementById("nps"+npage).innerHTML="���س�����ˢ��ҳ��";return false;}
  np1=20*(npage-1)+1;
  np2=20*npage;
  document.getElementById("nps"+npage).innerHTML=np1+"-"+np2+"��";
  a=rev[1].split("ok");document.getElementById("pronum").innerHTML=a[0];
  str="";
  for(i=1;i<rev.length-1;i++){
   re=rev[i].split("|");
   str=str+"<div class=\"list box\" onclick='gourl(\"view"+re[1]+".html\")'>";
   str=str+"<div class=\"d1\"><img border=\"0\" src=\""+re[2]+"\" width=\"90\" height=\"70\" /></div>";
   str=str+"<div class=\"d2\">";
   str=str+"<a href=\"view"+re[1]+".html\" class=\"a1\">"+re[3]+"</a><br>";
   str=str+re[6]+"<br><img src=\"../../img/dj/"+re[7]+"\" /></div>";
   str=str+"<div class=\"d3\"><strong>"+re[4]+"Ԫ</strong></div>";
   str=str+"</div>";
  }
  allpage=parseInt(re[8]);
  np=npage+1;
  if(npage==allpage){npv="û��������";}else{npv="<span onclick='readlist(tj)'>���ظ���</span>";}str=str+"<div class='nps' id='nps"+np+"'>"+npv+"</div>";
  document.getElementById("listtxt").innerHTML=document.getElementById("listtxt").innerHTML+str;
  isjz="n";
 }
}

function readlist(x){
 tj=x;
 var url = "readlist.php?p="+npage+"&str="+tj;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

window.onscroll=function(){
if(isjz=="n"){
b = document.documentElement.scrollTop==0? document.body.scrollTop : document.documentElement.scrollTop;
c = document.documentElement.scrollTop==0? document.body.scrollHeight : document.documentElement.scrollHeight;
//���ײ�B
if(cHeight+b>=c-40){
 if(allpage!=0){
  if(allpage>npage){
  isjz="y";
  scrollTo(0,c+30);
  npage++;
  document.getElementById("nps"+npage).innerHTML="���ڼ�����";
  readlist(tj);
  }else{
  np=npage+1;
  document.getElementById("nps"+np).innerHTML="û��������";
  }
 }
}
//���ײ�E
}
}
