//�����濪ʼ
function slideUp(){
if(document.getElementById("toplsad").offsetHeight>0){
if(document.getElementById("toplsad").offsetHeight>10){
document.getElementById("toplsad").style.height=document.getElementById("toplsad").offsetHeight-10+"px"
setTimeout("slideUp();",30);
}else{
document.getElementById("toplsad").style.display="none";
document.getElementById("toplsimg").src=document.getElementById("toplsimg").innerHTML;
document.getElementById("toplsad").style.display="block";
slideDown();
}
}
}
function slideDown(){
if(document.getElementById("toplsad").offsetHeight<80){
if(document.getElementById("toplsad").offsetHeight<70){
document.getElementById("toplsad").style.height=document.getElementById("toplsad").offsetHeight+10+"px";
setTimeout("slideDown();",30);
}else{
document.getElementById("toplsad").style.height="80px";
}
}
}
//���������

//¥���л�
function lcapover(x,y){
 for(i=1;i<6;i++){
 lc=document.getElementById("lcap"+x+"-"+i);if(lc){lc.className="l3";}	 
 lm=document.getElementById("lmain"+x+"-"+i);if(lm){lm.style.display="none";}
 }
 lc=document.getElementById("lcap"+x+"-"+y);if(lc){lc.className="l3 l31";}	 
 lm=document.getElementById("lmain"+x+"-"+y);if(lm){lm.style.display="";}
}

function listover(x){
if(x % 5==0){nu="u11 u12";}else{nu="u11";}
document.getElementById("list"+x).className="u1 "+nu;
}
function listout(x){
if(x % 5==0){nu="u1 u12";}else{nu="u1";}
document.getElementById("list"+x).className=nu;
}

//��ҳ��¼��֤
var xmlHttpi = false;
try {
  xmlHttpi = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpi = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpi = false;
  }
}
if (!xmlHttpi && typeof XMLHttpRequest != 'undefined') {
  xmlHttpi = new XMLHttpRequest();
}
function userChecki(){
    url ="tem/sesCheck.php";
    xmlHttpi.open("get", url, true);
    xmlHttpi.onreadystatechange = updatePagei;
    xmlHttpi.send(null);
	}
function updatePagei() {
  if (xmlHttpi.readyState == 4) {
   response = xmlHttpi.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="0"){document.getElementById("ksdl1").style.display="";document.getElementById("ksdl2").style.display="";document.getElementById("ksdl3").style.display="none";return false;}
   else{
   r=response.split(" ");
     document.getElementById("ksdl3").style.display="";
   document.getElementById("ksdl2").style.display="none";
   document.getElementById("ksdl1").style.display="none";
   document.getElementById("iuid").innerHTML=r[0];
   document.getElementById("imoney").innerHTML=r[2]+"Ԫ";
   document.getElementById("itx").src=r[3].replace("../","");
   return false;
   }
  }
}


//�л����뿪ʼ
var $ = function (id) {
	return "string" == typeof id ? document.getElementById(id) : id;
};

var Class = {
  create: function() {
	return function() {
	  this.initialize.apply(this, arguments);
	}
  }
}

Object.extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var TransformView = Class.create();
TransformView.prototype = {
  //��������,��������,�л�����,�л�����
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = document.getElementById(container), oSlider = document.getElementById(slider), oThis = this;

	this.Index = 0;//��ǰ����
	
	this._timer = null;//��ʱ��
	this._slider = oSlider;//��������
	this._parameter = parameter;//�л�����
	this._count = count || 0;//�л�����
	this._target = 0;//Ŀ�����
	
	this.SetOptions(options);
	
	this.Up = !!this.options.Up;
	this.Step = Math.abs(this.options.Step);
	this.Time = Math.abs(this.options.Time);
	this.Auto = !!this.options.Auto;
	this.Pause = Math.abs(this.options.Pause);
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	oContainer.style.overflow = "hidden";
	oContainer.style.position = "relative";
	
	oSlider.style.position = "absolute";
	oSlider.style.top = oSlider.style.left = 0;
  },
  //����Ĭ������
  SetOptions: function(options) {
	this.options = {//Ĭ��ֵ
		Up:			true,//�Ƿ�����(��������)
		Step:		5,//�����仯��
		Time:		10,//������ʱ
		Auto:		true,//�Ƿ��Զ�ת��
		Pause:		2000,//ͣ��ʱ��(AutoΪtrueʱ��Ч)
		onStart:	function(){},//��ʼת��ʱִ��
		onFinish:	function(){}//���ת��ʱִ��
	};
	Object.extend(this.options, options || {});
  },
  //��ʼ�л�����
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){ this.Index = 0; }
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //�ƶ�
  Move: function() {
	clearTimeout(this._timer);
	var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
	if (iStep != 0) {
		this._slider.style[style] = (iNow + iStep) + "px";
		this._timer = setTimeout(function(){ oThis.Move(); }, this.Time);
	} else {
		this._slider.style[style] = this._target + "px";
		this.onFinish();
		if (this.Auto) { this._timer = setTimeout(function(){ oThis.Index++; oThis.Start(); }, this.Pause); }
	}
  },
  //��ȡ����
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //ֹͣ
  Stop: function(iTarget, iNow) {
	clearTimeout(this._timer);
	this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  }
};

