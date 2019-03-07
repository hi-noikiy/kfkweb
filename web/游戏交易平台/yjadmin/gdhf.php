<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","yjcode_gd where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("gdlist.php");}
$id=$row[id];
$gdzt=$row[gdzt];

//函数开始
if($_GET[control]=="add"){
 zwzr();
 $txt=sqlzhuru($_POST[content]);
 $sj=date("Y-m-d H:i:s");
 if(!empty($txt)){
 intotable("yjcode_gdhf","userid,gdbh,admin,txt,sj,zt","".$row[userid].",'".$bh."',1,'".$txt."','".$sj."',0");
 }
 updatetable("yjcode_gd","gdzt=".$_POST[Rgdzt]." where id=".$id);

 if(sqlzhuru($_POST[Rtz1])=="yes" && !empty($row[mail])){
  require("../config/mailphp/sendmail.php");
  $lj=weburl."user/gdlist.php";
  $tit="您好，您的工单".strip_tags(returngdzt($_POST[Rgdzt]));
  $txt="尊敬的用户：".returnuser($row[userid])." 您好：<br>";
  $txt=$txt."感谢您对".webname."(".weburl.")的支持!<br>";
  $txt=$txt."您于".$row[sj]."提交工单状态已经变更为：".returngdzt($_POST[Rgdzt])."。您可以访问以下链接登录网站查看工单详情<br><a href='".$lj."' target='_blank'>".$lj."</a><hr>";
  $txt=$txt."本邮件由系统自动发出，请勿直接回复！";
  @yjsendmail("=?gb2312?B?".base64_encode($tit)."?=",$row[mail],$txt);
 }
 
 if(sqlzhuru($_POST[Rtz2])=="yes" && $rowcontrol[ifmob]=="on" && !empty($row[mot])){
 include("../config/mobphp/mysendsms.php"); 
 $str="您的工单状态已经变更为".strip_tags(returngdzt($_POST[Rgdzt]));
 @yjsendsms($row[mot],$str);
 updatetable("yjcode_control","smskc=smskc-1");
 }

 php_toheader("gdhf.php?t=suc&bh=".$bh);

}elseif($_GET[control]=="del"){
 deletetable("yjcode_gdhf where gdbh='".$bh."' and id=".$_GET[id]);
 php_toheader("gdhf.php?t=suc&bh=".$bh);

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
<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
      id : 'content',
       resizeMode : 1,
       cssPath : '../ckeditor/examples/index.css',
       items : [
       'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
       'removeformat','image', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
       'insertunorderedlist']
});
function tj(){
tjwait();
f1.action="gdhf.php?bh=<?=$bh?>&control=add";
}
function del(x){
if(!confirm("确定要删除吗？")){return false;}else{location.href="gdhf.php?control=del&bh=<?=$bh?>&id="+x;}
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - 工单管理 - <strong>回复记录</strong></li><li class="l2"></li>
 </ul>

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","gdhf.php?bh=".$bh);}?>

 <!--B-->
 <div class="gdhflist">
  <div class="cap">&nbsp;&nbsp;沟通记录</div>
  <ul class="u1">
  <li class="l1"><img src="../upload/<?=$row[userid]?>/user.jpg" width="40" height="40" /></li>
  <li class="l2"><?=$row[txt]?><br><?=$row[sj]?></li>
  </ul>
  <? 
  while0("*","yjcode_gdhf where gdbh='".$bh."' and zt=0 order by sj asc");while($row=mysql_fetch_array($res)){
  $txt=$row[txt];
  $tp="../upload/".$row[userid]."/user.jpg";
  if($row[admin]==1){$txt="<strong>".$txt."</strong>";$tp="img/nonetx.jpg";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" style="margin:0 0 6px 0;" /><br>[<a href="javascript:void(0);" onclick="del(<?=$row[id]?>)" class="red">删除</a>]</li>
  <li class="l2"><?=$txt?><br><?=$row[sj]?></li>
  </ul>
  <? }?>
 
  <form name="f1" method="post" onsubmit="return tj()">
  <ul class="uk">
  <li class="l1">邮件通知：</li>
  <li class="l2">
  <span class="finp">
  <input name="Rtz1" checked="checked" type="radio" value="yes" /> <span class="blue">发送邮件</span> 
  <input name="Rtz1" type="radio" value="no" /> 不发送邮件 
  </span>
  </li>
  <li class="l1">短信通知：</li>
  <li class="l2">
  <span class="finp">
  <input name="Rtz2" checked="checked" type="radio" value="yes" /> <span class="blue">发送短信</span> 
  <input name="Rtz2" type="radio" value="no" /> 不发送短信 
  </span>
  </li>
  <li class="l1">工单状态：</li>
  <li class="l2">
  <span class="finp">
  <? for($i=1;$i<=4;$i++){?>
  <input name="Rgdzt" type="radio" value="<?=$i?>" <? if($i==$gdzt){?>checked="checked"<? }?> /><strong><?=returngdzt($i)?></strong> 
  <? }?>
  </span>
  </li>
  <li class="l10"><span class="red">*</span> 详细描述：</li>
  <li class="l11"><textarea id="content" name="content" style="width:710px;height:460px;visibility:hidden;"></textarea></li>
  <li class="l3"><? tjbtnr("下一步","gd.php?id=".$id)?></li>
  </ul>
  </form>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>