<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];
$ty2id=$_GET[ty2id];
$ty1name=returntype(1,$ty1id);
$ty2name=returntype(2,$ty2id);

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_type where admin=3 and type1='".sqlzhuru($_POST[t100])."' and type2='".sqlzhuru($_POST[t99])."' and type3='".sqlzhuru($_POST[t1])."'")==1)
 {Audit_alert("该分组已存在！","type3.php?ty1id=".$ty1id."&ty2id=".$ty2id);}
 intotable("yjcode_type","admin,type1,type2,type3,xh,sj,col","3,'".sqlzhuru($_POST[t100])."','".sqlzhuru($_POST[t99])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[tcol])."'");
 php_toheader("type3.php?t=suc&ty1id=".$ty1id."&ty2id=".$ty2id);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_type where admin=3 and type1='".sqlzhuru($_POST[t100])."' and type2='".sqlzhuru($_POST[t99])."' and type3='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("该分组已存在！","type3.php?action=update&id=".$_GET[id]."&ty1id=".$ty1id."&ty2id=".$ty2id);}
 updatetable("yjcode_type","type3='".sqlzhuru($_POST[t1])."' where type1='".$ty1name."' and type2='".$ty2name."' and type3='".sqlzhuru($_POST[oldty3])."'");
 updatetable("yjcode_type","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",col='".sqlzhuru($_POST[tcol])."' where id=".$_GET[id]);
 php_toheader("type3.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$ty1id."&ty2id=".$ty2id);

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
 <ul class="wz"><li class="l1">
 当前位置：<a href="./" class="a2">后台首页</a> - 商品分组 - <strong><?=$ty1name?></strong> - <strong><?=$ty2name?></strong> [<a href="typelists.php?ty1id=<?=$ty1id?>">返回</a>]
 </li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","type3.php?action=".$_GET[action]."&ty1id=".$ty1id."&ty2id=".$ty2id."&id=".$_GET[id]);}?>
 
 <!--begin-->
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="type3.php?control=add&ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t100" value="<?=$ty1name?>" /></li>
 <li class="l1">子类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t99" value="<?=$ty2name?>" /></li>
 <li class="l1">孙类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">颜色值：</li>
 <li class="l2"><input type="text" class="inp" name="tcol" value="#333" onfocus="inpf(this)" onblur="inpb(this)" /> <a href="http://www.yjcode.com/tech/view114.html" target="_blank">什么是颜色值？</a></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=returnxh("yjcode_type"," and type1='".$ty1name."'  and type2='".$ty2name."' and admin=3")?>" /> <span class="hui">序号越小，越靠前</span></li>
 <li class="l3"><? tjbtnr("保存修改","typelists.php?ty1id=".$ty1id);?></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","yjcode_type where admin=3 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("typelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="type3.php?control=update&id=<?=$row[id]?>&ty1id=<?=$ty1id?>&ty2id=<?=$ty2id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[type3]?>" name="oldty3" />
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t100" value="<?=$ty1name?>" /></li>
 <li class="l1">子类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t99" value="<?=$ty2name?>" /></li>
 <li class="l1">孙类名称：</li>
 <li class="l2"><input type="text" value="<?=$row[type3]?>" class="inp" name="t1" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">颜色值：</li>
 <li class="l2"><input type="text" value="<?=$row[col]?>" class="inp" name="tcol" onfocus="inpf(this)" onblur="inpb(this)" /> <a href="http://www.yjcode.com/tech/view114.html" target="_blank">什么是颜色值？</a></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">序号越小，越靠前</span></li>
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