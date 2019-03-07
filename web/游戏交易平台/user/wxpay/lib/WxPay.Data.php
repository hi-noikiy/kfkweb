<?php
/**
* 2015-06-29 修复�о名问题
**/
require_once "WxPay.Config.php";
require_once "WxPay.Exception.php";

/**
 * 
 * 数据对象基础类，该类中定义数据类���基本�Є行为，包括�?
 * 计算/设置/�Ƿ取�о名、输出xml�ݼ���Є参数、从xml读取数据对象��?
 * @author widyhu
 *
 */
class WxPayDataBase
{
	protected $values = array();
	
	/**
	* 设置�о名，详见签�᫔�成算�?
	* @param string $value 
	**/
	public function SetSign()
	{
		$sign = $this->MakeSign();
		$this->values['sign'] = $sign;
		return $sign;
	}
	
	/**
	* �Ƿ取�о名，详见签�᫔�成算泿�����?
	* @return ��?
	**/
	public function GetSign()
	{
		return $this->values['sign'];
	}
	
	/**
	* 判断�о名，详见签�᫔�成算法是否存�?
	* @return true �?false
	**/
	public function IsSignSet()
	{
		return array_key_exists('sign', $this->values);
	}

	/**
	 * ��쇺xml字符
	 * @throws WxPayException
	**/
	public function ToXml()
	{
		if(!is_array($this->values) 
			|| count($this->values) <= 0)
		{
    		throw new WxPayException("数组数据异常�?);
    	}
    	
    	$xml = "<xml>";
    	foreach ($this->values as $key=>$val)
    	{
    		if (is_numeric($val)){
    			$xml.="<".$key.">".$val."</".$key.">";
    		}else{
    			$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
    		}
        }
        $xml.="</xml>";
        return $xml; 
	}
	
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	public function FromXml($xml)
	{	
		if(!$xml){
			throw new WxPayException("xml数据异常�?);
		}
        //将XML转为array
        //禁止弿���外部xml实体
        //libxml_disable_entity_loader(true);
        $this->values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
		return $this->values;
	}
	
	/**
	 * �ݼ��化参数格式化戳�rl参数
	 */
	public function ToUrlParams()
	{
		$buff = "";
		foreach ($this->values as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
	
	/**
	 * 生成�о名
	 * @return �о名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法��ɀ?
	 */
	public function MakeSign()
	{
		//�о名步骤一：按字典序排序参�?
		ksort($this->values);
		$string = $this->ToUrlParams();
		//�о名步骤二�ϸ在string后加入KEY
		$string = $string . "&key=".WxPayConfig::KEY;
		//�о名步骤三�ϸMD5�ɠ密
		$string = md5($string);
		//�о名步骤�ƛ�ϸ�؀���字符转为大�?
		$result = strtoupper($string);
		return $result;
	}
	
	/**
	 * �Ƿ取设置�Є�?
	 */
	public function GetValues()
	{
		return $this->values;
	}
}

/**
 * 
 * 接口��ݔ�结果�?
 * @author widyhu
 *
 */
class WxPayResults extends WxPayDataBase
{
	/**
	 * 
	 * 检测签�?
	 */
	public function CheckSign()
	{
		//fix异常
		if(!$this->IsSignSet()){
			throw new WxPayException("�о名���ﯯ�?);
		}
		
		$sign = $this->MakeSign();
		if($this->GetSign() == $sign){
			return true;
		}
		throw new WxPayException("�о名���ﯯ�?);
	}
	
	/**
	 * 
	 * 使用数组初始�?
	 * @param array $array
	 */
	public function FromArray($array)
	{
		$this->values = $array;
	}
	
	/**
	 * 
	 * 使用数组初始化对�?
	 * @param array $array
	 * @param 是否检测签�?$noCheckSign
	 */
	public static function InitFromArray($array, $noCheckSign = false)
	{
		$obj = new self();
		$obj->FromArray($array);
		if($noCheckSign == false){
			$obj->CheckSign();
		}
        return $obj;
	}
	
	/**
	 * 
	 * 设置参数
	 * @param string $key
	 * @param string $value
	 */
	public function SetData($key, $value)
	{
		$this->values[$key] = $value;
	}
	
    /**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	public static function Init($xml)
	{	
		$obj = new self();
		$obj->FromXml($xml);
		//fix bug 2015-06-29
		if($obj->values['return_code'] != 'SUCCESS'){
			 return $obj->GetValues();
		}
		$obj->CheckSign();
        return $obj->GetValues();
	}
}

/**
 * 
 * �ƞ调基础�?
 * @author widyhu
 *
 */
class WxPayNotifyReply extends  WxPayDataBase
{
	/**
	 * 
	 * 设置���ﯯ��?FAIL 或�?SUCCESS
	 * @param string
	 */
	public function SetReturn_code($return_code)
	{
		$this->values['return_code'] = $return_code;
	}
	
	/**
	 * 
	 * �Ƿ取���ﯯ��?FAIL 或�?SUCCESS
	 * @return string $return_code
	 */
	public function GetReturn_code()
	{
		return $this->values['return_code'];
	}

	/**
	 * 
	 * 设置���ﯯ信息
	 * @param string $return_code
	 */
	public function SetReturn_msg($return_msg)
	{
		$this->values['return_msg'] = $return_msg;
	}
	
	/**
	 * 
	 * �Ƿ取���ﯯ信息
	 * @return string
	 */
	public function GetReturn_msg()
	{
		return $this->values['return_msg'];
	}
	
	/**
	 * 
	 * 设置返回参数
	 * @param string $key
	 * @param string $value
	 */
	public function SetData($key, $value)
	{
		$this->values[$key] = $value;
	}
}

/**
 * 
 * 统一��ɍ���셥对象
 * @author widyhu
 *
 */
class WxPayUnifiedOrder extends WxPayDataBase
{	
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信支付分配�Є终端设备��，商户自��⹉
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є终端设备��，商户自��⹉�Є�?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断微信支付分配�Є终端设备��，商户自��⹉是否��뜨
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
	* 设置商品或支��덕简要描�?
	* @param string $value 
	**/
	public function SetBody($value)
	{
		$this->values['body'] = $value;
	}
	/**
	* �Ƿ取商品或支��덕简要描述的��?
	* @return ��?
	**/
	public function GetBody()
	{
		return $this->values['body'];
	}
	/**
	* 判断商品或支��덕简要描述是否存�?
	* @return true �?false
	**/
	public function IsBodySet()
	{
		return array_key_exists('body', $this->values);
	}


	/**
	* 设置商品�᫧�明细列表
	* @param string $value 
	**/
	public function SetDetail($value)
	{
		$this->values['detail'] = $value;
	}
	/**
	* �Ƿ取商品�᫧�明细列表�Є�?
	* @return ��?
	**/
	public function GetDetail()
	{
		return $this->values['detail'];
	}
	/**
	* 判断商品�᫧�明细列表是否��뜨
	* @return true �?false
	**/
	public function IsDetailSet()
	{
		return array_key_exists('detail', $this->values);
	}


	/**
	* 设置附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数�?
	* @param string $value 
	**/
	public function SetAttach($value)
	{
		$this->values['attach'] = $value;
	}
	/**
	* �Ƿ取附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数据的��?
	* @return ��?
	**/
	public function GetAttach()
	{
		return $this->values['attach'];
	}
	/**
	* 判断附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数据是否存�?
	* @return true �?false
	**/
	public function IsAttachSet()
	{
		return array_key_exists('attach', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单���Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类�?
	* @param string $value 
	**/
	public function SetFee_type($value)
	{
		$this->values['fee_type'] = $value;
	}
	/**
	* �Ƿ取符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型的��?
	* @return ��?
	**/
	public function GetFee_type()
	{
		return $this->values['fee_type'];
	}
	/**
	* 判断符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型是否存�?
	* @return true �?false
	**/
	public function IsFee_typeSet()
	{
		return array_key_exists('fee_type', $this->values);
	}


	/**
	* 设置订单��金额，只能为整数，详见支付金额
	* @param string $value 
	**/
	public function SetTotal_fee($value)
	{
		$this->values['total_fee'] = $value;
	}
	/**
	* �Ƿ取订单��金额，只能为整数，详见支付金额�Є�?
	* @return ��?
	**/
	public function GetTotal_fee()
	{
		return $this->values['total_fee'];
	}
	/**
	* 判断订单��金额，只能为整数，详见支付金额是否��뜨
	* @return true �?false
	**/
	public function IsTotal_feeSet()
	{
		return array_key_exists('total_fee', $this->values);
	}


	/**
	* 设置APP和网页支付提交用户端ip，Native支付填调用微信支付API�Є机器IP�?
	* @param string $value 
	**/
	public function SetSpbill_create_ip($value)
	{
		$this->values['spbill_create_ip'] = $value;
	}
	/**
	* �Ƿ取APP和网页支付提交用户端ip，Native支付填调用微信支付API�Є机器IP。的��?
	* @return ��?
	**/
	public function GetSpbill_create_ip()
	{
		return $this->values['spbill_create_ip'];
	}
	/**
	* 判断APP和网页支付提交用户端ip，Native支付填调用微信支付API�Є机器IP。是否存�?
	* @return true �?false
	**/
	public function IsSpbill_create_ipSet()
	{
		return array_key_exists('spbill_create_ip', $this->values);
	}


	/**
	* 设置订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。其他详见时间规�?
	* @param string $value 
	**/
	public function SetTime_start($value)
	{
		$this->values['time_start'] = $value;
	}
	/**
	* �Ƿ取订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。其他详见时间规则的��?
	* @return ��?
	**/
	public function GetTime_start()
	{
		return $this->values['time_start'];
	}
	/**
	* 判断订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。其他详见时间规则是否存�?
	* @return true �?false
	**/
	public function IsTime_startSet()
	{
		return array_key_exists('time_start', $this->values);
	}


	/**
	* 设置订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规�?
	* @param string $value 
	**/
	public function SetTime_expire($value)
	{
		$this->values['time_expire'] = $value;
	}
	/**
	* �Ƿ取订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规则的��?
	* @return ��?
	**/
	public function GetTime_expire()
	{
		return $this->values['time_expire'];
	}
	/**
	* 判断订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规则是否存�?
	* @return true �?false
	**/
	public function IsTime_expireSet()
	{
		return array_key_exists('time_expire', $this->values);
	}


	/**
	* 设置商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优�?
	* @param string $value 
	**/
	public function SetGoods_tag($value)
	{
		$this->values['goods_tag'] = $value;
	}
	/**
	* �Ƿ取商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优惠的��?
	* @return ��?
	**/
	public function GetGoods_tag()
	{
		return $this->values['goods_tag'];
	}
	/**
	* 判断商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优惠是否存�?
	* @return true �?false
	**/
	public function IsGoods_tagSet()
	{
		return array_key_exists('goods_tag', $this->values);
	}


	/**
	* 设置接收微信支付异步�͚知�ƞ调地址
	* @param string $value 
	**/
	public function SetNotify_url($value)
	{
		$this->values['notify_url'] = $value;
	}
	/**
	* �Ƿ取接收微信支付异步�͚知�ƞ调地址�Є�?
	* @return ��?
	**/
	public function GetNotify_url()
	{
		return $this->values['notify_url'];
	}
	/**
	* 判断接收微信支付异步�͚知�ƞ调地址是否��뜨
	* @return true �?false
	**/
	public function IsNotify_urlSet()
	{
		return array_key_exists('notify_url', $this->values);
	}


	/**
	* 设置取值如下�ϸJSAPI，NATIVE，APP，详��د�明见参数规定
	* @param string $value 
	**/
	public function SetTrade_type($value)
	{
		$this->values['trade_type'] = $value;
	}
	/**
	* �Ƿ取取值如下�ϸJSAPI，NATIVE，APP，详��د�明见参数规定�Є�?
	* @return ��?
	**/
	public function GetTrade_type()
	{
		return $this->values['trade_type'];
	}
	/**
	* 判断取值如下�ϸJSAPI，NATIVE，APP，详��د�明见参数规定是否��뜨
	* @return true �?false
	**/
	public function IsTrade_typeSet()
	{
		return array_key_exists('trade_type', $this->values);
	}


	/**
	* 设置trade_type=NATIVE，此参数必传。此id为二维码中包含的商品ID，商户自行定义�?
	* @param string $value 
	**/
	public function SetProduct_id($value)
	{
		$this->values['product_id'] = $value;
	}
	/**
	* �Ƿ取trade_type=NATIVE，此参数必传。此id为二维码中包含的商品ID，商户自行定义。的��?
	* @return ��?
	**/
	public function GetProduct_id()
	{
		return $this->values['product_id'];
	}
	/**
	* 判断trade_type=NATIVE，此参数必传。此id为二维码中包含的商品ID，商户自行定义。是否存�?
	* @return true �?false
	**/
	public function IsProduct_idSet()
	{
		return array_key_exists('product_id', $this->values);
	}


	/**
	* 设置trade_type=JSAPI，此参数必传，用户在商户appid下的唯一�ݴѯ�〱���单前需要调用【网页授权获取用户信息】接口获取到用户�ЄOpenid�?
	* @param string $value 
	**/
	public function SetOpenid($value)
	{
		$this->values['openid'] = $value;
	}
	/**
	* �Ƿ取trade_type=JSAPI，此参数必传，用户在商户appid下的唯一�ݴѯ�〱���单前需要调用【网页授权获取用户信息】接口获取到用户�ЄOpenid�?�Є�?
	* @return ��?
	**/
	public function GetOpenid()
	{
		return $this->values['openid'];
	}
	/**
	* 判断trade_type=JSAPI，此参数必传，用户在商户appid下的唯一�ݴѯ�〱���单前需要调用【网页授权获取用户信息】接口获取到用户�ЄOpenid�?是否��뜨
	* @return true �?false
	**/
	public function IsOpenidSet()
	{
		return array_key_exists('openid', $this->values);
	}
}

/**
 * 
 * 订单�ҥ询��셥对象
 * @author widyhu
 *
 */
class WxPayOrderQuery extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信�Є订单��，优先使�?
	* @param string $value 
	**/
	public function SetTransaction_id($value)
	{
		$this->values['transaction_id'] = $value;
	}
	/**
	* �Ƿ取微信�Є订单��，优先使用的��?
	* @return ��?
	**/
	public function GetTransaction_id()
	{
		return $this->values['transaction_id'];
	}
	/**
	* 判断微信�Є订单��，优先使用是否存�?
	* @return true �?false
	**/
	public function IsTransaction_idSet()
	{
		return array_key_exists('transaction_id', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��，当没提供transaction_id�߶需要传这个�?
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��，当没提供transaction_id�߶需要传这个。的��?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��，当没提供transaction_id�߶需要传这个。是否存�?
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
}

/**
 * 
 * 关闭订单��셥对象
 * @author widyhu
 *
 */
class WxPayCloseOrder extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单���Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单���Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
}

/**
 * 
 * 提交�̀款输入对�?
 * @author widyhu
 *
 */
class WxPayRefund extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信支付分配�Є终端设备��，与��ɍ�一��?
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є终端设备��，与��ɍ�一���的��?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断微信支付分配�Є终端设备��，与��ɍ�一���是否存�?
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
	* 设置微信订单�?
	* @param string $value 
	**/
	public function SetTransaction_id($value)
	{
		$this->values['transaction_id'] = $value;
	}
	/**
	* �Ƿ取微信订单号的��?
	* @return ��?
	**/
	public function GetTransaction_id()
	{
		return $this->values['transaction_id'];
	}
	/**
	* 判断微信订单号是否存�?
	* @return true �?false
	**/
	public function IsTransaction_idSet()
	{
		return array_key_exists('transaction_id', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no�Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置商户系统内部�Є退款单号，商户系统内部唯一，同一�̀款单号多次请求只�̀一�?
	* @param string $value 
	**/
	public function SetOut_refund_no($value)
	{
		$this->values['out_refund_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є退款单号，商户系统内部唯一，同一�̀款单号多次请求只�̀一��욄��?
	* @return ��?
	**/
	public function GetOut_refund_no()
	{
		return $this->values['out_refund_no'];
	}
	/**
	* 判断商户系统内部�Є退款单号，商户系统内部唯一，同一�̀款单号多次请求只�̀一笔是否存�?
	* @return true �?false
	**/
	public function IsOut_refund_noSet()
	{
		return array_key_exists('out_refund_no', $this->values);
	}


	/**
	* 设置订单��金额，单位为分，只能为整数，详见支付金�?
	* @param string $value 
	**/
	public function SetTotal_fee($value)
	{
		$this->values['total_fee'] = $value;
	}
	/**
	* �Ƿ取订单��金额，单位为分，只能为整数，详见支付金额的��?
	* @return ��?
	**/
	public function GetTotal_fee()
	{
		return $this->values['total_fee'];
	}
	/**
	* 判断订单��金额，单位为分，只能为整数，详见支付金额是否存�?
	* @return true �?false
	**/
	public function IsTotal_feeSet()
	{
		return array_key_exists('total_fee', $this->values);
	}


	/**
	* 设置�̀款总金额，订单��金额，单位为分，只能为整数，详见支付金�?
	* @param string $value 
	**/
	public function SetRefund_fee($value)
	{
		$this->values['refund_fee'] = $value;
	}
	/**
	* �Ƿ取�̀款总金额，订单��金额，单位为分，只能为整数，详见支付金额的��?
	* @return ��?
	**/
	public function GetRefund_fee()
	{
		return $this->values['refund_fee'];
	}
	/**
	* 判断�̀款总金额，订单��金额，单位为分，只能为整数，详见支付金额是否存�?
	* @return true �?false
	**/
	public function IsRefund_feeSet()
	{
		return array_key_exists('refund_fee', $this->values);
	}


	/**
	* 设置货币类型，符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类�?
	* @param string $value 
	**/
	public function SetRefund_fee_type($value)
	{
		$this->values['refund_fee_type'] = $value;
	}
	/**
	* �Ƿ取货币类型，符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型的��?
	* @return ��?
	**/
	public function GetRefund_fee_type()
	{
		return $this->values['refund_fee_type'];
	}
	/**
	* 判断货币类型，符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型是否存�?
	* @return true �?false
	**/
	public function IsRefund_fee_typeSet()
	{
		return array_key_exists('refund_fee_type', $this->values);
	}


	/**
	* 设置�ո�����븐�? 默认为商户��
	* @param string $value 
	**/
	public function SetOp_user_id($value)
	{
		$this->values['op_user_id'] = $value;
	}
	/**
	* �Ƿ取�ո�����븐�? 默认为商户���Є�?
	* @return ��?
	**/
	public function GetOp_user_id()
	{
		return $this->values['op_user_id'];
	}
	/**
	* 判断�ո�����븐�? 默认为商户��是否��뜨
	* @return true �?false
	**/
	public function IsOp_user_idSet()
	{
		return array_key_exists('op_user_id', $this->values);
	}
}

/**
 * 
 * �̀款查询输入对�?
 * @author widyhu
 *
 */
class WxPayRefundQuery extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信支付分配�Є终端设备��
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є终端设备���Є�?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断微信支付分配�Є终端设备��是否��뜨
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
	* 设置微信订单�?
	* @param string $value 
	**/
	public function SetTransaction_id($value)
	{
		$this->values['transaction_id'] = $value;
	}
	/**
	* �Ƿ取微信订单号的��?
	* @return ��?
	**/
	public function GetTransaction_id()
	{
		return $this->values['transaction_id'];
	}
	/**
	* 判断微信订单号是否存�?
	* @return true �?false
	**/
	public function IsTransaction_idSet()
	{
		return array_key_exists('transaction_id', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单���Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置商户�̀款单�?
	* @param string $value 
	**/
	public function SetOut_refund_no($value)
	{
		$this->values['out_refund_no'] = $value;
	}
	/**
	* �Ƿ取商户�̀款单号的��?
	* @return ��?
	**/
	public function GetOut_refund_no()
	{
		return $this->values['out_refund_no'];
	}
	/**
	* 判断商户�̀款单号是否存�?
	* @return true �?false
	**/
	public function IsOut_refund_noSet()
	{
		return array_key_exists('out_refund_no', $this->values);
	}


	/**
	* 设置微信�̀款单号refund_id、out_refund_no、out_trade_no、transaction_id�ƛ个参数必填一个，如果同时��뜨��녈级为：refund_id>out_refund_no>transaction_id>out_trade_no
	* @param string $value 
	**/
	public function SetRefund_id($value)
	{
		$this->values['refund_id'] = $value;
	}
	/**
	* �Ƿ取微信�̀款单号refund_id、out_refund_no、out_trade_no、transaction_id�ƛ个参数必填一个，如果同时��뜨��녈级为：refund_id>out_refund_no>transaction_id>out_trade_no�Є�?
	* @return ��?
	**/
	public function GetRefund_id()
	{
		return $this->values['refund_id'];
	}
	/**
	* 判断微信�̀款单号refund_id、out_refund_no、out_trade_no、transaction_id�ƛ个参数必填一个，如果同时��뜨��녈级为：refund_id>out_refund_no>transaction_id>out_trade_no是否��뜨
	* @return true �?false
	**/
	public function IsRefund_idSet()
	{
		return array_key_exists('refund_id', $this->values);
	}
}

/**
 * 
 * 下载对账单输入对�?
 * @author widyhu
 *
 */
class WxPayDownloadBill extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信支付分配�Є终端设备��，填写此字段，只下载该设备���Є对账单
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є终端设备��，填写此字段，只下载该设备���Є对账单�Є�?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断微信支付分配�Є终端设备��，填写此字段，只下载该设备���Є对账单是否��뜨
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
	* 设置下载对账卿����ߥ期，格式�ϸ20140603
	* @param string $value 
	**/
	public function SetBill_date($value)
	{
		$this->values['bill_date'] = $value;
	}
	/**
	* �Ƿ取下载对账卿����ߥ期，格式�ϸ20140603�Є�?
	* @return ��?
	**/
	public function GetBill_date()
	{
		return $this->values['bill_date'];
	}
	/**
	* 判断下载对账卿����ߥ期，格式�ϸ20140603是否��뜨
	* @return true �?false
	**/
	public function IsBill_dateSet()
	{
		return array_key_exists('bill_date', $this->values);
	}


	/**
	* 设置ALL，返�ƞ当�ߥ所���订单信息，默认����UCCESS，返�ƞ当�ߥ成�ɟ支付的订单REFUND，返�ƞ当�ߥ退款订单REVOKED，已撤����Є订�?
	* @param string $value 
	**/
	public function SetBill_type($value)
	{
		$this->values['bill_type'] = $value;
	}
	/**
	* �Ƿ取ALL，返�ƞ当�ߥ所���订单信息，默认����UCCESS，返�ƞ当�ߥ成�ɟ支付的订单REFUND，返�ƞ当�ߥ退款订单REVOKED，已撤����Є订卿�����?
	* @return ��?
	**/
	public function GetBill_type()
	{
		return $this->values['bill_type'];
	}
	/**
	* 判断ALL，返�ƞ当�ߥ所���订单信息，默认����UCCESS，返�ƞ当�ߥ成�ɟ支付的订单REFUND，返�ƞ当�ߥ退款订单REVOKED，已撤����Є订单是否存�?
	* @return true �?false
	**/
	public function IsBill_typeSet()
	{
		return array_key_exists('bill_type', $this->values);
	}
}

/**
 * 
 * 测速上报输入对�?
 * @author widyhu
 *
 */
class WxPayReport extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信支付分配�Є终端设备��，商户自��⹉
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є终端设备��，商户自��⹉�Є�?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断微信支付分配�Є终端设备��，商户自��⹉是否��뜨
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}


	/**
	* 设置上报对应�Є接口的完整URL，类似�ϸhttps://api.mch.weixin.qq.com/pay/unifiedorder对于被扫支付，为��好�Є和商户共同分析一次业�ɡ行为的整体Կ�时情况，对于两种接入模式，请都在门店侧对一次被�ث行为进行一次单��的整体上报，上报URL指定为�ϸhttps://api.mch.weixin.qq.com/pay/micropay/total兴���两种接入模��具体可参Կ�本文档章节�뵢��ث支��땆户接入模式其它接口调用仍勇按��调用一次，上报一次来进行�?
	* @param string $value 
	**/
	public function SetInterface_url($value)
	{
		$this->values['interface_url'] = $value;
	}
	/**
	* �Ƿ取上报对应�Є接口的完整URL，类似�ϸhttps://api.mch.weixin.qq.com/pay/unifiedorder对于被扫支付，为��好�Є和商户共同分析一次业�ɡ行为的整体Կ�时情况，对于两种接入模式，请都在门店侧对一次被�ث行为进行一次单��的整体上报，上报URL指定为�ϸhttps://api.mch.weixin.qq.com/pay/micropay/total兴���两种接入模��具体可参Կ�本文档章节�뵢��ث支��땆户接入模式其它接口调用仍勇按��调用一次，上报一次来进行。的��?
	* @return ��?
	**/
	public function GetInterface_url()
	{
		return $this->values['interface_url'];
	}
	/**
	* 判断上报对应�Є接口的完整URL，类似�ϸhttps://api.mch.weixin.qq.com/pay/unifiedorder对于被扫支付，为��好�Є和商户共同分析一次业�ɡ行为的整体Կ�时情况，对于两种接入模式，请都在门店侧对一次被�ث行为进行一次单��的整体上报，上报URL指定为�ϸhttps://api.mch.weixin.qq.com/pay/micropay/total兴���两种接入模��具体可参Կ�本文档章节�뵢��ث支��땆户接入模式其它接口调用仍勇按��调用一次，上报一次来进行。是否存�?
	* @return true �?false
	**/
	public function IsInterface_urlSet()
	{
		return array_key_exists('interface_url', $this->values);
	}


	/**
	* 设置接口Կ�时情况，单�ո��毫秒
	* @param string $value 
	**/
	public function SetExecute_time_($value)
	{
		$this->values['execute_time_'] = $value;
	}
	/**
	* �Ƿ取接口Կ�时情况，单�ո��毫秒�Є�?
	* @return ��?
	**/
	public function GetExecute_time_()
	{
		return $this->values['execute_time_'];
	}
	/**
	* 判断接口Կ�时情况，单�ո��毫秒是否��뜨
	* @return true �?false
	**/
	public function IsExecute_time_Set()
	{
		return array_key_exists('execute_time_', $this->values);
	}


	/**
	* 设置SUCCESS/FAIL此字段是���⿡�ݴѯ�，非交易�ݴѯ�，交易是否成�ɟ需要查看trade_state来判�?
	* @param string $value 
	**/
	public function SetReturn_code($value)
	{
		$this->values['return_code'] = $value;
	}
	/**
	* �Ƿ取SUCCESS/FAIL此字段是���⿡�ݴѯ�，非交易�ݴѯ�，交易是否成�ɟ需要查看trade_state来判断的��?
	* @return ��?
	**/
	public function GetReturn_code()
	{
		return $this->values['return_code'];
	}
	/**
	* 判断SUCCESS/FAIL此字段是���⿡�ݴѯ�，非交易�ݴѯ�，交易是否成�ɟ需要查看trade_state来判断是否存�?
	* @return true �?false
	**/
	public function IsReturn_codeSet()
	{
		return array_key_exists('return_code', $this->values);
	}


	/**
	* 设置返回信息，如�Ǟ空，为���ﯯա�因�о名失败参数�ݼ���ݡ验���ﯯ
	* @param string $value 
	**/
	public function SetReturn_msg($value)
	{
		$this->values['return_msg'] = $value;
	}
	/**
	* �Ƿ取返回信息，如�Ǟ空，为���ﯯա�因�о名失败参数�ݼ���ݡ验���ﯯ�Є�?
	* @return ��?
	**/
	public function GetReturn_msg()
	{
		return $this->values['return_msg'];
	}
	/**
	* 判断返回信息，如�Ǟ空，为���ﯯա�因�о名失败参数�ݼ���ݡ验���ﯯ是否��뜨
	* @return true �?false
	**/
	public function IsReturn_msgSet()
	{
		return array_key_exists('return_msg', $this->values);
	}


	/**
	* 设置SUCCESS/FAIL
	* @param string $value 
	**/
	public function SetResult_code($value)
	{
		$this->values['result_code'] = $value;
	}
	/**
	* �Ƿ取SUCCESS/FAIL�Є�?
	* @return ��?
	**/
	public function GetResult_code()
	{
		return $this->values['result_code'];
	}
	/**
	* 判断SUCCESS/FAIL是否��뜨
	* @return true �?false
	**/
	public function IsResult_codeSet()
	{
		return array_key_exists('result_code', $this->values);
	}


	/**
	* 设置ORDERNOTEXIST�ؔ订单不��뜨SYSTEMERROR���쳻统错�?
	* @param string $value 
	**/
	public function SetErr_code($value)
	{
		$this->values['err_code'] = $value;
	}
	/**
	* �Ƿ取ORDERNOTEXIST�ؔ订单不��뜨SYSTEMERROR���쳻统错误的��?
	* @return ��?
	**/
	public function GetErr_code()
	{
		return $this->values['err_code'];
	}
	/**
	* 判断ORDERNOTEXIST�ؔ订单不��뜨SYSTEMERROR���쳻统错误是否存�?
	* @return true �?false
	**/
	public function IsErr_codeSet()
	{
		return array_key_exists('err_code', $this->values);
	}


	/**
	* 设置结果信息描述
	* @param string $value 
	**/
	public function SetErr_code_des($value)
	{
		$this->values['err_code_des'] = $value;
	}
	/**
	* �Ƿ取结果信息描述�Є�?
	* @return ��?
	**/
	public function GetErr_code_des()
	{
		return $this->values['err_code_des'];
	}
	/**
	* 判断结果信息描述是否��뜨
	* @return true �?false
	**/
	public function IsErr_code_desSet()
	{
		return array_key_exists('err_code_des', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,商户可以在上报时提供相关商户订单号方便微信支付更好的提������务质量�?
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,商户可以在上报时提供相关商户订单号方便微信支付更好的提������务质量�?�Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��,商户可以在上报时提供相关商户订单号方便微信支付更好的提������务质量�?是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置发起接口��ݔ��߶的���器IP 
	* @param string $value 
	**/
	public function SetUser_ip($value)
	{
		$this->values['user_ip'] = $value;
	}
	/**
	* �Ƿ取发起接口��ݔ��߶的���器IP �Є�?
	* @return ��?
	**/
	public function GetUser_ip()
	{
		return $this->values['user_ip'];
	}
	/**
	* 判断发起接口��ݔ��߶的���器IP 是否��뜨
	* @return true �?false
	**/
	public function IsUser_ipSet()
	{
		return array_key_exists('user_ip', $this->values);
	}


	/**
	* 设置系统�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规�?
	* @param string $value 
	**/
	public function SetTime($value)
	{
		$this->values['time'] = $value;
	}
	/**
	* �Ƿ取系统�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规则的��?
	* @return ��?
	**/
	public function GetTime()
	{
		return $this->values['time'];
	}
	/**
	* 判断系统�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。其他详见时间规则是否存�?
	* @return true �?false
	**/
	public function IsTimeSet()
	{
		return array_key_exists('time', $this->values);
	}
}

/**
 * 
 * 短链转换��셥对象
 * @author widyhu
 *
 */
class WxPayShortUrl extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置需要转换的URL，签�᫔�ա�串，传�̢��URL encode
	* @param string $value 
	**/
	public function SetLong_url($value)
	{
		$this->values['long_url'] = $value;
	}
	/**
	* �Ƿ取需要转换的URL，签�᫔�ա�串，传�̢��URL encode�Є�?
	* @return ��?
	**/
	public function GetLong_url()
	{
		return $this->values['long_url'];
	}
	/**
	* 判断需要转换的URL，签�᫔�ա�串，传�̢��URL encode是否��뜨
	* @return true �?false
	**/
	public function IsLong_urlSet()
	{
		return array_key_exists('long_url', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
}

/**
 * 
 * 提交被扫��셥对象
 * @author widyhu
 *
 */
class WxPayMicroPay extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置终端设备�?商户���定义，如门店编�?
	* @param string $value 
	**/
	public function SetDevice_info($value)
	{
		$this->values['device_info'] = $value;
	}
	/**
	* �Ƿ取终端设备�?商户���定义，如门店编�?�Є�?
	* @return ��?
	**/
	public function GetDevice_info()
	{
		return $this->values['device_info'];
	}
	/**
	* 判断终端设备�?商户���定义，如门店编�?是否��뜨
	* @return true �?false
	**/
	public function IsDevice_infoSet()
	{
		return array_key_exists('device_info', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}

	/**
	* 设置商品或支��덕简要描�?
	* @param string $value 
	**/
	public function SetBody($value)
	{
		$this->values['body'] = $value;
	}
	/**
	* �Ƿ取商品或支��덕简要描述的��?
	* @return ��?
	**/
	public function GetBody()
	{
		return $this->values['body'];
	}
	/**
	* 判断商品或支��덕简要描述是否存�?
	* @return true �?false
	**/
	public function IsBodySet()
	{
		return array_key_exists('body', $this->values);
	}


	/**
	* 设置商品�᫧�明细列表
	* @param string $value 
	**/
	public function SetDetail($value)
	{
		$this->values['detail'] = $value;
	}
	/**
	* �Ƿ取商品�᫧�明细列表�Є�?
	* @return ��?
	**/
	public function GetDetail()
	{
		return $this->values['detail'];
	}
	/**
	* 判断商品�᫧�明细列表是否��뜨
	* @return true �?false
	**/
	public function IsDetailSet()
	{
		return array_key_exists('detail', $this->values);
	}


	/**
	* 设置附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数�?
	* @param string $value 
	**/
	public function SetAttach($value)
	{
		$this->values['attach'] = $value;
	}
	/**
	* �Ƿ取附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数据的��?
	* @return ��?
	**/
	public function GetAttach()
	{
		return $this->values['attach'];
	}
	/**
	* 判断附加数据，在�ҥ询API和支付通知中�ʦ�ݷ返�ƞ，该字段主要用于商户��带订卿������定义数据是否存�?
	* @return true �?false
	**/
	public function IsAttachSet()
	{
		return array_key_exists('attach', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单���Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��,32个字符内、可包含字母, 其他说明见商户订单��是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置订单��金额，单位为分，只能为整数，详见支付金�?
	* @param string $value 
	**/
	public function SetTotal_fee($value)
	{
		$this->values['total_fee'] = $value;
	}
	/**
	* �Ƿ取订单��金额，单位为分，只能为整数，详见支付金额的��?
	* @return ��?
	**/
	public function GetTotal_fee()
	{
		return $this->values['total_fee'];
	}
	/**
	* 判断订单��金额，单位为分，只能为整数，详见支付金额是否存�?
	* @return true �?false
	**/
	public function IsTotal_feeSet()
	{
		return array_key_exists('total_fee', $this->values);
	}


	/**
	* 设置符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类�?
	* @param string $value 
	**/
	public function SetFee_type($value)
	{
		$this->values['fee_type'] = $value;
	}
	/**
	* �Ƿ取符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型的��?
	* @return ��?
	**/
	public function GetFee_type()
	{
		return $this->values['fee_type'];
	}
	/**
	* 判断符合ISO 4217�݇����Є三位字�ո�����，默认人民币�ϸCNY，其他值列表详见货币类型是否存�?
	* @return true �?false
	**/
	public function IsFee_typeSet()
	{
		return array_key_exists('fee_type', $this->values);
	}


	/**
	* 设置��ݔ�微信支付API�Є机器IP 
	* @param string $value 
	**/
	public function SetSpbill_create_ip($value)
	{
		$this->values['spbill_create_ip'] = $value;
	}
	/**
	* �Ƿ取��ݔ�微信支付API�Є机器IP �Є�?
	* @return ��?
	**/
	public function GetSpbill_create_ip()
	{
		return $this->values['spbill_create_ip'];
	}
	/**
	* 判断��ݔ�微信支付API�Є机器IP 是否��뜨
	* @return true �?false
	**/
	public function IsSpbill_create_ipSet()
	{
		return array_key_exists('spbill_create_ip', $this->values);
	}


	/**
	* 设置订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。详见时间规�?
	* @param string $value 
	**/
	public function SetTime_start($value)
	{
		$this->values['time_start'] = $value;
	}
	/**
	* �Ƿ取订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。详见时间规则的��?
	* @return ��?
	**/
	public function GetTime_start()
	{
		return $this->values['time_start'];
	}
	/**
	* 判断订单生成�߶间，格式为yyyyMMddHHmmss，如2009�?2��?5��?��?0�?0秒表示为20091225091010。详见时间规则是否存�?
	* @return true �?false
	**/
	public function IsTime_startSet()
	{
		return array_key_exists('time_start', $this->values);
	}


	/**
	* 设置订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。详见时间规�?
	* @param string $value 
	**/
	public function SetTime_expire($value)
	{
		$this->values['time_expire'] = $value;
	}
	/**
	* �Ƿ取订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。详见时间规则的��?
	* @return ��?
	**/
	public function GetTime_expire()
	{
		return $this->values['time_expire'];
	}
	/**
	* 判断订单失效�߶间，格式为yyyyMMddHHmmss，如2009�?2��?7��?��?0�?0秒表示为20091227091010。详见时间规则是否存�?
	* @return true �?false
	**/
	public function IsTime_expireSet()
	{
		return array_key_exists('time_expire', $this->values);
	}


	/**
	* 设置商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优�?
	* @param string $value 
	**/
	public function SetGoods_tag($value)
	{
		$this->values['goods_tag'] = $value;
	}
	/**
	* �Ƿ取商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优惠的��?
	* @return ��?
	**/
	public function GetGoods_tag()
	{
		return $this->values['goods_tag'];
	}
	/**
	* 判断商品�ݴѮ�，代金券或立减优惠功能的参数，说明详见代金券或立减优惠是否存�?
	* @return true �?false
	**/
	public function IsGoods_tagSet()
	{
		return array_key_exists('goods_tag', $this->values);
	}


	/**
	* 设置�ث码支付授权���，设备读取用户微信中的条码或者二维码信息
	* @param string $value 
	**/
	public function SetAuth_code($value)
	{
		$this->values['auth_code'] = $value;
	}
	/**
	* �Ƿ取�ث码支付授权���，设备读取用户微信中的条码或者二维码信息�Є�?
	* @return ��?
	**/
	public function GetAuth_code()
	{
		return $this->values['auth_code'];
	}
	/**
	* 判断�ث码支付授权���，设备读取用户微信中的条码或者二维码信息是否��뜨
	* @return true �?false
	**/
	public function IsAuth_codeSet()
	{
		return array_key_exists('auth_code', $this->values);
	}
}

/**
 * 
 * 撤�����셥对象
 * @author widyhu
 *
 */
class WxPayReverse extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}


	/**
	* 设置微信�Є订单��，优先使�?
	* @param string $value 
	**/
	public function SetTransaction_id($value)
	{
		$this->values['transaction_id'] = $value;
	}
	/**
	* �Ƿ取微信�Є订单��，优先使用的��?
	* @return ��?
	**/
	public function GetTransaction_id()
	{
		return $this->values['transaction_id'];
	}
	/**
	* 判断微信�Є订单��，优先使用是否存�?
	* @return true �?false
	**/
	public function IsTransaction_idSet()
	{
		return array_key_exists('transaction_id', $this->values);
	}


	/**
	* 设置商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no
	* @param string $value 
	**/
	public function SetOut_trade_no($value)
	{
		$this->values['out_trade_no'] = $value;
	}
	/**
	* �Ƿ取商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no�Є�?
	* @return ��?
	**/
	public function GetOut_trade_no()
	{
		return $this->values['out_trade_no'];
	}
	/**
	* 判断商户系统内部�Є订单��,transaction_id、out_trade_no二选一，如果同�߶存在优先级：transaction_id> out_trade_no是否��뜨
	* @return true �?false
	**/
	public function IsOut_trade_noSet()
	{
		return array_key_exists('out_trade_no', $this->values);
	}


	/**
	* 设置随机字符串，不����?2位。推��随���数生成算法
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串，不����?2位。推��随���数生成算法�Є�?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串，不����?2位。推��随���数生成算法是否��뜨
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
}

/**
 * 
 * 提交JSAPI��셥对象
 * @author widyhu
 *
 */
class WxPayJsApiPay extends WxPayDataBase
{
	/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appId'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appId'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appId', $this->values);
	}


	/**
	* 设置支付�߶间�?
	* @param string $value 
	**/
	public function SetTimeStamp($value)
	{
		$this->values['timeStamp'] = $value;
	}
	/**
	* �Ƿ取支付�߶间戳的��?
	* @return ��?
	**/
	public function GetTimeStamp()
	{
		return $this->values['timeStamp'];
	}
	/**
	* 判断支付�߶间戳是否存�?
	* @return true �?false
	**/
	public function IsTimeStampSet()
	{
		return array_key_exists('timeStamp', $this->values);
	}
	
	/**
	* 随机字符�?
	* @param string $value 
	**/
	public function SetNonceStr($value)
	{
		$this->values['nonceStr'] = $value;
	}
	/**
	* �Ƿ取notify随机字符串�?
	* @return ��?
	**/
	public function GetReturn_code()
	{
		return $this->values['nonceStr'];
	}
	/**
	* 判断随机字符串是否存�?
	* @return true �?false
	**/
	public function IsReturn_codeSet()
	{
		return array_key_exists('nonceStr', $this->values);
	}


	/**
	* 设置订单详情�ة展字符�?
	* @param string $value 
	**/
	public function SetPackage($value)
	{
		$this->values['package'] = $value;
	}
	/**
	* �Ƿ取订单详情�ة展字符串的��?
	* @return ��?
	**/
	public function GetPackage()
	{
		return $this->values['package'];
	}
	/**
	* 判断订单详情�ة展字符串是否存�?
	* @return true �?false
	**/
	public function IsPackageSet()
	{
		return array_key_exists('package', $this->values);
	}
	
	/**
	* 设置�о名方��
	* @param string $value 
	**/
	public function SetSignType($value)
	{
		$this->values['signType'] = $value;
	}
	/**
	* �Ƿ取�о名方��
	* @return ��?
	**/
	public function GetSignType()
	{
		return $this->values['signType'];
	}
	/**
	* 判断�о名方��是否��뜨
	* @return true �?false
	**/
	public function IsSignTypeSet()
	{
		return array_key_exists('signType', $this->values);
	}
	
	/**
	* 设置�о名方��
	* @param string $value 
	**/
	public function SetPaySign($value)
	{
		$this->values['paySign'] = $value;
	}
	/**
	* �Ƿ取�о名方��
	* @return ��?
	**/
	public function GetPaySign()
	{
		return $this->values['paySign'];
	}
	/**
	* 判断�о名方��是否��뜨
	* @return true �?false
	**/
	public function IsPaySignSet()
	{
		return array_key_exists('paySign', $this->values);
	}
}

/**
 * 
 * �ث码支付模��一生成二维���参�?
 * @author widyhu
 *
 */
class WxPayBizPayUrl extends WxPayDataBase
{
		/**
	* 设置微信分配�Є公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['appid'] = $value;
	}
	/**
	* �Ƿ取微信分配�Є公众账号ID�Є�?
	* @return ��?
	**/
	public function GetAppid()
	{
		return $this->values['appid'];
	}
	/**
	* 判断微信分配�Є公众账号ID是否��뜨
	* @return true �?false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('appid', $this->values);
	}


	/**
	* 设置微信支付分配�Є商户��
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* �Ƿ取微信支付分配�Є商户���Є�?
	* @return ��?
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配�Є商户��是否��뜨
	* @return true �?false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}
	
	/**
	* 设置支付�߶间�?
	* @param string $value 
	**/
	public function SetTime_stamp($value)
	{
		$this->values['time_stamp'] = $value;
	}
	/**
	* �Ƿ取支付�߶间戳的��?
	* @return ��?
	**/
	public function GetTime_stamp()
	{
		return $this->values['time_stamp'];
	}
	/**
	* 判断支付�߶间戳是否存�?
	* @return true �?false
	**/
	public function IsTime_stampSet()
	{
		return array_key_exists('time_stamp', $this->values);
	}
	
	/**
	* 设置随机字符�?
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* �Ƿ取随机字符串的��?
	* @return ��?
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串是否存�?
	* @return true �?false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
	
	/**
	* 设置商品ID
	* @param string $value 
	**/
	public function SetProduct_id($value)
	{
		$this->values['product_id'] = $value;
	}
	/**
	* �Ƿ取商品ID�Є�?
	* @return ��?
	**/
	public function GetProduct_id()
	{
		return $this->values['product_id'];
	}
	/**
	* 判断商品ID是否��뜨
	* @return true �?false
	**/
	public function IsProduct_idSet()
	{
		return array_key_exists('product_id', $this->values);
	}
}
