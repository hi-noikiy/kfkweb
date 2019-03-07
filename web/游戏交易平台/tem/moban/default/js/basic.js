//手机版判断
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

//顶部搜索
var nsi=1;
function topover(){
document.getElementById("topdiv").style.display="";
}
function topout(){
document.getElementById("topdiv").style.display="none";
}
function topjconc(x,y){
 
}
function topftj(){
if((document.topf1.topt.value).replace("/\s/","")==""){alert("请输入搜索关键词");document.topf1.topt.focus();return false;}
topf1.action="../search/index.php?admin="+nsi;
}

//下拉菜单
function leftmenuover(){
 document.getElementById("leftmenu").style.display="";
 if(document.getElementById("leftnone")){yhifdis(1);}
}

function leftmenuout(){
 if(!document.getElementById("leftnone")){document.getElementById("leftmenu").style.display="none";}else{yhifdis(0);}
}

function yhmenuover(x){
document.getElementById("yhmenu"+x).className="menu1 menu2";	
document.getElementById("rmenu"+x).style.display="";	
}

function yhmenuout(x){
document.getElementById("yhmenu"+x).className="menu1";	
document.getElementById("rmenu"+x).style.display="none";	
}

//等待
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//弹窗
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

//登录验证
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

//头部下拉导航
function lover(x){
document.getElementById("topu1l"+x).className="l"+x+" l"+x+"h";document.getElementById("umenu"+x).style.display="";
}
function lout(x){
document.getElementById("topu1l"+x).className="l"+x;document.getElementById("umenu"+x).style.display="none";
}

//回到顶部
function gotoTop(acceleration,stime){acceleration=acceleration||0.1;stime=stime||10;var x1=0;var y1=0;var x2=0;var y2=0;var x3=0;var y3=0;if(document.documentElement){x1=document.documentElement.scrollLeft||0;y1=document.documentElement.scrollTop||0;}
if(document.body){x2=document.body.scrollLeft||0;y2=document.body.scrollTop||0;}
var x3=window.scrollX||0;var y3=window.scrollY||0;var x=Math.max(x1,Math.max(x2,x3));var y=Math.max(y1,Math.max(y2,y3));var speeding=1+ acceleration;window.scrollTo(Math.floor(x/speeding),Math.floor(y/speeding));if(x>0||y>0){var run="gotoTop("+ acceleration+", "+ stime+")";window.setTimeout(run,stime);}}


function getcookie(objName){//获取指定名称的cookie的值
    var arrStr = document.cookie.split("; ");
    for(var i = 0;i < arrStr.length;i ++){
     var temp = arrStr[i].split("=");
     if(temp[0] == objName) return unescape(temp[1]);
    }
	return "";
   }
   
   

 

function sel(_id)
{
	pc_or_phone = getcookie('pc_or_phone');
  	if(pc_or_phone=='0')
	{  
		arraynew=array1;
 }
	else
	{
		arraynew=array;
	} 
	
	for(i=1;i<7;i++)
	{
		if(_id!=8)
		showDiv(false,"optionsDiv"+i);
	}
	showDiv(true,"optionsDiv"+_id);
	if(_id==1)
		return;
		
	if(_id<5 && _id>1) {
		var fid = _id - 1;
		var lid = $("tx"+fid).value;
		
		if(lid=="") {
			$("options"+_id).innerHTML = "<a onclick=\"showDiv(false,'optionsDiv"+_id+"')\" style=' color:red;' >请先选择游戏区</a>"
		}
		else if(lid=="0") {
			$("options"+_id).innerHTML = "<a href='javascript:void(0);'  onclick='dsel(" +_id+",this.innerText,0)'>全部服务器</a>";
		}
		else {
			$("st" + _id).innerHTML = "";//把原来上面的 '选择游戏区' '选择服务器'去掉
			$("options"+_id).innerHTML ="";
			if(_id == 2) {
				$("options"+_id).innerHTML += "<a href='javascript:void(0);'  onclick='dsel(" +_id+",this.innerText,0)'>全部游戏区</a>";
			}
			if(_id == 3) {
				$("options"+_id).innerHTML += "<a href='javascript:void(0);'  onclick='dsel(" +_id+",this.innerText,0)'>全部服务器</a>";
			}
			if(_id == 4) {
				$("options"+_id).innerHTML += "<a href='javascript:void(0);'  onclick='dsel(" +_id+",this.innerText,0)'>全部运营商</a>";
			}
		
			for(var i=0;i<this.arraynew.length;i++) {
				if(arraynew[i][1]==lid) {
					s_str =  arraynew[i][2];
					$("options"+_id).innerHTML += "<a href='javascript:void(0);' title='"+s_str+"' onclick='dsel("+_id+",this.innerText,"+arraynew[i][0]+")' >" + s_str.substring(0,10) + "</a>";
				}
			}
		}
	}
//	showDiv(true,"options"+_id);
 
 
}







function dsel(_no,_name,_id)
{
	document.getElementById("st"+_no).innerText = _name;
	document.getElementById("tx"+_no).value = _id;
	showDiv(false,"optionsDiv"+_no);
	if(_no==1 || _no==2 || _no==5)
		sel(_no+1);
	if(_no==3)
		sel(_no+1);
	 
}


function showDiv(isShow,id){
	var apMenu = document.getElementById(id);
	if(apMenu){
		if(isShow){
  		apMenu.style.display = '';
    }
  	else{ 
  	apMenu.style.display = 'none';
 		}
	}
} 


