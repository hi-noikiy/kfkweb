<?php
/**
 * TOP API: alibaba.aliqin.fc.sms.num.send request
 * 
 * @author auto create
 * @since 1.0, 2016.05.24
 */
class AlibabaAliqinFcSmsNumSendRequest
{
	/** 
	 * 公共�ƞ传参数，在�ز׶�息返�ƞ”中会透传�ƞ该参数；举例�ϸ用户可以传入���己下级�Є�ϸ��ҵD，在消息返回�߶，该�ϸ��ҵD�벌�含在内，用户可以�ݹ据该�ϸ��ҵD识别是哪�ոϸ������用��你的��씨
	 **/
	private $extend;
	
	/** 
	 * 短信接收号码。支持单个或��⸪�؋机号码，传入�����为11位�׹��������，不能��?�?86。群发短信需传入��⸪号码，以英文�͗��分隔，一次调用最��⼠�?00个��������示例�ϸ18600000000,13911111111,13322222222
	 **/
	private $recNum;
	
	/** 
	 * 短信�о名，传入的短信�о名必须是在�ֿ里大鱼����理中�?短信�о名管理�؝中�Є可用签名。如�؜阿里大鱼”已在短信签�᫮�理中��뵱�审核，则可传入”阿里大鱼“�ֽ传参�߶去掉引号Ｖ作为短信�о名。短信效���例�ϸ【阿里大鱼】欢迎使用阿里大鱼服�ɡ�?
	 **/
	private $smsFreeSignName;
	
	/** 
	 * 短信模板变量，传参规���"key":"value"}，key�Є名字须和��请模板中�Є变量名一���，��⸪变量之间以逗��隔开。示例�ϸ������模板�؜验证码${code}，您正在进行${product}身份验证，打死不要告诉别人哦！”，传参�߶需传入{"code":"1234","product":"alidayu"}
	 **/
	private $smsParam;
	
	/** 
	 * 短信模板ID，传入的模板必须是在�ֿ里大鱼����理中�?短信模板管理�؝中�Є可用模板。示例�ϸSMS_585014
	 **/
	private $smsTemplateCode;
	
	/** 
	 * 短信类型，传入值请填写normal
	 **/
	private $smsType;
	
	private $apiParas = array();
	
	public function setExtend($extend)
	{
		$this->extend = $extend;
		$this->apiParas["extend"] = $extend;
	}

	public function getExtend()
	{
		return $this->extend;
	}

	public function setRecNum($recNum)
	{
		$this->recNum = $recNum;
		$this->apiParas["rec_num"] = $recNum;
	}

	public function getRecNum()
	{
		return $this->recNum;
	}

	public function setSmsFreeSignName($smsFreeSignName)
	{
		$this->smsFreeSignName = $smsFreeSignName;
		$this->apiParas["sms_free_sign_name"] = $smsFreeSignName;
	}

	public function getSmsFreeSignName()
	{
		return $this->smsFreeSignName;
	}

	public function setSmsParam($smsParam)
	{
		$this->smsParam = $smsParam;
		$this->apiParas["sms_param"] = $smsParam;
	}

	public function getSmsParam()
	{
		return $this->smsParam;
	}

	public function setSmsTemplateCode($smsTemplateCode)
	{
		$this->smsTemplateCode = $smsTemplateCode;
		$this->apiParas["sms_template_code"] = $smsTemplateCode;
	}

	public function getSmsTemplateCode()
	{
		return $this->smsTemplateCode;
	}

	public function setSmsType($smsType)
	{
		$this->smsType = $smsType;
		$this->apiParas["sms_type"] = $smsType;
	}

	public function getSmsType()
	{
		return $this->smsType;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.sms.num.send";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->recNum,"recNum");
		RequestCheckUtil::checkNotNull($this->smsFreeSignName,"smsFreeSignName");
		RequestCheckUtil::checkNotNull($this->smsTemplateCode,"smsTemplateCode");
		RequestCheckUtil::checkNotNull($this->smsType,"smsType");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
