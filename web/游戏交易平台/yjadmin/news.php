<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $tyid=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 uploadtp($bh,"资讯",0);
 if(panduan("bh,type1","yjcode_tp where bh='".$bh."' and type1='资讯'")==1){$iftp=1;}else{$iftp=0;}
 $txt=sqlzhuru($_POST[content]);
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=strgb2312(strip_tags($txt),0,220);}
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=sqlzhuru($_POST[twkey]);if(empty($wkey)){$wkey=$tit;}
 $indextop=intval($_POST[Rindextop]);
 if($indextop==1){updatetable("yjcode_news","indextop=0 where indextop=1");}
 updatetable("yjcode_news","
			 type1id=".$tyid[0].",
			 type2id=".$tyid[1].",
			 tit='".$tit."',
			 txt='".$txt."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 lastsj='".sqlzhuru($_POST[tlastsj])."',
			 ifjc=".$_POST[tifjc].",
			 titys='".sqlzhuru($_POST[ttitys])."',
			 zze='".sqlzhuru($_POST[tzze])."',
			 ly='".sqlzhuru($_POST[tly])."',
			 lyurl='".sqlzhuru($_POST[tlyurl])."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 zt=".$_POST[Rzt].",
			 indextop=".$indextop.",
			 iftp=".$iftp." where bh='".$bh."'");
 php_toheader("news.php?t=suc&action=update&bh=".$bh);

}
//函数结果

while0("*","yjcode_news where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("newslist.php");}
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
document.getElementById("menu4").className="l41";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_news.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>资讯信息</strong> - [<a href="newslist.php">返回</a>]</li><li class="l2"></li>
 </ul>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='newslx.php'>继续添加新资讯</a>]","news.php?bh=".$bh);}?>
 <!--B-->
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 tjwait();
 f1.action="news.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 分组：</li>
 <li class="l2">
 <select name="d1">
 <? while1("*","yjcode_newstype where admin=1");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[type1id] && $row[type2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","yjcode_newstype where admin=2 and name1='".$row1[name1]."'");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[type1id] && $row2[id]==$row[type2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">是否加粗：</li>
 <li class="l2">
 <select name="tifjc">
 <option value="0">否</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>是</option>
 </select>
 </li>
 <li class="l1">标题颜色：</li>
 <li class="l2">
 <select name="ttitys">
 <?
 $ysarr=array("#333","#ff6600","#9C02F8","#ff0000","#2C64B1","#07BF2E","#36ADC2");
 for($i=0;$i<count($ysarr);$i++){
 ?>
 <option style="background-color:<?=$ysarr[$i]?>;" value="<?=$ysarr[$i]?>"<? if($ysarr[$i]==$row[titys]){?> selected="selected"<? }?>><?=$ysarr[$i]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">作者：</li>
 <li class="l2"><input class="inp" name="tzze" value="<?=$row[zze]?>" size="10" type="text"/></li>
 <li class="l1">来源：</li>
 <li class="l2">
 <input class="inp" name="tly" value="<?=$row[ly]?>" size="10" type="text"/>
 来源网址：<input class="inp" name="tlyurl" value="<?=$row[lyurl]?>" size="30" type="text"/>
 </li>
 </ul>
 
 <ul class="uk1">
 <li class="l1">效果图：</li>
 <li class="l2">
 <ul class="tpupload">
 <li class="tl4">
 <? 
 $tpv="";$tpid="";
 while1("id,bh,tp,type1,xh","yjcode_tp where bh='".$bh."' order by xh asc");
 if($row1=mysql_fetch_array($res1)){$tp=preg_split("/\./",$row1[tp]);$tp1=preg_split("/\//",$tp[0]);$tpv=$tp1[4];$tpid=$row1[id];}
 ?>
 <span class="tpf" onmouseover="tphover(1)" onmouseout="tphout(1)"><iframe src="newsupload.php?tpbh=<?=$tpv?>&tpid=<?=$tpid?>&bh=<?=$bh?>&ty=资讯" width="74" scrolling="no" height="91" id="tpf1" frameborder="0"></iframe></span>
 </li>
 </ul>
 </li>
 </ul>
 
 <ul class="uk">
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
 <li class="l2"><input class="inp" name="tlastsj" value="<?=$row[lastsj]?>" size="20" type="text"/> 正确的时间格式如：2012-12-12 12:12:12</li>
 <li class="l1">点击率：</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">今日头条：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rindextop" type="radio" value="0" <? if(0==$row[indextop]){?>checked="checked"<? }?> /><strong>普通</strong> 
 <input name="Rindextop" type="radio" value="1" <? if(1==$row[indextop]){?>checked="checked"<? }?> /><strong>头条</strong> 
 </span>
 </li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /><strong>正常展示</strong> 
 <input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>正在审核</strong> 
 <input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>审核不通过</strong> 
 </span>
 </li>
 <li class="l3"><? tjbtnr("下一步","newslist.php")?></li>
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