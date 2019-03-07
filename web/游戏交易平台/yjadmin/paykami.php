<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
   if(count($e)>1){
     if(panduan("ka","yjcode_paykami where ka='".$e[0]."'")==0){
     $mi="";
	 if(count($e)>=3){for($ei=2;$ei<count($e);$ei++){$mi=$mi."".$e[$ei];}}
	 $sj=date("Y-m-d H:i:s");
	 intotable("yjcode_paykami","ka,mi,money1,userid,ifok,sj","'".$e[1]."','".$mi."','".$e[0]."',0,0,'".$sj."'");
	 }
   }
  }
 }
 php_toheader("paykami.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $id=$_GET[id];
 if(panduan("id,ka","yjcode_paykami where ka='".sqlzhuru($_POST[tka])."' and id<>".$id."")==1){
 Audit_alert("卡号已存在，保存失败!","paykami.php?action=update&id=".$id);}
 updatetable("yjcode_paykami","ka='".sqlzhuru($_POST[tka])."',mi='".sqlzhuru($_POST[tmi])."',money1=".sqlzhuru($_POST[tmoney1]).",ifok=".sqlzhuru($_POST[Rifok])." where id=".$id);
 php_toheader("paykami.php?t=suc&action=update&id=".$id);

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
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu3").className="l31";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_product.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>库存管理</strong></li><li class="l2"></li>
 </ul>
 <!--B-->
 <? systs("恭喜您，操作成功!","paykami.php?id=".$_GET[id]."action=".$_GET[action])?>
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
  tjwait();
  f1.action="paykami.php?control=add"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">说明：</li>
 <li class="l21 red">导入格式为面值+空格+卡号+空格+密码，一行一组，如50 AAAAA BBBBB</li>
 <li class="l12">卡密内容：</li>
 <li class="l13"><textarea name="s1"></textarea></li>
 </ul>
 
 <ul class="uk">
 <li class="l3"><? tjbtnr("保存","paykamilist.php")?></li>
 </ul>
 </form>
 
 <?
 }else{
 while0("*","yjcode_paykami where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("paykamilist.php");}
 ?>
 <script language="javascript">
 function tj(){
  tjwait();
  f1.action="paykami.php?control=update&id=<?=$_GET[id]?>"; 
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">面值：</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[money1]?>" name="tmoney1" /></li>
 <li class="l1">卡号：</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[ka]?>" name="tka" /></li>
 <li class="l1">密码：</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[mi]?>" name="tmi" /></li>
 <li class="l1">使用情况：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifok" type="radio" value="0"<? if(empty($row[ifok])){?> checked="checked"<? }?> /> 未使用 &nbsp;&nbsp;
 <input name="Rifok" type="radio" value="1"<? if(1==$row[ifok]){?> checked="checked"<? }?> /> 已使用
 </span>
 </li>
 <li class="l3"><? tjbtnr("保存","paykamilist.php")?></li>
 </ul>
 </form>
 
 <? }?>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>