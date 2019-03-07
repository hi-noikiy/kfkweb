<?php
/**
 * TOP API: alibaba.aliqin.fc.voice.num.singlecall request
 * 
 * @author auto create
 * @since 1.0, 2016.03.01
 */
class AlibabaAliqinFcVoiceNumSinglecallRequest
{
	/** 
	 * 被叫号码，支持国内�׹�����与固话����?�ݼ��妱���057188773344,13911112222,4001112222,95500
	 **/
	private $calledNum;
	
	/** 
	 * 被叫号显，传入的显示号码必须是阿里大鱼���理中�?号码管理�؝中申请��뵱��Є����?
	 **/
	private $calledShowNum;
	
	/** 
	 * 公共�ƞ传参数，在�ز׶�息返�ƞ”中会透传�ƞ该参数；举例�ϸ用户可以传入���己下级�Є�ϸ��ҵD，在消息返回�߶，该�ϸ��ҵD�벌�含在内，用户可以�ݹ据该�ϸ��ҵD识别是哪�ոϸ������用��你的��씨
	 **/
	private $extend;
	
	/** 
	 * 语音文件ID，传入的语音文件必须是在�ֿ里大鱼����理中�?语音文件管理�؝中�Є可用语���文�?
	 **/
	private $voiceCode;
	
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

	public function setVoiceCode($voiceCode)
	{
		$this->voiceCode = $voiceCode;
		$this->apiParas["voice_code"] = $voiceCode;
	}

	public function getVoiceCode()
	{
		return $this->voiceCode;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.voice.num.singlecall";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->calledNum,"calledNum");
		RequestCheckUtil::checkNotNull($this->calledShowNum,"calledShowNum");
		RequestCheckUtil::checkNotNull($this->voiceCode,"voiceCode");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
