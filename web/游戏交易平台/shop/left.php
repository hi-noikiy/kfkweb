 <div class="left">
 <ul class="u1">
 <li class="l1"><img src="<?=returntppd("../upload/".$rowuser[id]."/shop.jpg","../img/none180x180.gif")?>" width="178" height="178" /></li>
 </ul>
 <ul class="u2">
 <li class="l1">�ͷ�����</li>
 <li class="l2">
 <?=$rowuser[shopname]?><br>
 <? if(!empty($rowuser[uqq])){?>
 <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=gloweb?>&menu=yes" target="_blank"><img src="../img/qq5.gif" border="0" /> <?=$rowuser[uqq]?></a>
 <? }?>
 </li>
 <li class="l3">�ͷ��绰��<?=$rowuser[mot]?></li>
 </ul>
 <ul class="u3">
 <li class="l1">��Ʒ������</li>
 <? 
 while1("*","yjcode_pro where userid=".$uid." and zt=0 and ifxj=0 order by xsnum desc limit 4");while($row1=mysql_fetch_array($res1)){
 $au="../product/view".$row1[id].".html";
 $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
 ?>
 <li class="l2">
  <span class="s1"><a href="<?=$au?>" target="_blank"><img border="0" title="<?=$row1[tit]?>"  src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="60" height="60" /></a></span>
  <span class="s2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,13)?></a><br><span class="feng"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><br>�۳�<?=$row1[xsnum]?>��</span>
 </li>
 <? }?>
 </ul>
 <ul class="u4">
 <li class="l1">��������</li>
 <li class="l2">
 �������<strong><?=$rowuser[djl]?></strong>��<br>
 �ղ�����<strong><?=returncount("yjcode_shopfav where shopid=".$uid)?></strong>��<br>
 </li>
 </ul>
 </div>