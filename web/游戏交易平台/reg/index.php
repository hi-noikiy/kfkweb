<?
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}

//登录验证开始
if($_GET[action]=="login" && sqlzhuru($_POST[jvs])=="login"){
 zwzr();
 include("../tem/uc/login.php");
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 include("login_tem.php");
 php_toheader("../user/");

}elseif($_GET[action]=="mot" && sqlzhuru($_POST[jvs])=="mot"){
 zwzr();
 while0("id,uid,pwd,mot,ifmot,bdmot,zt","yjcode_user where mot='".sqlzhuru($_POST[mot])."' and bdmot='".sqlzhuru($_POST[yzm])."' and ifmot=1");
 if(!$row=mysql_fetch_array($res)){Audit_alert("短信验证码输入有误，返回重试","index.php");}
 updatetable("yjcode_user","bdmot='".time()."' where id=".$row[id]);
 if(0==$row[zt]){Audit_alert("您的帐号已被禁用，请联系网站客服处理","./");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$row[uid];
 php_toheader("../user/");

}
//登录验证结束

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员登录 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
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
	mottsv("","");
	if(response=="True"){
		mottsv("该号码在本站未绑定","dts");document.getElementById("fs1").style.display="";document.getElementById("fs2").style.display="none";return false;
	}else if(response=="err1"){
		mottsv("请输入正确的图形验证码","dts");document.getElementById("fs1").style.display="";document.getElementById("fs2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.getElementById("mot").value).replace("/\s/","")==""){mottsv("请输入手机号码","dts");document.getElementById("mot").focus();return false;}
 if((document.getElementById("picyzm").value).replace("/\s/","")==""){mottsv("请输入图形验证码","dts");document.getElementById("picyzm").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("fs1").style.display="none";
 document.getElementById("fs2").style.display="";
 var url = "regchk.php?mob="+document.getElementById("mot").value+"&tpicyzm="+document.getElementById("picyzm").value;
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("sjzouv").innerHTML=120;
  document.getElementById("fs1").style.display="";
  document.getElementById("fs2").style.display="none";
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function mottsv(x,y){
 document.getElementById("motts").innerHTML=x;
 document.getElementById("motts").className=y;
}

function mottj(){
if((document.getElementById("mot").value).replace("/\s/","")==""){mottsv("请输入手机号码","dts");document.getElementById("mot").focus();return false;}
if((document.getElementById("picyzm").value).replace("/\s/","")==""){mottsv("请输入图形验证码","dts");document.getElementById("picyzm").focus();return false;}
if((document.getElementById("yzm").value).replace("/\s/","")==""){mottsv("请输入短信验证码","dts");document.getElementById("yzm").focus();return false;}
document.getElementById("tjbtn1").style.display="none";
document.getElementById("tjing1").style.display="";	
f2.action="index.php?action=mot";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>

<div class="yjcode">
 <div class="mtop">
 <ul class="u1 fontyh">
 <li class="l1"><a href="../"><img border="0" src="../img/logo.png" /></a></li>
 <li class="l2">还没有<?=webname?>账号？<a href="reg.php">免费注册</a></li>
 </ul>
 </div>
</div>

<? while1("*","yjcode_ad where adbh='ADO01' and zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$a="../gg/".$row1[bh].".".$row1[jpggif];}?>
<div class="bfb loginbfb" style="background:url(<?=$a?>) center center no-repeat;">
<div class="yjcode">

<div class="loginright fontyh">
 
 <? if($rowcontrol[ifmob]=="on"){?>
 <div class="cap">
 <a class="a1" href="javascript:void(0);" onClick="caponc(1)" id="cap1">账号密码登录</a>
 <a class="a2" href="javascript:void(0);" onClick="caponc(2)" id="cap2">短信登录</a>
 </div>
 <? }?>
 <div id="loginmod1">
 <form name="f1" method="post" onSubmit="return login()">
 <div id="ts"></div>
 <ul class="u1">
 <li class="l1"><input autocomplete="off" disableautocomplete type="text" class="inp inp1" name="t1"></li>
 <li class="l1"><input autocomplete="off" disableautocomplete type="password" class="inp inp2" name="t2"></li>
 <li class="l2"><input id="tjbtn" type="submit" value="登 录"><div id="tjing" style="display:none;"><img src="../img/ajax_loader.gif" /><br>正在登录，请稍候……</div></li>
 </ul>
 <input type="hidden" value="login" name="jvs" />
 </form>
 </div>
 
 <div id="loginmod2" style="display:none;">
 <form name="f2" method="post" onSubmit="return mottj()">
 <div id="motts"></div>
 <ul class="u1">
 <li class="l1"><input autocomplete="off" disableautocomplete type="text" class="inp inp3" id="mot" name="mot" /></li>
 <li class="l1">
 <input autocomplete="off" disableautocomplete type="text" class="inp inp0 inp4" id="picyzm" name="picyzm" />
 <img src="../config/getYZM.php" height="34" width="106" />
 </li>
 <li class="l1">
 <input autocomplete="off" disableautocomplete type="text" class="inp inp0 inp5" id="yzm" name="yzm" />
 <a href="javascript:void(0);" class="a1" id="fs1" onClick="yzonc()">获取验证码</a>
 <a href="javascript:void(0);" class="a2" id="fs2" style="display:none;"><span id="sjzouv">120</span>秒后重发</a>
 </li>
 <li class="l2">
 <input type="submit" id="tjbtn1" value="登 录"><div id="tjing1" style="display:none;"><img src="../img/ajax_loader.gif" /><br>正在登录，请稍候……</div>
 </li>
 </ul>
 <input type="hidden" value="mot" name="jvs" />
 </form>
 </div>
 
 <div class="d1">
 <a href="../config/qq/oauth/index.php" target="_blank">QQ登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg.php">免费注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="getmm.php">忘记密码？</a>
 </div>

</div>

</div>
</div>

<? include("../tem/bottom.html");?>
</body>
</html>