<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function addshdz(){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["编辑收货地址","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shdzlx.php', 'no'] 
});
}

function ediadd(b){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["编辑收货地址","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shdz.php?bh='+b, 'no'] 
});
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 收货地址</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap8").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="typecap">
 <li class="l1">详细地址</li>
 <li class="l4">收货人</li>
 <li class="l4">联系电话</li>
 <li class="l4">编辑时间</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:NcheckDEL(10,'yjcode_shdz')" class="a2">删除</a>
 <a href="javascript:void(0);" onclick="addshdz()" class="a1">新增地址</a>
 </li>
 <li class="l3"></li>
 </ul>
   
 <?
 $ses=" where zt=0 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_shdz","order by sj desc");while($row=mysql_fetch_array($res)){
 $addr=returnarea($row[add1])." ".returnarea($row[add2])." ".returnarea($row[add3])." ".$row[addr];
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><? if(1==$row[ifmr]){?><span class="red">[默认地址]</span> <? }?><a href="javascript:void(0);" onclick="ediadd('<?=$row[bh]?>')"><?=$addr?></a></li>
 <li class="l4"><?=$row[lxr]?></li>
 <li class="l4"><?=$row[mot]?></li>
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="shdzlist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>