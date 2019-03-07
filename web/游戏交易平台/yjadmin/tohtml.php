<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
switch($_GET["admin"])
{
 case "0":
 case "":
 $nstr="&nbsp;&nbsp;1、日常更新通过常规缓存清理即可";
 $nwz="&nbsp;&nbsp;常规缓存清理";
 break;
 case "1":
 $nstr="&nbsp;&nbsp;1、同步所有正在担保或退款中的订单状态<br>&nbsp;&nbsp;2、同步所有店铺到期状态变更";
 $nwz="&nbsp;&nbsp;订单/店铺状态触发变更";
 break;
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
<!--
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
function callServer(url) {
  xmlHttp.open("post", url, true);
  xmlHttp.onreadystatechange = updatePage;
  xmlHttp.send(null);  
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
   var response = xmlHttp.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="ok"){
   <? if($_GET[bkpage]!=""){?>
   location.href="<?=$_GET[bkpage]?>?t=suc";
   <? }else{?>
   location.href="tohtml.php?t=suc&admin="+document.getElementById("nadmin").innerHTML;return false;
   <? }?>
   }else{alert("更新失败！请登录售后官网www.yjcode.com查找解决方案\n"+response);window.location.reload();return false;}
  }
}


function startHTML(adminnum){
$("htmlbtn").style.display="none";
$("tsdiv").style.display="";
callServer("after_html.php?admin="+adminnum);
}
//-->
</script>
</head>
<body>

<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong><?=str_replace("&nbsp;","",$nwz)?></strong></li><li class="l2"></li>
 </ul>
 
 <!--begin-->
<? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","tohtml.php?backadmin=".$_GET[backadmin]);}?>
<div class="control"><strong><?=$nwz?></strong></div>
<div class="htmlnts"><?=$nstr?></div>
<div class="control">
<input type="button" class="btn1" id="htmlbtn"  onmouseover="this.className='btn2';" onclick="startHTML(<?=$_GET[admin]?>)" onmouseout="this.className='btn1';" value="执行命令" />
</div>
<div class="htmlOK" id="tsdiv" style="display:none;">
&nbsp;&nbsp;&nbsp;<img src="img/ajax_loader.gif" width="208" height="13" /><br />
&nbsp;&nbsp;&nbsp;系统提示：缓存正在清理，不要关闭页面，也不要进行刷新。请耐心等待！
</div>
</div>
<span id="nadmin" style="display:none"><?=$_GET[admin]?></span>
 <!--end-->
 
</div>

<?php include("bottom.html");?>
<? if($_GET[action]=="gx"){?>
<script language="javascript">
startHTML(<?=$_GET[admin]?>);
</script>
<? }?>

</body>
</html>