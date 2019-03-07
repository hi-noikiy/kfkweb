<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
sesCheck();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
switch($admin){
 case "1":   //上下架
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."' and userid=".$userid);while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "2":   //删除商品
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while1("bh,userid","yjcode_pro where bh='".$nb[$i]."' and userid=".$userid);
  if($row1=mysql_fetch_array($res1)){delproduct($row1[bh],$row1[userid]);}
 }
 break;	
 case "3":   //删除单人任务
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","yjcode_task where userid=".$userid." and bh='".$nb[$i]."' and taskty=0 and (zt=0 or zt=1 or zt=2 or zt=5 or zt=6 or zt=7 or zt=9 or zt=10)");
 if($row=mysql_fetch_array($res)){
  if(0==$row[zt] || 1==$row[zt]){
   if($row[money4]>0){
   PointIntoM($row[userid],"删除任务，退回订金",$row[money4]);
   PointUpdateM($row[userid],$row[money4]);
   }
  }
  deletetable("yjcode_task where id=".$row[id]);
  deletetable("yjcode_taskhf where bh='".$nb[$i]."'");
  deletetable("yjcode_tasklog where bh='".$nb[$i]."'");
 }
 }
 break;	
 case "3a":   //删除单人接手，没有选中的可以删除
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","yjcode_taskhf where useridhf=".$userid." and bh='".$nb[$i]."' and taskty=0 and ifxz=0");if($row=mysql_fetch_array($res)){
  deletetable("yjcode_taskhf where id=".$row[id]);
 }
 }
 break;	
 case "5":   //删除卡密
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","yjcode_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("yjcode_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "5t":   //删除套餐卡密
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,userid,probh,tcid","yjcode_taocan_kc where userid=".$userid." and id=".$nb[0]);
 if($row=mysql_fetch_array($res)){$pbh=$row[probh];$tcid=$row[tcid];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("yjcode_taocan_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc_tc($pbh,$tcid);
 break;	
 case "6":   //删除卡密
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","yjcode_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("yjcode_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "7":   //更新商品
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){ 
 while1("*","yjcode_pro where userid=".$userid." and bh='".$nb[$i]."'");while($row1=mysql_fetch_array($res1)){
 $sjc=DateDiff($sj,$row1[lastsj],"s");
 if($sjc>300){
 updatetable("yjcode_pro","lastsj='".$sj."' where id=".$row1[id]);
 }
 }
 }
 break;	
 case "8":   //删除商品图片
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","yjcode_tp where userid=".$userid." and id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".str_replace(".","-2.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("yjcode_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "9":   //删除套餐
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","yjcode_taocan where userid=".$userid." and id=".$a[0]);$row=mysql_fetch_array($res);
	if(panduan("*","yjcode_taocan where userid=".$userid." and admin=2 and probh='".$row[probh]."' and zt<>99 and tit='".$row[tit]."'")==1){echo "ERR1";exit;}
	deletetable("yjcode_taocan where userid=".$userid." and id=".$row[id]);
	deletetable("yjcode_taocan_kc where userid=".$userid." and tcid=".$row[id]." and probh='".$row[probh]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("yjcode_taocan where userid=".$userid." and id=".$a[1]);
	deletetable("yjcode_taocan_kc where userid=".$userid." and tcid=".$a[1]);
  }
 }
 break;	
 case "10":   //删除收货地址
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("yjcode_shdz where userid=".$userid." and id=".$nb[$i]);
 }
 break;	
 case "11":   //删除运费模板
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("yjcode_yunfei where id=".$nb[$i]." and userid=".$userid);
 }
 break;	
 case "12":   //删除资讯
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,bh,zt,userid,sj","yjcode_news where bh='".$nb[$i]."' and zt<>0 and userid=".$userid);while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("yjcode_news where id=".$row[id]);
  deletetable("yjcode_tp where type1='资讯' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "13":   //删除评价图片
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","yjcode_tp where userid=".$userid." and id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("yjcode_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "14":   //删除资讯
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 
  deletetable("yjcode_msg where  id=".$nb[$i] ." and userid=".$userid);
  
 }
 
 break;	

}
echo "True";
?>