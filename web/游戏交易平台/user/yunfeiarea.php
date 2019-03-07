<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$id=$_GET[id];
$userid=returnuserid($_SESSION["SHOPUSER"]);
while0("*","yjcode_yunfei where id=".$id." and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("yunfeilist.php");}

if($_GET[control]=="update"){
 $area="|".sqlzhuru($_POST[area1]).",".sqlzhuru($_POST[add2]).",".sqlzhuru($_POST[add3])."|";
 if(strstr($row[cityid],$area)==""){$areav=$row[cityid].$area;updatetable("yjcode_yunfei","cityid='".$areav."' where id=".$id." and userid=".$userid);}
 php_toheader("yunfeiarea.php?t=suc&id=".$id);

}elseif($_GET[control]=="del"){
 $a=preg_split("/xcf/",$_GET[cid]);
 $str=$row[cityid];
 for($i=0;$i<=count($a);$i++){
  if($a[$i]!=""){
   $ss="|".$a[$i]."|";
   $str=str_replace($ss,"",$str);
  }	 
 }
 updatetable("yjcode_yunfei","cityid='".$str."' where id=".$id." and userid=".$userid);
 php_toheader("yunfeiarea.php?id=".$id);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript">
function area1cha(){
 farea2.location="../tem/area2.php?area1id="+document.getElementById("area1").value;	
}

function tj(){
tjwait();
f1.action="yunfeiarea.php?control=update&id=<?=$id?>";
}

function citydel(){
 var c=document.getElementsByName("C1");
 str="";
 for(i=0;i<c.length;i++){
  if(c[i].checked){
	if(str==""){str=c[i].value;}else{str=str+"xcf"+c[i].value;}
  }
 }
 if(str==""){alert("请至少选择一条数据");return false;}
 if(confirm("确定要执行该操作吗?")){location.href="yunfeiarea.php?control=del&id=<?=$id?>&cid="+str;}else{return false;}
}

</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > <a href="yunfeilist.php">运费模板</a> > 设置区域</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("sellzf.php");?>
 
 <? include("rcap16.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("恭喜您，操作成功!","yunfeiarea.php?id=".$id)?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="shdz" name="jvs" />
 <ul class="uk">
 <li class="l1">模板名称：</li>
 <li class="l21"><?=$row[tit]?></li>
 <li class="l1">运费：</li>
 <li class="l21"><strong class="red"><?=$row[money1]?>元</strong></li>
 <li class="l1"><span class="red">*</span>选择区域：</li>
 <li class="l2"><? include("../tem/area.php");?></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("保存修改","yunfeilist.php")?></li>
 </ul>
 </form>
 <ul class="typecap">
 <li class="l7">&nbsp;&nbsp;区域</li>
 <li class="l4">运费</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2"><a href="javascript:citydel()" class="a2">删除</a></li>
 <li class="l3"></li>
 </ul>
 <?
 $a=preg_split("/\|/",$row[cityid]);
 for($i=1;$i<=count($a);$i++){
 if($a[$i]!=""){
 $areav="";
 if(strstr($a[$i],"0,0,0")!=""){$areav="全国";}
 $b=preg_split("/,/",$a[$i]);
 for($j=0;$j<3;$j++){
 $areav=$areav." ".returnarea($b[$j]);
 }
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$a[$i]?>" /></li>
 <li class="l7"><?=$areav?></li>
 <li class="l4"><strong class="feng"><?=$row[money1]?>元</strong></li>
 </ul>
 <? }}?>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>