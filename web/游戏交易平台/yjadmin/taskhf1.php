<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");

$sqltaskhf="select * from yjcode_taskhf where id=".$id." and taskty=1";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist1.php");}

$sqltask="select * from yjcode_task where bh='".$rowtaskhf[bh]."' and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}
$bh=$rowtask[bh];



if($_GET[control]=="update"){
 updatetable("yjcode_taskhf","sj='".$_POST[tsj]."',txt='".sqlzhuru($_POST[content])."' where id=".$id);
 
 if(4==$rowtaskhf[zt]){ //纠纷
  $zt=intval($_POST[Rzt]);
  $money1=$rowtaskhf[money1];
  if(0==$zt){
   updatetable("yjcode_taskhf","zt=7 where id=".$id);
   $txt="判定雇主胜利";
   intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$rowtask[bh]."',".$rowtask[userid].",".$rowtaskhf[useridhf].",3,'".$txt."','".$sj."',''");
  }elseif(1==$zt){
   PointIntoM($rowtaskhf[useridhf],"任务纠纷胜诉，平台介入，获得佣金(任务编号".$rowtask[bh].")",$money1);
   PointUpdateM($rowtaskhf[useridhf],$money1);
   $zjm=0;
   if(0==$rowtask[yjfs]){
   $zjm=$rowcontrol[taskyj]*$money1;
   }elseif(1==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$money1*(-1);
   PointIntoM($rowtaskhf[useridhf],"任务完成，扣除平台中介费(任务编号".$rowtask[bh].")",$m);
   PointUpdateM($rowtaskhf[useridhf],$m);
   }elseif(2==$rowtask[yjfs]){
   $m=$rowcontrol[taskyj]*$money1*(-1)*0.5;
   $zjm=$m;
   PointIntoM($rowtaskhf[useridhf],"任务完成，扣除平台中介费(任务编号".$rowtask[bh].")",$m);
   PointUpdateM($rowtaskhf[useridhf],$m);
   }
   $djm=$money1+abs($zjm);
   updatetable("yjcode_task","money3=money3-".$djm." where id=".$rowtask[id]);
   updatetable("yjcode_taskhf","zt=2 where id=".$id);
   $txt="判定接手方胜利";
   intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$rowtask[bh]."',".$rowtask[userid].",".$rowtaskhf[useridhf].",3,'".$txt."','".$sj."',''");
  }
 
 }
 
 php_toheader("taskhf1.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

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
 <li class="l1">当前位置：后台首页 - 任务大厅 - 多人任务 - <strong>接手信息</strong> [<a href="tasklist1.php">返回</a>]</li><li class="l2"></li>
 </ul>

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","taskhf1.php?id=".$id);}?>
 <!--B-->
 <script language="javascript">
 function tj(){
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择交易状态！");return false;}
 if(!confirm("确定提交该操作吗？")){return false;}
 tjwait();
 f1.action="taskhf1.php?id=<?=$id?>&control=update";
 }
 </script>
 <? while1("bh,tit","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);?>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="rightcap">
 <li class="l1">任务信息</li>
 </ul>
 <ul class="viewul">
 <li class="l1">任务主题：</li>
 <li class="l2"><a href="../task/view<?=$rowtask[id]?>.html" target="_blank"><strong><?=$rowtask[tit]?></strong></a></li>
 <li class="l1">任务预算：</li>
 <li class="l3"><strong class="feng"><?=$rowtask[money1]?></strong></li>
 <li class="l1">任务份数：</li>
 <li class="l3"><?=$rowtask[tasknum]?></li>
 <li class="l1">任务类型：</li>
 <li class="l3"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></li>
 <li class="l1">报价形式：</li>
 <li class="l3"><?=returntaskjgxs($rowtask[jgxs])?></li>
 <li class="l1">任务周期：</li>
 <li class="l3"><?=$rowtask[rwzq]?>天</li>
 <li class="l1">发布时间：</li>
 <li class="l3"><?=$rowtask[sj]?></li>
 </ul>

 <ul class="viewul">
 <li class="l1">接手用户：</li>
 <li class="l3"><?=returnnc($rowtaskhf[useridhf])?></li>
 <li class="l1">接手IP：</li>
 <li class="l3"><?=$rowtaskhf[uip]?></li>
 <li class="l1">佣金：</li>
 <li class="l3"><?=$rowtaskhf[money1]?>元</li>
 <li class="l4">接手备注：</li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:660px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rightcap">
 <li class="l1">操作</li>
 </ul>
 <ul class="viewul">
 <li class="l1">接手状态：</li>
 <li class="l2"><?=returntask1($rowtaskhf[zt])?></li>
 <? if(4==$rowtaskhf[zt]){?>
 <li class="l1">变更状态：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" /> <strong>判定雇主胜诉</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="1" /> <strong>判定接手方胜诉</strong></label> 
 </span>
 </li>
 <? }?>
 <li class="l1">沟通记录：</li>
 <li class="l2"><a href="taskgt1.php?bh=<?=$rowtask[bh]?>&useridhf=<?=$rowtaskhf[useridhf]?>" class="red" target="_blank">【点击查看】</a></li>
 <li class="l8"><? tjbtnr("下一步","taskhflist1.php")?></li>
 </ul>
 </form>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
<script type="text/javascript">
//实例化编辑器
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