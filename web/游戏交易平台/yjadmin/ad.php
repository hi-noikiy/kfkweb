<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=time()."ad".rnd_num(100);
$sj=date("Y-m-d H:i:s");
$ad=preg_split("/-/",$_GET[sm]);

if($_GET[control]=="update"){  //��ʾ�޸�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲�����","default.php");}
 zwzr();
 if(sqlzhuru($_POST[R1])=="ͼƬ"){$tp=inp_tp_upload(1,"../gg/",$_GET[bh]);}elseif(sqlzhuru($_POST[R1])=="����"){$tp=inp_tp_upload(2,"../gg/",$_GET[bh]);}
 if($tp!=""){$b=preg_split("/\./",$tp);$tptype=$b[1];}else{$tptype=sqlzhuru($_POST[tptype]);}
 if(sqlzhuru($_POST[R1])=="ͼƬ"){$aurl=sqlzhuru($_POST[t1]);}elseif(sqlzhuru($_POST[R1])=="����"){$aurl=sqlzhuru($_POST[t3]);}
 $dqsj=sqlzhuru($_POST[tdqsj]);if(empty($dqsj)){$dqsj="2049-9-9 9:9:9";}
 updatetable("yjcode_ad","
 type1='".sqlzhuru($_POST[R1])."',
 jpggif='".$tptype."',
 tit='".sqlzhuru($_POST[at1])."',
 txt='".sqlzhuru($_POST[s1])."',
 sj='".$_POST[tsj]."',
 aurl='".$aurl."',
 aw=".sqlzhuru($_POST[t2]).",
 ah=".sqlzhuru($_POST[t4]).",
 xh=".sqlzhuru($_POST[txh]).",
 zt=".$_POST[Rzt].",
 dqsj='".$dqsj."' where bh='".$_GET[bh]."'");
 php_toheader("ad.php?action=update&t=suc&bh=".$_GET[bh]."&sm=".urlencode(sqlzhuru($_POST[ts2]))."&must=".$_GET[must]);

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript">
function lxsel(x){
	document.getElementById("adtp").style.display="none";
	document.getElementById("adcode").style.display="none";
	document.getElementById("adfont").style.display="none";
	document.getElementById("adflash").style.display="none";
	switch(x){
		case "ͼƬ":
	document.getElementById("adtp").style.display="";
		break;
		case "����":
	document.getElementById("adcode").style.display="";
		break;
		case "����":
	document.getElementById("adfont").style.display="";
		break;
		case "����":
	document.getElementById("adflash").style.display="";
		break;
		}
	}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">��ǰλ�ã���̨��ҳ - <strong>������</strong></li><li class="l2">&nbsp;</li>
 </ul>

 <? 
 while0("*","yjcode_ad where bh='".$_GET[bh]."'");$row=mysql_fetch_array($res);
 $tpdis="none";$codedis="none";$flashdis="none";$fontdis="none";
 ?>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='ad_lx.php?bh=".$row[adbh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]."'>�������</a>] [<a href='adlist.php?bh=".$row[adbh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]."'>�����б�</a>] ","ad.php?bh=".$_GET[bh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]);}?>
 <!--begin-->
<script language="javascript">
function tj(){
 r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����ͣ�");return false;}
 if(rr=="����"){
  if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч�Ķ������");document.f1.t2.focus();return false;}
  if((document.f1.t4.value).replace(/\s/,"")=="" || isNaN(document.f1.t4.value)){alert("��������Ч�Ķ����߶�");document.f1.t4.focus();return false;}
 }
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 tjwait();
 f1.action="ad.php?control=update&must=<?=$_GET[must]?>&bh=<?=$row[bh]?>&sm=<?=urlencode($_GET[sm])?>";
}
</script>
<form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
<ul class="uk">
<li class="l1">����ţ�</li>
<li class="l2"><input size="7" value="<?=$row[adbh]?>" class="inp redony" name="ts1" readonly="readonly" type="text"/></li>
<li class="l1">���˵����</li>
<li class="l2"><input size="30" value="<?=$_GET[sm]?>" class="inp redony" name="ts2" readonly="readonly" type="text"/></li>
<li class="l1">�����ţ�</li>
<li class="l2"><input name="txh" value="<?=$row[xh]?>" size="5" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
<li class="l1">����ѡ��</li>
<li class="l2">
<span class="finp">
<? if($_GET[must]=="pic" || $_GET[must]==""){?>
<input name="R1"<? if($row[type1]=="ͼƬ"){?> checked="checked"<? }?> onclick="lxsel('ͼƬ')" type="radio" value="ͼƬ" />ͼƬ 
<? }?>
<? if($_GET[must]=="code" || $_GET[must]==""){?>
<input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" />���� 
<? }?>
<? if($_GET[must]=="font" || $_GET[must]==""){?>
<input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" />���� 
<? }?>
<? if($_GET[must]=="flash" || $_GET[must]==""){?>
<input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" />����
<? }?>
</span>
</li>
<li class="l1">�����⣺</li>
<li class="l2"><input name="at1" value="<?=$row[tit]?>" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
<li class="l1">����ʱ�䣺</li>
<li class="l2"><input class="inp" name="tdqsj" value="<?=$row[dqsj]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/></li>
</ul>

<ul class="uk" id="adtp" style="display:none;">
<li class="l1">���ӵ�ַ��</li>
<li class="l2"><input name="t1" value="<?=$row[aurl]?>" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
<li class="l1"><strong class="red">�����ͼ��</strong></li>
<li class="l2"><input type="file" name="inp1" id="inp1" size="15"> ��ѳߴ磺<?=$ad[1]?></li>
<li class="l8"></li>
<li class="l9"><img src="../gg/<?=$row[bh]?>.<?=$row[jpggif]?>?t=<?=rnd_num(100)?>" width="200" height="54" /></li>
</ul>

<ul class="uk" id="adcode" style="display:none;">
<li class="l4">���룺</li>
<li class="l5"><textarea name="s1"><?=$row[txt]?></textarea></li>
</ul>

<ul class="uk" id="adfont" style="display:none;">
<li class="l1">���ӵ�ַ��</li>
<li class="l2"><input name="t3" value="<?=$row[aurl]?>" size="40" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /></li>
</ul>

<ul class="uk" id="adflash" style="display:none;">
<li class="l1">ѡ�񶯻���</li>
<li class="l2"><input type="file" name="inp2" id="inp2" size="15"> </li>
<li class="l1">������ã�</li>
<li class="l2">��<input name="t2" value="<?=$row[aw]?>" size="10" onfocus="inpf(this)" onblur="inpb(this)" class="inp" type="text" /> �ߣ�<input name="t4" value="<?=$row[ah]?>" onfocus="inpf(this)" onblur="inpb(this)" size="10" class="inp" type="text" /> </li>
</ul>

<ul class="uk">
<li class="l1">չʾ״̬��</li>
<li class="l2">
<span class="finp">
<label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /><strong>����չʾ</strong></label> 
<label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>������</strong></label> 
</span>
</li>
<li class="l1">����ʱ�䣺</li>
<li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/></li>
<li class="l1">������Ա��</li>
<li class="l2"><input class="inp redony" value="<?=returnuser($row[userid])?>" size="20" type="text"/> [<a href="user_ses.php?uid=<?=returnuser($row[userid])?>" target="_blank">����̨</a>]</li>
<li class="l3"><? tjbtnr("������","adlist.php?bh=".$row[adbh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]);?></li>
</ul>
<input type="hidden" value="<?=$row[jpggif]?>" name="tptype" />
</form>
<script language="javascript">
lxsel('<?=$row[type1]?>');
</script>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>