<?
 global $rowcontrol;
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 //开始执行购买
 $carid=preg_split("/xcf/",$caridarr);
 for($i=0;$i<=count($carid);$i++){
 if($carid[$i]!=""){
  $sqlc="select * from yjcode_car where id=".$carid[$i];mysql_query("SET NAMES 'GBK'");$resc=mysql_query($sqlc);if($rowc=mysql_fetch_array($resc)){
  $sql="select * from yjcode_pro where bh='".$rowc[probh]."' and zt=0 and ifxj=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
  if($row=mysql_fetch_array($res)){
  /////////////////////////////////开始逐一购买
  $orderbh=time().$i.rnd_num(100);
  $allmoney=$rowc[money1]*$rowc[num]+$rowc[yunfei];
  $sqlu="select id,money1,email from yjcode_user where id=".$rowc[userid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);if(!$rowu=mysql_fetch_array($resu)){exit;}
  if($rowu[money1]<$allmoney){exit;}
  intotable("yjcode_order","probh,sj,uip,selluserid,userid,money1,orderbh,num,tit,ddzt,tcv,buyform,tcid,fhxs,shdz,yunfei,liuyan,yxbz","'".$row[bh]."','".$sj."','".$uip."',".$row[userid].",".$rowc[userid].",".$rowc[money1].",'".$orderbh."',".$rowc[num].",'".$row[tit]."','wait','".$rowc[tcv]."','".serialize($buyform)."',".$rowc[tcid].",".$row[fhxs].",'".$rowc[shdz]."',".$rowc[yunfei].",'".$rowc[bz]."','".sqlzhuru($_POST[yxbz])."'");
  PointUpdateM($rowc[userid],$allmoney*(-1));
  PointIntoM($rowc[userid],"购买商品,数量".$rowc[num],$allmoney*(-1));
  updatetable("yjcode_pro","xsnum=xsnum+".$rowc[num]." where id=".$row[id]);
  
  if(empty($rowc[tcid]) || empty($rowc[tcfhxs])){
  $kc=$row[kcnum]-$rowc[num];updatetable("yjcode_pro","kcnum=".$kc." where id=".$row[id]);
  //无套餐或套餐跟随商品自动发货商品B
  if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){
  updatetable("yjcode_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[dbsj]." day"));
  $c_tit="卖家已经发货，款项进入担保阶段，等待买家确认收货";
  intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //卡密B
   if(4==$row[fhxs]){
	$sqla="select * from yjcode_kc where probh='".$row[bh]."' and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."卡号：".$rowa[ka]." 密码：".$rowa[mi]."<br>";
    updatetable("yjcode_kc","ifok=1,sj='".$sj."',uip='".$uip."' where id=".$rowa[id]);
	} 
   }
   //卡密E
  }
  //无套餐或套餐跟随商品自动发货商品E
  }else{
  //有套餐自动发货商品B
  updatetable("yjcode_taocan","kcnum=kcnum-".$pronum[$i]." where id=".$rowc[tcid]);
  if(1!=$tcfhxs){
  updatetable("yjcode_order","fhsj='".$sj."',ddzt='db' where ddzt='wait' and orderbh='".$orderbh."'");
  $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[dbsj]." day"));
  $c_tit="卖家已经发货，款项进入担保阶段，等待买家确认收货";
  intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[userid].",".$rowc[userid].",'".$oksj."','".$row[bh]."','".$c_tit."','".$orderbh."'");
   //卡密B
   if(4==$tcfhxs){
	$sqla="select * from yjcode_taocan_kc where probh='".$row[bh]."' and tcid=".$rowc[tcid]." and ifok=0 and userid=".$row[userid]." order by id asc limit ".$rowc[num];mysql_query("SET NAMES 'GBK'");
	$resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	$txt=$txt."卡号：".$rowa[ka]." 密码：".$rowa[mi]."<br>";
    updatetable("yjcode_taocan_kc","ifok=1,sj='".$sj."',uip='".$uip."' where id=".$rowa[id]);
	} 
   }
   //卡密E
  }
  //有套餐自动发货商品E
  }
  updatetable("yjcode_order","txt='".$txt."' where orderbh='".$orderbh."'");
  
  //写入邮件B
  $sqlm="select id,email,ifemail from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifemail] && !empty($rowm[email])){
   $t="亲，有新订单啦！请尽快登录网站发货，".weburl;
   $sqls="select * from yjcode_smsmail where admin=1 and tyid=1 and fa='".$rowm[email]."'";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   intotable("yjcode_smsmail","admin,fa,tyid,userid,txt,tit","1,'".$rowm[email]."',1,".$row[userid].",'".$t."','您的订单信息'");
   }
  }
  //写入邮件E
  
  //写入短信B
  $sqlm="select id,mot,ifmot from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resm=mysql_query($sqlm);if(!$rowm=mysql_fetch_array($resm)){exit;}
  if(1==$rowm[ifmot] && !empty($rowm[mot])){
   $t="亲，有新订单啦！请尽快登录网站发货，购买商品为：\${tit}";
   $sqls="select * from yjcode_smsmail where admin=2 and tyid=1 and fa='".$rowm[mot]."'";mysql_query("SET NAMES 'GBK'");$ress=mysql_query($sqls);
   if(!$rows=mysql_fetch_array($ress)){
   $dt=sprintf("%.2f",$allmoney);
   intotable("yjcode_smsmail","admin,fa,tyid,userid,txt,tit","2,'".$rowm[mot]."',1,".$row[userid].",'".$t."','".$dt."'");
   }
  }
  //写入短信E

  deletetable("yjcode_car where id=".$rowc[id]);
  //////////////////////////////////结束逐一购买
  }
 }	 
 }
 }
 //结束执行购买
?>