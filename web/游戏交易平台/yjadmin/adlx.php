<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","yjcode_adlx where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("adlxlist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 updatetable("yjcode_adlx",$ses."
			 tit='".sqlzhuru($_POST[ttit])."',
			 adbh='".sqlzhuru($_POST[tadbh])."',
			 maxnum=".sqlzhuru($_POST[tmaxnum]).",
			 adh=".sqlzhuru($_POST[tadh]).",
			 adw=".sqlzhuru($_POST[tadw]).",
			 adty='".$_GET[adty]."',
			 fflx=".$_POST[Rfflx].",
			 sj='".sqlzhuru($_POST[tsj])."',
			 zt=0
			 where admin=1 and bh='".$bh."'");
 deletetable("yjcode_adlx where admin=2 and bh='".$bh."'");
 $fflx=intval($_POST[Rfflx]);
 if($fflx==1){//�̶�����
  $al=intval($_POST[fflxnum1]);
  for($i=1;$i<=$al;$i++){
  $tianshu=$_POST["tianshu_1_".$i];
  $money1=$_POST["money1_1_".$i];
  if(!empty($tianshu) && !empty($money1)){
  intotable("yjcode_adlx","bh,admin,xh,money1,tianshu,sj","'".$bh."',2,0,".$money1.",".$tianshu.",'".$sj."'");
  }
  }
 }elseif($fflx==2){//����λ�ò�ͬ����
  $al=intval($_POST[fflxnum2]);
  for($i=1;$i<=$al;$i++){
  $tianshu=$_POST["tianshu_2_".$i];
  $money1=$_POST["money1_2_".$i];
  $xh=$_POST["xh_2_".$i];
  if(!empty($tianshu) && !empty($money1)){
  intotable("yjcode_adlx","bh,admin,xh,money1,tianshu,sj","'".$bh."',2,".$xh.",".$money1.",".$tianshu.",'".$sj."'");
  }
  }
 }
 php_toheader("adlx.php?t=suc&bh=".$bh);

}
//�������

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
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
if((document.f1.tadbh.value).replace(/\s/,"")==""){alert("����������");document.f1.tadbh.focus();return false;}
a=document.f1.tmaxnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч������");document.f1.tmaxnum.focus();return false;}
c=document.getElementsByName("C1");str="xcf";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+"xcf";}}
if(str=="xcf"){alert("������ѡ��һ�������������");return false;}
tjwait();
f1.action="adlx.php?bh=<?=$bh?>&control=update&adty="+str;
}
function fflxadd1(){
a=parseInt(document.f1.fflxnum1.value);
document.f1.fflxnum1.value=a+5;
str=document.getElementById("fflx1").innerHTML;
for(i=1;i<=5;i++){
b=a+i;
str=str+"<ul class=\"fflxu2\"><li class=\"l1\"><input type=\"text\" name=\"tianshu_1_"+b+"\" /></li><li class=\"l2\"><input type=\"text\" name=\"money1_1_"+b+"\" /></li></ul>";
}
document.getElementById("fflx1").innerHTML=str;
}
function fflxadd2(){
a=parseInt(document.f1.fflxnum2.value);
document.f1.fflxnum2.value=a+5;
str=document.getElementById("fflx2").innerHTML;
for(i=1;i<=5;i++){
b=a+i;
str=str+"<ul class=\"fflxu2\"><li class=\"l1\"><input type=\"text\" name=\"xh_2_"+b+"\" /></li><li class=\"l1\"><input type=\"text\" name=\"tianshu_2_"+b+"\" /></li><li class=\"l2\"><input type=\"text\" name=\"money1_2_"+b+"\" /></li></ul>";
}
document.getElementById("fflx2").innerHTML=str;
}
function fflxonc(x){
document.getElementById("fflx1main").style.display="none";
document.getElementById("fflx2main").style.display="none";
document.getElementById("fflx"+x+"main").style.display="";
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
 <li class="l1">��ǰλ�ã���̨��ҳ - <strong>�������ϵͳ</strong></li><li class="l2"></li>
 </ul>
 <div class="rights">
 &nbsp;<strong>��ʾ��</strong><br>
 &nbsp;<span class="red">��������д���˶�ÿ����Ϣ����Ϊ���ϵ����ǰ̨չʾ��ҳ�����ۡ�</span>
 </div>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","adlx.php?bh=".$bh);}?>
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> �����⣺</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1"><span class="red">*</span> ����ţ�</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[adbh]?>" class="inp" name="tadbh" /></li>
 <li class="l1"><span class="red">*</span> ���������</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[maxnum]?>" class="inp" name="tmaxnum" /> 0��ʾ���޸���</li>
 <li class="l1"><span class="red">*</span> Ҫ���ȣ�</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[adw]?>" class="inp" name="tadw" /> 0��ʾ���޿��</li>
 <li class="l1"><span class="red">*</span> Ҫ��߶ȣ�</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[adh]?>" class="inp" name="tadh" /> 0��ʾ���޸߶�</li>
 <li class="l1"><span class="red">*</span> �������ͣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="C1" type="checkbox" value="1"<? if(strstr($row[adty],"xcf1xcf")){?> checked="checked"<? }?>/>ͼƬ 
 <input name="C1" type="checkbox" value="2"<? if(strstr($row[adty],"xcf2xcf")){?> checked="checked"<? }?>/>���� 
 <input name="C1" type="checkbox" value="3"<? if(strstr($row[adty],"xcf3xcf")){?> checked="checked"<? }?>/>���� 
 <input name="C1" type="checkbox" value="4"<? if(strstr($row[adty],"xcf4xcf")){?> checked="checked"<? }?>/>���� 
 </span>
 </li>
 <li class="l1"><span class="red">*</span> �������ͣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rfflx" type="radio" value="1" onclick="fflxonc(1)" <? if(1==$row[fflx]){?>checked="checked"<? }?> /> ��ͬ���� 
 <input name="Rfflx" type="radio" value="2" onclick="fflxonc(2)" <? if(2==$row[fflx]){?>checked="checked"<? }?> /> ����λ�ò�ͬ���� 
 </span>
 </li>
 </ul>
 
 <div id="fflx1main" style="display:none;">
 <ul class="fflxu1">
 <li class="l1">��������</li>
 <li class="l2">�������</li>
 </ul>
 <? $j=1;while1("*","yjcode_adlx where bh='".$bh."' and admin=2 order by id asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="fflxu2">
 <li class="l1"><input type="text" name="tianshu_1_<?=$j?>" value="<?=$row1[tianshu]?>" /></li>
 <li class="l2"><input type="text" name="money1_1_<?=$j?>" value="<?=$row1[money1]?>" /></li>
 </ul>
 <? $j++;}?>
 <? for($i=1;$i<=2;$i++){?>
 <ul class="fflxu2">
 <li class="l1"><input type="text" name="tianshu_1_<?=$j?>" /></li>
 <li class="l2"><input type="text" name="money1_1_<?=$j?>" /></li>
 </ul>
 <? $j++;}?>
 <div id="fflx1"></div>
 <ul class="uk"><li class="l1"></li><li class="l21"><a href="javascript:void(0);" onclick="fflxadd1()">���������С�</a></li></ul>
 <input type="hidden" value="<?=$j?>" name="fflxnum1" />
 </div>
 
 <div id="fflx2main" style="display:none;">
 <ul class="fflxu1">
 <li class="l3">����λ��</li>
 <li class="l1">��������</li>
 <li class="l2">�������</li>
 </ul>
 <? $j=1;while1("*","yjcode_adlx where bh='".$bh."' and admin=2 order by id asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="fflxu2">
 <li class="l3"><input type="text" name="xh_2_<?=$j?>" value="<?=$row1[xh]?>" /></li>
 <li class="l1"><input type="text" name="tianshu_2_<?=$j?>" value="<?=$row1[tianshu]?>" /></li>
 <li class="l2"><input type="text" name="money1_2_<?=$j?>" value="<?=$row1[money1]?>" /></li>
 </ul>
 <? $j++;}?>
 <? for($i=1;$i<=2;$i++){?>
 <ul class="fflxu2">
 <li class="l3"><input type="text" name="xh_2_<?=$j?>" /></li>
 <li class="l1"><input type="text" name="tianshu_2_<?=$j?>" /></li>
 <li class="l2"><input type="text" name="money1_2_<?=$j?>" /></li>
 </ul>
 <? $j++;}?>
 <div id="fflx2"></div>
 <ul class="uk"><li class="l1"></li><li class="l21"><a href="javascript:void(0);" onclick="fflxadd2()">���������С�</a></li></ul>
 <input type="hidden" value="<?=$j?>" name="fflxnum2" />
 </div>
 
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/> ��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</li>
 <li class="l3"><? tjbtnr("��һ��","adlxlist.php")?></li>
 </ul>
 </form>
 <!--E-->
 
</div>

</div>
<script language="javascript">fflxonc(<?=$row[fflx]?>);</script>
<?php include("bottom.html");?>
</body>
</html>