function gocard()
{
	document.location.href="cardlist.php?game="+document.getElementById("tx1").value;
}
function close_div(div_id){document.getElementById(div_id).style.display = "none";
	document.getElementById("kkkk").style.display = "block";
	document.getElementById("kkkk2").style.display = "block";
	document.getElementById("kkkk3").style.display = "block";
	document.getElementById("kkkk4").style.display = "block";
	Document.getElementById("kkkk5").style.display = "block";
 }
function sele(showContent,selfObj,a_id){
	selfObj.blur();
	// 操作标签
	if(a_id!="aa1"){
	document.getElementById(a_id).className="hhot2";
	document.getElementById("aa1").className="hota";
	for(i=2; i<28; i++){
	var kk="aa"+i;
	if(kk!=a_id){
	document.getElementById(kk).className = "hota2";}
	}
	}
	else if(a_id=="aa1"){
	document.getElementById(a_id).className="hhot";
	for(i=2; i<28; i++){
	document.getElementById("aa"+i).className = "hota2";
	}
	}
	document.getElementById(showContent).style.display = "block";
	for(i=1; i<28; i++){
	var kk="zz"+i;
	if(kk!=showContent){
	document.getElementById("zz"+i).style.display = "none";}
	}
}

function showgamesbypy2(pypy,_id)
{
	s="";
	pc_or_phone = getcookie('pc_or_phone');
	if(pc_or_phone=='0')
	{
		arraynew=array1;
		document.getElementById('yx_1').className='';
		document.getElementById('yx_2').className='on';
	}
	else
	{
		arraynew=array;
		document.getElementById('yx_1').className='on';
		document.getElementById('yx_2').className='';
	}
	for(var i=0;i<arraynew.length;i++)
	{
		if(arraynew[i][1]==0)
		{
			if(pypy.length==1)
			{
				if(arraynew[i][3].charAt(0)==pypy)
				{
					s+=('<a href="javascript:void(0);"  onclick="dsel(1,this.innerText,'+ arraynew[i][0] +');sel_game_type('+arraynew[i][0]+')">'+ arraynew[i][2] + '</a>');
				}
			}
			else
			{
				if(arraynew[i][5]=='1')
				{
				s+=('<a href="javascript:void(0);"  onclick="dsel(1,this.innerText,'+ arraynew[i][0] +');sel_game_type('+arraynew[i][0]+')">'+ arraynew[i][2] + '</a>');
				}
			}
		}
	}
	document.getElementById(_id).innerHTML = s;
}
function showgame2()
{
	showgamesbypy2('','zz1');
	showgamesbypy2('A','zz2');
	showgamesbypy2('B','zz3');
	showgamesbypy2('C','zz4');
	showgamesbypy2('D','zz5');
	showgamesbypy2('E','zz6');
	showgamesbypy2('F','zz7');
	showgamesbypy2('G','zz8');
	showgamesbypy2('H','zz9');
	showgamesbypy2('I','zz10');
	showgamesbypy2('J','zz11');
	showgamesbypy2('K','zz12');
	showgamesbypy2('L','zz13');
	showgamesbypy2('M','zz14');
	showgamesbypy2('N','zz15');
	showgamesbypy2('O','zz16');
	showgamesbypy2('P','zz17');
	showgamesbypy2('Q','zz18');
	showgamesbypy2('R','zz19');
	showgamesbypy2('S','zz20');
	showgamesbypy2('T','zz21');
	showgamesbypy2('U','zz22');
	showgamesbypy2('V','zz23');
	showgamesbypy2('W','zz24');
	showgamesbypy2('X','zz25');
	showgamesbypy2('Y','zz26');
	showgamesbypy2('Z','zz27');
}
function getCookie(objName){//获取指定名称的cookie的值
    var arrStr = document.cookie.split("; ");
    for(var i = 0;i < arrStr.length;i ++){
     var temp = arrStr[i].split("=");
     if(temp[0] == objName) return unescape(temp[1]);
    }
	return "";
   }
function sel_game_type(_id){
	pc_or_phone = getcookie('pc_or_phone');
	if(pc_or_phone=='0')
	{
		arraynew=array1;
	}
	else
	{
		arraynew=array;
	}
	var html='<a href="javascript:void(0);" onclick="dsel(5,this.innerText,-1)">全部物品</a><a href=\'javascript:void(0);\' onclick=\"gocard()\" >点卡</a>';
	for(var i=0;i<arraynew.length;i++)
	{
		if(arraynew[i][0]==_id)
		{
			var game_type = arraynew[i][4].split(",");
			if(game_type.length>1){
				for(var j=0;j<game_type.length;j++)
				{
					var index = game_type[j];
					html+="<a href=\'javascript:void(0);\' onclick=\'dsel(5,this.innerText,"+index+")\'>"+array_type[index]+"</a>";
				}
			}
		}
	}
	document.getElementById('options5').innerHTML = html;
}

function onloda_js(flag)
{
	if(flag==1)
	{
		document.getElementById('yx_1').className='on';
		document.getElementById('yx_2').className='';
		pc_or_phone = 1;
	}
	else if(flag==2)
	{
		document.getElementById('yx_1').className='';
		document.getElementById('yx_2').className='on';
		pc_or_phone = 0;
	}
	else
	{
		document.getElementById('yx_1').className='on';
		document.getElementById('yx_2').className='';
		pc_or_phone = 1;
	}
	var exp = new Date(); 
	exp.setTime(exp.getTime() + 20*60*1000); 
	document.cookie = "pc_or_phone="+escape (pc_or_phone); 
	showgame2();
}