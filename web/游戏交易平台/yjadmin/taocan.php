<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];

while0("*","yjcode_taocan where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $id=$_GET[id];
 if(panduan("*","yjcode_taocan where admin is null and probh='".$bh."' and zt<>99 and tit='".sqlzhuru($_POST[t1])."' and id<>".$id)==1){Audit_alert("���ײ������Ѵ��ڣ�","taocan.php?action=update&id=".$_GET[id]."&bh=".$bh);}

 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."',
                              xh=".sqlzhuru($_POST[t2]).",
							  money1=".sqlzhuru($_POST[tmoney1]).",
							  money2=".sqlzhuru($_POST[tmoney2]).",
							  zt=0,
			                  fhxs=".$fhxs.",
			                  wpurl='".sqlzhuru($_POST[twpurl])."',
			                  wppwd='".sqlzhuru($_POST[twppwd])."',
			                  wppwd1='".sqlzhuru($_POST[twppwd1])."',
							  kcnum=".$kcnum."
							  where id=".$id);
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$row[userid].".".returnhz($up1);
  $lj="../upload/".$row[userid]."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_taocan","upf='".$mc."' where id=".$id);
  }
 }
 //�ϴ�E
 if(4==$fhxs){kamikc_tc($bh,$id);}
							   
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."' where tit='".sqlzhuru($_POST[oldty1])."' and probh='".$bh."'");
 php_toheader("taocan.php?t=suc&id=".$_GET[id]."&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������ײ�˵����");document.f1.t1.focus();return false;}
if((document.f1.tmoney2.value).replace(/\s/,"")==""){alert("������ԭ�ۣ�");document.f1.tmoney2.focus();return false;}
if((document.f1.tmoney1.value).replace(/\s/,"")==""){alert("�������Żݼۣ�");document.f1.tmoney1.focus();return false;}
if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
tjwait();
f1.action="taocan.php?control=update&id=<?=$row[id]?>&bh=<?=$bh?>";
}
function fhxsonc(x){
for(i=0;i<=4;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
}

</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu3").className="l31";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_product.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">��ǰλ�ã�<a href="./" class="a2">��̨��ҳ</a> - <strong>�ײ͹���</strong> [<a href="taocanlist.php?bh=<?=$bh?>">����</a>]</li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='taocanlx.php?bh=".$bh."'>�������</a>]","taocan.php?bh=".$bh."&id=".$_GET[id]);}?>
 
 <!--begin-->
 
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[tit]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">��Ӧ��Ʒ��</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$tit?>" size="80" /></li>
 <li class="l1">�ײ�˵����</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row[tit]?>" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money2]?>" /> Ԫ</li>
 <li class="l1">�Żݼۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money1]?>" /> Ԫ</li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">���ԽС��Խ��ǰ</span></li>
 </ul>
 
 <div class="upfile">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> �������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=$row[kcnum]?>" size="10" type="text"/> (����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</li>
 <li class="l1 red">* ������ʽ��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> ����Ʒ����һ��</label>&nbsp;&nbsp;
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����(����)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������(����)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վֱ������(����)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����(����)</label>&nbsp;&nbsp;
 <? }?>
 </span>
 </li>
 </ul> 
 <ul class="uk" id="fhxs2" style="display:none;">
 <li class="l1">���̵�ַ��</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">��ѹ���룺</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk" id="fhxs3" style="display:none;">
 <li class="l1">�ϴ��ļ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">�ļ�Ԥ����</li>
 <li class="l21">��<a href="../upload/<?=$row[userid]?>/<?=$row[probh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>
 </div>

 <ul class="uk">
 <li class="l3"><? tjbtnr("�����޸�","taocanlist.php?bh=".$bh);?></li>
 </ul>

 </form>
 
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>
</body>
</html>