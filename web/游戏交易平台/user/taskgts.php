<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and taskty=0 and useridhf=".$rowtask[useridhf]." and ifxz=1";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist.php");}

//������ʼ
if($_GET[control]=="add"){
 zwzr();
 $txt=sqlzhuru($_POST[content]);
 $sj=date("Y-m-d H:i:s");
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",1,'".$txt."','".$sj."',''");
 php_toheader("taskgts.php?t=suc&bh=".$bh);

}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
      id : 'content',
       resizeMode : 1,
       cssPath : '../ckeditor/examples/index.css',
       items : [
       'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
       'removeformat','image', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
       'insertunorderedlist']
});
function tj(){
tjwait();
f1.action="taskgts.php?bh=<?=$bh?>&control=add";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap17.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv.php");?>

 <?
 while2("*","yjcode_user where id=".$rowtaskhf[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="taskmain">
 <li class="l1">�б��û���</li>
 <li class="l3"><?=$row2[nc]?></li>
 <li class="l1">��ϵQQ��</li>
 <li class="l3"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a></li>
 <li class="l1">��ϵ�绰��</li>
 <li class="l3"><?=$row2[mot]?></li>
 <li class="l1">�û����ۣ�</li>
 <li class="l3"><strong class="red"><?=$rowtaskhf[money1]?></strong></li>
 <li class="l1">�н���ã�</li>
 <li class="l3">
 <? 
 if(empty($rowtask[yjfs])){echo "�����е�������Ϊ<strong class='feng'>".$rowtaskhf[money1]*$rowcontrol[taskyj]."</strong>";}
 elseif($rowtask[yjfs]==1){echo "���ַ��е�";}
 elseif($rowtask[yjfs]==2){echo "˫�����е�һ�룬����Ϊ<strong class='feng'>".$rowtaskhf[money1]*$rowcontrol[taskyj]*0.5."</strong>";}
 ?>
 </li>
 <li class="l1">�û�IP��</li>
 <li class="l3"><a href="https://www.baidu.com/s?wd=<?=$rowtaskhf[uip]?>" target="_blank"><?=$rowtaskhf[uip]?></a></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$rowtaskhf[sj]?></li>
 <li class="l1">�б�ʱ�䣺</li>
 <li class="l3"><?=$rowtaskhf[zbsj]?></li>
 <li class="l1">�����ֹ��</li>
 <li class="l3 red"><?=$rowtaskhf[rwdq]?></li>
 <li class="l4">�������ԣ�</li>
 <li class="l5"><?=strip_tags(returnjgdw($rowtaskhf[txt],"","δ��д�κ�˵��"))?></li>
 </ul>

 <div class="gdhflist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <ul class="u1">
  <li class="l1"><img src="<?=returntppd("../upload/".$rowtask[userid]."/user.jpg","img/nonetx.gif")?>" width="40" height="40" /></li>
  <li class="l2">[����] ��������<br><?=$rowtask[sj]?></li>
  </ul>
  <? 
  while1("*","yjcode_tasklog where bh='".$bh."' order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.gif");$sf="����";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[useridhf]."/user.jpg","img/nonetx.gif");$sf="���ַ�";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? }?>
 
  <? if($rowtask[zt]==3 || $rowtask[zt]==4){?>
  <form name="f1" method="post" onsubmit="return tj()">
  <ul class="uk">
  <li class="l7">�ظ����ݣ�</li>
  <li class="l8"><textarea id="content" name="content" style="width:600px;height:440px;visibility:hidden;"></textarea></li>
  <li class="l3"></li>
  <li class="l4"><? tjbtnr("�ύ����","tasklist.php")?></li>
  </ul>
  </form>
  <? }?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>