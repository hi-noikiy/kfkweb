<?php
/*
2014年起，友价团队全部源码不再做加密处理，全部开源，方便用户二次开发。
同时我们仅对正规渠道购买的用户提供技术支持。
另：如果源码购买后有转卖行为，我们即删除你的认证帐号，同时也不再提供任何支持。
www.yj99.cn
友价源码
*/
require("return1.php");
function panduan($pzd,$ptable){
 global $conn;
 $sqlpd="select ".$pzd." from ".$ptable;mysql_query("SET NAMES 'GBK'");$respd=mysql_query($sqlpd,$conn);
 if($rowpd=mysql_fetch_array($respd)){return 1;}else{return 0;}
}

function returnxh($tabxh,$sesxh=""){
$sqlxh="select * from ".$tabxh." where id<>0 ".$sesxh." order by xh desc";mysql_query("SET NAMES 'GBK'");$resxh=mysql_query($sqlxh);
if($rowxh=mysql_fetch_array($resxh)){$nxh=$rowxh[xh]+1;}else{$nxh=1;}
return $nxh;
}

function returncount($ctable){
 global $conn;
 $sqlcount="select count(*) as id from ".$ctable;
 mysql_query("SET NAMES 'GBK'");$rescount=mysql_query($sqlcount,$conn);$rowcount=mysql_fetch_array($rescount);return $rowcount[id];
}

function returnsum($zd,$t){
$sqlb="select sum(".$zd.") as allzd from ".$t;mysql_query("SET NAMES 'GBK'");$resb=mysql_query($sqlb);$rowb=mysql_fetch_array($resb);
if(empty($rowb[allzd])){return "0";}else{return $rowb[allzd];}
}

function returnhelptype($tv,$tid){
$sqltype="select * from yjcode_helptype where id=".$tid."";mysql_query("SET NAMES 'GBK'");$restype=mysql_query($sqltype);
$rowtype=mysql_fetch_array($restype);
if($tv==1){return $rowtype[name1];}else{return $rowtype[name2];}
}

