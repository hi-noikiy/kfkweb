<?
include("../config/conn.php");
include("../config/function.php");
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_task where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("./");}
$bh=$row[bh];
taskok($row["id"]);

$sqluser="select * from yjcode_user where id=".$row[userid]."";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);$rowuser=mysql_fetch_array($resuser);
$userid=0;
$xgnum=0;
if(!empty($_SESSION[SHOPUSER])){
$sqluserM="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuserM=mysql_query($sqluserM);$rowuserM=mysql_fetch_array($resuserM);
$userid=$rowuserM[id];
while1("*","yjcode_taskhf where bh='".$bh."' and useridhf=".$userid."");if($row1=mysql_fetch_array($res1)){$xgnum=$row1[xgnum];$mybh=$row1[mybh];$myid=$row1[id];$mymoney=$row1[money1];$mytxt=$row1[txt];}
}

if($_GET[control]=="add"){ //��������
 if(empty($_SESSION[SHOPUSER])){Audit_alert("���ȵ�¼��","../reg/");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(0!=$row[zt]){Audit_alert("������ֹͣ���ձ��ۣ�","view".$id.".html");}
 if($xgnum>1){Audit_alert("���Ѿ��޸Ĺ�������ı��ۣ��������޸ģ�","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("�޷����Լ��������ύ���ۣ�","view".$id.".html");}
 $money1=sqlzhuru($_POST[t1]);
 if(!is_numeric($money1)){Audit_alert("������Ч��","view".$id.".html");}
 if($money1<=0){Audit_alert("������Ч��","view".$id.".html");exit;}
 $txt=sqlzhuru($_POST[s1]);
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")==0){
 $mybh=time()."t".$userid;
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,0");
 }else{
 updatetable("yjcode_taskhf","money1=".$money1.",txt='".$txt."',xgnum=xgnum+1 where bh='".$row[bh]."' and useridhf=".$userid."");
 }
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../config/mailphp/sendmail.php");
 $str="���˸��������ˣ��뾡�촦��<br>����".$row[tit]."<br>���ۣ�<font color='red' style='font-size:18px;'>".$money1."</font><br>��".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
 @yjsendmail("����������ѡ�".webname."��",$rowuser[email],$str);
 }

 php_toheader("../help/tslist_m1v_i".$id."v.html");

}elseif($_GET[control]=="add1"){ //��������
 if(empty($_SESSION[SHOPUSER])){Audit_alert("���ȵ�¼��","../reg/");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(101!=$row[zt]){Audit_alert("������ֹͣ�������룡","view".$id.".html");}
 if($row[taskcy]>=$row[tasknum]){Audit_alert("��������������","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("���ܽ����Լ�������","view".$id.".html");}
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==1){Audit_alert("��������δ��ɣ������ٴνӵ���","view".$id.".html");}
 $txt=sqlzhuru($_POST[s1]);
 $mybh=time()."t".$userid;
 $money1=$row[money1]/$row[tasknum];
 $rwdq=date("Y-m-d H:i:s",strtotime("+".$row[rwzq]." day"));
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty,zt,zbsj,rwdq","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,1,0,'".$sj."','".$rwdq."'");
 $uf=$row[useridhf]."yj".$userid."yj";
 updatetable("yjcode_task","useridhf='".$uf."' where id=".$id);
 $txt="���ֳɹ�����ʼ����������".$rwdq."ǰ������񣬲��ύ����";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../config/mailphp/sendmail.php");
 $str="���˽���������������ע������ȡ�<br>����".$row[tit]."<br>��".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
 @yjsendmail("����������ѡ�".webname."��",$rowuser[email],$str);
 }

 php_toheader("../help/tslist_m2v_i".$id."v.html");
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
t1v=parseFloat(document.f1.t1.value);
if(isNaN(t1v)){alert("��������Ч�ı���");return false;}
tjwait();
f1.action="view.php?control=add&id=<?=$id?>";
}
function tbxg(){
document.getElementById("tbedit").style.display="none";
document.getElementById("baojia").style.display="";
}
function tj1(){
if(!confirm("ȷ��Ҫ���ָ�������")){return false;}
tjwait();
f1.action="view.php?control=add1&id=<?=$id?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > ������� > <?=$row[tit]?></li></ul>
 </div>
</div>

<div class="bfb bfbtask fontyh">
<div class="yjcode">
 
 <!--��B-->
 <div class="vleft">
 
  <div class="jbzl">
   <ul class="u1">
   <li class="l1">
    <h1><?=$row[tit]?></h1>
    <span class="s1"><?=returntaskjgxs($row[jgxs])?><strong><?=returntaskjg($row[jgxs],$row[money1],$row[money2])?></strong></span>
    <span class="s3"><?=returntaskxs($row[taskty])?><strong><? if($row[taskty]==1){echo "(��Ҫ".$row[tasknum]."�ˣ�����Ӷ��".$row[money1]/$row[tasknum]."Ԫ)";}?></strong></span>
	<? if($row[money4]>0){?><span class="s2">����<strong><?=sprintf("%.2f",$row[money4])?></strong></span><? }?>
   </li>
   <li class="l2">
   <span class="s1">
   ��ţ�<span class="feng"><?=$row[bh]?></span>&nbsp;&nbsp; 
   �������ڣ�<span class="feng"><?=$row[rwzq]?></span>��&nbsp;&nbsp; 
   ������<?=dateYMD($row[sj])?>&nbsp;&nbsp; 
   </span>
   
   <?
   if($row[qqxs]==1){$qqxsvalue="Ͷ������̿ɲ鿴LINE";}elseif($row[qqxs]==2){$qqxsvalue="�б�����̿ɲ鿴LINE";}elseif(empty($row[qqxs])){$qqxsvalue="��¼��鿴LINE";}
   if($row[motxs]==1){$motxsvalue="Ͷ������̿ɲ鿴�绰";}elseif($row[motxs]==2){$motxsvalue="�б�����̿ɲ鿴�绰";}elseif(empty($row[motxs])){$motxsvalue="��¼��鿴�绰";}
   ?>

   <? if(empty($row[qqxs]) && !empty($_SESSION[SHOPUSER])){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif(1==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif(2==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }elseif($userid==$row[userid]){?>
   <a class="a3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=weburl?>&menu=yes"><?=$rowuser[uqq]?></a>
   <? }else{?>
   <a class="a4" href="../reg/"><?=$qqxsvalue?></a>
   <? }?>
   
   <? if(empty($row[motxs]) && !empty($_SESSION[SHOPUSER])){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif(1==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif(2==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }elseif($userid==$row[userid]){?>
   <a class="s2" href="javascript:void(0);"><?=$rowuser[mot]?></a>
   <? }else{?>
   <a class="a4" href="../reg/"><?=$motxsvalue?></a>
   <? }?>
   
   </li>
   </ul>
   <div class="zt">
   
   <? $bmnum=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
   <? if(0==$row[zt] && $bmnum==0){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�ȴ�����</strong></li>
   <li class="l3">����ѡ��</li>
   <li class="l4">��������</li>
   <li class="l5">��ɽ���</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(0==$row[zt] && $bmnum>0){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�ȴ�����</strong></li>
   <li class="l3"><strong>����ѡ��</strong></li>
   <li class="l4">��������</li>
   <li class="l5">��ɽ���</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(1==$row[zt] || 105==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�������</strong></li>
   <li class="l3">���ֱ���</li>
   <li class="l4">����ѡ��</li>
   <li class="l5">��������</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(2==$row[zt] || 106==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>��˲�ͨ��</strong></li>
   <li class="l3"><strong>����ر�</strong></li>
   <li class="l4">--</li>
   <li class="l5">--</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(3==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�ȴ�����</strong></li>
   <li class="l3"><strong>����ѡ��</strong></li>
   <li class="l4"><strong>���ַ�������</strong></li>
   <li class="l5">��������</li>
   </ul>
   <div class="ztok" id="ztok" style="width:529px;"></div>
   <? }elseif(4==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���񱻽���</strong></li>
   <li class="l3"><strong>���ַ���������</strong></li>
   <li class="l4"><strong>�ȴ���������</strong></li>
   <li class="l5">�������</li>
   </ul>
   <div class="ztok" id="ztok" style="width:529px;"></div>
   <? }elseif(5==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���񱻽���</strong></li>
   <li class="l3"><strong>���ַ���������</strong></li>
   <li class="l4"><strong>����ͨ��</strong></li>
   <li class="l5"><strong>�������</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(8==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���񱻽���</strong></li>
   <li class="l3"><strong>���ַ���������</strong></li>
   <li class="l4"><strong>���ղ�ͨ��</strong></li>
   <li class="l5"><strong>ƽ̨�������</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(9==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���񱻽���</strong></li>
   <li class="l3"><strong>�������ղ�ͨ��</strong></li>
   <li class="l4"><strong>ƽ̨����</strong></li>
   <li class="l5"><strong>�ж�����ʤ��</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }elseif(10==$row[zt] || 104==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���������</strong></li>
   <li class="l3"><strong>������</strong></li>
   <li class="l4">--</li>
   <li class="l5">--</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(100==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�ȴ����ɷ���</strong></li>
   <li class="l3">���ַ�����</li>
   <li class="l4">��������</li>
   <li class="l5">�������</li>
   </ul>
   <div class="ztok" id="ztok" style="width:197px;"></div>
   <? }elseif(101==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>�����ѽɷ���</strong></li>
   <li class="l3"><strong>���������</strong></li>
   <li class="l4">��������</li>
   <li class="l5">�������</li>
   </ul>
   <div class="ztok" id="ztok" style="width:363px;"></div>
   <? }elseif(102==$row[zt]){?>
   <ul class="ztu">
   <li class="l1"><strong>��������</strong></li>
   <li class="l2"><strong>���񱻽���</strong></li>
   <li class="l3"><strong>���ַ���������</strong></li>
   <li class="l4"><strong>���ղ�ͨ��</strong></li>
   <li class="l5"><strong>ƽ̨�������</strong></li>
   </ul>
   <div class="ztok" id="ztok" style="width:695px;"></div>
   <? }?>
   
   </div>
   <ul class="u2">
   <li class="l1">��������</li>
   <li class="l2"></li>
   </ul>
   <div class="tasktxt"><?=$row[txt]?><br><? $fj="../upload/".$row[userid]."/".$row[bh]."/".$row[fj];if(is_file($fj)){?><a href="<?=$fj?>" class="downfj" target="_blank">���ظ���</a><? }?></div>
  </div>
  
  <!--��������ʼ-->
  <? if(empty($row[taskty])){?>
  <div class="baojia" id="baojia"<? if(empty($userid) || (!empty($userid)) && $userid!=$row[userid] && $xgnum==0){?><? }else{?> style="display:none;"<? }?>>
   <form name="f1" method="post" onSubmit="return tj()">
   <ul class="u1">
   <li class="l1">���񱨼ۣ�</li>
   <li class="l2"><input type="text" name="t1" value="<?=$mymoney?>" /> <span class="fd">Ԫ�������ı���Ϊ��<?=returntaskjg($row[jgxs],$row[money1],$row[money2])?>��ƽ̨�н����<span class="blue"><? if(empty($row[yjfs])){echo "����֧��";}elseif($row[yjfs]==1){echo "���ַ�֧��";}else{echo "˫�����е�50%";}?></span>���н��Ϊ���׽���<span class="red"><?=$rowcontrol[taskyj]*100?>%</span>��</span></li>
   <li class="l3">����˵����</li>
   <li class="l4"><textarea name="s1"><?=$mytxt?></textarea></li>
   <li class="l5">
   <? if(!empty($userid)){?>
   <input type="submit" id="tjbtn" value="�ύ����" /><input id="tjing" style="display:none;" class="inp1" type="button" value="�����ύ" />
   <? }else{?>
   <input class="inp1" type="button" value="���ȵ�¼" onClick="gourl('../reg/')" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
 
  <? if(!empty($userid) && $userid!=$row[userid] && $xgnum==1){?>
  <div class="jisuan" id="tbedit">
  ����Ͷ��ţ�<?=$mybh?>����<a href="#tb<?=$myid?>" class="blue">�鿴</a>��&nbsp;&nbsp;��<a href="javascript:void(0);" onClick="tbxg()" class="blue">�޸�</a>��
  </div>
  <? }?>
 
  <? if($userid==$row[userid]){$cy=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
  <? if($cy==0){?>
  <div class="jisuan">
  <strong>�������ã���ʱû���˸������ۣ��������ע</strong><br>
  </div>
  <? }else{?>
  <div class="jisuan">
  <strong>�������ã���ǰ����<?=$cy;?>�˲���������</strong><br>
  <?
  $zh=returnsum("money1","yjcode_taskhf where bh='".$row[bh]."'");
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 desc");$row1=mysql_fetch_array($res1);$moneyg=$row1[money1];
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 asc");$row1=mysql_fetch_array($res1);$moneyd=$row1[money1];
  ?>
  �����ۣ�<span class="feng"><?=sprintf("%.2f",$zh/$cy)?></span>Ԫ����߱��ۣ�<span class="red"><?=$moneyg?></span>Ԫ����ͱ���<span class="green"><?=$moneyd?></span>Ԫ��
  </div>
  <? }?>
  <? }?>
  <? }?>
  <!--�����������-->
 
  <!--��������ʼ-->
  <? if($row[taskty]==1 && $userid!=$row[userid] && panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==0){?>
  <div class="baojia">
   <form name="f1" method="post" onSubmit="return tj1()">
   <ul class="u1">
   <li class="l1">����Ӷ��</li>
   <li class="l2"><span class="fd"><strong class="red"><?=$row[money1]/$row[tasknum]?></strong>Ԫ��ƽ̨�н����<span class="blue"><? if(empty($row[yjfs])){echo "����֧��";}elseif($row[yjfs]==1){echo "���ַ�֧��";}else{echo "˫�����е�50%";}?></span>���н��Ϊ���׽���<span class="red"><?=$rowcontrol[taskyj]*100?>%</span></span></li>
   <li class="l3">����˵����</li>
   <li class="l4"><textarea name="s1">���ѽӵ����ᰴҪ�󾡿��깤^_^</textarea></li>
   <li class="l5">
   <? if(!empty($userid)){?>
   <input type="submit" id="tjbtn" value="�ӵ�" /><input id="tjing" style="display:none;" class="inp1" type="button" value="�����ύ" />
   <? }else{?>
   <input class="inp1" type="button" value="���ȵ�¼" onClick="tclogin()" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
  <? }?>
  <!--�����������-->
 
  <?
  while1("*","yjcode_taskhf where bh='".$bh."' order by sj desc");while($row1=mysql_fetch_array($res1)){
  while2("*","yjcode_user where id=".$row1[useridhf]);$row2=mysql_fetch_array($res2);
  ?>
  <a name="tb<?=$row1[id]?>"></a>
  <div class="taskhf">
   <ul class="u1">
   <li class="l1"><img src="<?=returntppd("../upload/".$row1[useridhf]."/user.jpg","../img/none60x60.gif")?>" width="60" height="60" /></li>
   <li class="l2">
   <strong><?=$row2[nc]?></strong><br>
   ��ϵQQ��<? if($userid==$row[userid]){?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a><? }else{?>�����ɼ�<? }?>
   </li>
   <li class="l3">
   <? if($userid==$row[userid] && 0==$row[zt]){?><a href="../user/taskbjsel.php?bh=<?=$row[bh]?>&mid=<?=$row1[id]?>" class="xz">ѡ��<br>Ͷ��</a><? }?>
   <? if($row[useridhf]==$row2[id]){?><img src="img/suc.gif" class="zb" /><? }?>
   </li>
   </ul>
   <div class="hftxt">���񱨼ۣ�<strong class="feng"><? if($userid==$row[userid]){?><?=$row1[money1]?><? }else{?>�����ɼ�<? }?></strong><br><?=$row1[txt]?><br><br><span class="hui">Ͷ���ţ�<?=$row1[mybh]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����ʱ�䣺<?=$row1[sj]?></span></div>
  </div>
  <?
  }
  ?>
 
 </div>
 <!--��E-->
 
 <div class="listright">
  <? if(0==$row[zt]){?>
  <ul class="udq">
  <li class="l1">��������������ʣ��</li>
  <? if($row[zt]!=4){$dqsj=str_replace("-","/",$row[yxq]);?>
  <li class="l2 fontyh">
  <span id="nowsj" style="display:none;"><?=str_replace("-","/",date("Y-m-d H:i:s"))?></span>
  <span id="dqsj" style="display:none;"><?=$dqsj?></span>
  <span class="djs" id="djs">���ڼ���</span>
  <script language="javascript">userChecksj();</script>
  </li>
  <? }else{?>
  <li class="l3 fontyh">�ѽ���</li>
  <? }?>
  </ul>
  <? }?>
  <? include("right.php");?>
 </div> 
 
</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>