   <input type="hidden" name="add2" id="add2" value="0" />
   <input type="hidden" name="add3" id="add3" value="0" />
   <select name="area1" id="area1" onchange="area1cha()">
   <option value="0">«Î—°‘Ò</option>
   <? while3("*","yjcode_city where level=1 order by xh asc");while($row3=mysql_fetch_array($res3)){?>
   <option value="<?=$row3[bh]?>"<? if($ifarea=="yes"){if($row3[bh]==$add1){?> selected="selected"<? }}?>><?=$row3[name1]?></option>
   <? }?>
   </select>
   <iframe name="farea2" id="farea2" marginwidth="1" scrolling="no" marginheight="1" width="100%" height="60" border="0" frameborder="0" src="../tem/area2.php?area1id=0"></iframe>
   <? if($ifarea=="yes"){?>
   <script language="javascript">
   farea2.location="../tem/area2.php?area1id=<?=$add1?>&area2id=<?=$add2?>&area3id=<?=$add3?>";	
   </script>
   <? }?>