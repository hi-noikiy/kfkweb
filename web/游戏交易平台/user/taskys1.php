<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$hfid=$_GET[hfid];
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and taskty=1 and zt=1 and id=".$hfid;mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("taskbjlist1.php");}

if($_GET[control]=="ys"){
 $zt=$_POST[R1];
 if($zt=="yes"){
  $money1=$rowtaskhf[money1];
  PointIntoM($rowtaskhf[useridhf],"������ɣ����Ӷ��(������".$bh.")",$money1);
  PointUpdateM($rowtaskhf[useridhf],$money1);
  $zjm=0;
  if(0==$rowtask[yjfs]){
  $zjm=$rowcontrol[taskyj]*$money1;
  }elseif(1==$rowtask[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1);
  PointIntoM($rowtaskhf[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtaskhf[useridhf],$m);
  }elseif(2==$rowtask[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1)*0.5;
  $zjm=$m;
  PointIntoM($rowtaskhf[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtaskhf[useridhf],$m);
  }
  $djm=$money1+abs($zjm);
  updatetable("yjcode_task","money3=money3-".$djm." where id=".$rowtask[id]);
  updatetable("yjcode_taskhf","zt=2 where id=".$hfid);
  $txt="����ͨ��";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtaskhf[useridhf].",1,'".$txt."','".$sj."',''");
 }elseif($zt=="no"){
  $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[taskerrsj]." day"));
  $txt="���ղ�ͨ��,���ַ�������".$oksj."ǰ�����������������⣬����ϵͳ�Զ�����Ϊ���ַ�����ʧ��";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtaskhf[useridhf].",1,'".$txt."','".$sj."',''");
  updatetable("yjcode_taskhf","zt=3,oksj='".$oksj."' where id=".$hfid);
 }
 
 php_toheader("taskbjlist1.php?bh=".$bh);
 
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
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
function tj(){
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
if(!confirm("ȷ���ύ�ò�����")){return false;}
layer.msg('���ڴ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="taskys1.php?bh=<?=$bh?>&control=ys&hfid=<?=$hfid?>";
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
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv1.php");?>
 
 <?
 while2("*","yjcode_user where id=".$rowtaskhf[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="taskmain">
 <li class="l1">�����û���</li>
 <li class="l3"><?=$row2[nc]?></li>
 <li class="l1">��ϵQQ��</li>
 <li class="l3"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a></li>
 <li class="l1">��ϵ�绰��</li>
 <li class="l3"><?=$row2[mot]?></li>
 <li class="l1">�ɵ�Ӷ��</li>
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
 <li class="l1">����״̬��</li>
 <li class="l3"><?=returntask1($rowtaskhf[zt])?></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$rowtaskhf[sj]?></li>
 <li class="l1">�����ֹ��</li>
 <li class="l3"><?=$rowtaskhf[rwdq]?></li>
 <li class="l1">������ʾ��</li>
 <li class="l2">����Ҫ��<span class="red"><?=$rowtaskhf[oksj]?></span>ǰ�������������գ�����ϵͳ�Զ��ж�Ϊ���պϸ�</li>
 </ul>
 
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l7">����˵����</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:380px;"><?=$rowtaskhf[ystxt]?></script></li>
 <li class="l1">������</li>
 <li class="l2">
 <label class="blue"><input name="R1" type="radio" value="yes" /> ȷ������</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label class="red"><input name="R1" type="radio" value="no" /> �������⣬���ղ�ͨ��</label>
 </li>
 <li class="l1">������ʾ��</li>
 <li class="l21 red">����ظ����ַ�ȷ�Ϻ��ٽ��в���</li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�ύ����","taskbjlist1.php?bh=".$bh)?></li>
 </ul>
 </form>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>