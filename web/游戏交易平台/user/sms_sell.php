<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>

<script language="javascript">
var sjall=5;//����ȴ�ʱ��Ϊ5��
var nowsms=1; //��ǰִ�е�˳���
var allsms=0; //����SMS˳���
function goback(){
if(sjall<=1){location.href="order.php";}else{
sjall=sjall-1;
document.getElementById("gbnum").innerHTML=sjall;
}
}

//SMSMAILϵͳ
function timeset(){
document.getElementById("smstzi").style.display="";	
setInterval("goback()",1000);
}



var xmlHttpsms = false;
try {
  xmlHttpsms = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpsms = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpsms = false;
  }
}
if (!xmlHttpsms && typeof XMLHttpRequest != 'undefined') {
  xmlHttpsms = new XMLHttpRequest();
}


function updatePagesms() {
  if (xmlHttpsms.readyState == 4) {
    var response = xmlHttpsms.responseText;
	response=response.replace(/[\r\n]/g,'');
	document.getElementById("smslist"+nowsms).className="smslist smslist1";
	document.getElementById("fs"+nowsms).innerHTML="<span class='blue'>���ͳɹ�</span>";
	document.getElementById("fszt"+nowsms).innerHTML="<span class='green'>֪ͨ�ѷ��ͣ����ҽ�����Ϊ������</span>";
	if(allsms>nowsms){nowsms=nowsms+1;setTimeout("userChecksms()",5000);}else{timeset();}
  }
}

function userChecksms(){
    var url = "sms_sell_chk.php?id="+document.getElementById("smsid"+nowsms).innerHTML;
    xmlHttpsms.open("post", url, true);
    xmlHttpsms.onreadystatechange = updatePagesms;
    xmlHttpsms.send(null);
	}


</script>

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����֪ͨ���ҷ���</li>
</ul>
<? include("left.php");?>

<!--RB-->
<div class="right">

 <div class="smscap">���ã����Ķ����Ѿ�֧���ɹ����������ڸ����ҷ������ѣ�����ˢ�»�ر�ҳ��</div>
 <?
 $i=0;
 while0("*","yjcode_smsmail where userid=".$userid." and tyid=1 order by id asc");while($row=mysql_fetch_array($res)){
 if($row[admin]==1){$na="�ʼ������С���";}
 else{$na="���ŷ����С���";}
 $i++;
 ?>
 <div class="smslist" id="smslist<?=$i?>">
 <span id="smsid<?=$i?>" style="display:none;"><?=$row[id]?></span>
 <ul class="u1">
 <li class="l1"><span id="fs<?=$i?>"><?=$na?></span> ���գ�<?=strgb2312($row[fa],0,8)?>***</li>
 <li class="l2"><span id="fszt<?=$i?>">���ڷ���</span></li>
 </ul>
 </div>
 <? 
 }
 ?>
 <div class="smstz" style="display:none;" id="smstzi">�����ѳɹ���ҳ�潫��&nbsp;<span id="gbnum" class="red">5</span>&nbsp;�����ת</div>
 <script language="javascript">
 allsms=<?=$i?>;
 <? if($i==0){?>timeset();<? }else{?>userChecksms();<? }?>
 </script>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>