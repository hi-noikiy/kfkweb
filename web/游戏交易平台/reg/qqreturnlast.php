<?
require_once("../config/qq/API/qqConnectAPI.php");
include("../config/conn.php");
include("../config/function.php");
$qc = new QC();
$acs = $qc->qq_callback();
$openid = $qc->get_openid();
if($_SESSION[TZPCWAP]=="wap"){$nlj="m/";}

//表示已登录开始 进行绑定
if(!empty($_SESSION["SHOPUSER"])){
 if(panduan("uid,openid,ifqq","yjcode_user where openid='".$openid."' and ifqq=1")==1){Audit_alert("绑定失败，该LINE已经绑定过其他帐号","../".$nlj."user/");}
 updatetable("yjcode_user","openid='',ifqq=0 where openid='".$openid."'");
 updatetable("yjcode_user","openid='".$openid."',ifqq=1 where uid='".$_SESSION[SHOPUSER]."'");	
 php_toheader("../".$nlj."user/");
}
//表示已登录结束 进行绑定

//表示未登录开始
while0("uid,openid","yjcode_user where openid='".$openid."'");if($row=mysql_fetch_array($res)){ //表示该LINE已经被绑定
 $_SESSION["SHOPUSER"]=$row[uid];
 php_toheader("../".$nlj."user/");
 exit;
}

//修改该文件，要同步修改下reg/reg.php、reg/qqreturnlast.php 

$qc = new QC($acs,$openid);
$arr = $qc->get_user_info();
$nc=iconv('UTF-8', 'GB2312',$arr["nickname"]);
$bh=time();
$uid="qq".$bh.rnd_num(300);
$pwd=sha1("123456");
$email=$uid."@qq.com";
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];

$shopzt=0;if($rowcontrol["ifsell"]=="on"){$shopzt=2;}
if(empty($_COOKIE['tjuserid'])){$tu=0;}else{$tu=$_COOKIE['tjuserid'];}
intotable("yjcode_user","uid,pwd,sj,uip,money1,baomoney,jf,nc,ifmot,ifemail,yxsj,openid,ifqq,djl,pm,zt,openshop,shopzt,sellmall,sellmyue,tjuserid,sellbl,sfzrz","'".$uid."','".$pwd."','".$sj."','".$uip."',0,0,0,'".$nc."',0,0,'2014-10-15','".$openid."',1,0,0,1,0,".$shopzt.",0,0,".$tu.",".$rowcontrol[sellbl].",3");$id=mysql_insert_id();
if(!empty($rowcontrol[regmoney]) && $rowcontrol[regmoney]>0){PointIntoM($id,"注册会员赠送",$rowcontrol[regmoney]);PointUpdateM($id,$rowcontrol[regmoney]);}
if(!empty($rowcontrol[regjf]) && $rowcontrol[regjf]>0){PointInto($id,"注册会员赠送积分",$rowcontrol[regjf]);PointUpdate($id,$rowcontrol[regjf]);}
createDir("../upload/".$id."/");
$_SESSION["SHOPUSER"]=$uid;
intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$id.",'".$sj."','".$uip."'");

php_toheader("../".$nlj."user/");

//表示未登录结束
?>