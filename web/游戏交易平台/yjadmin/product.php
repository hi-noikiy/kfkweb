<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

$timestamp=time();
while1("*","yjcode_admin where adminuid='".$_SESSION[SHOPADMIN]."'");$row1=mysql_fetch_array($res1);$adminpwd=$row1[adminpwd];
$proqx=$row1[proid];

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $txt=sqlzhuru($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $yhsj1=sqlzhuru($_POST[tyhsj1]);if(!empty($yhsj1)){$ses="yhsj1='".$yhsj1."',";}
 $yhsj2=sqlzhuru($_POST[tyhsj2]);if(!empty($yhsj1)){$ses=$ses."yhsj2='".$yhsj2."',";}
 $money3=sqlzhuru($_POST[tmoney3]);if(!is_numeric($money3)){$money3=0;}
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 
 $tysx=sqlzhuru($_POST[tysx]);
 $tysxB=intval(sqlzhuru($_POST[tysxBnum]));
 for($i=1;$i<$tysxB;$i++){
  $tysxS=intval(sqlzhuru($_POST["tysxSnum".$i]));
  for($j=1;$j<=$tysxS;$j++){
  $zi=sqlzhuru($_POST["zi_".$i."_".$j]);
  if(!empty($zi)){
  $tysx=$tysx."xcf".$_POST["tysxty1_".$i].":".$zi;
  }
  }
 }
 
 $ifuserjd=intval($_POST[Rifuserdj]);
 if(1==$ifuserjd){
 deletetable("yjcode_prouserdj where probh='".$bh."'");
  for($i=1;$i<intval($_POST[djnum]);$i++){
  $zhekou=$_POST["zhekou_".$i];
  $djname=$_POST["name1_".$i];
  if(!empty($zhekou)){intotable("yjcode_prouserdj","probh,userid,djname,admin,zhi","'".$bh."',".$row[userid].",'".$djname."',1,".$zhekou."");}
  }
 }
 
 updatetable("yjcode_pro",$ses."
			 mybh='".sqlzhuru($_POST[tmybh])."',
			 lastsj='".sqlzhuru($_POST[tlastsj])."',
			 tysx='".$tysx."',
			 zt=".$_POST[Rzt].",
			 ztsm='".sqlzhuru($_POST[tztsm])."',
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 xsnum=".sqlzhuru($_POST[txsnum]).", 
			 kcnum=".$kcnum.", 
			 money1=".sqlzhuru($_POST[tmoney1]).", 
			 money2=".sqlzhuru($_POST[tmoney2]).",
			 money3=".$money3.",
			 yhxs=".sqlzhuru($_POST[Ryhxs]).",
			 yhsm='".sqlzhuru($_POST[tyhsm])."',
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 iftuan=".sqlzhuru($_POST[Riftuan]).",
			 iftj=".sqlzhuru($_POST[tiftj]).",
			 fhxs=".$fhxs.",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 ifuserdj=".$ifuserjd."
			 where bh='".$bh."'");
 uploadtp($bh,"��Ʒ",$row[userid]);
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$row[userid].".".returnhz($up1);
  $lj="../upload/".$row[userid]."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_pro","upf='".$mc."' where bh='".$bh."'");
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
     if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$row[userid])==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$row[userid].",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc($bh);
 }
 //����E
 
 php_toheader("product.php?t=suc&bh=".$bh);

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
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�Ŀ��");document.f1.tkcnum.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney2.focus();return false;}
a=document.f1.tdjl.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ĵ����");document.f1.tdjl.focus();return false;}
a=document.f1.txsnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч��������");document.f1.txsnum.focus();return false;}
r=document.getElementsByName("Rfhxs");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�񷢻���ʽ��");return false;}
r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
tjwait();
f1.action="product.php?bh=<?=$bh?>&control=update";
}

function yhxsonc(x){
if(1==x){document.getElementById("yhxsul").style.display="none";}	
else if(2==x){document.getElementById("yhxsul").style.display="";}	
}

function fhxsonc(x){
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
}

function djonc(x){
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}

function ztonc(x){
if(2==x){document.getElementById("proztv").style.display="";}else{document.getElementById("proztv").style.display="none";}
}
</script>
<script type="text/javascript" src="js/adddate.js" ></script> 

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">

