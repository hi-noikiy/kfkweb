<?
$carid=$_GET[carid];
 $ty2id=0;
if($carid==""){php_toheader("car.php");}
$c=preg_split("/c/",$carid);
$needmoney=0;
$caridarr="";
for($i=0;$i<count($c);$i++){
 if($c[$i]!=""){
 $d=preg_split("/-/",$c[$i]);
 $id=$d[0];
 $caridarr=$caridarr.$id."xcf";
 $num=intval($d[1]);
 if($num<=0){Audit_alert("错误，购买数量不得少于1，返回重试","car.php");}
 
 while0("*","yjcode_car where userid=".$rowuser[id]." and id=".$id."");if(!$row=mysql_fetch_array($res)){php_toheader("car.php");}
 
 while1("*","yjcode_pro where bh='".$row[probh]."' and zt=0 and ifxj=0");if(!$row1=mysql_fetch_array($res1)){Audit_alert("商品已下架或未审核","car.php");}
 $ty2id=$row1[ty2id];
 $money=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $kcnum=$row1[kcnum];
 
 if(empty($row[tcid])){$zm=$money;$tcv="";$tcfhxs=99;}
 else{
  while2("*","yjcode_taocan where id=".$row[tcid]);if(!$row2=mysql_fetch_array($res2)){Audit_alert("套餐已下架，请联系客服","car.php");}
  $zm=$row2[money1];
  $tcfhxs=$row2[fhxs];
  if(!empty($row2[fhxs])){$kcnum=$row2[kcnum];}
  if($row2[admin]==2){$tcv=$row2[tit2];}else{$tcv=$row2[tit];}
 }

 if($kcnum<$num){Audit_alert("库存不够了","car.php");}
 
 if(!empty($row1[ifuserdj])){
  $sqlu2="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resu2=mysql_query($sqlu2);$rowu2=mysql_fetch_array($resu2);
  if(!empty($rowu2[userdj])){$s=" and name1='".$rowu2[userdj]."'";$djname=$rowu2[userdj];}else{$s="";$djname="";}
  $sqlu4="select * from yjcode_prouserdj where probh='".$row[probh]."' and djname='".$djname."'";mysql_query("SET NAMES 'GBK'");$resu4=mysql_query($sqlu4);
  if($rowu4=mysql_fetch_array($resu4)){
  $zm=$zm*($rowu4[zhi]/10);
  }else{
   $sqlu3="select * from yjcode_userdj where zt=0".$s." order by xh asc limit 1";mysql_query("SET NAMES 'GBK'");$resu3=mysql_query($sqlu3);
   if($rowu3=mysql_fetch_array($resu3)){
   $zm=$zm*($rowu3[zhekou]/10);
   } 
  }
 }
 
 $yf=0;
 if(!empty($row[shdzid]) && $row1[fhxs]==5){
 $sqlu1="select * from yjcode_shdz where id=".$row[shdzid];mysql_query("SET NAMES 'GBK'");$resu1=mysql_query($sqlu1);if($rowu1=mysql_fetch_array($resu1)){
 $yf=returnyunfei($rowu1[add1],$rowu1[add2],$rowu1[add3],$row1[userid]);
 $shdz=$rowu1[lxr]."(".$rowu1[mot].") ".$rowu1[add1v].$rowu1[add2v].$rowu1[add3v].$rowu1[addr]." 邮编:".$rowu1[yb];
 }
 }
 $needmoney=$needmoney+$zm*$num+$yf;

 updatetable("yjcode_car","num=".$num.",money1=".$zm.",tcv='".$tcv."',shdz='".$shdz."',yunfei=".$yf.",tcfhxs=".$tcfhxs." where id=".$id);
 
 }
}

$usermoney=$rowuser[money1];
?>