<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");

$sqltask="select * from yjcode_task where id=".$id." and taskty=0";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}
$bh=$rowtask[bh];

if(!empty($rowtask[useridhf])){
$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and taskty=0 and useridhf=".$rowtask[useridhf]."";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist.php");}
}


if($_GET[control]=="update" && $_POST[jvs]=="zt8"){
 
 if(8==$rowtask[zt]){ //����
  $zt=intval($_POST[Rzt]);
  if(0==$zt){
   PointIntoM($rowtask[userid],"����ʧ�ܣ�ƽ̨���룬�˻ؿ���(������".$bh.")",$rowtask[money3]);
   PointUpdateM($rowtask[userid],$rowtask[money3]);
   updatetable("yjcode_task","zt=9 where id=".$id);
   $txt="�ж�����ʤ��";
   intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",3,'".$txt."','".$sj."',''");
  }elseif(1==$zt){
   PointIntoM($rowtask[useridhf],"�������ʤ�ߣ�ƽ̨���룬���Ӷ��(������".$bh.")",$rowtask[money2]);
   PointUpdateM($rowtask[useridhf],$rowtask[money2]);
   if(1==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$rowtask[money2]*(-1);
   PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
   PointUpdateM($rowtask[useridhf],$m);
   }elseif(2==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$rowtask[money2]*(-1)*0.5;
   PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
   PointUpdateM($rowtask[useridhf],$m);
   }
   updatetable("yjcode_task","zt=5 where id=".$id);
   $txt="�ж����ַ�ʤ��";
   intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",3,'".$txt."','".$sj."',''");
  }
 
 }
 
 php_toheader("task.php?t=suc&id=".$id);

}elseif($_GET[control]=="update" && $_POST[jvs]=="zt1"){
 if(1==$rowtask[zt]){
  $zt=intval($_POST[Rzt]);
  if($zt==0){
  $endsj=date("Y-m-d H:i:s",strtotime("+".$rowtask[rwzq]." day"));
  updatetable("yjcode_task","zt=0,yxq='".$endsj."' where id=".$id);
  }
  elseif($zt==1){
   if($rowtask[money4]>0){
   PointIntoM($rowtask[userid],"������˲�ͨ���������˻�(������".$rowtask[bh].")",$rowtask[money4]);
   PointUpdateM($rowtask[userid],$rowtask[money4]);
   }
  updatetable("yjcode_task","zt=2 where id=".$id);
  }
 }
 
 php_toheader("task.php?t=suc&id=".$id);


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

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

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
 <li class="l1">��ǰλ�ã���̨��ҳ - ������� - <strong>��������</strong> [<a href="tasklist.php">����</a>]</li><li class="l2"></li>
 </ul>

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","task.php?id=".$id);}?>
 <!--B-->
 <script language="javascript">
 function tj(){
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ����״̬��");return false;}
 if(!confirm("ȷ���ύ������")){return false;}
 tjwait();
 f1.action="task.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="rightcap">
 <li class="l1">������Ϣ</li>
 </ul>
 <? 
 while2("*","yjcode_user where id=".$rowtask[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="viewul">
 <li class="l1">�������⣺</li>
 <li class="l2"><a href="../task/view<?=$rowtask[id]?>.html" target="_blank"><strong><?=$rowtask[tit]?></strong></a></li>
 <li class="l1">�����ǳƣ�</li>
 <li class="l3"><?=$row2[nc]?></li>
 <li class="l1">��ϵQQ��</li>
 <li class="l3"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a></li>
 <li class="l1">��ϵ�绰��</li>
 <li class="l3"><?=$row2[mot]?></li>
 <li class="l1">����Ԥ�㣺</li>
 <li class="l3"><strong class="feng"><?=$rowtask[money1]?></strong></li>
 <li class="l1">����״̬��</li>
 <li class="l3"><?=returntask($rowtask[zt])?></li>
 <li class="l1">�������ͣ�</li>
 <li class="l3"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></li>
 <li class="l1">������ʽ��</li>
 <li class="l3"><?=returntaskjgxs($rowtask[jgxs])?></li>
 <li class="l1">�������ڣ�</li>
 <li class="l3"><?=$rowtask[rwzq]?>��</li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$rowtask[sj]?></li>
 <li class="l4">����������</li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:660px;height:330px;"><?=$rowtask[txt]?></script></li>
 </ul>
 
 <? 
 if(!empty($rowtask[useridhf])){
 while2("*","yjcode_user where id=".$rowtaskhf[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="rightcap">
 <li class="l1">������Ϣ</li>
 </ul>
 <ul class="viewul">
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
 <li class="l6">�������ԣ�</li>
 <li class="l7"><?=strip_tags(returnjgdw($rowtaskhf[txt],"","δ��д�κ�˵��"))?></li>
 </ul>
 <? }?>
 
 <ul class="rightcap">
 <li class="l1">����</li>
 </ul>
 <ul class="viewul">
 <? if(!empty($rowtask[useridhf])){?>
 <li class="l1">��ͨ��¼��</li>
 <li class="l2"><a href="taskgt.php?bh=<?=$bh?>" class="red" target="_blank">������鿴��</a></li>
 <? }?>
 <? if(8==$rowtask[zt]){?>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" /> <strong>�ж�����ʤ��</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="1" /> <strong>�ж����ַ�ʤ��</strong></label> 
 </span>
 </li>
 <li class="l8"><? tjbtnr("��һ��","tasklist.php")?><input type="hidden" value="zt8" name="jvs" /></li>
 <? }?>
 
 <? if(1==$rowtask[zt]){?>
 <li class="l1">������֪��</li>
 <li class="l2 red">���״̬����󣬲����ٴ���ˣ��������ʵ���������Ƿ�Ϸ��Ϲ�</li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" /> <strong>ͨ�����</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="1" /> <strong>��˲�ͨ��</strong></label> 
 </span>
 </li>
 <li class="l8"><? tjbtnr("��һ��","tasklist.php")?><input type="hidden" value="zt1" name="jvs" /></li>
 <? }?>

 </ul>
 </form>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
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