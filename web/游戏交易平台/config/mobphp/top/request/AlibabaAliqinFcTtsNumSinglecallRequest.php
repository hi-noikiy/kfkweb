<?php
/**
 * TOP API: alibaba.aliqin.fc.tts.num.singlecall request
 * 
 * @author auto create
 * @since 1.0, 2016.05.24
 */
class AlibabaAliqinFcTtsNumSinglecallRequest
{
	/** 
	 * 被叫号码，支持国内�׹�����与固话����?�ݼ��妱���057188773344,13911112222,4001112222,95500
	 **/
	private $calledNum;
	
	/** 
	 * 被叫号显，传入的显示号码必须是阿里大鱼���理中�?号码管理�؝中申请或购买的号码
	 **/
	private $calledShowNum;
	
	/** 
	 * 公共�ƞ传参数，在�ز׶�息返�ƞ”中会透传�ƞ该参数；举例�ϸ用户可以传入���己下级�Є�ϸ��ҵD，在消息返回�߶，该�ϸ��ҵD�벌�含在内，用户可以�ݹ据该�ϸ��ҵD识别是哪�ոϸ������用��你的��씨
	 **/
	private $extend;
	
	/** 
	 * TTS模板ID，传入的模板必须是在�ֿ里大鱼����理中�?语音TTS模板管理�؝中�Є可用模�?
	 **/
	private $ttsCode;
	
	/** 
	 * 文本转语����ֽTTS）模板变量，传参规则{"key"�?value"}，key�Є名字须和TTS模板中的变量�ո�����，��⸪变量之间以逗��隔开，示例�ϸ{"name":"xiaoming","code":"1234"}
	 **/
	private $ttsParam;
	
	private $apiParas = array();
	
	public function setCalledNum($calledNum)
	{
		$this->calledNum = $calledNum;
		$this->apiParas["called_num"] = $calledNum;
	}

	public function getCalledNum()
	{
		return $this->calledNum;
	}

	public function setCalledShowNum($calledShowNum)
	{
		$this->calledShowNum = $calledShowNum;
		$this->apiParas["called_show_num"] = $calledShowNum;
	}

	public function getCalledShowNum()
	{
		return $this->calledShowNum;
	}

	public function setExtend($extend)
	{
		$this->extend = $extend;
		$this->apiParas["extend"] = $extend;
	}

	public function getExtend()
	{
		return $this->extend;
	}

	public function setTtsCode($ttsCode)
	{
		$this->ttsCode = $ttsCode;
		$this->apiParas["tts_code"] = $ttsCode;
	}

	public function getTtsCode()
	{
		return $this->ttsCode;
	}

	public function setTtsParam($ttsParam)
	{
		$this->ttsParam = $ttsParam;
		$this->apiParas["tts_param"] = $ttsParam;
	}

	public function getTtsParam()
	{
		return $this->ttsParam;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.tts.num.singlecall";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->calledNum,"calledNum");
		RequestCheckUtil::checkNotNull($this->calledShowNum,"calledShowNum");
		RequestCheckUtil::checkNotNull($this->ttsCode,"ttsCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
