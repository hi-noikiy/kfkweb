<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(empty($_SESSION[SAFEPWD])){Audit_alert("������Ϣ������Ҫ�Ƚ��а�ȫ����֤!","safepwd.php");}
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
//������ʼ
if($_GET[control]=="add"){
 zwzr();
 if($_POST[Rtjfs]=="txt"){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 
 }elseif($_POST[Rtjfs]=="one"){
  if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".sqlzhuru($_POST[tka])."' and userid=".$userid)==1){
  Audit_alert("�����Ѵ��ڣ����ʧ��!","kc.php?bh=".$bh);
  }
  intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".sqlzhuru($_POST[tka])."','".sqlzhuru($_POST[tmi])."',0");
 
 }else{
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $hz=returnhz($up1);
  if($hz!="xls"){Audit_alert("ʧ��.ֻ���ϴ�����.xls��׺���ļ�����������","kc.php?bh=".$bh);}
  $mu="../upload/".$userid."/";
  inp_tp_upload(1,$mu,$bh,"xls");
  //���뿪ʼ
  require_once '../config/Excel/reader.php';
  $data = new Spreadsheet_Excel_Reader();
  $data->setOutputEncoding('CP936');
  $data->read($mu.$bh.".xls");
  error_reporting(E_ALL ^ E_NOTICE);
  for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
  $ka= $data->sheets[0]['cells'][$i][1]."";
  $mi= $data->sheets[0]['cells'][$i][2]."";
   if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".$ka."' and userid=".$userid)==0){
   intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$ka."','".$mi."',0");
   }
  }
  //�������
  delFile($mu.$bh.".xls");
  }
 }
 kamikc($bh);
 php_toheader("kc.php?t=suc&bh=".$bh);
 
}elseif($_GET[control]=="update"){
 zwzr();
 $id=$_GET[id];
 if(panduan("id,probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".sqlzhuru($_POST[tka])."' and id<>".$id." and userid=".$userid)==1){
 Audit_alert("�����Ѵ��ڣ�����ʧ��!","kc.php?bh=".$bh."&action=update&id=".$id);}
 updatetable("yjcode_kc","ka='".sqlzhuru($_POST[tka])."',mi='".sqlzhuru($_POST[tmi])."',ifok=".sqlzhuru($_POST[Rifok])." where id=".$id);
 kamikc($bh);
 php_toheader("kc.php?t=suc&bh=".$bh."&action=update&id=".$id);

}

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
<script language="javascript">
function tjfsonc(x){
document.getElementById("tjfs1").style.display="none";
document.getElementById("tjfs2").style.display="none";
document.getElementById("tjfs3").style.display="none";
document.getElementById("tjfs"+x).style.display="";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? while1("bh,userid,tit","yjcode_pro where bh='".$bh."' and userid=".$luserid);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlist.php");}?>
 <div class="upfile">
 <ul class="uk">
 <li class="l1">��Ʒ���⣺</li>
 <li class="l21"><a href="product.php?bh=<?=$bh?>"><?=$row1[tit]?></a></li>
 </ul> 
 </div>
 
 <? systs("��ϲ���������ɹ�!","kc.php?id=".$_GET[id]."&bh=".$bh."&action=".$_GET[action])?>

 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
  tjwait();
  f1.action="kc.php?control=add&bh=<?=$bh?>"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">��ӷ�ʽ��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rtjfs" type="radio" value="txt" onclick="tjfsonc(3)" checked="checked" /> �ı�����</label> &nbsp;&nbsp;
 <label><input name="Rtjfs" type="radio" value="one" onclick="tjfsonc(1)" /> ��һ���</label> &nbsp;&nbsp;
 <label><input name="Rtjfs" type="radio" value="more" onclick="tjfsonc(2)" /> �����ϴ�</label>
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="tjfs3">
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB</li>
 <li class="l11">�������ݣ�</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 
 <ul class="uk" id="tjfs1" style="display:none;">
 <li class="l1">���ţ�</li>
 <li class="l2"><input type="text" class="inp" size="80" name="tka" /></li>
 <li class="l1">���룺</li>
 <li class="l2"><input type="text" class="inp" size="80" name="tmi" /></li>
 </ul>
 
 <ul class="uk" id="tjfs2" style="display:none;">
 <li class="l1">ѡ���ļ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <li class="l5"></li>
 <li class="l6">
 �ϴ���ʽΪxls�ļ�����excel��������Զ�ʶ�𣬵����뱣֤���Ϲ���<strong class="red">��һ��Ϊ���ţ��ڶ���Ϊ����</strong>������ͼ<br>
 <img src="img/xls.gif" width="270" height="76" style="margin:10px 0 0 0;" />
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("����","kclist.php?bh=".$bh)?></li>
 </ul>
 </form>
 
 <?
 }else{
 while0("*","yjcode_kc where userid=".$luserid." and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("kclist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
  tjwait();
  f1.action="kc.php?control=update&bh=<?=$bh?>&id=<?=$_GET[id]?>"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">���ţ�</li>
 <li class="l2"><input type="text" class="inp" size="80" value="<?=$row[ka]?>" name="tka" /></li>
 <li class="l1">���룺</li>
 <li class="l2"><input type="text" class="inp" size="80" value="<?=$row[mi]?>" name="tmi" /></li>
 <li class="l1">ʹ�������</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifok" type="radio" value="0"<? if(empty($row[ifok])){?> checked="checked"<? }?> /> δʹ�� &nbsp;&nbsp;
 <input name="Rifok" type="radio" value="1"<? if(1==$row[ifok]){?> checked="checked"<? }?> /> ��ʹ��
 </span>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("����","kclist.php?bh=".$bh)?></li>
 </ul>
 </form>
 
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>