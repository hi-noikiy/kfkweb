<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$timestamp=time();
$pwd=$rowuser[pwd];
$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}

//函数开始
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $txt=sqlzhuru($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $yhsj1=sqlzhuru($_POST[tyhsj1]);if(!empty($yhsj1)){$ses="yhsj1='".$yhsj1."',";}
 $yhsj2=sqlzhuru($_POST[tyhsj2]);if(!empty($yhsj1)){$ses=$ses."yhsj2='".$yhsj2."',";}
 $money1=sqlzhuru($_POST[tmoney1]);
 $money2=sqlzhuru($_POST[tmoney2]);
 $money3=sqlzhuru($_POST[tmoney3]);if(!is_numeric($money3)){$money3=0;}
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 if($money1<0 || $money2<0 || $money3<0){Audit_alert("价格不能为负数！","productlist.php");}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 
 $tysx=sqlzhuru($_POST[tysx]);
 $tysxB=intval(sqlzhuru($_POST[tysxBnum]));
 for($i=1;$i<$tysxB;$i++){
  $tysxS=intval(sqlzhuru($_POST["tysxSnum".$i]));
  for($j=1;$j<=$tysxS;$j++){
  $zi=sqlzhuru($_POST["zi_".$i."_".$j]);
  if(!empty($zi)){
  $tysx=$tysx."xcf".$_POST["tysxty1_".$i].":".$zi;
  }
  }
 }
 
 $ifuserjd=intval($_POST[Rifuserdj]);
 if(1==$ifuserjd){
 deletetable("yjcode_prouserdj where probh='".$bh."'");
  for($i=1;$i<intval($_POST[djnum]);$i++){
  $zhekou=$_POST["zhekou_".$i];
  $djname=$_POST["name1_".$i];
  if(!empty($zhekou)){intotable("yjcode_prouserdj","probh,userid,djname,admin,zhi","'".$bh."',".$row[userid].",'".$djname."',1,".$zhekou."");}
  }
 }
 $sellform= serialize(sqlzhuru( $_POST[sellform])) ;
 
 updatetable("yjcode_pro",$ses."
			 mybh='".sqlzhuru($_POST[tmybh])."',
			 lastsj='".$sj."',
			 tysx='".$tysx."',
			 zt=".$nzt.",
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 kcnum=".$kcnum.", 
			 money1=".$money1.", 
			 money2=".$money2.",
			 money3=".$money3.",
			 yhxs=".sqlzhuru($_POST[Ryhxs]).",
			 yhsm='".sqlzhuru($_POST[tyhsm])."',
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 fhxs=".$fhxs.",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 sellform='". $sellform."',
			 ifuserdj=".$ifuserjd."
			 where bh='".$bh."' and userid=".$userid);
 uploadtp($bh,"商品",$userid);
 //上传B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_pro","upf='".$mc."' where bh='".$bh."' and userid=".$userid);
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
     if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc($bh);
 }
 //卡密E
 
 php_toheader("prosuc.php?bh=".$bh."&id=".$row[id]);

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
<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的库存");document.f1.tkcnum.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的价格");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("请输入有效的价格");document.f1.tmoney2.focus();return false;}
r=document.getElementsByName("Rfhxs");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择发货形式！");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
tjwait();
f1.action="product.php?bh=<?=$bh?>&control=update";
}

function yhxsonc(x){
if(1==x){document.getElementById("yhxsul").style.display="none";}	
else if(2==x){document.getElementById("yhxsul").style.display="";}	
}

function fhxsonc(x){
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
}

function djonc(x){
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}
</script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>


