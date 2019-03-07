<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("yjcode_control","webnamev","'保存失败'");}
 updatetable("yjcode_control","
			  webnamev='".sqlzhuru($_POST[twebnamev])."',
			  weburlv='".sqlzhuru($_POST[tweburlv])."',
			  webtit='".sqlzhuru($_POST[twebtit])."',
			  webkey='".sqlzhuru($_POST[twebkey])."',
			  webdes='".sqlzhuru($_POST[swebdes])."',
			  webtj='".sqlzhuru($_POST[swebtj])."',
			  webqqv='".sqlzhuru($_POST[twebqqv])."',
			  webtelv='".sqlzhuru($_POST[twebtelv])."',
			  beian='".sqlzhuru($_POST[tbeian])."',
			  websyposv=".sqlzhuru($_POST[d1]).",
			  propx=".sqlzhuru($_POST[R1]).",
			  sermode=".sqlzhuru($_POST[R2]).",
			  fhxs='".$_GET[fh]."'
			  ");
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/logo.png");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../img/shuiyin.png");
 move_uploaded_file($_FILES["inp4"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 move_uploaded_file($_FILES["inp3"]['tmp_name'], "../m/img/logo.png");
 php_toheader("inf.php?t=suc");

}elseif($_GET[control]=="del"){
 delFile("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 php_toheader("inf.php?t=suc");
}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function tj(){
c=document.getElementsByName("C1");str="";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}
if(str==""){alert("请至少选择一个发货形式");return false;}
tjwait();
f1.action="inf.php?fh="+str;
}
function deltemlogo(){
if(confirm("确定要删除模板LOGO吗？")){location.href="inf.php?control=del";}else{return false;}
}
</script>
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
 <ul class="wz">
 <li class="l1">当前位置：<a href="default.php">后台首页</a> - <strong>基本设置</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit1").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">网站名称：</li>
 <li class="l2"><input type="text" class="inp" name="twebnamev" size="30" value="<?=webname?>" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">网址：</li>
 <li class="l2">
 <input type="text" class="inp" name="tweburlv" value="<?=weburl?>" size="30" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="red">切记：必须以 http:// 开头，斜杆 / 结尾</span>
 </li>
 <li class="l1">网站标题：</li>
 <li class="l2"><input  name="twebtit" value="<?=$row[webtit]?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">站点关键词：</li>
 <li class="l2"><input  name="twebkey" value="<?=$row[webkey]?>" size="60" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l4">站点描述：</li>
 <li class="l5"><textarea name="swebdes"><?=$row[webdes]?></textarea></li>
 <li class="l4">统计代码：</li>
 <li class="l5"><textarea name="swebtj"><?=$row[webtj]?></textarea></li>
 <li class="l1">客服QQ：</li>
 <li class="l2">
 <input type="text" class="inp" name="twebqqv" value="<?=$row[webqqv]?>" size="60" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">格式：qq号码*称呼,qq号码*称呼</span>
 </li>
 <li class="l1">联系电话：</li>
 <li class="l2"><input class="inp" name="twebtelv" value="<?=$row[webtelv]?>" size="30" onfocus="inpf(this)" onblur="inpb(this)" type="text"/></li>
 <li class="l1">网站备案号：</li>
 <li class="l2"><input name="tbeian" value="<?=$row[beian]?>" size="30" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">网站LOGO：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/logo.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">模板LOGO：</li>
 <li class="l2"><input type="file" name="inp4" id="inp4" size="15" accept=".jpg,.gif,.jpeg,.png"> 可以留空，如果留空，则调用网站LOGO</li>
 <? if(is_file("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png")){?>
 <li class="l8"></li>
 <li class="l9"><img src="../tem/moban/<?=$rowcontrol[nowmb]?>/homeimg/logo.png?t=<?=rnd_num(100)?>" height="40" /><br>[<a href="javascript:void(0);" onclick="deltemlogo()">删除</a>]</li>
 <? }?>
 <li class="l1">手机版LOGO：</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../m/img/logo.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">水印位置：</li>
 <li class="l2">
 <select name="d1">
 <?
 $syarr=array("","顶端居左","顶端居中","顶端居右","中部居左","中部居中","中部居右","底端居左","底端居中","底端居右");
 for($i=1;$i<=9;$i++){
 ?>
 <option value="<?=$i?>" <? if($row[websyposv]==$i){?> selected="selected"<? }?>><?=$syarr[$i]?></option>
 <?
 }
 ?>
 </select>
 </li>
 <li class="l1">网站水印：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/shuiyin.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">发货形式：</li>
 <li class="l2">
 <span class="finp">
 <input name="C1" type="checkbox" value="1"<? if(strstr($row[fhxs],"1") || empty($row[fhxs])){?> checked="checked"<? }?> /> 手动发货 
 <input name="C1" type="checkbox" value="2"<? if(strstr($row[fhxs],"2") || empty($row[fhxs])){?> checked="checked"<? }?> /> 网盘下载 
 <input name="C1" type="checkbox" value="3"<? if(strstr($row[fhxs],"3") || empty($row[fhxs])){?> checked="checked"<? }?> /> 网站直接下载 
 <input name="C1" type="checkbox" value="4"<? if(strstr($row[fhxs],"4") || empty($row[fhxs])){?> checked="checked"<? }?> /> 点卡交易
 <input name="C1" type="checkbox" value="5"<? if(strstr($row[fhxs],"5") || empty($row[fhxs])){?> checked="checked"<? }?> /> 实物快递
 </span>
 </li>
 <li class="l1">商品排列：</li>
 <li class="l2">
 <span class="finp">
 <input name="R1" type="radio" value="0" <? if(empty($row[propx])){?> checked="checked"<? }?> />默认图片形式 
 <input name="R1" type="radio" value="1" <? if(1==$row[propx]){?> checked="checked"<? }?> />列表形式
 </span>
 </li>
 <li class="l1">搜索模式：</li>
 <li class="l2">
 <span class="finp">
 <input name="R2" type="radio" value="1" <? if(1==$row[sermode]){?> checked="checked"<? }?> />常规模式 
 <input name="R2" type="radio" value="2" <? if(2==$row[sermode]){?> checked="checked"<? }?> />常规转码 
 <input name="R2" type="radio" value="0" <? if(empty($row[sermode])){?> checked="checked"<? }?> />强化转码模式
 </span>
 </li>
 <li class="l3"><? tjbtnr("保存修改");?></li>
 </ul>
 </form>

 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>