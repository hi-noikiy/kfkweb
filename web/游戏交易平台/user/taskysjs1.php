<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$hfid=$_GET[hfid];
$sj=date("Y-m-d H:i:s");
$useridhf=returnuserid($_SESSION[SHOPUSER]);

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and useridhf=".$useridhf." and taskty=1 and zt=0 and id=".$hfid."";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("taskhflist1.php");}

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("taskhflist1.php");}

if($_GET[control]=="ys"){
 $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[taskoksj]." day"));
 updatetable("yjcode_taskhf","ystxt='".sqlzhuru($_POST[content])."',oksj='".$oksj."',zt=1 where id=".$hfid);
 $sj=date("Y-m-d H:i:s");
 $txt="�Ѿ�������񣬷����������룬������Ҫ��".$oksj."ǰ�������գ�����ϵͳ�Զ�����ɽ��׳ɹ�";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$useridhf.",2,'".$txt."','".$sj."',''");
 php_toheader("taskhflist1.php");
 
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
if(!confirm("ȷ���ύ�ò�����")){return false;}
layer.msg('���ڴ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="taskysjs1.php?bh=<?=$bh?>&hfid=<?=$hfid?>&control=ys";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������� > �������� > ��������</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv1.php");?>
 
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l7">����˵����</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:380px;"></script></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��������","taskhflist1.php")?></li>
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