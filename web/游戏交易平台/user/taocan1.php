<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
$id=$_GET[id];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_pro where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 if(panduan("*","yjcode_taocan where userid=".$userid." and admin=2 and tit='".sqlzhuru($_POST[t0])."' and tit2='".sqlzhuru($_POST[t1])."' and probh='".$bh."' and id<>".$id)==1){Audit_alert("���ײ�˵���Ѵ��ڣ�","taocan1.php?action=update&id=".$id."&ty1id=".$_GET[ty1id]."&bh=".$bh);}
 
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 updatetable("yjcode_taocan","tit2='".sqlzhuru($_POST[t1])."',
                              xh=".sqlzhuru($_POST[t2]).",
							  money1=".sqlzhuru($_POST[tmoney1]).",
							  money2=".sqlzhuru($_POST[tmoney2]).",
							  zt=0,
			                  fhxs=".$fhxs.",
			                  wpurl='".sqlzhuru($_POST[twpurl])."',
			                  wppwd='".sqlzhuru($_POST[twppwd])."',
			                  wppwd1='".sqlzhuru($_POST[twppwd1])."',
							  kcnum=".$kcnum."
							  where id=".$_GET[id]);
							  
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_taocan","upf='".$mc."' where id=".$id." and userid=".$userid);
  }
 }
 //�ϴ�E
 //����B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,tcid,userid,ka","yjcode_taocan_kc where probh='".$bh."' and ka='".$ka."' and tcid=".$id." and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_taocan_kc","probh,tcid,userid,ka,mi,ifok","'".$bh."',".$id.",".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc_tc($bh,$id);
 }
 //����E

 php_toheader("taocanlist.php?bh=".$bh);

}
//�������

while0("*","yjcode_taocan where userid=".$userid." and id=".$_GET[ty1id]);$row=mysql_fetch_array($res);
$ty1tit=$row[tit];

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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ײ͹��� - <strong class="red"><?=$ty1tit?></strong> [<a href="taocanlist.php?bh=<?=$bh?>">����</a>]</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 
 <!--B-->
 <? 
 while0("*","yjcode_taocan where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������ײ�˵����");document.f1.t1.focus();return false;}
 if((document.f1.tmoney2.value).replace(/\s/,"")==""){alert("������ԭ�ۣ�");document.f1.tmoney2.focus();return false;}
 if((document.f1.tmoney1.value).replace(/\s/,"")==""){alert("�������Żݼۣ�");document.f1.tmoney1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="taocan1.php?control=update&id=<?=$row[id]?>&ty1id=<?=$_GET[ty1id]?>&bh=<?=$bh?>";
 }
 function fhxsonc(x){
 for(i=0;i<=4;i++){
 d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
 }
 d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
 if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ӧ��Ʒ��</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$tit?>" size="80" /></li>
 <li class="l1">һ���ײͣ�</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$ty1tit?>" name="t0" readonly="readonly" /></li>
 <li class="l1">�����ײͣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" onfocus="inpf(this)" value="<?=$row[tit2]?>" onblur="inpb(this)" /></li>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money2]?>" /> Ԫ</li>
 <li class="l1">�Żݼۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money1]?>" /> Ԫ</li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">���ԽС��Խ��ǰ</span></li>
 </ul>
 
 <div class="upfile">
 <ul class="uk" id="kcuk">
 <li class="l1"><span class="red">*</span> �������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> (����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</li>
 </ul>
 <ul class="uk">
 <li class="l1 red">* ������ʽ��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> ����Ʒ����һ��</label>&nbsp;&nbsp;
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����(����)</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������(����)</label> &nbsp;&nbsp;
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
 <li class="l21">��<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>
 <ul class="uk" id="fhxs4" style="display:none;">
 <li class="l1">��棺</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>��</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">������</a>]</li>
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB</li>
 <li class="l11">�������ݣ�</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 </div>

 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�����޸�","taocanlist.php?bh=".$bh);?></li>
 </ul>
 </form>
 <!--E-->

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>
</body>
</html>