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
 case "1":   //���¼�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."' and userid=".$userid);while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "2":   //ɾ����Ʒ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while1("bh,userid","yjcode_pro where bh='".$nb[$i]."' and userid=".$userid);
  if($row1=mysql_fetch_array($res1)){delproduct($row1[bh],$row1[userid]);}
 }
 break;	
 case "3":   //ɾ����������
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","yjcode_task where userid=".$userid." and bh='".$nb[$i]."' and taskty=0 and (zt=0 or zt=1 or zt=2 or zt=5 or zt=6 or zt=7 or zt=9 or zt=10)");
 if($row=mysql_fetch_array($res)){
  if(0==$row[zt] || 1==$row[zt]){
   if($row[money4]>0){
   PointIntoM($row[userid],"ɾ�������˻ض���",$row[money4]);
   PointUpdateM($row[userid],$row[money4]);
   }
  }
  deletetable("yjcode_task where id=".$row[id]);
  deletetable("yjcode_taskhf where bh='".$nb[$i]."'");
  deletetable("yjcode_tasklog where bh='".$nb[$i]."'");
 }
 }
 break;	
 case "3a":   //ɾ�����˽��֣�û��ѡ�еĿ���ɾ��
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 while0("*","yjcode_taskhf where useridhf=".$userid." and bh='".$nb[$i]."' and taskty=0 and ifxz=0");if($row=mysql_fetch_array($res)){
  deletetable("yjcode_taskhf where id=".$row[id]);
 }
 }
 break;	
 case "5":   //ɾ������
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","yjcode_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("yjcode_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "5t":   //ɾ���ײͿ���
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
 case "6":   //ɾ������
 $nb=preg_split("/,/",$bhid);
 $pbh="";
 if(!empty($nb[0])){while0("id,probh,userid","yjcode_kc where userid=".$userid." and id=".$nb[0]);if($row=mysql_fetch_array($res)){$pbh=$row[probh];}}
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("yjcode_kc where userid=".$userid." and id=".$nb[$i]);
 }
 kamikc($pbh);
 break;	
 case "7":   //������Ʒ
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
 case "8":   //ɾ����ƷͼƬ
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
 case "9":   //ɾ���ײ�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","yjcode_taocan where userid=".$userid." and id=".$a[0]);$row=mysql_fetch_array($res);
	if(panduan("*","yjcode_taocan where userid=".$userid." and admin=2 and probh='".$row[probh]."' and zt<>99 and tit='".$row[tit]."'")==1){echo "ERR1";exit;}
	deletetable("yjcode_taocan where userid=".$userid." and id=".$row[id]);
	deletetable("yjcode_taocan_kc where userid=".$userid." and tcid=".$row[id]." and probh='".$row[probh]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("yjcode_taocan where userid=".$userid." and id=".$a[1]);
	deletetable("yjcode_taocan_kc where userid=".$userid." and tcid=".$a[1]);
  }
 }
 break;	
 case "10":   //ɾ���ջ���ַ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("yjcode_shdz where userid=".$userid." and id=".$nb[$i]);
 }
 break;	
 case "11":   //ɾ���˷�ģ��
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("yjcode_yunfei where id=".$nb[$i]." and userid=".$userid);
 }
 break;	
 case "12":   //ɾ����Ѷ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,bh,zt,userid,sj","yjcode_news where bh='".$nb[$i]."' and zt<>0 and userid=".$userid);while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("yjcode_news where id=".$row[id]);
  deletetable("yjcode_tp where type1='��Ѷ' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "13":   //ɾ������ͼƬ
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
 case "14":   //ɾ����Ѷ
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 
  deletetable("yjcode_msg where  id=".$nb[$i] ." and userid=".$userid);
  
 }
 
 break;	

}
echo "True";
?>