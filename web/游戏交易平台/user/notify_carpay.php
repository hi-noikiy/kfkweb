<?php
require("../config/conn.php");
include("../config/function.php");
require_once("alipay.config.php");
$alipay_config['cacert']    = getcwd().'\\cacert.pem';
require_once("lib/alipay_notify.class.php");

//����ó�֪ͨ��֤���
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//��֤�ɹ�




	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//������������̻���ҵ���߼������

	
	//�������������ҵ���߼�����д�������´�������ο�������
	
    //��ȡ֧������֪ͨ���ز������ɲο������ĵ��з������첽֪ͨ�����б�
	
	//�̻�������

	$out_trade_no = $_POST['out_trade_no'];

	//֧�������׺�

	$trade_no = $_POST['trade_no'];

	//����״̬
	$trade_status = $_POST['trade_status'];
    switch($trade_status){
	  case "WAIT_BUYER_PAY";
	  $nddzt="�ȴ���Ҹ���";
	  break;
	  case "TRADE_FINISHED":
	  case "WAIT_SELLER_SEND_GOODS":
	  case "WAIT_BUYER_CONFIRM_GOODS":
	  case "TRADE_SUCCESS";
	  $nddzt="���׳ɹ�"; 
	  break;
      }


$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$dingdanbh=preg_split("/\|/",$out_trade_no);

if(empty($trade_no)){echo "success";exit;}
$sql="select ifok,jyh from yjcode_dingdang where ifok=1 and jyh='".$trade_no."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if($row=mysql_fetch_array($res)){echo "success";exit;}

while1("*","yjcode_dingdang where ddbh='".$out_trade_no."' and ifok=0 and userid=".$dingdanbh[1]);if($row1=mysql_fetch_array($res1)){
 if($trade_status=="TRADE_SUCCESS" || $trade_status=="TRADE_FINISHED"){
  updatetable("yjcode_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='".$trade_status."',ddzt='".$nddzt."',ifok=1,jyh='".$trade_no."' where id=".$row1[id]);
  $money1=$row1["money1"];
  PointIntoM($row1[userid],"֧������ֵ".$money1."Ԫ",$money1);
  PointUpdateM($row1[userid],$money1);
  $caridarr=$row1[carid];
  include("buy.php"); 
  echo "success";exit;
 }
}
  
}
?>