<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("yjcode_control","webnamev","'保存失败'");}
 $wxpay=sqlzhuru($_POST[wxpay0]).",".sqlzhuru($_POST[wxpay1]).",".sqlzhuru($_POST[wxpay2]).",".sqlzhuru($_POST[wxpay3]);
 $otherpay=str_replace("，",",",sqlzhuru($_POST[totherpay]));
 updatetable("yjcode_control","
			  partner='".sqlzhuru($_POST[zf1])."',
			  security_code='".sqlzhuru($_POST[zf2])."',
			  seller_email='".sqlzhuru($_POST[zf3])."',
			  zftype=".sqlzhuru($_POST[d1]).",
			  tenpay1='".sqlzhuru($_POST[tenpay1])."',
			  tenpay2='".sqlzhuru($_POST[tenpay2])."',
			  ipsshh='".sqlzhuru($_POST[ips1])."',
			  ipszs='".sqlzhuru($_POST[ips2])."',
			  bankbh='".sqlzhuru($_POST[tbankbh])."',
			  bankkey='".sqlzhuru($_POST[tbankkey])."',
			  wxpay='".$wxpay."',
			  wxpayfs=".sqlzhuru($_POST[d2]).",
			  otherpay='".$otherpay."'
			  ");
 $output="<? class WxPayConfig{const APPID = '".sqlzhuru($_POST[wxpay0])."';const MCHID = '".sqlzhuru($_POST[wxpay1])."';const KEY = '".sqlzhuru($_POST[wxpay2])."';const APPSECRET = '".sqlzhuru($_POST[wxpay3])."';const SSLCERT_PATH = '../cert/apiclient_cert.pem';const SSLKEY_PATH = '../cert/apiclient_key.pem';const CURL_PROXY_HOST = '0.0.0.0';const CURL_PROXY_PORT = 0;const REPORT_LEVENL = 1;}?>";
 $fp= fopen("../user/wxpay/lib/WxPay.Config.php","w");
 fwrite($fp,$output);
 fclose($fp);
 
 $wxconfig=read_file_content("../m/user/wxpay/wxconfig_tem.php");
 $wxconfig=str_replace("tmp_appid",sqlzhuru($_POST[wxpay0]),$wxconfig);
 $wxconfig=str_replace("tmp_mchid",sqlzhuru($_POST[wxpay1]),$wxconfig);
 $wxconfig=str_replace("tmp_key",sqlzhuru($_POST[wxpay2]),$wxconfig);
 $wxconfig=str_replace("tmp_appsecret",sqlzhuru($_POST[wxpay3]),$wxconfig);
 $fp= fopen("../m/user/wxpay/wxconfig.php","w");
 fwrite($fp,$wxconfig);
 fclose($fp);

 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/alipay_ewm.jpg");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../img/wxpay_ewm.jpg");
 move_uploaded_file($_FILES["inp3"]['tmp_name'], "../user/img/pay/otherpay.jpg");

 php_toheader("inf3.php?t=suc");
}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
$wxpay=array("","","","");
if(!empty($row[wxpay]) && $row[wxpay]!=",,,"){$wxpay=preg_split("/,/",$row[wxpay]);}
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
function tj(){
tjwait();
f1.action="inf3.php";
}
function alipaycha(){
d=parseInt(document.f1.d1.value);
if(d==0){document.getElementById("alipay0").style.display="";document.getElementById("alipay3").style.display="none";}
else{document.getElementById("alipay0").style.display="none";document.getElementById("alipay3").style.display="";}
}
function wxpaycha(){
d=parseInt(document.f1.d2.value);
if(d==0){document.getElementById("wxpaym0").style.display="";document.getElementById("wxpaym1").style.display="none";}
else{document.getElementById("wxpaym0").style.display="none";document.getElementById("wxpaym1").style.display="";}
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：<a href="default.php">后台首页</a> - <strong>支付接口</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit4").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf3.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="cap">支付宝设置 <a href="https://b.alipay.com/order/productIndex.htm" target="_blank">[申请]</a></li>
 <li class="l1">选择支付方式：</li>
 <li class="l2">
 <select name="d1" onchange="alipaycha()">
 <option value="0" <? if($row[zftype]==0 || $row[zftype]==NULL){?> selected="selected"<? }?>>支付宝即时到帐官方接口</option>
 <option value="3" <? if($row[zftype]==3){?> selected="selected"<? }?>>个人扫码支付（人工入账）</option>
 </select>
 <span class="red">请根据你的接口实际情况来选择对应的支付方式</span>
 </li>
 </ul>
 <ul class="uk" id="alipay0" style="display:none;">
 <li class="l1">partner：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[partner];}?>
 <input  name="zf1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入支付宝的partner</span>
 </li>
 <li class="l1">security_code：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[security_code];}?>
 <input  name="zf2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入支付宝的security_code</span>
 </li>
 <li class="l1">seller_email：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[seller_email];}?>
 <input  name="zf3" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入支付宝的seller_email</span>
 </li>
 </ul>
 <ul class="uk" id="alipay3" style="display:none;">
 <li class="l1">支付宝二维码：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? if(is_file("../img/alipay_ewm.jpg")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/alipay_ewm.jpg" target="_blank"><img src="../img/alipay_ewm.jpg?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>
 </ul>
 
 <ul class="uk">
 <li class="cap">微信支付 <a href="https://mp.weixin.qq.com/cgi-bin/readtemplate?t=register/step1_tmpl&lang=zh_CN" target="_blank">[申请]</a></li>
 <li class="l1">选择支付方式：</li>
 <li class="l2">
 <select name="d2" onchange="wxpaycha()">
 <option value="0" <? if(empty($row[wxpayfs])==0){?> selected="selected"<? }?>>微信支付官方接口</option>
 <option value="1" <? if($row[wxpayfs]==1){?> selected="selected"<? }?>>个人扫码支付（人工入账）</option>
 </select>
 <span class="red">请根据你的接口实际情况来选择对应的支付方式</span>
 </li>
 </ul>
 <ul class="uk" id="wxpaym0">
 <li class="l1">APPID：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[0];}?>
 <input  name="wxpay0" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">MCHID：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[1];}?>
 <input  name="wxpay1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">KEY：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[2];}?>
 <input  name="wxpay2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">APPSECRET：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[3];}?>
 <input  name="wxpay3" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 </ul>
 <ul class="uk" id="wxpaym1" style="display:none;">
 <li class="l1">微信二维码：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? if(is_file("../img/wxpay_ewm.jpg")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/wxpay_ewm.jpg" target="_blank"><img src="../img/wxpay_ewm.jpg?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>
 </ul>

 <ul class="uk">
 <li class="cap">财付通设置 <a href="http://mch.tenpay.com/" target="_blank">[申请]</a></li>
 <li class="l1">商户编号：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[tenpay1];}?>
 <input  name="tenpay1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入财付通的商户号</span>
 </li>
 <li class="l1">密钥：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[tenpay2];}?>
 <input  name="tenpay2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入财付通的商户密钥</span>
 </li>
 
 <li class="cap">环讯支付接口 <a href="http://www.ips.com.cn/" target="_blank">[申请]</a></li>
 <li class="l1">商户号/账户号：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[ipsshh];}?>
 <input  name="ips1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入环讯的商户号和账户号，格式为 <span class="red">商户号|账户号</span></span>
 </li>
 <li class="l1">证书：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[ipszs];}?>
 <input  name="ips2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入环讯的证书号</span>
 </li>
 
 <li class="cap">网银在线接口 <a href="http://www.chinabank.com.cn/" target="_blank">[申请]</a></li>
 <li class="l1">商户号：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[bankbh];}?>
 <input  name="tbankbh" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入网银在线的商户号</span>
 </li>
 <li class="l1">商户KEY：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[bankkey];}?>
 <input  name="tbankkey" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">请输入网银在线的KEY</span>
 </li>
 
 <li class="cap">自由支付接口 <a href="http://www.yj99.cn/faq/view95.html" target="_blank">[说明]</a></li>
 <li class="l1">接口参数：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[otherpay];}?>
 <input  name="totherpay" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">格式：参数1,参数2,参数3</span>
 </li>
 <li class="l1">接口图标：</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" size="15" accept=".jpg,.gif,.jpeg,.png"> 推荐尺寸：150*50</li>
 <? $t="../user/img/pay/otherpay.jpg";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$t?>" target="_blank"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>

 <li class="l3"><? tjbtnr("保存修改");?></li>
 </ul>
 </form>

 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>
<script language="javascript">
alipaycha();
wxpaycha();
</script>
</body>
</html>