</head>
<body>
<?php include("top.html");?>
<script language="javascript">
document.getElementById("menu3").className="l31";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>
<? if(!strstr(",".$proqx.",",",".$row[id].",") && !empty($proqx)){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_product.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">��ǰλ�ã���̨��ҳ - <strong>������Ʒ��Ϣ</strong> - [<a href="productlist.php">����</a>]</li><li class="l2"></li>
 </ul>
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='productlx.php'>�����������Ʒ</a>]","product.php?bh=".$bh);}?>
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���ڷ��飺</li>
 <li class="l21"><strong><?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?></strong> [<a href="productlx.php?action=update&id=<?=$row[id]?>">�޸�</a>]</li>
 </ul>
 
 <div class="tysx">
 <input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
 <? $i=1;while1("*","yjcode_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
 <ul class="uk1">
 <li class="l1"><?=$row1[name1]?>��</li>
 <li class="l21">
 <? $j=1;while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <input name="Csx" type="checkbox" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?>&nbsp;&nbsp;
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" size="10" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </li>
 </ul>
 <? $i++;}?>
 </div>
 <input type="hidden" value="<?=$i?>" name="tysxBnum" />
 
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">�ϼ�/�¼ܣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> �ϼ� 
 <input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> �¼� 
 </span>
 </li>
 <li class="l1">չʾ��ַ��</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[ysweb]?>" class="inp" name="tysweb" /></li>
 <li class="l1">�Զ�����룺</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[mybh]?>" class="inp" name="tmybh" /></li>
 <li class="l1"><span class="red">*</span> ԭ�ۣ�</li>
 <li class="l2"><input class="inp" name="tmoney1" value="<?=$row[money1]?>" size="10" type="text"/></li>
 <li class="l1"><span class="red">*</span> �Żݼۣ�</li>
 <li class="l2"><input class="inp" name="tmoney2" value="<?=$row[money2]?>" size="10" type="text"/> <span class="red">��ʾ������������ײͣ��Żݼ۽�����д�ײ�����͵ļ۸�</span></li>
 <li class="l1"><span class="red">*</span> �Ż���ʽ��</li>
 <li class="l2">
 <span class="finp">
 <input name="Ryhxs" type="radio" value="1" onclick="yhxsonc(1)" <? if(1==$row[yhxs]){?>checked="checked"<? }?> /> �����Ż� 
 <input name="Ryhxs" type="radio" value="2" onclick="yhxsonc(2)" <? if(2==$row[yhxs]){?>checked="checked"<? }?> /> ��ʱ�Ż� 
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="yhxsul" style="display:none;">
 <li class="l1"><span class="red">*</span> ��ʱ�Żݼۣ�</li>
 <li class="l2"><input class="inp" name="tmoney3" value="<?=$row[money3]?>" size="10" type="text"/></li>
 <li class="l1"><span class="red">*</span> ��ʱ�Ż�˵����</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[yhsm]?>" class="inp" name="tyhsm" /></li>
 <li class="l1"><span class="red">*</span> �Ż�ʱ�䣺</li>
 <li class="l2">
 <input class="inp" name="tyhsj1" value="<?=$row[yhsj1]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/> 
 �� 
 <input class="inp" name="tyhsj2" value="<?=$row[yhsj2]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l1">�����ײͣ�</li>
 <li class="l21">��<strong><a href="taocanlist.php?bh=<?=$row[bh]?>" target="_blank" class="blue">�����ײͱ༭</a></strong>��</li>
 <li class="l1"><span class="red">*</span> ���û�Ա�ȼ���</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifuserdj" type="radio" value="0" onclick="djonc(0)" <? if(empty($row[ifuserdj])){?>checked="checked"<? }?> /> ������</label> 
 <label><input name="Rifuserdj" type="radio" value="1" onclick="djonc(1)" <? if(1==$row[ifuserdj]){?>checked="checked"<? }?> /> ����</label> 
 </span>
 </li>
 </ul>
 <div id="djv" style="display:none;">
 <ul class="dju1">
 <li class="l1">��Ա�ȼ�</li>
 <li class="l2">�����ۿ�(10��ʾ���ۿۣ�9��ʾ9��)</li>
 </ul>
 <? 
 $j=1;while1("*","yjcode_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","yjcode_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <ul class="dju2">
 <li class="l1"><input type="text" readonly="readonly" name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></li>
 <li class="l2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></li>
 </ul>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
 </div>
 
 <!--�ϴ�B-->
 <ul class="uk">
 <li class="l1">Ч��ͼ��</li>
 <li class="l21">���ϴ�<strong class="red" id="nowtpnum"><?=returncount("yjcode_tp where bh='".$bh."'")?></strong>��Ч��ͼ ��<a href="protp.php?bh=<?=$bh?>" target="_blank" class="blue">����ͼ�����</a>��</li>
 <li class="l3">
 <div id="pltp1">
  <div id="queue"></div>
  <input id="file_upload" style="display:none;" name="file_upload" type="file" multiple="true">
 </div>
 
 <div id="pltp2" class="red" style="display:none;">
  <img src="img/ajax_loader.gif" width="208" style="margin-bottom:7px;" height="13" /><br>
  ���ڴ���ͼƬ��Ϣ,ʣ��<strong id="synum">0</strong>�ţ�����ˢ�»�ر�ҳ�桭��<br>
 </div>
 
 </li>
 </ul>
 <script language="javascript">
 $(function() {
  $('#file_upload').uploadify({
    'formData'     : {
    'timestamp' : '<?= $timestamp?>',
    'token'     : '<?=md5('unique_salt'.$timestamp);?>',
	'bh'       : '<?=$bh?>',
	'adminuid'       : '<?=$_SESSION["SHOPADMIN"]?>',
	'adminpwd'       : '<?=$adminpwd?>'
    },
    'swf'      : 'uploadify.swf',
	'queueID'  : 'uploaddiv',
    'uploader' : 'uploadify.php',
				
    'removeTimeout' : 1,
				
    'onDialogClose'  : function(queueData) {
     if(queueData.filesQueued>0){
	  document.getElementById("synum").innerHTML=queueData.filesQueued;
	  document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
     }
    },
    'onQueueComplete' : function(queueData) {
    document.getElementById("pltp1").className="pltp1h";document.getElementById("pltp2").style.display="none";
    },
	'onUploadComplete' : function(file) {
	 document.getElementById("synum").innerHTML=parseInt(document.getElementById("synum").innerHTML)-1;
	 nt=parseInt(document.getElementById("nowtpnum").innerHTML);document.getElementById("nowtpnum").innerHTML=nt+1;
    }
				 
    });
  });
 </script>
 <div id="uploaddiv" style="display:none;"></div>
 <!--�ϴ�E-->
 
 
 
 <div class="upfile">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> �������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=$row[kcnum]?>" size="10" type="text"/> (����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</li>
 <li class="l1 red">* ������ʽ��</li>
 <li class="l2">
 <span class="finp">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վֱ������</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="5" onclick="fhxsonc(5)" <? if(5==$row[fhxs]){?>checked="checked"<? }?> /> ʵ����</label>&nbsp;&nbsp;
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
 <li class="l12">��ӿ��ܣ�</li>
 <li class="l13"><textarea name="s1"></textarea></li>
 </ul>
 </div>
 
 <ul class="uk">
 <li class="l10"><span class="red">*</span> ��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:710px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">��Ʒ�ؼ��ʣ�</li>
 <li class="l2"><input  name="twkey" value="<?=$row[wkey]?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l4">��Ʒ������</li>
 <li class="l5"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 </ul>
 
 <ul class="rightcap">
 <li class="l1 red">����Ա����</li>
 </ul>
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tlastsj" value="<?=$row[lastsj]?>" size="20" type="text"/> ��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</li>
 <li class="l1">����ʣ�</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">��������</li>
 <li class="l2"><input class="inp" name="txsnum" value="<?=$row[xsnum]?>" size="10" type="text"/></li>
 <li class="l1">�Ƽ���ţ�</li>
 <li class="l2"><input class="inp" name="tiftj" value="<?=$row[iftj]?>" size="10" type="text"/> Ĭ��0��ʾ���Ƽ�������0�򰴴�С������ʾ����</li>
 <li class="l1">��ҳ�Ź���</li>
 <li class="l2">
 <span class="finp">
 <input name="Riftuan" type="radio" value="0" <? if(empty($row[iftuan])){?>checked="checked"<? }?> /><strong>��</strong> 
 <input name="Riftuan" type="radio" value="1" <? if(1==$row[iftuan]){?>checked="checked"<? }?> /><strong>��</strong> 
 </span>
 </li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" onclick="ztonc(0)" <? if(0==$row[zt]){?>checked="checked"<? }?> /><strong>����չʾ</strong></label> 
 <label><input name="Rzt" type="radio" value="1" onclick="ztonc(1)" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>�������</strong></label> 
 <label><input name="Rzt" type="radio" value="2" onclick="ztonc(2)" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>��˲�ͨ��</strong></label> 
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="proztv" style="display:none;">
 <li class="l1">����ԭ��</li>
 <li class="l2"><input type="text" class="inp" name="tztsm" size="90" value="<?=$row[ztsm]?>" /></li>
 </ul>
 
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2"><input class="inp redony" value="<?=returnuser($row[userid])?>" size="20" type="text"/> [<a href="user_ses.php?uid=<?=returnuser($row[userid])?>" target="_blank">����̨</a>]</li>
 <li class="l3"><? tjbtnr("��һ��","productlist.php")?></li>
 </ul>
 </form>

 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
yhxsonc(<?=$row[yhxs]?>);
fhxsonc(<?=$row[fhxs]?>);
djonc(<?=returnjgdw($row[ifuserdj],"",0)?>);
var ue = UE.getEditor('editor');
ztonc(<?=$row[zt]?>);
</script>
</body>
</html>