window.onload=function(){
    userChecki();
 	var oBtnLeft = document.getElementById("goleft");
	var oBtnRight = document.getElementById("goright");
	var oDiv = document.getElementById("indexmaindiv");
	var oDiv1 = document.getElementById("maindiv1");
	setTimeout("slideUp();",3000);
//	setTimeout(start,stoptime);
	function Each(list, fun){
		for (var i = 0, len = list.length; i < len; i++) { fun(list[i], i); }
	};
	
	var objs = document.getElementById("idNum").getElementsByTagName("li");
	
	var tv = new TransformView("idTransformView", "idSlider", 321, document.getElementById("qhai").innerHTML, {
		onStart : function(){ Each(objs, function(o, i){ o.className = tv.Index == i ? "on" : ""; }) }//��ť��ʽ
	});
	
	tv.Start();
	
	Each(objs, function(o, i){
		o.onmouseover = function(){
			o.className = "on";
			tv.Auto = false;
			tv.Index = i;
			tv.Start();
		}
		o.onmouseout = function(){
			o.className = "";
			tv.Auto = true;
			tv.Start();
		}
	})
	
	
}
//�л��������



 


var obig=document.getElementById("big");
function selectTagnotice(showContentnotice,selfObj){
  var tag = document.getElementById("tagsnotice").getElementsByTagName("li");
  var taglength = tag.length;
  for(i=0; i<taglength; i++){
  tag[i].className = "";
  }
  selfObj.parentNode.className = "selectTagnotice";
  for(i=0; j=document.getElementById("tagContentnotice"+i); i++){
  j.style.display = "none";
  }
  document.getElementById(showContentnotice).style.display = "block";
 var x=0;
 function scrollTag(){
 var tags=document.getElementById("tagsnotice").getElementsByTagName("a");
  if(x<1){x=x+1}
  else
  x=0;
  var tag = document.getElementById("tagsnotice").getElementsByTagName("li");
  var taglength = tag.length;
  for(i=0; i<taglength; i++){
    tag[i].className = "";
  }
tags[x].parentNode.className = "selectTagnotice";
for(i=0; j=document.getElementById("tagContentnotice"+i);i++){
   j.style.display="none";
 }
 document.getElementById("tagContentnotice"+x).style.display="block";
}
}
function sele2(showContent,selfObj,a_id){
	selfObj.blur();
	// ������ǩ
	
	document.getElementById(a_id).className="tt1_a2";
	for(i=0; i<27; i++){
	var kk="tt_a"+i;
	if(kk!=a_id){
	document.getElementById(kk).className = "tt1_a1";}
	}

	document.getElementById(showContent).style.display = "block";
	for(i=0; i<27; i++){
	var kk="tt_c"+i;
	if(kk!=showContent){
	document.getElementById("tt_c"+i).style.display = "none";}
	
	}
	 
 
	 
}

function sele3(showContent,selfObj,a_id){
	selfObj.blur();
	// ������ǩ
	
	document.getElementById(a_id).className="tt1_a1";
	for(i=0; i<27; i++){
	var kk="tt_a"+i;
	if(kk!=a_id){
	document.getElementById(kk).className = "tt1_a1";}
	}

	document.getElementById(showContent).style.display = "none";
	for(i=0; i<27; i++){
	var kk="tt_c"+i;
	if(kk!=showContent){
	document.getElementById("tt_c"+i).style.display = "none";}
	
	}
	if(a_id=='tt_a0')
	document.getElementById("gmico").style.display = "block";
	else
	document.getElementById("gmico").style.display = "block";
}

 //���Ź������Զ��л�
 

function getStyle(obj, name) {
	if (obj.currentStyle) {
		return obj.currentStyle[name];
	}
	else {
		return getComputedStyle(obj, false)[name];
	}
}

function move(obj, attr, iTarget) {
	clearInterval(obj.timer)
	obj.timer = setInterval(function () {
		var cur = 0;
		if (attr == 'opacity') {
			cur = Math.round(parseFloat(getStyle(obj, attr)) * 100);
		}
		else {
			cur = parseInt(getStyle(obj, attr));
		}
		var speed = (iTarget - cur) / 6;
		speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
		if (iTarget == cur) {
			clearInterval(obj.timer);
		}
		else if (attr == 'opacity') {
			obj.style.filter = 'alpha(opacity:' + (cur + speed) + ')';
			obj.style.opacity = (cur + speed) / 100;
		}
		else {
			obj.style[attr] = cur + speed + 'px';
		}
	}, 30);
}  