 <? 
 $au="../product/view".returnproid($row[probh]).".html";
 ?>
 <div class="orderm box"><div class="d1">商品信息</div><div class="d2"><a href="<?=$au?>" target="_blank" class="blue"><strong><?=$row[tit]?></strong></a></div></div>
 <div class="orderm box"><div class="d1">订单状态</div><div class="d2"><?=returnorderzt($row[ddzt])?></div></div>
 <div class="orderm box"><div class="d1">订单编号</div><div class="d2"><?=$orderbh?></div></div>
 <div class="orderm box"><div class="d1">下单时间</div><div class="d2"><?=$row[sj]?></div></div>
 <div class="orderm box"><div class="d1">订单总额</div><div class="d2 feng"><strong><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><? if(!empty($row[yunfei])){?>(含运费<?=$row[yunfei]?>元)<? }?></div></div>
 <div class="orderm box"><div class="d1">购买数量</div><div class="d2"><?=$row[num]?></div></div>
 <div class="orderm box"><div class="d1">选购套餐</div><div class="d2"><?=$row[tcv]?></div></div>
 <? if(!empty($row[liuyan])){?>
 <div class="orderm box"><div class="d1">买家留言</div><div class="d2"><?=$row[liuyan]?></div></div>
 <? }?>
 <? if(!empty($row[buyform])){?>
 <div class="orderm box"><div class="d1">购买信息</div><div class="d2"><?=$row[buyform]?></div></div>
 <? }?>
 <? if(!empty($row[shdz])){?>
 <div class="orderm box"><div class="d1">收货地址</div><div class="d2"><?=$row[shdz]?></div></div>
 <? }?>
  
 <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
 <div class="orderm box">
 <div class="d1">收货信息</div>
 <div class="d2">
 <? 
 while1("*","yjcode_pro where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){
 $tcfhxs=0;
 if(!empty($row[tcid])){
  while2("*","yjcode_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
 }
 ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">该订单的商品由卖家手动发货，请联系卖家</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">该订单的商品由卖家手动发货，请联系卖家</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单商品通过网盘下载：</strong><br>
  <strong class="blue">网盘地址：<?=$row1[wpurl]?><br>网盘密码：<?=$row1[wppwd]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>该订单商品通过网盘下载：</strong><br>
  <strong class="blue">网盘地址：<?=$row2[wpurl]?><br>网盘密码：<?=$row2[wppwd]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单的商品已经传至服务器：</strong><br>
  <a href="../../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="../../user/img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>该订单的商品已经传至服务器：</strong><br>
  <a href="../../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="../../user/img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
 
 <? if(5==$row[fhxs]){?>
 <strong>快递信息：</strong><br>
 <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
 快递公司：<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
 快递单号：<strong><?=$row[kddh]?></strong>
 <? }}?>
 <? }?>


 
 <? }else{?>
 <strong class="red">很抱歉，无法提供该订单的发货信息</strong>
 <? }?>
 </div>
 </div>
 <? }?>
 
 <? if($row[ddzt]=="backerr"){?>
 <div class="orderm box"><div class="d1">退款申请</div><div class="d2">买家于 <?=$row[tksj]?> 申请了退款<br>退款理由：<?=$row[tkly]?></div></div>
 <div class="orderm box"><div class="d1">退款申请回复</div><div class="d2">您于 <?=$row[tkoksj]?> 拒绝了本次退款申请<br>原因：<?=$row[tkjg]?></div></div>
 
 <? }elseif($row[ddzt]=="backsuc"){?>
 <div class="orderm box"><div class="d1">退款申请</div><div class="d2">买家于 <?=$row[tksj]?> 申请了退款<br>退款理由：<?=$row[tkly]?></div></div>
 <div class="orderm box"><div class="d1">退款申请回复</div><div class="d2">您于 <?=$row[tkoksj]?> 同意了本次退款申请<br>回复：<?=$row[tkjg]?></div></div>
 
 <? }?>
 
<div class="orderm box"><div class="d1">买家LINE</div><div class="d2"> <?=returnqq($row[userid])?> </div></div>