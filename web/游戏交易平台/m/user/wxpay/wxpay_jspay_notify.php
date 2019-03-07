<?php
include("../../../config/conn.php");
include("../../../config/function.php");





$lib_path	= dirname(__FILE__)."/";
require_once $lib_path."WxPay.Config.php";
require_once $lib_path."WxPay.Api.php";
require_once $lib_path."WxPay.Notify.php";
require_once $lib_path."WxPay.JsApiPay.php";
require_once $lib_path."log.php";



class PayNotifyCallBack extends WxPayNotify
{
	public  $data;
	//��ѯ����
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			
			
			return true;
		}
		return false;
	}
	
	//��д�ص�������
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		
		$this->data = $data;
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "�����������ȷ";
			return false;
		}
		//��ѯ�������ж϶�����ʵ��
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "������ѯʧ��";
			return false;
		}

		return true;
	}
}



require_once "wxconfig.php";


WxPayConfig::set_appid( $payment['wxpay_jspay_appid'] );
WxPayConfig::set_appsecret( $payment['wxpay_jspay_appsecret']);	

WxPayConfig::set_mchid( $payment['wxpay_jspay_mchid'] );
WxPayConfig::set_key( $payment['wxpay_jspay_key'] );






		$logHandler= new CLogFileHandler($lib_path."logs/".date('Y-m-d').'.log');
		$log = Log::Init($logHandler, 15);
		
		Log::DEBUG("begin notify");
		$notify = new PayNotifyCallBack( );
		$notify->Handle(true);
		
		$data = $notify->data;
		
		//�ж�ǩ��
			if ($data['result_code'] == 'SUCCESS') {
				
					$transaction_id = $data['transaction_id'];
				 // ��ȡlog_id
                    $out_trade_no	= $data['out_trade_no'];

						
					$sj=date("Y-m-d H:i:s");
					$uip=$_SERVER["REMOTE_ADDR"];
					$sql="select * from yjcode_dingdang where wxddbh='".$data['out_trade_no']."' and ifok=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
					if($row=mysql_fetch_array($res)){
						updatetable("yjcode_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='TRADE_SUCCESS',ddzt='���׳ɹ�',ifok=1 where wxddbh='".$data['out_trade_no']."'");
						$money1=$row["money1"];
						PointIntoM($row[userid],"΢���ֻ�����".$money1."Ԫ",$money1);
						PointUpdateM($row[userid],$money1);
						$caridarr=$row[carid];
						include("../../../user/buy.php"); 
					}	
	
					
					exit();
			}else{
				 //echo 'fail';
				exit();
			}


?>