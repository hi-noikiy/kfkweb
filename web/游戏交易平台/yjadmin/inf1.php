<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if($_POST[jvs]=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("code_control","webnamev","'����ʧ��'");}
 $ci=$_POST[tci];
 $ci=str_replace(" ","",$ci);
 if($ci=="|"){$ci="";}
 updatetable("yjcode_control","
			  ifsell='".sqlzhuru($_POST[Rifsell])."',
			  openshop=".sqlzhuru($_POST[topenshop]).",
			  openbao=".sqlzhuru($_POST[topenbao]).",
			  ifproduct='".sqlzhuru($_POST[Rifproduct])."',
			  ifkf='".sqlzhuru($_POST[Rifkf])."',
			  taskok=".sqlzhuru($_POST[Rtaskok]).",
			  shoprz='".$_GET[shoprz]."',
			  ifuc=".$_POST[Rifuc].",
			  ifwap=".$_POST[Rifwap].",
			  iftask=".$_POST[Riftask].",
			  ifci=".$_POST[Rifci].",
			  ci='".$ci."'
			  ");
			  
 deletetable("yjcode_openyue");
 $al=intval($_POST[yuenum]);
 for($i=1;$i<=$al;$i++){
 $yue=$_POST["yue_".$i];
 $money1=$_POST["money1_".$i];
 intotable("yjcode_openyue","yue,money1","".$yue.",".$money1."");
 }
  
 php_toheader("inf1.php?t=suc");

}elseif($_GET[control]=="qk"){
 updatetable("yjcode_control","ci=''");
 php_toheader("inf1.php?t=suc");

}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
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
c=document.getElementsByName("C1");str="xcf";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+"xcf";}}
tjwait();
f1.action="inf1.php?shoprz="+str;
}
function shoprzonc(x){
if(x=="on"){document.getElementById("shoprz1").style.display="none";}
else if(x=="off"){document.getElementById("shoprz1").style.display="";}
}
function qk(){
if(!confirm("ȷ��Ҫ������д��𣿽����ȱ���")){return false;}
location.href="inf1.php?control=qk";
}
function yueadd2(){
a=parseInt(document.f1.yuenum.value);
document.f1.yuenum.value=a+5;
str=document.getElementById("yue2").innerHTML;
for(i=1;i<=5;i++){
b=a+i;
str=str+"<ul class=\"yue\"><li class=\"l1\"><input type=\"text\" name=\"yue_"+b+"\" /></li><li class=\"l2\"><input type=\"text\" name=\"money1_"+b+"\" /></li></ul>";
}
document.getElementById("yue2").innerHTML=str;
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
 <li class="l1">��ǰλ�ã�<a href="default.php">��̨��ҳ</a> - <strong>Ȩ������</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit2").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf1.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">���ҿ���Ȩ�ޣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifsell" onclick="shoprzonc('off')" type="radio" value="off" <? if($row[ifsell]=="off"){?> checked="checked"<? }?> />��Ҫ��� 
 <input name="Rifsell" onclick="shoprzonc('on')" type="radio" value="on" <? if($row[ifsell]=="on"){?> checked="checked"<? }?> />����Ҫ��� 
 </span>
 </li>
 </ul>
 
 <div id="shoprz1" style="display:none;">
 <ul class="uk">
 <li class="l1">������˷ѣ�</li>
 <li class="l2"><input type="text" class="inp" name="topenshop" size="10" value="<?=$row[openshop]?>" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">���걣֤��</li>
 <li class="l2"><input type="text" class="inp" name="topenbao" size="10" value="<?=$row[openbao]?>" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">������֤��</li>
 <li class="l2">
 <span class="finp">
 <input name="C1" type="checkbox" value="1" <? if(strstr($row[shoprz],"xcf1xcf")){?> checked="checked"<? }?> />��Ҫͨ���ֻ���֤ 
 <input name="C1" type="checkbox" value="2" <? if(strstr($row[shoprz],"xcf2xcf")){?> checked="checked"<? }?> />��Ҫͨ��������֤ 
 <input name="C1" type="checkbox" value="3" <? if(strstr($row[shoprz],"xcf3xcf")){?> checked="checked"<? }?> />��Ҫͨ������ʵ����֤ 
 </span>
 </li>
 </ul>
 <ul class="openyf">
 <li class="l1">��������</li>
 <li class="l2">�������</li>
 </ul>
 <? $j=1;while1("*","yjcode_openyue order by yue asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="yue">
 <li class="l1"><input type="text" name="yue_<?=$j?>" value="<?=$row1[yue]?>" /></li>
 <li class="l2"><input type="text" name="money1_<?=$j?>" value="<?=$row1[money1]?>" /></li>
 </ul>
 <? $j++;}?>
 <? for($i=1;$i<=2;$i++){?>
 <ul class="yue">
 <li class="l1"><input type="text" name="yue_<?=$j?>" /></li>
 <li class="l2"><input type="text" name="money1_<?=$j?>" /></li>
 </ul>
 <? $j++;}?>
 <div id="yue2"></div>
 <ul class="uk"><li class="l1"></li><li class="l21"><a href="javascript:void(0);" onclick="yueadd2()">���������С�</a></li></ul>
 <input type="hidden" value="<?=$j?>" name="yuenum" />
 </div>

 
 <ul class="uk">
 <li class="l1">��ƷչʾȨ�ޣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifproduct" type="radio" value="off" <? if($row[ifproduct]=="off"){?> checked="checked"<? }?> />��Ҫ��� 
 <input name="Rifproduct" type="radio" value="on" <? if($row[ifproduct]=="on"){?> checked="checked"<? }?> />����Ҫ��� 
 </span>
 </li>
 <li class="l1">�Ҳ�ͷ���</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifkf" type="radio" value="on" <? if($row[ifkf]=="on"){?> checked="checked"<? }?> />���� 
 <input name="Rifkf" type="radio" value="off" <? if($row[ifkf]=="off"){?> checked="checked"<? }?> />������ 
 </span>
 </li>
 <li class="l1">���������</li>
 <li class="l2">
 <span class="finp">
 <input name="Riftask" type="radio" value="0" <? if(empty($row[iftask])){?> checked="checked"<? }?> />���� 
 <input name="Riftask" type="radio" value="1" <? if($row[iftask]==1){?> checked="checked"<? }?> />�ر� 
 </span>
 </li>
 <li class="l1">�������Ȩ�ޣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rtaskok" type="radio" value="0" <? if(empty($row[taskok])){?> checked="checked"<? }?> />��Ҫ��� 
 <input name="Rtaskok" type="radio" value="1" <? if($row[taskok]==1){?> checked="checked"<? }?> />������� 
 </span>
 </li>
 <li class="l1">�ֻ��棺</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifwap" type="radio" value="0" <? if(empty($row[ifwap])){?> checked="checked"<? }?> />���� 
 <input name="Rifwap" type="radio" value="1" <? if($row[ifwap]==1){?> checked="checked"<? }?> />�ر� 
 </span>
 </li>
 <li class="l1">�Ƿ���UC��</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifuc" type="radio" value="0" <? if(empty($row[ifuc])){?> checked="checked"<? }?> />������ 
 <input name="Rifuc" type="radio" value="1" <? if($row[ifuc]==1){?> checked="checked"<? }?> />���� (<a href="http://www.yj99.cn/faq/view41.html" target="_blank">�鿴�̳�</a>)
 </span>
 </li>
 <li class="l1">�������дʹ��ˣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifci" type="radio" value="0" <? if(empty($row[ifci])){?> checked="checked"<? }?> onclick="cionc(0)" />������ 
 <input name="Rifci" type="radio" value="1" <? if($row[ifci]==1){?> checked="checked"<? }?> onclick="cionc(1)" />����
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="ukci" style="display:none;">
 <li class="l4">���дʣ�</li>
 <li class="l5"><textarea name="tci"><?=$row[ci]?></textarea></li>
 <li class="l1">��ʾ��</li>
 <li class="l21">�����|���������� <span class="feng">���д�A|���д�B</span>��<span class="red">����ϸ��ո�ʽ����</span>��������ֱ��治�ˣ������ȡ�<a href="javascript:void(0);" onclick="qk()" class="blue">������д�</a>�����ٰ��ո�ʽ��������</li>
 </ul>
 
 <ul class="uk">
 <li class="l3"><? tjbtnr("�����޸�");?></li>
 </ul>
 </form>

 <!--End-->
 
</div>

</div>

<script language="javascript">
function cionc(x){
if(0==x){document.getElementById("ukci").style.display="none";}else{document.getElementById("ukci").style.display="";}
}
shoprzonc("<?=$row[ifsell]?>");
cionc(<?=$row[ifci]?>);
</script>
<?php include("bottom.html");?>
</body>
</html>