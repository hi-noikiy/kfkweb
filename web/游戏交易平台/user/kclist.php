<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(empty($_SESSION[SAFEPWD])){Audit_alert("卡密信息操作需要先进行安全码验证!","safepwd.php");}
$bh=$_GET[bh];
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
function ser(){
location.href="kclist.php?bh=<?=$bh?>&st1="+document.getElementById("st1").value+"&st2="+document.getElementById("st2").value+"&sd1="+document.getElementById("sd1").value;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 库存管理</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <? while1("bh,userid,tit","yjcode_pro where bh='".$bh."' and userid=".$luserid);if(!$row1=mysql_fetch_array($res1)){php_toheader("productlist.php");}?>
 <div class="upfile">
 <ul class="uk">
 <li class="l1">商品标题：</li>
 <li class="l21"><a href="product.php?bh=<?=$bh?>"><?=$row1[tit]?></a></li>
 </ul> 
 </div>

 <!--selB-->
 <ul class="psel">
 <li class="l1">使用情况：</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==不限==</option>
 <option value="0"<? if(0==$_GET[sd1] && $_GET[sd1]!=""){?> selected="selected"<? }?>>未使用</option>
 <option value="1"<? if(1==$_GET[sd1]){?> selected="selected"<? }?>>已使用</option>
 </select>
 </li>
 <li class="l1">卡号：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">密码：</li><li class="l2"><input value="<?=$_GET[st2]?>" type="text" id="st2" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a><a href="kclist.php?bh=<?=$bh?>" class="a2">清空</a></li>
 </ul>
 <!---selE-->

 <ul class="typecap">
 <li class="l1">&nbsp;&nbsp;&nbsp;卡号</li>
 <li class="l4">&nbsp;&nbsp;&nbsp;密码</li>
 <li class="l4">状态</li>
 <li class="l4">交易时间</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:NcheckDEL(5,'yjcode_kc')" class="a2">删除</a>
 <a href="javascript:gourl('kc.php?bh=<?=$bh?>')" class="a1">添加卡密</a>
 </li>
 <li class="l3"></li>
 </ul>
  
 <?
 $ses=" where userid=".$luserid." and probh='".$bh."'";
 if($_GET[st1]!=""){$ses=$ses." and ka like '%".$_GET[st1]."%'";}
 if($_GET[st2]!=""){$ses=$ses." and mi like '%".$_GET[st2]."%'";}
 if($_GET[sd1]!=""){$ses=$ses." and ifok=".$_GET[sd1];}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_kc","order by id asc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><strong><a href="kc.php?bh=<?=$bh?>&id=<?=$row[id]?>&action=update" title="<?=$row[ka]?>"><?=returntitdian($row[ka],36)?></a></strong></li>
 <li class="l4"><?=returntitdian($row[mi],24)?></li>
 <li class="l4"><? if(1==$row[ifok]){?><span class="red">已使用</span><? }else{?><span class="blue">未使用</span><? }?></li>
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist.php";
 $nowwd="bh=".$bh."&st1=".$_GET[st1]."&st2=".$_GET[st2]."&sd1=".$_GET[sd1];
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