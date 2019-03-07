<?php
require_once "WxPay.Exception.php";
require_once "WxPay.Config.php";
require_once "WxPay.Data.php";

/**
 * 
 * 接口访问类，包含�؀���微信支付API列表�Є封装，类中方法为static方法�?
 * 每个接口���默认超�߶时间�ֽ除提交被�ث支�����10s，上报超�߶时间为1s外，其他均为6s�?
 * @author widyhu
 *
 */
class WxPayApi
{
	/**
	 * 
	 * 统一��ɍ��ѧxPayUnifiedOrder中out_trade_no、body、total_fee、trade_type必填
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayUnifiedOrder $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function unifiedOrder($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_trade_noSet()) {
			throw new WxPayException("缺少统一支付接口必填参数out_trade_no�?);
		}else if(!$inputObj->IsBodySet()){
			throw new WxPayException("缺少统一支付接口必填参数body�?);
		}else if(!$inputObj->IsTotal_feeSet()) {
			throw new WxPayException("缺少统一支付接口必填参数total_fee�?);
		}else if(!$inputObj->IsTrade_typeSet()) {
			throw new WxPayException("缺少统一支付接口必填参数trade_type�?);
		}
		
		//关联参数
		if($inputObj->GetTrade_type() == "JSAPI" && !$inputObj->IsOpenidSet()){
			throw new WxPayException("统一支付接口中，缺少必填参数openid！trade_type为JSAPI�߶，openid为必填参数！");
		}
		if($inputObj->GetTrade_type() == "NATIVE" && !$inputObj->IsProduct_idSet()){
			throw new WxPayException("统一支付接口中，缺少必填参数product_id！trade_type为JSAPI�߶，product_id为必填参数！");
		}
		
		//异步�͚知url���设置，则使用配置文件中�Єurl
		if(!$inputObj->IsNotify_urlSet()){
			$inputObj->SetNotify_url(WxPayConfig::NOTIFY_URL);//异步�͚知url
		}
		
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetSpbill_create_ip($_SERVER['REMOTE_ADDR']);//终端ip	  
		//$inputObj->SetSpbill_create_ip("1.1.1.1");  	    
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		//�о名
		$inputObj->SetSign();
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 
	 * �ҥ询订单�ѧxPayOrderQuery中out_trade_no、transaction_id���少填一�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayOrderQuery $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function orderQuery($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/orderquery";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_trade_noSet() && !$inputObj->IsTransaction_idSet()) {
			throw new WxPayException("订单�ҥ询接口中，out_trade_no、transaction_id���少填一个！");
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 
	 * 关闭订单�ѧxPayCloseOrder中out_trade_no必填
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayCloseOrder $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function closeOrder($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/closeorder";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_trade_noSet()) {
			throw new WxPayException("订单�ҥ询接口中，out_trade_no必填�?);
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}

	/**
	 * 
	 * 申请�̀款，WxPayRefund中out_trade_no、transaction_id���少填一个且
	 * out_refund_no、total_fee、refund_fee、op_user_id为必填参�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayRefund $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function refund($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/secapi/pay/refund";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_trade_noSet() && !$inputObj->IsTransaction_idSet()) {
			throw new WxPayException("�̀款��请接口中，out_trade_no、transaction_id���少填一个！");
		}else if(!$inputObj->IsOut_refund_noSet()){
			throw new WxPayException("�̀款��请接口中，缺少必填参数out_refund_no�?);
		}else if(!$inputObj->IsTotal_feeSet()){
			throw new WxPayException("�̀款��请接口中，缺少必填参数total_fee�?);
		}else if(!$inputObj->IsRefund_feeSet()){
			throw new WxPayException("�̀款��请接口中，缺少必填参数refund_fee�?);
		}else if(!$inputObj->IsOp_user_idSet()){
			throw new WxPayException("�̀款��请接口中，缺少必填参数op_user_id�?);
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, true, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 
	 * �ҥ询�̀�?
	 * 提交�̀款��请后，�뵱���ݔ�该接口查询退款状�䲢��退款有一�벻��߶，
	 * 用零�Ա支付的�̀�?0分钟内到账，�ж行卡支付的�̀�?个工佲ח�后��新查询退款状�䲢�?
	 * WxPayRefundQuery中out_refund_no、out_trade_no、transaction_id、refund_id�ƛ个参数必填一�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayRefundQuery $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function refundQuery($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/refundquery";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_refund_noSet() &&
			!$inputObj->IsOut_trade_noSet() &&
			!$inputObj->IsTransaction_idSet() &&
			!$inputObj->IsRefund_idSet()) {
			throw new WxPayException("�̀款查询接口中，out_refund_no、out_trade_no、transaction_id、refund_id�ƛ个参数必填一个！");
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 下载对账单，WxPayDownloadBill中bill_date为必填参�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayDownloadBill $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function downloadBill($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/downloadbill";
		//检��ɿ�填参�?
		if(!$inputObj->IsBill_dateSet()) {
			throw new WxPayException("对账单接口中，缺少必填参�Ӹill_date�?);
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		if(substr($response, 0 , 5) == "<xml>"){
			return "";
		}
		return $response;
	}
	
	/**
	 * 提交被扫支付API
	 * 收银������用扫���设头ѯ�取微信用户刷卡授��ݠ�以后，二维码或�����信息传�́�߿商户收银台，
	 * 由商户收�ж台或者商户后台调用该接口发起支付�?
	 * WxPayWxPayMicroPay中body、out_trade_no、total_fee、auth_code参数必填
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayWxPayMicroPay $inputObj
	 * @param int $timeOut
	 */
	public static function micropay($inputObj, $timeOut = 10)
	{
		$url = "https://api.mch.weixin.qq.com/pay/micropay";
		//检��ɿ�填参�?
		if(!$inputObj->IsBodySet()) {
			throw new WxPayException("提交被扫支付API接口中，缺少必填参数body�?);
		} else if(!$inputObj->IsOut_trade_noSet()) {
			throw new WxPayException("提交被扫支付API接口中，缺少必填参数out_trade_no�?);
		} else if(!$inputObj->IsTotal_feeSet()) {
			throw new WxPayException("提交被扫支付API接口中，缺少必填参数total_fee�?);
		} else if(!$inputObj->IsAuth_codeSet()) {
			throw new WxPayException("提交被扫支付API接口中，缺少必填参数auth_code�?);
		}
		
		$inputObj->SetSpbill_create_ip($_SERVER['REMOTE_ADDR']);//终端ip
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 
	 * 撤���订单API接口�ѧxPayReverse中参数out_trade_no和transaction_id必须填写一�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayReverse $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 */
	public static function reverse($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/secapi/pay/reverse";
		//检��ɿ�填参�?
		if(!$inputObj->IsOut_trade_noSet() && !$inputObj->IsTransaction_idSet()) {
			throw new WxPayException("撤���订单API接口中，参数out_trade_no和transaction_id必须填写一个！");
		}
		
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, true, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
	/**
	 * 
	 * 测速上报，该方法内部封装在report中，使用�߶请注意异常流程
	 * WxPayReport中interface_url、return_code、result_code、user_ip、execute_time_必填
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayReport $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function report($inputObj, $timeOut = 1)
	{
		$url = "https://api.mch.weixin.qq.com/payitil/report";
		//检��ɿ�填参�?
		if(!$inputObj->IsInterface_urlSet()) {
			throw new WxPayException("接口URL，缺少必填参数interface_url�?);
		} if(!$inputObj->IsReturn_codeSet()) {
			throw new WxPayException("返回�Ӷ态码，缺少必填参数return_code�?);
		} if(!$inputObj->IsResult_codeSet()) {
			throw new WxPayException("�벊�结果，缺少必填参数result_code�?);
		} if(!$inputObj->IsUser_ipSet()) {
			throw new WxPayException("访问接口IP，缺少必填参数user_ip�?);
		} if(!$inputObj->IsExecute_time_Set()) {
			throw new WxPayException("接口Կ�时，缺少必填参数execute_time_�?);
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetUser_ip($_SERVER['REMOTE_ADDR']);//终端ip
		$inputObj->SetTime(date("YmdHis"));//商户上报�߶间	 
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		return $response;
	}
	
	/**
	 * 
	 * 生成二维���规�?模��一生成支付二维��?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayBizPayUrl $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function bizpayurl($inputObj, $timeOut = 6)
	{
		if(!$inputObj->IsProduct_idSet()){
			throw new WxPayException("生成二维���，缺少必填参数product_id�?);
		}
		
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetTime_stamp(time());//�߶间�? 
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		
		return $inputObj->GetValues();
	}
	
	/**
	 * 
	 * 转换短链�?
	 * 该接口主要用于扫����ʦ生支付模式一中的二维���链接转成短�о接(weixin://wxpay/s/XXXXXX)�?
	 * 减小二维���数据量，提升扫描速度和精确度�?
	 * appid、mchid、spbill_create_ip、nonce_str不需要填�?
	 * @param WxPayShortUrl $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功�߶返�ƞ，其他抛���?
	 */
	public static function shorturl($inputObj, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/tools/shorturl";
		//检��ɿ�填参�?
		if(!$inputObj->IsLong_urlSet()) {
			throw new WxPayException("需要转换的URL，签�᫔�ա�串，传�̢��URL encode�?);
		}
		$inputObj->SetAppid(WxPayConfig::APPID);//公众账��ID
		$inputObj->SetMch_id(WxPayConfig::MCHID);//商户�?
		$inputObj->SetNonce_str(self::getNonceStr());//随机字符�?
		
		$inputObj->SetSign();//�о名
		$xml = $inputObj->ToXml();
		
		$startTimeStamp = self::getMillisecond();//请求开始时�?
		$response = self::postXmlCurl($xml, $url, false, $timeOut);
		$result = WxPayResults::Init($response);
		self::reportCostTime($url, $startTimeStamp, $result);//上报请求花费�߶间
		
		return $result;
	}
	
 	/**
 	 * 
 	 * 支付结果�͚用�͚知
 	 * @param function $callback
 	 * 直接�ƞ调函数使用方法: notify(you_function);
 	 * �ƞ调类成���뇽数方�?notify(array($this, you_function));
 	 * $callback  ա�型为�ϸfunction function_name($data){}
 	 */
	public static function notify($callback, &$msg)
	{
		//�Ƿ取�͚知�Є数�?
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
		//如果返回成功则验证签�?
		try {
			$result = WxPayResults::Init($xml);
		} catch (WxPayException $e){
			$msg = $e->errorMessage();
			return false;
		}
		
		return call_user_func($callback, $result);
	}
	
	/**
	 * 
	 * 产生随机字符串，不����?2�?
	 * @param int $length
	 * @return 产生�Є随���字符串
	 */
	public static function getNonceStr($length = 32) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
		$str ="";
		for ( $i = 0; $i < $length; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 
		return $str;
	}
	
	/**
	 * 直接��쇺xml
	 * @param string $xml
	 */
	public static function replyNotify($xml)
	{
		echo $xml;
	}
	
	/**
	 * 
	 * 上报数据�?上报�Є时��顰�屏蔽�؀�����常流�?
	 * @param string $usrl
	 * @param int $startTimeStamp
	 * @param array $data
	 */
	private static function reportCostTime($url, $startTimeStamp, $data)
	{
		//如果不需要上报数�?
		if(WxPayConfig::REPORT_LEVENL == 0){
			return;
		} 
		//如果仅失败上�?
		if(WxPayConfig::REPORT_LEVENL == 1 &&
			 array_key_exists("return_code", $data) &&
			 $data["return_code"] == "SUCCESS" &&
			 array_key_exists("result_code", $data) &&
			 $data["result_code"] == "SUCCESS")
		 {
		 	return;
		 }
		 
		//上报�ͻ辑
		$endTimeStamp = self::getMillisecond();
		$objInput = new WxPayReport();
		$objInput->SetInterface_url($url);
		$objInput->SetExecute_time_($endTimeStamp - $startTimeStamp);
		//返回�Ӷ态码
		if(array_key_exists("return_code", $data)){
			$objInput->SetReturn_code($data["return_code"]);
		}
		//返回信息
		if(array_key_exists("return_msg", $data)){
			$objInput->SetReturn_msg($data["return_msg"]);
		}
		//�벊�结果
		if(array_key_exists("result_code", $data)){
			$objInput->SetResult_code($data["result_code"]);
		}
		//���ﯯ代码
		if(array_key_exists("err_code", $data)){
			$objInput->SetErr_code($data["err_code"]);
		}
		//���ﯯ代码描述
		if(array_key_exists("err_code_des", $data)){
			$objInput->SetErr_code_des($data["err_code_des"]);
		}
		//商户订单�?
		if(array_key_exists("out_trade_no", $data)){
			$objInput->SetOut_trade_no($data["out_trade_no"]);
		}
		//设备�?
		if(array_key_exists("device_info", $data)){
			$objInput->SetDevice_info($data["device_info"]);
		}
		
		try{
			self::report($objInput);
		} catch (WxPayException $e){
			//不做任何处理
		}
	}

	/**
	 * 以post方��提交xml到对��욄接口url
	 * 
	 * @param string $xml  需要post��ɲml数据
	 * @param string $url  url
	 * @param bool $useCert 是否需要证书，默认不需�?
	 * @param int $second   url�ا行超时�߶间，默�?0s
	 * @throws WxPayException
	 */
	private static function postXmlCurl($xml, $url, $useCert = false, $second = 30)
	{		
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		
		//如果���配置代��ؿ�里就设置代理
		if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0" 
			&& WxPayConfig::CURL_PROXY_PORT != 0){
			curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST);
			curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT);
		}
		curl_setopt($ch,CURLOPT_URL, $url);
		//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,TRUE);
		//curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);//严格�ݡ验
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);//严格�ݡ验2

		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕�?
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
		if($useCert == true){
			//设置证书
			//使用证书：cert �?key 分别属于两个.pem文件
			curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLCERT, WxPayConfig::SSLCERT_PATH);
			curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLKEY, WxPayConfig::SSLKEY_PATH);
		}
		//post提交方��
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//运行curl
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		} else { 
			$error = curl_errno($ch);
			curl_close($ch);
			throw new WxPayException("curl出错，错误码:$error");
		}
	}
	
	/**
	 * �Ƿ取毫秒级别�Є时间戳
	 */
	private static function getMillisecond()
	{
		//�Ƿ取毫秒�Є时间戳
		$time = explode ( " ", microtime () );
		$time = $time[1] . ($time[0] * 1000);
		$time2 = explode( ".", $time );
		$time = $time2[0];
		return $time;
	}
}

