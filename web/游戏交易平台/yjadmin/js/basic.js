//用$进行简写
function $(objectId) { 
if(document.getElementById && document.getElementById(objectId)) { // W3C DOM 
return document.getElementById(objectId); 
} 
else if (document.all && document.all(objectId)) { // MSIE 4 DOM 
return document.all(objectId); 
} 
else if (document.layers && document.layers[objectId]) { // NN 4 DOM.. note: this won't find nested layers 
return document.layers[objectId]; 
} 
else { 
return false; 
} 
}

function mrload(){
rw=window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
if(rw<1003){rw=1003;}
rw=rw-232;
document.getElementById("right").style.width=(rw)+"px";	
}
window.onresize=function(){
mrload();
}

//弹窗
function tangc(x){
 if(0==x){document.getElementById("bghui").style.display="none";document.getElementById("openw").style.display="none";}
 else if(1==x){document.getElementById("bghui").style.display="";document.getElementById("openw").style.display="";
  document.getElementById("bghui").style.width="100%";
  st=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
  if(!+[1,]){
  document.getElementById("bghui").style.height=document.body.clientHeight;
  document.getElementById("openw").style.left=document.body.clientWidth/2-151;
  document.getElementById("openw").style.top=st+200;
  }else{
  document.getElementById("bghui").style.height=document.documentElement.clientHeight+"px";
  document.getElementById("openw").style.left=document.documentElement.clientWidth/2-151+"px";
  document.getElementById("openw").style.top=document.documentElement.clientHeight/2-170+st+"px";
  }
 }
}

//提交等待公用部分
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//文本框获取、失去焦点
function inpf(obj){obj.className="inp inp1";}
function inpb(obj){obj.className="inp";}

function gourl(x){location.href=x;	}
function xuan(){
 c2=document.getElementsByName("C2");
 c=document.getElementsByName("C1");
 if(c2[0].checked){
 for(i=0;i<c.length;i++){
 c[i].checked="checked";
 }
 }else{
 for(i=0;i<c.length;i++){
 c[i].checked=false;
 }
 }
}
function pagegoto(x,y){
if(isNaN(document.getElementById("pagetext").value)){alert("请输入正确的页数！");document.getElementById("pagetext").select();return false;}	
gourl(x+"?"+"page="+document.getElementById("pagetext").value+"&"+y);
}

//图片鼠标动作
function tphover(x){
 try{$("tpf"+x).tover();    //适用FF、ie8
 }catch(e){
 window.frames["tpf"+x].tover();    //适用IE6、7
 }
}
function tphout(x){
 try{$("tpf"+x).tout();    //适用FF、ie8
 }catch(e){
 window.frames["tpf"+x].tout();    //适用IE6、7
 }
}

//删除数据
function checkDEL(x,y){
 var c=document.getElementsByName("C1");
 str="";
 for(i=0;i<c.length;i++){
  if(c[i].checked){
  if(str==""){
  str=c[i].value;
  }else{
  str=str+","+c[i].value;
  }
  }
}
if(str==""){alert("请至少选择一条数据");return false;}
if(confirm("确定执行该项操作吗?")){tangc(1);noRefresh(x,str,y);}else{return false;}
}

var xmlHttpdel = false;
try {
  xmlHttpdel = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpdel = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpdel = false;
  }
}
if (!xmlHttpdel && typeof XMLHttpRequest != 'undefined') {
  xmlHttpdel = new XMLHttpRequest();
}
function noRefresh(admin,bhid,tablename) {
  if(bhid==""){alert("条件不符！");return false;}
  var url = "noRefresh.php?admin="+admin+"&idbh="+bhid+"&tab="+tablename;
  xmlHttpdel.open("post", url, true);
  xmlHttpdel.onreadystatechange = updatePagedel;
  xmlHttpdel.send(null);  
}

function updatePagedel() {
  if (xmlHttpdel.readyState == 4) {
  var response = xmlHttpdel.responseText;
  response=response.replace(/[\r\n]/g,'');
  if(response=="True"){location.reload();return false;}
  else if(response=="Err9"){tangc(0);alert("删除失败，权限不够");return false;}
  else{tangc(0);alert("删除失败，该分类下还有二级分类或其他关联信息未删除");return false;}
  }
}
















