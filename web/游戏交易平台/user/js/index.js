//避免出现小数点多位的情况
function addNum(num1,num2){
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
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
//删除数据
function NcheckDEL(x,y){
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
	if(confirm("确定要执行该操作吗?")){noRefresh(x,str,y);}else{return false;}
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
  a=response.replace(/[\r\n]/g,'');
  if(a=="ERR074"){alert("操作失败，请重试");return false;}
  else if(response=="ERR1"){alert("删除失败，该分类下还有二级分类或其他关联信息未删除");return false;}
  else if(a=="True"){location.reload();return false;}
  }
}
