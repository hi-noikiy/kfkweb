<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");
$sqltask="select * from yjcode_task where id=".$id." and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}
$bh=$rowtask[bh];

if($_GET[control]=="update" && $_POST[jvs]=="zt105"){
 if(105==$rowtask[zt]){
  $zt=intval($_POST[Rzt]);
  if($zt==0){
  $endsj=date("Y-m-d H:i:s",strtotime("+".$rowtask[rwzq]." day"));
  updatetable("yjcode_task","zt=100,yxq='".$endsj."' where id=".$id);
  }
  elseif($zt==2){
   if($rowtask[money4]>0){
   PointIntoM($rowtask[userid],"任务审核不通过，订金退回(任务编号".$rowtask[bh].")",$rowtask[money4]);
   PointUpdateM($rowtask[userid],$rowtask[money4]);
   }
  updatetable("yjcode_task","zt=106 where id=".$id);
  }
 }
 
 php_toheader("task1.php?t=suc&id=".$id);


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
 <li class="l1">当前位置：后台首页 - 任务大厅 - <strong>多人任务</strong> [<a href="tasklist1.php">返回</a>]</li><li class="l2"></li>
 </ul>

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","task1.php?id=".$id);}?>
 <!--B-->
 <script language="javascript">
 function tj(){
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择交易状态！");return false;}
 if(!confirm("确定提交操作吗？")){return false;}
 tjwait();
 f1.action="task1.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="rightcap">
 <li class="l1">任务信息</li>
 </ul>
 <ul class="viewul">
 <li class="l1">任务主题：</li>
 <li class="l2"><a href="../task/view<?=$rowtask[id]?>.html" target="_blank"><strong><?=$rowtask[tit]?></strong></a></li>
 <li class="l1">任务预算：</li>
 <li class="l3"><strong class="feng"><?=$rowtask[money1]?></strong></li>
 <li class="l1">任务状态：</li>
 <li class="l3"><?=returntask($rowtask[zt])?></li>
 <li class="l1">任务类型：</li>
 <li class="l3"><?=returntasktype(1,$rowtask[type1id])." ".returntasktype(2,$rowtask[type2id])?></li>
 <li class="l1">任务形式：</li>
 <li class="l3">多人任务</li>
 <li class="l1">任务份数：</li>
 <li class="l3"><?=$rowtask[tasknum]?>份</li>
 <li class="l1">已接手份数：</li>
 <li class="l3"><a class="red" href="taskhflist1.php?bh=<?=$rowtask[bh]?>"><?=$rowtask[taskcy]?>份</a></li>
 <li class="l1">冻结金额：</li>
 <li class="l3"><?=$rowtask[money3]?>元</li>
 <li class="l1">任务周期：</li>
 <li class="l3"><?=$rowtask[rwzq]?>天</li>
 <li class="l1">发布时间：</li>
 <li class="l3"><?=$rowtask[sj]?></li>
 <li class="l4">任务描述：</li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:660px;height:330px;"><?=$rowtask[txt]?></script></li>
 </ul>
 
 <? if(105==$rowtask[zt]){?>
 <ul class="rightcap">
 <li class="l1">操作</li>
 </ul>
 <ul class="viewul">
 <li class="l1">操作须知：</li>
 <li class="l2 red">审核状态变更后，不能再次审核，请认真核实任务内容是否合法合规</li>
 <li class="l1">变更状态：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="0" /> <strong>通过审核</strong></label> &nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="1" /> <strong>审核不通过</strong></label> 
 </span>
 </li>
 <li class="l8"><? tjbtnr("下一步","tasklist1.php")?><input type="hidden" value="zt105" name="jvs" /></li>
 </ul>
 <? }?>

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