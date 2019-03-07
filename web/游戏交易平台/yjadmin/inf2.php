<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("yjcode_control","webnamev","'保存失败'");}
 updatetable("yjcode_control","
			  mailname='".sqlzhuru($_POST[m1])."',
			  mailsmtp='".sqlzhuru($_POST[m3])."',
			  mailpwd='".sqlzhuru($_POST[m2])."',
			  maildk='".sqlzhuru($_POST[m4])."',
			  qqappid='".sqlzhuru($_POST[q1])."',
			  qqappkey='".sqlzhuru($_POST[q2])."',
			  ifmob='".sqlzhuru($_POST[Rmob])."',
			  smsfun='".$_POST[s1]."',
			  smsmode=".sqlzhuru($_POST[Rsmsmode]).",
			  smskc=".sqlzhuru($_POST[tsmskc])."
			  ");
 
 $hd=weburl."reg/qqreturnlast.php";
 $output="{\"appid\":\"".sqlzhuru($_POST[q1])."\",\"appkey\":\"".sqlzhuru($_POST[q2])."\",\"callback\":\"".$hd."\",\"scope\":\"get_user_info\",\"errorReport\":true,\"storageType\":\"file\",\"host\":\"localhost\",\"user\":\"root\",\"password\":\"root\",\"database\":\"test\"}";
 $fp= fopen("../config/qq/API/comm/inc.php","w");
 fwrite($fp,$output);
 fclose($fp);
 
 if(intval($_POST[Rsmsmode])==1 || intval($_POST[Rsmsmode])==2){}else{
  while1("*","yjcode_control");$row1=mysql_fetch_array($res1);
  $output="<? ".$t.$row1[smsfun]."?>";
  $fp= fopen("../config/mobphp/mysendsms.php","w");
  fwrite($fp,$output);
  fclose($fp);
 }
 
 $mb=array("001","002","003","004","005","006");for($i=0;$i<count($mb);$i++){
 $mbid=$_POST["tmb".$mb[$i]];
 updatetable("yjcode_smsmb","mbid='".$mbid."' where mybh='".$mb[$i]."'");
 }
 
 php_toheader("inf2.php?t=suc");
}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
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
f1.action="inf2.php";
}
function smsmdcha(x){
if(0==x){document.getElementById("smsmd1").style.display="none";document.getElementById("smsmd0").style.display="";}else{document.getElementById("smsmd1").style.display="";document.getElementById("smsmd0").style.display="none";}
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
 <li class="l1">当前位置：<a href="default.php">后台首页</a> - <strong>通信接口</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit3").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf2.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="cap">邮局设置 <a href="http://www.yj99.cn/faq/view9.html" target="_blank">如何设置？</a></li>
 <li class="l1">设置邮箱帐号：</li>
 <li class="l2"><input name="m1" value="<?=$row[mailname];?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">邮箱密码：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[mailpwd];}?>
 <input name="m2" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 </li>
 <li class="l1">邮箱SMTP：</li>
 <li class="l2"><input name="m3" value="<?=$row[mailsmtp]?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">邮箱端口：</li>
 <li class="l2"><input name="m4" value="<?=$row[maildk]?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="cap">QQ接口 <a href="http://www.yj99.cn/faq/view25.html" target="_blank">如何设置？</a></li>
 <li class="l1">APP ID：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[qqappid];}?>
 <input name="q1" value="<?=$sv?>" size="20" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 </li>
 <li class="l1">APP KEY：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[qqappkey];}?>
 <input name="q2" value="<?=$sv?>" size="40" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 </li>
 <li class="cap">手机短信接口</li>
 <li class="l1">手机短信功能：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rmob" type="radio" value="off" <? if($row[ifmob]=="off"){?> checked="checked"<? }?> />不开通 
 <input name="Rmob" type="radio" value="on" <? if($row[ifmob]=="on"){?> checked="checked"<? }?> />开通<span class="hui">(需要配置短信接口文件)</span>
 </span>
 </li>
 <li class="l1">剩余短信数：</li>
 <li class="l2"><input name="tsmskc" value="<?=returndw($row[smskc],"",0)?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 输入您的短信运营商提供的剩余可用短信数量</li>
 <li class="l1">短信发送模式：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rsmsmode" onclick="smsmdcha(0)" type="radio" value="0" <? if(empty($row[smsmode])){?> checked="checked"<? }?> />直接发送模式（类似中国网建这种）</label>&nbsp;&nbsp;
 <label><input name="Rsmsmode" onclick="smsmdcha(1)" type="radio" value="1" <? if($row[smsmode]==1){?> checked="checked"<? }?> />模板发送形式（阿里大于）<a href="http://www.yj99.cn/faq/view79.html" target="_blank" class="red">配置说明</a></label>&nbsp;&nbsp;
 <label><input name="Rsmsmode" onclick="smsmdcha(2)" type="radio" value="2" <? if($row[smsmode]==2){?> checked="checked"<? }?> />模板发送形式（阿里通信）<a href="http://www.yj99.cn/faq/view79.html" target="_blank" class="red">配置说明</a></label>
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="smsmd0" style="display:none;">
 <li class="l4">函数规则：&nbsp;</li>
 <li class="l5">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[smsfun];}?>
 <textarea name="s1"><?=$sv?></textarea>
 </li>
 </ul>
 
 <ul class="uk" id="smsmd1" style="display:none;">
 <? 
 $nbh="001";
 $t="验证码：\${yzm},您正在找回密码，如果不是本人操作，请忽略此信息。";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID1：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 <? 
 $nbh="002";
 $t="验证码：\${yzm},您正在进行手机解除绑定，如果不是本人操作，请忽略此信息。";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID2：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 <? 
 $nbh="003";
 $t="验证码：\${yzm},您正在进行手机绑定，如果不是本人操作，请忽略此信息。";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID3：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 <? 
 $nbh="004";
 $t="亲，有新订单啦！请尽快登录网站发货，购买商品为：\${tit}";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID4：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 <? 
 $nbh="005";
 $t="退款通知：有买家进行了退款，商品单价\${money1}元，数量\${num}，请尽快登录网站处理";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID5：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 <? 
 $nbh="006";
 $t="验证码：\${yzm},您正在通过手机验证直接登录，如果不是本人操作，请忽略此信息。";
 while1("*","yjcode_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("yjcode_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">短信模板ID6：</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="12" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <?=$t?>
 </li>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l3"><? tjbtnr("保存修改");?></li>
 </ul>
 </form>

 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>
<script language="javascript">smsmdcha(<?=$rowcontrol[smsmode]?>);</script>
</body>
</html>