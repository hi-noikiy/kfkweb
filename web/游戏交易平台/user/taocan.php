<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_pro where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];
$id=$_GET[id];

//函数开始
if($_GET[control]=="update"){
 zwzr();
 if(panduan("*","yjcode_taocan where userid=".$userid." and probh='".$bh."' and admin is null and tit='".sqlzhuru($_POST[t1])."' and id<>".$id)==1){Audit_alert("该套餐内容已存在！","taocan.php?id=".$_GET[id]."&bh=".$bh);}
 
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
							  
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."' where tit='".sqlzhuru($_POST[oldty1])."' and probh='".$bh."'");
 
 //上传B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_taocan","upf='".$mc."' where id=".$id." and userid=".$userid);
  }
 }
 //上传E
 //卡密B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,tcid,userid,ka","yjcode_taocan_kc where probh='".$bh."' and ka='".$ka."' and tcid=".$id." and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_taocan_kc","probh,tcid,userid,ka,mi,ifok","'".$bh."',".$id.",".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc_tc($bh,$id);
 }
 //卡密E
 
 php_toheader("taocanlist.php?bh=".$bh);

}
//函数结果

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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > <strong>套餐管理</strong> [<a href="taocanlist.php?bh=<?=$bh?>">返回</a>]</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">
 
 <!--B-->
 <? 
 while0("*","yjcode_taocan where userid=".$luserid." and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}
 ?>
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
 if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
 }
 </script>
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
 <ul class="uk" id="kcuk">
 <li class="l1"><span class="red">*</span> 库存量：</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> (如果是点卡交易类，库存值无需填写，将自动读取)</li>
 </ul>
 <ul class="uk">
 <li class="l1 red">* 发货形式：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> 跟商品保持一致</label>&nbsp;&nbsp;
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> 手动发货(独立)</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> 网盘下载(独立)</label> &nbsp;&nbsp;
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
 <li class="l21">【<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">点击预览</a>】</li>
 <? }?>
 </ul>
 <ul class="uk" id="fhxs4" style="display:none;">
 <li class="l1">库存：</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>件</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">管理库存</a>]</li>
 <li class="l1">说明：</li>
 <li class="l21 red">导入格式为卡号+空格+密码(可跟上附加内容)，一行一组，如AAAAA BBBBB</li>
 <li class="l11">卡密内容：</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 </div>

 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改","taocanlist.php?bh=".$bh);?></li>
 </ul>
 </form>
 
 <!--E-->

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>
</body>
</html>