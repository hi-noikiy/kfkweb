<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$typeid=$_GET[typeid];if(empty($typeid)){php_toheader("default.php");}
$sj=date("Y-m-d H:i:s");

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_typesx where admin=1 and name1='".sqlzhuru($_POST[t1])."' and typeid=".$typeid)==1){Audit_alert("该附加选项已存在！","typesx.php?typeid=".$typeid);}
 intotable("yjcode_typesx","typeid,name1,sj,xh,admin,ifjd,ifzi,ifsel","".$typeid.",'".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",1,".sqlzhuru($_POST[Rifjd]).",".sqlzhuru($_POST[Rifzi]).",".sqlzhuru($_POST[Rifsel])."");
 php_toheader("typesx.php?t=suc&typeid=".$typeid);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $id=$_GET[id];
 if(panduan("*","yjcode_typesx where admin=1 and name1='".sqlzhuru($_POST[t1])."' and id<>".$id." and typeid=".$typeid)==1){Audit_alert("该附加选项已存在！","typesx.php?action=update&id=".$id."&typeid=".$typeid);}
 updatetable("yjcode_typesx","name1='".sqlzhuru($_POST[t1])."' where name1='".sqlzhuru($_POST[oldty1])."' and typeid=".$typeid);
 updatetable("yjcode_typesx","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",ifjd=".sqlzhuru($_POST[Rifjd]).",ifzi=".sqlzhuru($_POST[Rifzi]).",ifsel=".sqlzhuru($_POST[Rifsel])." where id=".$_GET[id]);
 php_toheader("typesx.php?t=suc&action=update&id=".$id."&typeid=".$typeid);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong><?=returntype(1,$typeid)?>附加选项</strong> [<a href="typesxlist.php">返回</a>]</li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","typesx.php?action=".$_GET[action]."&id=".$_GET[id]."&typeid=".$_GET[typeid]);}?>
 
 <!--begin-->
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入选项名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="typesx.php?control=add&typeid=<?=$typeid?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">附加选项：</li>
 <li class="l2"><input type="text" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">焦点显示：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifjd" type="radio" checked="checked" value="0" />普通</label>&nbsp;&nbsp;
 <label><input name="Rifjd" type="radio" value="1" />焦点显示（将该属性显示在详情页焦点部分）</label>
 </span>
 </li>
 <li class="l1">手动填写：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifzi" type="radio" checked="checked" value="0" />不支持</label>&nbsp;&nbsp;
 <label><input name="Rifzi" type="radio" value="1" />支持</label>
 </span>
 </li>
 <li class="l1">筛选条件：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifsel" type="radio" checked="checked" value="0" />否</label>&nbsp;&nbsp;
 <label><input name="Rifsel" type="radio" value="1" />是（将该属性做为筛选条件显示在商品列表页）</label>
 </span>
 </li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=returnxh("yjcode_typesx"," and admin=1 and typeid=".$typeid)?>" /> <span class="hui">序号越小，越靠前</span></li>
 <li class="l3"><? tjbtnr("保存修改","typesxlist.php?typeid=".$typeid);?></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","yjcode_typesx where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("typesxlist.php?typeid=".$typeid);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="typesx.php?control=update&id=<?=$row[id]?>&typeid=<?=$typeid?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">附加选项：</li>
 <li class="l2"><input type="text" value="<?=$row[name1]?>" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">焦点显示：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifjd" type="radio"<? if(empty($row[ifjd])){?> checked="checked"<? }?> value="0" />普通</label>&nbsp;&nbsp;
 <label><input name="Rifjd" type="radio"<? if(!empty($row[ifjd])){?> checked="checked"<? }?> value="1" />焦点显示（将该属性显示在详情页焦点部分）</label>
 </span>
 </li>
 <li class="l1">手动填写：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifzi" type="radio"<? if(empty($row[ifzi])){?> checked="checked"<? }?> value="0" />不支持</label>&nbsp;&nbsp;
 <label><input name="Rifzi" type="radio"<? if(!empty($row[ifzi])){?> checked="checked"<? }?> value="1" />支持</label>
 </span>
 </li>
 <li class="l1">筛选条件：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifsel" type="radio"<? if(empty($row[ifsel])){?> checked="checked"<? }?> value="0" />否</label>&nbsp;&nbsp;
 <label><input name="Rifsel" type="radio"<? if(!empty($row[ifsel])){?> checked="checked"<? }?> value="1" />是（将该属性做为筛选条件显示在商品列表页）</label>
 </span>
 </li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">序号越小，越靠前</span></li>
 <li class="l3"><? tjbtnr("保存修改","typesxlist.php?typeid=".$typeid);?></li>
 </ul>
 </form>
 
 <? }?>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>