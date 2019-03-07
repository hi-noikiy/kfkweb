<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_type where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."'")==1)
 {Audit_alert("该分组已存在！","type2.php?ty1id=".$ty1id);}
 intotable("yjcode_type","admin,type1,type2,xh,sj,buyform,zm,sellform,rm","2,'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[buyform])."','".sqlzhuru($_POST[zm])."','".sqlzhuru($_POST[sellform])."',".sqlzhuru($_POST[rm])."");$id=mysql_insert_id();
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type2_".$id.".png");
 php_toheader("type2.php?t=suc&ty1id=".$ty1id);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_type where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("该分组已存在！","type2.php?action=update&id=".$_GET[id]."&ty1id=".$ty1id);}
 updatetable("yjcode_type","type2='".sqlzhuru($_POST[t1])."',zm='".sqlzhuru($_POST[zm])."' where type1='".sqlzhuru($_POST[oldty1])."' and type2='".sqlzhuru($_POST[oldty2])."'");
 updatetable("yjcode_type","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",buyform='".sqlzhuru($_POST[buyform])."',sellform='".sqlzhuru($_POST[sellform])."',rm=".sqlzhuru($_POST[rm])." where id=".$_GET[id]);
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../upload/type/type2_".$_GET[id].".png");
 php_toheader("type2.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$ty1id);

}
//函数结果

while0("*","yjcode_type where id=".$ty1id);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
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
 <ul class="wz"><li class="l1">
 当前位置：<a href="./" class="a2">后台首页</a> - 商品分组 - <strong><?=$row[type1]?></strong> [<a href="typelist.php">返回</a>]
 </li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","type2.php?action=".$_GET[action]."&ty1id=".$ty1id."&id=".$_GET[id]);}?>
 
 <!--begin-->
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="type2.php?control=add&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">子类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">分类图标：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"> 根据实际情况上传</li>
 <li class="l4">购买模板：</li>
 <li class="l5"><textarea name="buyform"></textarea></li>
 <li class="l1">模板说明：</li>
 <li class="l21">比如 <span class="feng">收货角色名,收货角色等级</span> ，隔开 如无要求，可留空</li>
 
  <li class="l4">出售模板：</li>
 <li class="l5"><textarea name="sellform"></textarea></li>
 <li class="l1">模板说明：</li>
 <li class="l21">比如 <span class="feng">角色名,等级</span> ，隔开 如无要求，可留空</li>
  <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=returnxh("yjcode_type"," and type1='".$row[type1]."' and admin=2")?>" /> <span class="hui">序号越小，越靠前</span></li>
 <li class="l1">热门：</li>
 <li class="l2"> <input name="rm" type="radio" value="1"  /> 是 <input name="rm" type="radio" value="0"  checked="checked"    />否<span class="hui"> </span></li>
   <li class="l1">字母：</li>
 <li class="l2"><input type="text" class="inp" name="zm" onfocus="inpf(this)" onblur="inpb(this)" value="" /> <span class="hui">  </span></li>
 
  <li class="l3"><? tjbtnr("保存修改","typelists.php?ty1id=".$ty1id);?></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","yjcode_type where admin=2 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="type2.php?control=update&id=<?=$row[id]?>&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <input type="hidden" value="<?=$row[type2]?>" name="oldty2" />
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">子类名称：</li>
 <li class="l2"><input type="text" value="<?=$row[type2]?>" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">分类图标：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"> 根据实际情况上传</li>
 <? $ntp="../upload/type/type2_".$row[id].".png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" width="55" height="55" /></li>
 <? }?>
 <li class="l4">购买模板：</li>
 <li class="l5"><textarea name="buyform"><?=$row[buyform]?></textarea></li>
 <li class="l1">模板说明：</li>
 <li class="l21">比如 <span class="feng">收货角色名,收货角色等级</span> ，隔开 如无要求，可留空</li>
 
  <li class="l4">出售模板：</li>
 <li class="l5"><textarea name="sellform"><?=$row[sellform]?></textarea></li>
 <li class="l1">模板说明：</li>
 <li class="l21">比如 <span class="feng">角色名,等级</span> ，隔开 如无要求，可留空</li>
 
 
 
 
 <li class="l1">热门：</li>
 <li class="l2"> <input name="rm" type="radio" value="1" <? if($row[rm]==1){?>checked="checked" <? }?>/> 是 <input name="rm" type="radio" value="0" <? if($row[rm]==0){?>checked="checked" <? }?>  />否<span class="hui"> </span></li>
 
  <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">序号越小，越靠前</span></li>
 
  <li class="l1">字母：</li>
 <li class="l2"><input type="text" class="inp" name="zm" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[zm]?>" /> <span class="hui">  </span></li>
 
 
 <li class="l3"><? tjbtnr("保存修改","typelists.php?ty1id=".$ty1id);?></li>
 </ul>
 </form>
 
 <? }?>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>