<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_adlx where bh='".$bh."' and fflx=1 and admin=1");if(!$row=mysql_fetch_array($res)){php_toheader("adlx1.php");}
if(empty($row[maxnum])){$sywz="储足";}
else{
 $asy=$row[maxnum]-returncount("yjcode_ad where adbh='".$row[adbh]."' and zt=0");
 if($asy<0){$sywz=0;}else{$sywz=$asy;}
}

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if($_GET[control]=="add"){  //表示新增
 zwzr();
 $d1=intval($_POST[d1]);
 while1("*","yjcode_adlx where id=".$d1);if(!$row1=mysql_fetch_array($res1)){php_toheader("adlx1.php");}
 if($rowuser[money1]<$row1[money1]){Audit_alert("余额不足，请先充值！","pay.php");}
 $dqsj=date("Y-m-d H:i:s",strtotime("+".$row1[tianshu]." day"));
 $nxh=returnxh("yjcode_ad"," and adbh='".$row[adbh]."'");
 $R1=sqlzhuru($_POST[R1]);
 $userid=$rowuser[id];
 $mbh=time()."adu".$userid;
 if($R1=="图片"){$tp=inp_tp_upload(1,"../gg/",$mbh);}elseif($R1=="动画"){$tp=inp_tp_upload(2,"../gg/",$mbh);}
 if($tp!=""){$b=preg_split("/\./",$tp);$tptype=$b[1];}else{$tptype="";}
 if($R1=="图片"){$aurl=sqlzhuru($_POST[t1]);}elseif($R1=="文字"){$aurl=sqlzhuru($_POST[t3]);}
 if($asy>0){$zt=0;}else{$zt=1;}
 intotable("yjcode_ad","bh,type1,jpggif,tit,adbh,txt,sj,aurl,xh,aw,ah,dqsj,zt,money1,userid","'".$mbh."','".$R1."','".$tptype."','".sqlzhuru($_POST[at1])."','".$row[adbh]."','".sqlzhuru($_POST[s1])."','".$sj."','".$aurl."',".$nxh.",".sqlzhuru($_POST[t2]).",".sqlzhuru($_POST[t4]).",'".$dqsj."',".$zt.",".$row1[money1].",".$userid."");
 PointUpdateM($userid,$row1[money1]*(-1));
 PointIntoM($userid,"购买自助广告位".$row[adbh],$row1[money1]*(-1));
 php_toheader("adlxlist.php?zt=".$zt);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript">
function lxsel(x){
	document.getElementById("adtp").style.display="none";
	document.getElementById("adcode").style.display="none";
	document.getElementById("adfont").style.display="none";
	document.getElementById("adflash").style.display="none";
	switch(x){
		case "图片":
	document.getElementById("adtp").style.display="";
		break;
		case "代码":
	document.getElementById("adcode").style.display="";
		break;
		case "文字":
	document.getElementById("adfont").style.display="";
		break;
		case "动画":
	document.getElementById("adflash").style.display="";
		break;
		}
}
function tj(){
 if((document.f1.at1.value).replace(/\s/,"")==""){alert("请输入广告标题");document.f1.at1.focus();return false;}
 r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择类型！");return false;}
 if(rr=="动画"){
  if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的动画宽度");document.f1.t2.focus();return false;}
  if((document.f1.t4.value).replace(/\s/,"")=="" || isNaN(document.f1.t4.value)){alert("请输入有效的动画高度");document.f1.t4.focus();return false;}
 }
 if(!confirm("确定提交吗？一经提交，不可修改，请核对仔细！")){return false;}
 tjwait();
 f1.action="adgd.php?control=add&bh=<?=$bh?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > <a href="adlx1.php">选择自助广告位</a> > <?=$row[adbh]?></li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">广告位：</li>
 <li class="l21"><?=$row[adbh]?>，<?=$row[tit]?></li>
 <li class="l1">剩余位置：</li>
 <li class="l21"><?=$sywz?></li>
 <li class="l1">排队人数：</li>
 <li class="l21"><?=returncount("yjcode_ad where adbh='".$row[adbh]."' and zt=1")?></li>
 <li class="l1">广告尺寸：</li>
 <li class="l21">宽：<?=returnjgdw($row[adw],"px","不限")?>，高：<?=returnjgdw($row[adh],"px","不限")?></li>
 <li class="l1">您的余额：</li>
 <li class="l21"><?=$rowuser[money1]?>元  [<a href="pay.php" target="_blank">充值</a>]</li>
 <li class="l1"><span class="red">*</span> 购买天数：</li>
 <li class="l2">
 <select name="d1">
 <option value="0">选择天数</option>
 <? while1("*","yjcode_adlx where admin=2 and bh='".$bh."' order by id asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tianshu]?>天，价格<?=$row1[money1]?>元</option>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input name="at1" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 <li class="l1"><span class="red">*</span> 广告类型：</li>
 <li class="l2">
 <span class="finp">
 <? if(strstr($row[adty],"xcf1xcf")){?><input name="R1" onclick="lxsel('图片')" type="radio" value="图片" /> 图片 <? }?>
 <? if(strstr($row[adty],"xcf2xcf")){?><input name="R1" type="radio" value="代码" onclick="lxsel('代码')" /> 代码 <? }?>
 <? if(strstr($row[adty],"xcf3xcf")){?><input name="R1" type="radio" value="文字" onclick="lxsel('文字')" /> 文字 <? }?>
 <? if(strstr($row[adty],"xcf4xcf")){?><input name="R1" type="radio" value="动画" onclick="lxsel('动画')" /> 动画Flash<? }?>
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="adtp" style="display:none;">
 <li class="l1"><span class="red">*</span> 链接地址：</li>
 <li class="l2"><input name="t1" value="http://" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 <li class="l1"><span class="red">*</span> 广告图片：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15"></li>
 </ul>

 <ul class="uk" id="adcode" style="display:none;">
 <li class="l9"><span class="red">*</span> 代码：</li>
 <li class="l10"><textarea name="s1"></textarea></li>
 </ul>

 <ul class="uk" id="adfont" style="display:none;">
 <li class="l1"><span class="red">*</span> 链接地址：</li>
 <li class="l2"><input name="t3" value="http://" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
 </ul>

 <ul class="uk" id="adflash" style="display:none;">
 <li class="l1"><span class="red">*</span> 选择动画：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15"> </li>
 <li class="l1"><span class="red">*</span> 宽高设置：</li>
 <li class="l2">
 宽：<input name="t2" size="10" value="0" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /> 
 高：<input name="t4" value="0" onfocus="inpf(this)" onblur="inpb(this)" size="10" class="inp" type="text" /> 
 </li>
 </ul>

 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交购买","adlx1.php")?></li>
 </ul>
 </form>

</div>
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>