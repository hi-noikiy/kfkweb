 <? 
 $au="../product/view".returnproid($row[probh]).".html";
 
  while1("*","yjcode_pro where bh='".$row[probh]."'");
  $row1=mysql_fetch_array($res1);
 
 
 ?>
 <ul class="typeuk1"><li class="l1">��Ʒ��Ϣ</li><li class="l2"><a href="<?=$au?>" target="_blank" class="blue"><strong><?=$row[tit]?></strong></a></li></ul>
 <ul class="typeuk">
 <li class="l1">�������</li><li class="l2"><?=$orderbh?></li>
 <li class="l1">����״̬</li><li class="l2"><?=returnorderzt($row[ddzt])?></li>
 <li class="l1">�µ�ʱ��</li><li class="l2"><?=$row[sj]?></li>
 <li class="l1">�����ܶ�</li><li class="l2 feng"><strong><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><? if(!empty($row[yunfei])){?>(���˷�<?=$row[yunfei]?>Ԫ)<? }?></li>
 <li class="l1">��������</li><li class="l2"><?=$row[num]?></li>
 <? if(!empty($row[tcv])){?>
 <li class="l1">ѡ���ײ�</li><li class="l2"><?=$row[tcv]?></li>
 <? }?>
 </ul>
 
 <? if(!empty($row[liuyan])){?>
 <ul class="typeuk1"><li class="l1">��������</li><li class="l2"><?=$row[liuyan]?></li></ul>
 <? }?>
 

 
 <? if(!empty($row[shdz])){?>
 <ul class="typeuk1"><li class="l1">�ջ���ַ</li><li class="l2"><?=$row[shdz]?></li></ul>
 <? }?>
  
 <? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
 <ul class="typeuk1 typeuk11">
 <li class="l1">�ջ���Ϣ</li>
 <li class="l2 fontyh">
 <? 	if($row1){

 $tcfhxs=0;
 if(!empty($row[tcid])){
  while2("*","yjcode_taocan where id=".$row[tcid]);if($row2=mysql_fetch_array($res2)){$tcfhxs=$row2[fhxs];}
 }
 ?>
 
  <? if(1==$row1[fhxs] && empty($tcfhxs)){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
  <? if(1==$tcfhxs){?><strong class="blue">�ö�������Ʒ�������ֶ�����������ϵ����</strong><? }?>
 
  <? if(2==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row1[wpurl]?>" target="_blank"><?=$row1[wpurl]?></a><br>�������룺<?=$row1[wppwd]?><br>��ѹ���룺<?=$row1[wppwd1]?></strong>
  <? }?>
  <? if(2==$tcfhxs){?>
  <strong>�ö�����Ʒͨ���������أ������������Ϣ���أ�</strong><br>
  <strong class="blue">���̵�ַ��<a href="<?=$row2[wpurl]?>" target="_blank"><?=$row2[wpurl]?></a><br>�������룺<?=$row2[wppwd]?><br>��ѹ���룺<?=$row2[wppwd1]?></strong>
  <? }?>
 
  <? if(3==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row1[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
  <? if(3==$tcfhxs){?>
  <strong>�ö�������Ʒ�Ѿ���������������������ͼ���������</strong><br>
  <a href="../upload/<?=$row1[userid]?>/<?=$row1[bh]?>/<?=$row2[upf]?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.jpg" /></a>
  <? }?>
 
  <? if(4==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>������������Ŀ�����Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
  <? if(4==$tcfhxs){?>
  <strong>������������Ŀ�����Ϣ</strong><br>
  <?=$row[txt]?>
  <? }?>
 
  <? if(5==$row1[fhxs] && empty($tcfhxs)){?>
  <strong>���������Ŀ��������Ϣ��</strong><br>
  <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  ��ݵ��ţ�<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>
  <? if(5==$tcfhxs){?>
  <strong>���������Ŀ��������Ϣ</strong><br>
  <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){?>
  ��ݹ�˾��<a href="<?=$row1[kdweb]?>" target="_blank" class="green"><?=$row1[tit]?></a><br>
  ��ݵ��ţ�<strong><?=$row[kddh]?></strong>
  <? }}?>
  <? }?>


 
 <? }else{?>
 <strong class="red">�ף��ܱ�Ǹ���޷��ṩ�ö����ķ�����Ϣ�����ѱ�����ɾ����������ϵ����</strong>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 
   <?

   while0("*","yjcode_type where   id=".$row1[ty2id]."");if($trow=mysql_fetch_array($res)){
	     $tarray=explode(",",$trow[buyform]); 
	   $tvarray=unserialize($row[buyform]);
	   $i=0;
	  foreach($tarray as $value){ 
	   ?> <ul class="typeuk1">
 <li class="l1"><?=$value?></li><li class="l2"><?=$tvarray[$i]?></li>  </ul>
 <?
 $i++;
  }}?>
 
 <? if($row[ddzt]=="backerr"){?>
 <ul class="typeuk1"><li class="l1">�˿�����</li><li class="l2">���� <?=$row[tksj]?> �������˿�<br>�˿����ɣ�<?=$row[tkly]?></li></ul>
 <ul class="typeuk1"><li class="l1">�˿�����ظ�</li><li class="l2">������ <?=$row[tkoksj]?> �ܾ��˱����˿�����<br>ԭ��<?=$row[tkjg]?></li></ul>
 
 <? }elseif($row[ddzt]=="backsuc"){?>
 <ul class="typeuk1"><li class="l1">�˿�����</li><li class="l2">���� <?=$row[tksj]?> �������˿�<br>�˿����ɣ�<?=$row[tkly]?></li></ul>
 <ul class="typeuk1"><li class="l1">�˿�����ظ�</li><li class="l2">������ <?=$row[tkoksj]?> ͬ���˱����˿�����<br>�ظ���<?=$row[tkjg]?></li></ul>
 
 <? }?>
 
 <ul class="typeuk1"><li class="l1">����QQ</li><li class="l2"><strong> <?=returnqq($row[selluserid])?></strong></li></ul> <ul class="typeuk1"><li class="l1">��ע</li><li class="l2"><strong> <?=$row[yxbz]?></strong></li></ul>