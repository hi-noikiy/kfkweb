<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and zt=4 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and taskty=0 and useridhf=".$rowtask[useridhf]." and ifxz=1";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist.php");}

if($_GET[control]=="ys"){
 $zt=$_POST[R1];
 if($zt=="yes"){
  $money1=$rowtask[money2];
  PointIntoM($rowtask[useridhf],"������ɣ����Ӷ��(������".$bh.")",$money1);
  PointUpdateM($rowtask[useridhf],$money1);
  if(1==$rowtask[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1);
  PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtask[useridhf],$m);
  }elseif(2==$row[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1)*0.5;
  PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtask[useridhf],$m);
  }
  updatetable("yjcode_task","zt=5 where id=".$rowtask[id]);
  $txt="����ͨ��";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",1,'".$txt."','".$sj."',''");
 }elseif($zt=="no"){
  $txt="���ղ�ͨ��������ƽ̨����";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",1,'".$txt."','".$sj."',''");
  updatetable("yjcode_task","zt=8 where id=".$rowtask[id]);
 }
 
 php_toheader("tasklist.php");
 
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
f1.action="taskys.php?bh=<?=$bh?>&control=ys";
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
 <label class="red"><input name="R1" type="radio" value="no" /> �������⣬Ҫ��ƽ̨����</label>
 </li>
 <li class="l1">������ʾ��</li>
 <li class="l21 red">����ظ����ַ�ȷ�Ϻ��ٽ��в���</li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�ύ����","tasklist.php")?></li>
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