function returnnewstype($tyid,$wv){
 global $res3;
 if($tyid==1){while3("id,name1","yjcode_newstype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}}
 if($tyid==2){while3("id,name2","yjcode_newstype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name2];}else{return "";}}
}

function returntasktype($tv,$tid){
if(empty($tid)){return "";}
$sqltype="select * from yjcode_tasktype where id=".$tid."";mysql_query("SET NAMES 'GBK'");$restype=mysql_query($sqltype);
$rowtype=mysql_fetch_array($restype);
if($tv==1){return $rowtype[name1];}else{return $rowtype[name2];}
}

function returntype($jbid,$aid){
if(empty($aid)){$aid=0;}
$sqlp="select * from yjcode_type where id=".$aid;mysql_query("SET NAMES 'GBK'");$resp=mysql_query($sqlp);
 if($rowp=mysql_fetch_array($resp)){
  if($jbid==1){return $rowp[type1];}	
  elseif($jbid==2){return $rowp[type2];}	
  elseif($jbid==3){return $rowp[type3];}	
  elseif($jbid==4){return $rowp[type4];}	
  elseif($jbid==5){return $rowp[type5];}	
 }else{return "";}
}

function returnuserid($u){
if(empty($u)){return 0;}else{
$sqlother="select id,uid from yjcode_user where uid='".$u."'";mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
if($rowother=mysql_fetch_array($resother)){return $rowother[id];}else{return 0;}
}
}

function returnadmin($u){
$sqlother="select id,adminuid from yjcode_admin where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
if($rowother=mysql_fetch_array($resother)){return $rowother[adminuid];}else{return "";}
}

function returnsellbl($u,$pbh){
global $rowcontrol;
$sbl=0;
$sqlother="select id,sellbl from yjcode_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);$rowother=mysql_fetch_array($resother);
 if(!empty($rowother[sellbl])){$sbl=$rowother[sellbl];}else{
  $sqlt1="select bh,ty1id from yjcode_pro where bh='".$pbh."'";mysql_query("SET NAMES 'GBK'");$rest1=mysql_query($sqlt1);
  if($rowt1=mysql_fetch_array($rest1)){
   $sqlt2="select id,sellbl from yjcode_type where id=".$rowt1[ty1id];mysql_query("SET NAMES 'GBK'");$rest2=mysql_query($sqlt2);
   if($rowt2=mysql_fetch_array($rest2)){
    if(!empty($rowt2[sellbl])){$sbl=$rowt2[sellbl];}
   }
  }
 }
if(!empty($sbl)){return $sbl;}else{return $rowcontrol[sellbl];}
}

function returnuser($uid){
if(empty($uid)){return "";}
$sqlother="select id,uid from yjcode_user where id=".$uid;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[uid];
}

function returnemail($uid){
global $conn;
if(empty($uid)){return "";}
$sqlother="select uid,email from yjcode_user where uid='".$uid."'";mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother,$conn);
if($rowother=mysql_fetch_array($resother)){return $rowother[email];}else{return "";}
}

function returnqq($u){
$sqlother="select id,uqq from yjcode_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[uqq];
}

function returntjuserid($u){
$sqlother="select id,tjuserid from yjcode_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
if(empty($rowother[tjuserid])){$v=0;}else{$v=$rowother[tjuserid];}
return $v;
}

function returnnc($u){
$sqlother="select id,nc from yjcode_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[nc];
}

function returnproid($b){
$sqlother="select id,bh from yjcode_pro where bh='".$b."'";mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[id];
}

function returnxy($u,$t){ //1卖家 2买家
if(1==$t){$sqlxy="select count(*) as id from yjcode_order where selluserid=".$u." and ddzt='suc'";}
elseif(2==$t){$sqlxy="select count(*) as id from yjcode_order where userid=".$u." and ddzt='suc'";}
mysql_query("SET NAMES 'GBK'");$resxy=mysql_query($sqlxy);
$rowxy=mysql_fetch_array($resxy);
return $rowxy[id];
}

function adwhile($adbh,$adnum=0,$w=0,$h=0){
autoAD($adbh);
$li="";
if($adnum!=0){$li=" limit ".$adnum;}
$sqlad="select * from yjcode_ad where zt=0 and adbh='".$adbh."' order by xh asc".$li;
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
while($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "<div class=\"ad1\">$rowad[txt]</div>";
break;
case "图片":
$s="";
if($w!=0){$s=" width=\"".$w."px;\"";}
if($h!=0){$s=$s." height=\"".$h."px;\"";}
echo "<div class=\"ad1\"><a href=\"".$rowad[aurl]."\" target=_blank><img alt=\"".$rowad[tit]."\"".$s." border=0 src=".weburl."gg/".$rowad[bh].".".$rowad[jpggif]."></a></div>";
break;
case "文字":
echo "<div class=\"ad1\">·<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[utit]."</a></div>";
break;
case "动画":
echo "<div class=\"ad1\"><embed src=\"".weburl."/gg/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}

function adread($adbh,$w,$h){
autoAD($adbh);
$sqlad="select * from yjcode_ad where zt=0 and adbh='".$adbh."'";
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
if($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "$rowad[txt]";
break;
case "图片":
if($h==0 || $w==0){
echo "<a href=\"".$rowad[aurl]."\" target=_blank><img border=0 src=".weburl."gg/".$rowad[bh].".".$rowad[jpggif]."></a>";
}else{
echo "<a href=$rowad[aurl] target=_blank><img border=0 src=".weburl."gg/$rowad[bh].$rowad[jpggif] width=$w height=$h></a>";
}
break;
case "文字":
echo "<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[tit]."</a>";
break;
case "动画":
echo "<div class=\"ad\"><embed src=\"".weburl."gg/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}

function adreadID($adid,$w,$h){
$sqlad="select * from yjcode_ad where zt=0 and id=".$adid;
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
if($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "$rowad[txt]";
break;
case "图片":
if($h==0 || $w==0){
echo "<a href=\"".$rowad[aurl]."\" target=_blank><img border=0 src=".weburl."gg/".$rowad[bh].".".$rowad[jpggif]."></a>";
}else{
echo "<a href=$rowad[aurl] target=_blank><img border=0 src=".weburl."gg/$rowad[bh].$rowad[jpggif] width=$w height=$h></a>";
}
break;
case "文字":
echo "·<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[utit]."</a>";
break;
case "动画":
echo "<div class=\"ad\"><embed src=\"".weburl."gg/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}

function returntp($tsql,$a=""){$sqltp="select * from yjcode_tp where ".$tsql;mysql_query("SET NAMES 'GBK'");$restp=mysql_query($sqltp);if($rowtp=mysql_fetch_array($restp)){$t=preg_split("/\./",$rowtp[tp]);return $t[0].$a.".".$t[1];}else{return "";}}

function returnuserdj($u){
 $fdj="";
 $sqld="select * from yjcode_userdj where zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resd=mysql_query($sqld);
 if($rowd=mysql_fetch_array($resd)){$fdj=$rowd[name1];}else{$fdj="";}

 $sqlu="select * from yjcode_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
 if(empty($rowu[userdj])){
 $ldj=$fdj;
 }else{
 $ldj=$rowu[userdj];
 }
 
 if(!empty($rowu[userdjdq])){
  $sj1=date("Y-m-d H:i:s");
  if($rowu[userdjdq]<$sj1){$ldj=$fdj;$dq=date('Y-m-d H:i:s',strtotime ("-10 second",strtotime($sj1)));updatetable("yjcode_user","userdj='".$fdj."',userdjdq=NULL where id=".$u);}
 }
 
 return $ldj;
 
}


function returnarea($abh){
if(0==$abh){return "";}else{
$sqlarea="select bh,name1 from yjcode_city where bh='".$abh."'";mysql_query("SET NAMES 'GBK'");$resarea=mysql_query($sqlarea);
$rowarea=mysql_fetch_array($resarea);
return $rowarea[name1];
}
}

function returnyunfei($a1,$a2,$a3,$u){
 $s="|".$a1.",".$a2.",".$a3."|";
 $sqlyf="select * from yjcode_yunfei where cityid like '%".$s."%' and userid=".$u." order by money1 asc";mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);
 if($rowyf=mysql_fetch_array($resyf)){return $rowyf[money1];}

 $s="|".$a1.",".$a2.",0|";
 $sqlyf="select * from yjcode_yunfei where cityid like '%".$s."%' and userid=".$u." order by money1 asc";mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);
 if($rowyf=mysql_fetch_array($resyf)){return $rowyf[money1];}

 $s="|".$a1.",0,0|";
 $sqlyf="select * from yjcode_yunfei where cityid like '%".$s."%' and userid=".$u." order by money1 asc";mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);
 if($rowyf=mysql_fetch_array($resyf)){return $rowyf[money1];}

 $s="|0,0,0|";
 $sqlyf="select * from yjcode_yunfei where cityid like '%".$s."%' and userid=".$u." order by money1 asc";mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);
 if($rowyf=mysql_fetch_array($resyf)){return $rowyf[money1];}
 
 return 0;
}

function returntjmoney($pbh){
 global $rowcontrol;
 $tjmv=0;
 $sqlt1="select bh,ty1id from yjcode_pro where bh='".$pbh."'";mysql_query("SET NAMES 'GBK'");$rest1=mysql_query($sqlt1);
 if($rowt1=mysql_fetch_array($rest1)){
  $sqlt2="select id,tjmoney from yjcode_type where id=".$rowt1[ty1id];mysql_query("SET NAMES 'GBK'");$rest2=mysql_query($sqlt2);
  if($rowt2=mysql_fetch_array($rest2)){
   if(!empty($rowt2[tjmoney])){$tjmv=$rowt2[tjmoney];}
  }
 }
 if(!empty($tjmv)){return $tjmv;}else{return $rowcontrol[tjmoney];}
}
?>