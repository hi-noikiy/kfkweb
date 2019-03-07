<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","yjcode_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $shopzt=sqlzhuru($_POST[R1]);
 if(3==$shopzt){$ses="openshop=0,";PointUpdateM($row[id],$row[openshop]);PointIntoM($row[id],"开店申请被拒，费用退还",$row[openshop]);}
 $dqsj=sqlzhuru($_POST[tdqsj]);
 if(!empty($dqsj)){$ses=$ses."dqsj='".$dqsj."',";}
 updatetable("yjcode_user",$ses."
			 shopname='".sqlzhuru($_POST[tshopname])."',
			 seokey='".sqlzhuru($_POST[tseokey])."',
			 seodes='".sqlzhuru($_POST[tseodes])."',
			 txt='".sqlzhuru($_POST[content])."',
			 pm=".sqlzhuru($_POST[tpm]).",
			 djl=".sqlzhuru($_POST[tdjl]).",
			 shopzt=".$shopzt.",
			 shopztsm='".sqlzhuru($_POST[tshopztsm])."',
			 sellbl=".sqlzhuru($_POST[tsellbl]).",
			 xinyong=".sqlzhuru($_POST[txinyong])." 
			 where id=".$id);
 uploadtpnodata(1,"upload/".$id."/","shop.jpg","allpic",300,300,0,0,"no");
 uploadtpnodata(2,"upload/".$id."/","bannar.jpg","allpic",1920,0,0,0,"no");
 php_toheader("shop.php?t=suc&id=".$id);
}
//函数结果
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
 if((document.f1.tshopname.value).replace("/\s/","")==""){alert("请输入店铺名称");document.f1.tshopname.focus();return false;}
 tjwait();
 f1.action="shop.php?control=update&id=<?=$id?>";
}
function shopztonc(x){
 if(3==x){$("shopztv").style.display="";}else{$("shopztv").style.display="none";}
}
</script>

<script type="text/javascript" src="js/adddate.js" ></script> 

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu2").className="l21";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_user.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - 会员管理 - 店铺资料 - <strong><?=$row[uid]?></strong></li><li class="l2"></li>
 </ul>
 <? include("rightcap3.php");?>
 <script language="javascript">$("rtit2").className="l1";</script>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","shop.php?id=".$id);}?>
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">店铺审核状态：</li>
 <li class="l21"><strong><?=returnshopztv($row[shopzt])?></strong></li>
 <li class="l1"><span class="red">*</span> 店铺名称：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[shopname]?>" class="inp" name="tshopname" /></li>
 <li class="l1">店铺LOGO：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/shop.jpg?t=<?=rnd_num(100)?>" width="54" height="54" /></li>
 <li class="l1">店铺通栏：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/bannar.jpg?t=<?=rnd_num(100)?>" width="54" height="54" /> 最佳尺寸：1920*120</li>
 <li class="l1">店铺关键词：</li>
 <li class="l2"><input  name="tseokey" value="<?=$row[seokey]?>" size="60" type="text" class="inp" /></li>
 <li class="l4">简要描述：</li>
 <li class="l5"><textarea name="tseodes"><?=$row[seodes]?></textarea></li>
 <li class="l10"><span class="red">*</span> 详细描述：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:710px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rightcap">
 <li class="l1 red">管理操作</li>
 </ul>
 <ul class="uk">
 <li class="l1">交易收入比例：</li>
 <li class="l2">
 <input name="tsellbl" value="<?=$row[sellbl]?>" size="5" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">交易成功后，卖家可获得的金额比例 <span class="red">1表示全归卖家，0.9表示90%归卖家，0.5表示50%归卖家</span>，依次类推</span>
 </li>
 <li class="l1">店铺到期：</li>
 <li class="l2"><input class="inp" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" name="tdqsj" value="<?=$row[dqsj]?>" size="20" type="text"/></li>
 <li class="l1">推荐排名：</li>
 <li class="l2"><input type="text" size="5" value="<?=$row[pm]?>" class="inp" name="tpm" /> 0表示不推荐，反之从小到大排序</li>
 <li class="l1">店铺信用：</li>
 <li class="l2"><input type="text" size="5" value="<?=returnjgdw($row[xinyong],"",0)?>" class="inp" name="txinyong" /> 0表示读取常规信用值，反之读取该值</li>
 <li class="l1">店铺点击率：</li>
 <li class="l2"><input type="text" size="5" value="<?=$row[djl]?>" class="inp" name="tdjl" /></li>
 <li class="l1">店铺审核：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="0"<? if(0==$row[shopzt]){?> checked="checked"<? }?> />未提交申请</label>
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="1"<? if(1==$row[shopzt]){?> checked="checked"<? }?> />正在审核</label>
 <label><input name="R1" type="radio" onclick="shopztonc(0)" value="2"<? if(2==$row[shopzt]){?> checked="checked"<? }?> />正常开店</label>
 <label><input name="R1" type="radio" onclick="shopztonc(3)" value="3"<? if(3==$row[shopzt]){?> checked="checked"<? }?> />拒绝申请</label>
 <label><input name="R1" type="radio" onclick="shopztonc(4)" value="4"<? if(4==$row[shopzt]){?> checked="checked"<? }?> />店铺到期</label>
 </span>
 </li>
 </ul>
 <ul class="uk" id="shopztv" style="display:none;">
 <li class="l1">特别说明：</li>
 <li class="l21 red">如果拒绝申请，则会员缴纳的费用将退回至其会员帐号中。通过申请，不会自动扣费。因此请慎重该操作</li>
 <li class="l1">被拒原因：</li>
 <li class="l2"><input type="text" class="inp" name="tshopztsm" size="90" value="<?=$row[shopztsm]?>" /></li>
 </ul>
 <ul class="uk">
 <li class="l3"><? tjbtnr("下一步","userlist.php")?></li>
 </ul>
 </form>
 <script language="javascript">
 shopztonc(<?=$row[shopzt]?>);
 </script>

 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
<script type="text/javascript">
//实例化编辑器
var ue = UE.getEditor('editor');
</script>
</body>
</html>