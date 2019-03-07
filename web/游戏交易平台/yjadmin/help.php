<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $tyid=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 updatetable("yjcode_help","
			 ty1id=".$tyid[0].",
			 ty2id=".$tyid[1].",
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 sj='".sqlzhuru($_POST[tlastsj])."',
			 wkey='".sqlzhuru($_POST[twkey])."',
			 wdes='".sqlzhuru($_POST[twdes])."',
			 zt=".$_POST[Rzt]." where bh='".$bh."'");
 php_toheader("help.php?t=suc&bh=".$bh);

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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<?php include("top.html");?>
<script language="javascript">
document.getElementById("menu5").className="l51";
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
 <li class="l1">当前位置：后台首页 - <strong>帮助中心</strong></li><li class="l2"></li>
 </ul>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='helplx.php'>继续添加新帮助内容</a>]","help.php?bh=".$bh);}?>
 <!--B-->
 <?
 while0("*","yjcode_help where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("helplist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 tjwait();
 f1.action="help.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 分组：</li>
 <li class="l2">
 <select name="d1">
 <? while1("*","yjcode_helptype where admin=1");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[ty1id] && $row[ty2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","yjcode_helptype where admin=2 and name1='".$row1[name1]."'");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[ty1id] && $row2[id]==$row[ty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l10"><span class="red">*</span> 详细描述：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:710px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[wkey]?>" class="inp" size="70" name="twkey" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l4">SEO描述：</li>
 <li class="l5"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 </ul>
 
 <ul class="rightcap">
 <li class="l1 red">管理员操作</li>
 </ul>
 <ul class="uk">
 <li class="l1">更新时间：</li>
 <li class="l2"><input class="inp" name="tlastsj" value="<?=$row[sj]?>" size="20" type="text"/> 正确的时间格式如：2012-12-12 12:12:12</li>
 <li class="l1">点击率：</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /><strong>正常展示</strong> 
 <input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>正在审核</strong> 
 <input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>审核不通过</strong> 
 </span>
 </li>
 <li class="l3"><? tjbtnr("下一步","helplist.php")?></li>
 </ul>
 </form>


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