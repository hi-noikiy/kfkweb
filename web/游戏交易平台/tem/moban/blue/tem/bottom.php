<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbbot">
<div class="yjcode">
 <div class="bottom">
 <ul class="u1">
 <? while1("*","yjcode_helptype where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <li>
 <span class="fontyh"><a href="<?=weburl?>help/search_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a></span>
 <? 
 while2("*","yjcode_helptype where admin=2 and name1='".$row1[name1]."' order by xh asc limit 5");while($row2=mysql_fetch_array($res2)){
 $aurl="search_j".$row1[id]."v_k".$row2[id]."v.html";
 if(returncount("yjcode_help where ty1id=".$row1[id]." and ty2id=".$row2[id])==1){
 while3("id,ty1id,ty2id","yjcode_help where ty1id=".$row1[id]." and ty2id=".$row2[id]);$row3=mysql_fetch_array($res3);
 $aurl="view".$row3[id].".html";
 }
 ?>
 <a href="<?=weburl?>help/<?=$aurl?>" class="a1"><?=$row2[name2]?></a><br>
 <? }?>
 </li>
 <? }?>
 </ul>
 <div class="ad"><? adwhile("ADI01");?></div>
 <div class="bq">
 <a href="<?=weburl?>">网站首页</a> | 
 <a href="<?=weburl?>help/aboutview2.html">关于我们</a> | 
 <a href="<?=weburl?>help/aboutview3.html">广告合作</a> | 
 <a href="<?=weburl?>help/aboutview4.html">联系我们</a> | 
 <a href="<?=weburl?>help/aboutview5.html">隐私条款</a> | 
 <a href="<?=weburl?>help/aboutview6.html">免责声明</a><br>
 CopyRight 2014-2024 <?=webname?> | <?=$rowcontrol[beian]?><br><?=$rowcontrol[webtj]?>
 </div>
 </div>
 
</div>
</div>


<!--***********右侧浮动开始*************-->
<div class="rightfd" style="display:<? if($rowcontrol[ifkf]=="off"){?>none<? }?>;">

 <div class="d1">
  <span class="s1">联系客服</span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqqv]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="网站客服";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
  <strong class="fontyh">联系客服<br><?=$rowcontrol[webtelv]?></strong>
  </div>
 </div>

 <div class="d2">
  <span class="s1">手机版</span>
  <div class="sd1">
  <img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" width="100" height="100" /><br>扫一扫进手机版
  </div>
 </div>

 <div class="d3">
  <span class="s1" onClick="gotoTop();return false;">返回顶部</span>
 </div>
 
</div>
<!--**********右侧浮动结束***************-->
