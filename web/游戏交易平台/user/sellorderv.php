 <? 
 $au="../product/view".returnproid($row[probh]).".html";
 ?>
 <ul class="typeuk1"><li class="l1">商品信息</li><li class="l2"><a href="<?=$au?>" target="_blank" class="blue"><strong><?=$row[tit]?></strong></a></li></ul>
 <ul class="typeuk">
 <li class="l1">订单总额</li><li class="l2 feng"><strong><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><? if(!empty($row[yunfei])){?>(含运费<?=$row[yunfei]?>元)<? }?></li>
 <li class="l1">购买数量</li><li class="l2"><?=$row[num]?></li>
 <? if(!empty($row[tcv])){?>
 <li class="l1">选购套餐</li><li class="l2"><?=$row[tcv]?></li>
 <? }?>
 <li class="l1">订单编号</li><li class="l2"><?=$orderbh?></li>
 <li class="l1">下单时间</li><li class="l2"><?=$row[sj]?></li>
 <li class="l1">订单状态</li><li class="l2"><?=returnorderzt($row[ddzt])?></li>
 <? if($row[ddzt]=="backsuc"){?>
 <li class="l1">退款申请时间</li><li class="l2"><?=$row[tksj]?></li>
 <li class="l1">退款理由</li><li class="l2"><?=$row[tkly]?></li>
 <li class="l1">退款回复内容</li><li class="l2"><?=$row[tkjg]?></li>
 <li class="l1">退款处理时间</li><li class="l2"><?=$row[tkoksj]?></li>
 <? }?>
 </ul>
 
 <? if(!empty($row[liuyan])){?>
 <ul class="typeuk1"><li class="l1">买家留言</li><li class="l2"><?=$row[liuyan]?></li></ul>
 <? }?>
 
 <? if(!empty($row[buyform])){?>
 <ul class="typeuk1"><li class="l1">购买信息</li><li class="l2"><?=$row[buyform]?></li></ul>
 <? }?>
 
 <? if(!empty($row[shdz])){?>
 <ul class="typeuk1"><li class="l1">收货地址</li><li class="l2"><?=$row[shdz]?></li></ul>
 <? }?>
  
 <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
 <ul class="typeuk1 typeuk11">
 <li class="l1">收货信息</li>
 <li class="l2 fontyh">
 <? 
 while1("*","yjcode_pro where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){
 $tcfhxs=0;
 if(!empty($row[tcid])){
  while2("*","yjcode_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
 }
 ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">手动发货</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">手动发货</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单商品通过网盘下载：</strong><br>
  <strong class="blue">网盘地址：<a href="<?=$row1[wpurl]?>" target="_blank"><?=$row1[wpurl]?></a><br>网盘密码：<?=$row1[wppwd]?><br>解压密码：<?=$row1[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>该订单商品通过网盘下载：</strong><br>
  <strong class="blue">网盘地址：<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>网盘密码：<?=$row2[wppwd]?><br>解压密码：<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>该订单的商品已经传至服务器</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>该订单的商品已经传至服务器</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>以下是本次卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>以下是本次卡密信息</strong><br>
  <?=$row[txt]?>
  <? }?>
 
  <? if(5==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>以下是快递物流信息：</strong><br>
  <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  快递公司：<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  快递单号：<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
  <? if(5==$tcfhxs){?>
  <strong>以下是快递物流信息</strong><br>
  <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  快递公司：<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  快递单号：<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>


 
 <? }else{?>
 <strong class="red">无法提供该订单的发货信息（商品信息或已被卖家删除）</strong>
 <? }?>
 </li>
 </ul>
 <? }?>

 <? $qq=returnqq($row[userid]);?>
 <ul class="typeuk1"><li class="l1">买家信息</li><li class="l2"><strong><?=returnnc($row[userid])?><br>   (QQ:<?=$qq?>)</strong></li></ul>