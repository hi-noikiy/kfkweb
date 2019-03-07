<?php
require_once "../lib/WxPay.Api.php";
/**
 * 
 * JSAPI支付实现�?
 * 该类实现了从微信公众平台�Ƿ取code、�뵱�code�Ƿ取openid和access_token�?
 * 生成jsapi支付js接口�؀需�Є参数、生成获取共享收货地址�؀需�Є参�?
 * 
 * 该类是微信支付提供的�ݷ例��ɺ�，商户可�ݹ据���己�Є需汱���改，或者使用lib中的api���行开�?
 * 
 * @author widy
 *
 */
class JsApiPay
{
	/**
	 * 
	 * 网页授权接口微信���务器返�ƞ的数据，返�ƞ样��ɦ��?
	 * {
	 *  "access_token":"ACCESS_TOKEN",
	 *  "expires_in":7200,
	 *  "refresh_token":"REFRESH_TOKEN",
	 *  "openid":"OPENID",
	 *  "scope":"SCOPE",
	 *  "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL"
	 * }
	 * 其中access_token可用于获取共享收货地址
	 * openid是微信支付jsapi支付接口必须�Є参�?
	 * @var array
	 */
	public $data = null;
	
	/**
	 * 
	 * ��뵱�跳转�Ƿ取用户�Єopenid，跳转流��ɦ�下�ϸ
	 * 1、设置自己需要调�ƞ的url及其其他参数，跳转到微信���务器https://open.weixin.qq.com/connect/oauth2/authorize
	 * 2、微信服�ɡ处理��成之后�ϸ跳转�ƞ用户redirect_uri地址，此�߶�ϸ带上一些参数，如�ϸcode
	 * 
	 * @return 用户�Єopenid
	 */
	public function GetOpenid()
	{
		//��뵱�code�Ƿ���openid
		if (!isset($_GET['code'])){
			//触发微信返回code��?
			$baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']);
			$url = $this->__CreateOauthUrlForCode($baseUrl);
			Header("Location: $url");
			exit();
		} else {
			//�Ƿ取code���，以获取openid
		    $code = $_GET['code'];
			$openid = $this->getOpenidFromMp($code);
			return $openid;
		}
	}
	
	/**
	 * 
	 * �Ƿ取jsapi支付�Є参�?
	 * @param array $UnifiedOrderResult 统一支付接口返回�Є数�?
	 * @throws WxPayException
	 * 
	 * @return json数据，可直接填入js函数作为参数
	 */
	public function GetJsApiParameters($UnifiedOrderResult)
	{
		if(!array_key_exists("appid", $UnifiedOrderResult)
		|| !array_key_exists("prepay_id", $UnifiedOrderResult)
		|| $UnifiedOrderResult['prepay_id'] == "")
		{
			throw new WxPayException("参数���ﯯ");
		}
		$jsapi = new WxPayJsApiPay();
		$jsapi->SetAppid($UnifiedOrderResult["appid"]);
		$timeStamp = time();
		$jsapi->SetTimeStamp("$timeStamp");
		$jsapi->SetNonceStr(WxPayApi::getNonceStr());
		$jsapi->SetPackage("prepay_id=" . $UnifiedOrderResult['prepay_id']);
		$jsapi->SetSignType("MD5");
		$jsapi->SetPaySign($jsapi->MakeSign());
		$parameters = json_encode($jsapi->GetValues());
		return $parameters;
	}
	
	/**
	 * 
	 * ��뵱�code从工作平台获取openid���器access_token
	 * @param string $code 微信跳转�ƞ来带上�Єcode
	 * 
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		$url = $this->__CreateOauthUrlForOpenid($code);
		//初始化curl
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->curl_timeout);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0" 
			&& WxPayConfig::CURL_PROXY_PORT != 0){
			curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST);
			curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT);
		}
		//运行curl，结果以jason形��返回
		$res = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data = json_decode($res,true);
		$this->data = $data;
		$openid = $data['openid'];
		return $openid;
	}
	
	/**
	 * 
	 * 拼接�о名字符�?
	 * @param array $urlObj
	 * 
	 * @return 返回已经拼接好的字符�?
	 */
	private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			if($k != "sign"){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
	
	/**
	 * 
	 * �Ƿ取地址js参数
	 * 
	 * @return �Ƿ取共享收货地址js函数需要的参数，json�ݼ��可以直接��벏�数使�?
	 */
	public function GetEditAddressParameters()
	{	
		$getData = $this->data;
		$data = array();
		$data["appid"] = WxPayConfig::APPID;
		$data["url"] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$time = time();
		$data["timestamp"] = "$time";
		$data["noncestr"] = "1234568";
		$data["accesstoken"] = $getData["access_token"];
		ksort($data);
		$params = $this->ToUrlParams($data);
		$addrSign = sha1($params);
		
		$afterData = array(
			"addrSign" => $addrSign,
			"signType" => "sha1",
			"scope" => "jsapi_address",
			"appId" => WxPayConfig::APPID,
			"timeStamp" => $data["timestamp"],
			"nonceStr" => $data["noncestr"]
		);
		$parameters = json_encode($afterData);
		return $parameters;
	}
	
	/**
	 * 
	 * 构造获取code�Єurl连接
	 * @param string $redirectUrl 微信���务器回跳的url，需要url编码
	 * 
	 * @return 返回构造好�Єurl
	 */
	private function __CreateOauthUrlForCode($redirectUrl)
	{
		$urlObj["appid"] = WxPayConfig::APPID;
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = "snsapi_base";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}
	
	/**
	 * 
	 * 构造获取open和access_toke�Єurl地址
	 * @param string $code，微信跳转带�ƞ的code
	 * 
	 * @return 请求�Єurl
	 */
	private function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = WxPayConfig::APPID;
		$urlObj["secret"] = WxPayConfig::APPSECRET;
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
}