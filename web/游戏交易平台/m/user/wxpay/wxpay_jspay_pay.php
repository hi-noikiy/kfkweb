<?php
include("../../../config/conn.php");
include("../../../config/function.php");
sesCheck_m();

$sj=date("Y-m-d H:i:s");
$userid=returnuserid($_SESSION["SHOPUSER"]);
$bh=time()."pay".$userid;
$uip=$_SERVER["REMOTE_ADDR"];
$ddbh=time()."wx".$userid;	
$money1=sqlzhuru($_POST[t1]);
$_SESSION[wxddbh]=time()."wx".$userid."wx".rnd_num(1000);
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok,wxddbh","'".$bh."','".$ddbh."',".$userid.",'".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','΢�ų�ֵ',0,'".$_SESSION[wxddbh]."'");




$lib_path	= dirname(__FILE__)."/";
require_once $lib_path."WxPay.Config.php";
require_once $lib_path."WxPay.Api.php";
require_once $lib_path."WxPay.Notify.php";
require_once $lib_path."WxPay.JsApiPay.php";
require_once $lib_path."log.php";


require_once "wxconfig.php";


WxPayConfig::set_appid( $payment['wxpay_jspay_appid'] );
WxPayConfig::set_appsecret( $payment['wxpay_jspay_appsecret']);	

WxPayConfig::set_mchid( $payment['wxpay_jspay_mchid'] );
WxPayConfig::set_key( $payment['wxpay_jspay_key'] );





	if ( empty($_SESSION['wxpay_jspay_openid'])  ){
		
		if( empty($payment)  ){
			return false;
		}

		$tools = new JsApiPay();
		$openid = $tools->GetOpenid();
		$_SESSION['wxpay_jspay_openid'] = $openid;
	}


		
		
		$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\'����΢�ſͻ��˴�����\')">΢�Ű�ȫ֧��</button></div>';

		// ��ҳ��Ȩ��ȡ�û�openid
        if (! isset($_SESSION['wxpay_jspay_openid']) || empty($_SESSION['wxpay_jspay_openid'])) {
			echo $html;
           exit();
        }
		$openId = $_SESSION['wxpay_jspay_openid'];
		
		
		while1("*","yjcode_dingdang where wxddbh='".$_SESSION[wxddbh]."'");$row1=mysql_fetch_array($res1);$moneyv=$row1['money1']*100;
		

		$root_url = weburl;
		//$root_url = str_replace('mobile/', '', $root_url);
		$notify_url = $root_url.'m/user/wxpay/wxpay_jspay_pay_notify.php';



		
		$out_trade_no = $_SESSION['wxddbh'];


//var_dump($notify_url);

//iconv("GB2312","UTF-8//IGNORE",webname."��Ʒ����")
		//ͳһ�µ�
		$tools = new JsApiPay();
		$input = new WxPayUnifiedOrder();
		$input->SetBody(  $out_trade_no );
		$input->SetAttach( $out_trade_no );		//�̻�֧����־
		$input->SetOut_trade_no( $out_trade_no );		//�̻������� 
		$input->SetTotal_fee(  $moneyv ); //�ܽ��
		$input->SetTime_start(date("YmdHis"));
		//$input->SetTime_expire(date("YmdHis", time() + 600));
		//$input->SetGoods_tag("test");
		$input->SetNotify_url( $notify_url );	//֪ͨ��ַ 
		$input->SetTrade_type("JSAPI");	//��������
		$input->SetProduct_id( $out_trade_no );


		$input->SetOpenid($openId);
		$wxpay_order = WxPayApi::unifiedOrder($input);
		

		if ( $wxpay_order['return_code'] != 'FALL' ){
			$jsApiParameters = $tools->GetJsApiParameters($wxpay_order);
		
			$error = '';
			if ( strpos($jsApiParameters, 'error:') === 0 ){
				$error = str_replace('error:', '', $jsApiParameters);
				$jsApiParameters = '{}';
			}
		}else{
			$error = $wxpay_order['return_msg'];
		}
		
		
		$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\'����΢�ſͻ��˴�����\')">΢�Ű�ȫ֧��</button></div>';
        if( empty($error) )
        {
			$js = '<script type="text/javascript">
				function jsApiCall()
				{
					WeixinJSBridge.invoke(
						"getBrandWCPayRequest",
						'.$jsApiParameters.',
						function(res){
							//WeixinJSBridge.log(res.err_msg);
							if(res.err_msg == "get_brand_wcpay_request:ok"){
								//alert(res.err_code+res.err_desc+res.err_msg);
								window.location.href = "'. weburl .'m/user/paylog.php";
								//window.location.replace("'. $root_url .'");
							}else{
								//������ת����������ҳ��
								alert(֧��ʧ��);
								window.location.href = "./index.php";
							}
						}
					);
				}
				function callpay()
				{
					if (typeof WeixinJSBridge == "undefined"){
						if( document.addEventListener ){
							document.addEventListener("WeixinJSBridgeReady", jsApiCall, false);
						}else if (document.attachEvent){
							document.attachEvent("WeixinJSBridgeReady", jsApiCall); 
							document.attachEvent("onWeixinJSBridgeReady", jsApiCall);
						}
					}else{
						jsApiCall();
					}
				}
				callpay()
				</script>';
			$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="callpay()">΢�Ű�ȫ֧��</button></div>'.$js;
        }else{
			$html = '<div style="text-align:center"><button class="btn btn-primary c-btn3" type="button" onclick="javascript:alert(\''. $error .'\')">΢�Ű�ȫ֧��</button></div>';
		}
        
        echo  $html;
	
exit;
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

?>