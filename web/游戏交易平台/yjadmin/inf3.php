<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("yjcode_control","webnamev","'����ʧ��'");}
 $wxpay=sqlzhuru($_POST[wxpay0]).",".sqlzhuru($_POST[wxpay1]).",".sqlzhuru($_POST[wxpay2]).",".sqlzhuru($_POST[wxpay3]);
 $otherpay=str_replace("��",",",sqlzhuru($_POST[totherpay]));
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
<title><?=webname?>����ϵͳ</title>
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
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

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
 <li class="l1">��ǰλ�ã�<a href="default.php">��̨��ҳ</a> - <strong>֧���ӿ�</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit4").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf3.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="cap">֧�������� <a href="https://b.alipay.com/order/productIndex.htm" target="_blank">[����]</a></li>
 <li class="l1">ѡ��֧����ʽ��</li>
 <li class="l2">
 <select name="d1" onchange="alipaycha()">
 <option value="0" <? if($row[zftype]==0 || $row[zftype]==NULL){?> selected="selected"<? }?>>֧������ʱ���ʹٷ��ӿ�</option>
 <option value="3" <? if($row[zftype]==3){?> selected="selected"<? }?>>����ɨ��֧�����˹����ˣ�</option>
 </select>
 <span class="red">�������Ľӿ�ʵ�������ѡ���Ӧ��֧����ʽ</span>
 </li>
 </ul>
 <ul class="uk" id="alipay0" style="display:none;">
 <li class="l1">partner��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[partner];}?>
 <input  name="zf1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������֧������partner</span>
 </li>
 <li class="l1">security_code��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[security_code];}?>
 <input  name="zf2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������֧������security_code</span>
 </li>
 <li class="l1">seller_email��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[seller_email];}?>
 <input  name="zf3" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������֧������seller_email</span>
 </li>
 </ul>
 <ul class="uk" id="alipay3" style="display:none;">
 <li class="l1">֧������ά�룺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? if(is_file("../img/alipay_ewm.jpg")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/alipay_ewm.jpg" target="_blank"><img src="../img/alipay_ewm.jpg?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>
 </ul>
 
 <ul class="uk">
 <li class="cap">΢��֧�� <a href="https://mp.weixin.qq.com/cgi-bin/readtemplate?t=register/step1_tmpl&lang=zh_CN" target="_blank">[����]</a></li>
 <li class="l1">ѡ��֧����ʽ��</li>
 <li class="l2">
 <select name="d2" onchange="wxpaycha()">
 <option value="0" <? if(empty($row[wxpayfs])==0){?> selected="selected"<? }?>>΢��֧���ٷ��ӿ�</option>
 <option value="1" <? if($row[wxpayfs]==1){?> selected="selected"<? }?>>����ɨ��֧�����˹����ˣ�</option>
 </select>
 <span class="red">�������Ľӿ�ʵ�������ѡ���Ӧ��֧����ʽ</span>
 </li>
 </ul>
 <ul class="uk" id="wxpaym0">
 <li class="l1">APPID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[0];}?>
 <input  name="wxpay0" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">MCHID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[1];}?>
 <input  name="wxpay1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">KEY��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[2];}?>
 <input  name="wxpay2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 <li class="l1">APPSECRET��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[3];}?>
 <input  name="wxpay3" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 </li>
 </ul>
 <ul class="uk" id="wxpaym1" style="display:none;">
 <li class="l1">΢�Ŷ�ά�룺</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? if(is_file("../img/wxpay_ewm.jpg")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/wxpay_ewm.jpg" target="_blank"><img src="../img/wxpay_ewm.jpg?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>
 </ul>

 <ul class="uk">
 <li class="cap">�Ƹ�ͨ���� <a href="http://mch.tenpay.com/" target="_blank">[����]</a></li>
 <li class="l1">�̻���ţ�</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[tenpay1];}?>
 <input  name="tenpay1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������Ƹ�ͨ���̻���</span>
 </li>
 <li class="l1">��Կ��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[tenpay2];}?>
 <input  name="tenpay2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������Ƹ�ͨ���̻���Կ</span>
 </li>
 
 <li class="cap">��Ѷ֧���ӿ� <a href="http://www.ips.com.cn/" target="_blank">[����]</a></li>
 <li class="l1">�̻���/�˻��ţ�</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[ipsshh];}?>
 <input  name="ips1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">�����뻷Ѷ���̻��ź��˻��ţ���ʽΪ <span class="red">�̻���|�˻���</span></span>
 </li>
 <li class="l1">֤�飺</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[ipszs];}?>
 <input  name="ips2" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">�����뻷Ѷ��֤���</span>
 </li>
 
 <li class="cap">�������߽ӿ� <a href="http://www.chinabank.com.cn/" target="_blank">[����]</a></li>
 <li class="l1">�̻��ţ�</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[bankbh];}?>
 <input  name="tbankbh" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">�������������ߵ��̻���</span>
 </li>
 <li class="l1">�̻�KEY��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[bankkey];}?>
 <input  name="tbankkey" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">�������������ߵ�KEY</span>
 </li>
 
 <li class="cap">����֧���ӿ� <a href="http://www.yj99.cn/faq/view95.html" target="_blank">[˵��]</a></li>
 <li class="l1">�ӿڲ�����</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[otherpay];}?>
 <input  name="totherpay" value="<?=$sv?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">��ʽ������1,����2,����3</span>
 </li>
 <li class="l1">�ӿ�ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" size="15" accept=".jpg,.gif,.jpeg,.png"> �Ƽ��ߴ磺150*50</li>
 <? $t="../user/img/pay/otherpay.jpg";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$t?>" target="_blank"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="40" /></a></li>
 <? }?>

 <li class="l3"><? tjbtnr("�����޸�");?></li>
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