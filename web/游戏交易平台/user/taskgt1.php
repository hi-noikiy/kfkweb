<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$bh=$_GET[bh];
$hfid=$_GET[hfid];

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and useridhf=".$userid." and taskty=1 and id=".$hfid."";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist1.php");}

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}

//函数开始
if($_GET[control]=="add"){
 zwzr();
 $txt=sqlzhuru($_POST[content]);
 $sj=date("Y-m-d H:i:s");
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 php_toheader("taskgt1.php?t=suc&bh=".$bh."&hfid=".$hfid);

}
//函数结果
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
function tj(){
tjwait();
f1.action="taskgt1.php?bh=<?=$bh?>&control=add&hfid=<?=$hfid?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 多人任务沟通记录</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv1.php");?>

 <div class="gdhflist">
  <div class="cap">&nbsp;&nbsp;沟通记录</div>
  <ul class="u1">
  <li class="l1"><img src="<?=returntppd("../upload/".$rowtask[userid]."/user.jpg","img/nonetx.gif")?>" width="40" height="40" /></li>
  <li class="l2">[雇主] 发起任务<br><?=$rowtask[sj]?></li>
  </ul>
  <? 
  while1("*","yjcode_tasklog where bh='".$bh."' and useridhf=".$userid." order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.gif");$sf="雇主";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[useridhf]."/user.jpg","img/nonetx.gif");$sf="接手方";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="平台";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? }?>
 
  <? if($row[zt]==0 || $row[zt]==1){?>
  <form name="f1" method="post" onsubmit="return tj()">
  <ul class="uk">
  <li class="l7">回复内容：</li>
  <li class="l8"><script id="editor" name="content" type="text/plain" style="width:750px;height:380px;"></script></li>
  <li class="l3"></li>
  <li class="l4"><? tjbtnr("下一步","taskhflist1.php")?></li>
  </ul>
  </form>
  <? }?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
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