<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 商品编辑</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 所在分组：</li>
 <li class="l21"><strong><?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?></strong> [<a href="productlx.php?action=update&id=<?=$row[id]?>">修改</a>]</li>
 </ul>
 
 <div class="tysx">
 <input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
 <? $i=1;while1("*","yjcode_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
 <ul class="uk1">
 <li class="l1"><?=$row1[name1]?>：</li>
 <li class="l21">
 <? $j=1;while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <input name="Csx"  type="radio" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?>&nbsp;&nbsp;
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" size="10" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </li>
 </ul>
 <? $i++;}?>
 </div>
 <input type="hidden" value="<?=$i?>" name="tysxBnum" />
 
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">上架/下架：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> 上架 
 <input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> 下架 
 </span>
 </li>
 
   <?
 
   while0("*","yjcode_type where   id=".$row[ty2id]."");if($trow=mysql_fetch_array($res)){
	   if($trow[sellform]!=""){
	   $tarray=explode(",",$trow[sellform]); 
	 $sellforms=  unserialize($row[sellform]);
	 $i=0;
	  foreach($tarray as $value){ 
	   ?>
 <li class="l1"><?=$value?>：</li>
 <li class="l2"><input type="text" size="10" value="<?=$sellforms[$i]?>" class="inp" name="sellform[]" /></li>
    <?
	$i++;
	   }
   }}
  ?>
 
 <li class="l1"><span class="red">*</span> 原价：</li>
 <li class="l2"><input class="inp" name="tmoney1" value="<?=$row[money1]?>" size="10" type="text"/></li>
 <li class="l1"><span class="red">*</span> 优惠价：</li>
 <li class="l2"><input class="inp" name="tmoney2" value="<?=$row[money2]?>" size="10" type="text"/> <span class="red">提示：如果设置了套餐，优惠价建议填写套餐中最低的价格</span></li>
 <li class="l1"><span class="red">*</span> 优惠形式：</li>
 <li class="l2">
 <span class="finp">
 <input name="Ryhxs" type="radio" value="1" onclick="yhxsonc(1)" <? if(1==$row[yhxs]){?>checked="checked"<? }?> /> 长期优惠 &nbsp;&nbsp;
 <input name="Ryhxs" type="radio" value="2" onclick="yhxsonc(2)" <? if(2==$row[yhxs]){?>checked="checked"<? }?> /> 限时优惠 
 </span>
 </li>
 </ul>
 
 <ul class="uk" id="yhxsul" style="display:none;">
 <li class="l1"><span class="red">*</span> 限时优惠价：</li>
 <li class="l2"><input class="inp" name="tmoney3" value="<?=$row[money3]?>" size="10" type="text"/></li>
 <li class="l1"><span class="red">*</span> 限时优惠说明：</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[yhsm]?>" class="inp" name="tyhsm" /></li>
 <li class="l1"><span class="red">*</span> 优惠时间：</li>
 <li class="l2">
 <input class="inp" name="tyhsj1" value="<?=$row[yhsj1]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/> 
 <span class="fd">到</span> 
 <input class="inp" name="tyhsj2" value="<?=$row[yhsj2]?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l1">套餐说明：</li>
 <li class="l21">【<strong><a href="taocanlist.php?bh=<?=$row[bh]?>" target="_blank" class="blue">进入套餐编辑</a></strong>】</li>
 <li class="l1"><span class="red">*</span> 启用会员等级：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rifuserdj" type="radio" value="0" onclick="djonc(0)" <? if(empty($row[ifuserdj])){?>checked="checked"<? }?> /> 不启用</label> 
 <label><input name="Rifuserdj" type="radio" value="1" onclick="djonc(1)" <? if(1==$row[ifuserdj]){?>checked="checked"<? }?> /> 启用</label> 
 </span>
 </li>
 </ul>
 <div id="djv" style="display:none;">
 <ul class="dju1">
 <li class="l1">会员等级</li>
 <li class="l2">享受折扣(10表示无折扣，9表示9折)</li>
 </ul>
 <? 
 $j=1;while1("*","yjcode_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","yjcode_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <ul class="dju2">
 <li class="l1"><input type="text" readonly="readonly" name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></li>
 <li class="l2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></li>
 </ul>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
 </div>
 
 <!--上传B-->
 <ul class="uk">
 <li class="l1">效果图：</li>
 <li class="l21">已上传<strong class="red" id="nowtpnum"><?=returncount("yjcode_tp where bh='".$bh."'")?></strong>张效果图 【<a href="protp.php?bh=<?=$bh?>" class="feng" target="_blank">管理效果图</a>】</li>
 <li class="l3"></li>
 <li class="l4">
 <div id="pltp1">
  <div id="queue"></div>
  <input id="file_upload" style="display:none;" name="file_upload" type="file" multiple="true">
 </div>
 
 <div id="pltp2" class="red" style="display:none;">
  <img src="img/ajax_loader.gif" width="208" style="margin-bottom:7px;" height="13" /><br>
  正在处理图片信息,剩余<strong id="synum">0</strong>张，请勿刷新或关闭页面……<br>
 </div>
 
 </li>
 </ul>
 <script language="javascript">
 $(function() {
  $('#file_upload').uploadify({
    'formData'     : {
    'timestamp' : '<?= $timestamp?>',
    'token'     : '<?=md5('unique_salt'.$timestamp);?>',
	'bh'       : '<?=$bh?>',
	'uid'       : '<?=$luserid?>',
	'pwd'       : '<?=$pwd?>'
    },
    'swf'      : 'uploadify.swf',
	'queueID'  : 'uploaddiv',
    'uploader' : 'uploadify.php',
				
    'removeTimeout' : 1,
				
    'onDialogClose'  : function(queueData) {
     if(queueData.filesQueued>0){
	  document.getElementById("synum").innerHTML=queueData.filesQueued;
	  document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
     }
    },
    'onQueueComplete' : function(queueData) {
    document.getElementById("pltp1").className="pltp1h";document.getElementById("pltp2").style.display="none";
    },
	'onUploadComplete' : function(file) {
	 document.getElementById("synum").innerHTML=parseInt(document.getElementById("synum").innerHTML)-1;
	 nt=parseInt(document.getElementById("nowtpnum").innerHTML);document.getElementById("nowtpnum").innerHTML=nt+1;
    }
				 
    });
  });
 </script>
 <div id="uploaddiv" style="display:none;"></div>
 <!--上传E-->
 
 <div class="upfile">
 <ul class="uk" id="kcuk">
 <li class="l1"><span class="red">*</span> 库存量：</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> (如果是点卡交易类，库存值无需填写，将自动读取)</li>
 </ul>
 <ul class="uk">
 <li class="l1 red">* 发货形式：</li>
 <li class="l2">
 <span class="finp">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> 手动发货</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> 自动发货</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> 网站直接下载</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> 点卡交易</label>&nbsp;&nbsp;
 <? }?>
 
 </span>
 </li>
 </ul> 
 <ul class="uk" id="fhxs2" style="display:none;">
 <li class="l1">游戏帐号：</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 <li class="l1">游戏密码：</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">其他信息：</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
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
 <li class="l11">添加卡密：</li>
 <li class="l12"><textarea name="s1"></textarea></li>
 </ul>
 </div>
 
 <ul class="uk">
 <li class="l7"><span class="red">*</span> 详细描述：</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:790px;height:290px;"><?=$row[txt]?></script></li>
 <li class="l1">商品关键词：</li>
 <li class="l2"><input  name="twkey" value="<?=$row[wkey]?>" size="60" type="text" class="inp" /></li>
 <li class="l9">商品描述：</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交","productlist.php")?></li>
 </ul>
 </form>

 <!--E-->
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script type="text/javascript">
//实例化编辑器
yhxsonc(<?=$row[yhxs]?>);
fhxsonc(<?=$row[fhxs]?>);
djonc(<?=returnjgdw($row[ifuserdj],"",0)?>);
var ue = UE.getEditor('editor');
</script>
</body>
</html>