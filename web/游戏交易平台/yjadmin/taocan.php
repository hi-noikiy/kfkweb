<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];

while0("*","yjcode_taocan where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $id=$_GET[id];
 if(panduan("*","yjcode_taocan where admin is null and probh='".$bh."' and zt<>99 and tit='".sqlzhuru($_POST[t1])."' and id<>".$id)==1){Audit_alert("该套餐内容已存在！","taocan.php?action=update&id=".$_GET[id]."&bh=".$bh);}

 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."',
                              xh=".sqlzhuru($_POST[t2]).",
							  money1=".sqlzhuru($_POST[tmoney1]).",
							  money2=".sqlzhuru($_POST[tmoney2]).",
							  zt=0,
			                  fhxs=".$fhxs.",
			                  wpurl='".sqlzhuru($_POST[twpurl])."',
			                  wppwd='".sqlzhuru($_POST[twppwd])."',
			                  wppwd1='".sqlzhuru($_POST[twppwd1])."',
							  kcnum=".$kcnum."
							  where id=".$id);
 //上传B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$row[userid].".".returnhz($up1);
  $lj="../upload/".$row[userid]."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_taocan","upf='".$mc."' where id=".$id);
  }
 }
 //上传E
 if(4==$fhxs){kamikc_tc($bh,$id);}
							   
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."' where tit='".sqlzhuru($_POST[oldty1])."' and probh='".$bh."'");
 php_toheader("taocan.php?t=suc&id=".$_GET[id]."&bh=".$bh);

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
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入套餐说明！");document.f1.t1.focus();return false;}
if((document.f1.tmoney2.value).replace(/\s/,"")==""){alert("请输入原价！");document.f1.tmoney2.focus();return false;}
if((document.f1.tmoney1.value).replace(/\s/,"")==""){alert("请输入优惠价！");document.f1.tmoney1.focus();return false;}
if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
tjwait();
f1.action="taocan.php?control=update&id=<?=$row[id]?>&bh=<?=$bh?>";
}
function fhxsonc(x){
for(i=0;i<=4;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
}

</script>
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
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong>套餐管理</strong> [<a href="taocanlist.php?bh=<?=$bh?>">返回</a>]</li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='taocanlx.php?bh=".$bh."'>继续添加</a>]","taocan.php?bh=".$bh."&id=".$_GET[id]);}?>
 
 <!--begin-->
 
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[tit]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">对应商品：</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$tit?>" size="80" /></li>
 <li class="l1">套餐说明：</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row[tit]?>" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">原价：</li>
 <li class="l2"><input type="text" class="inp" name="tmoney2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money2]?>" /> 元</li>
 <li class="l1">优惠价：</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[money1]?>" /> 元</li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">序号越小，越靠前</span></li>
 </ul>
 
 <div class="upfile">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 库存量：</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=$row[kcnum]?>" size="10" type="text"/> (如果是点卡交易类，库存值无需填写，将自动读取)</li>
 <li class="l1 red">* 发货形式：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> 跟商品保持一致</label>&nbsp;&nbsp;
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> 手动发货(独立)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> 网盘下载(独立)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> 网站直接下载(独立)</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> 点卡交易(独立)</label>&nbsp;&nbsp;
 <? }?>
 </span>
 </li>
 </ul> 
 <ul class="uk" id="fhxs2" style="display:none;">
 <li class="l1">网盘地址：</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">网盘密码：</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">解压密码：</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk" id="fhxs3" style="display:none;">
 <li class="l1">上传文件：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">文件预览：</li>
 <li class="l21">【<a href="../upload/<?=$row[userid]?>/<?=$row[probh]?>/<?=$row[upf]?>" class="blue" target="_blank">点击预览</a>】</li>
 <? }?>
 </ul>
 </div>

 <ul class="uk">
 <li class="l3"><? tjbtnr("保存修改","taocanlist.php?bh=".$bh);?></li>
 </ul>

 </form>
 
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>
</body>
</html>