<?php
/**
 * TOP API: alibaba.aliqin.fc.voice.num.doublecall request
 * 
 * @author auto create
 * @since 1.0, 2016.03.06
 */
class AlibabaAliqinFcVoiceNumDoublecallRequest
{
	/** 
	 * 被叫号码，支持国内�׹�����与固话����?�ݼ��妱���057188773344,13911112222,4001112222,95500
	 **/
	private $calledNum;
	
	/** 
	 * 被叫号码侧的号码显示，传入的显示号码可以是阿里大鱼���理中�?号码管理�؝中申请��뵱��Є��������显示�����格式如�?57188773344�?001112222�?5500。显示�����也可以为主叫�������?
	 **/
	private $calledShowNum;
	
	/** 
	 * 主叫号码，支持国内�׹�����与固话����?�ݼ��妱���057188773344,13911112222,4001112222,95500
	 **/
	private $callerNum;
	
	/** 
	 * 主叫号码侧的号码显示，传入的显示号码必须是阿里大鱼���理中�?号码管理�؝中申请��뵱��Є��������显示�����格式如�?57188773344�?001112222�?5500
	 **/
	private $callerShowNum;
	
	/** 
	 * 公共�ƞ传参数，在�ز׶�息返�ƞ”中会透传�ƞ该参数；举例�ϸ用户可以传入���己下级�Є�ϸ��ҵD，在消息返回�߶，该�ϸ��ҵD�벌�含在内，用户可以�ݹ据该�ϸ��ҵD识别是哪�ոϸ������用��你的��씨
	 **/
	private $extend;
	
	/** 
	 * ��뵯�超时�߶���，如接�벐�到达120秒时，�뵯��벛�为超�߶自�ɨ挂断。若�ߠ需设置超时�߶���，可�ո���?
	 **/
	private $sessionTimeOut;
	
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

	public function setCallerNum($callerNum)
	{
		$this->callerNum = $callerNum;
		$this->apiParas["caller_num"] = $callerNum;
	}

	public function getCallerNum()
	{
		return $this->callerNum;
	}

	public function setCallerShowNum($callerShowNum)
	{
		$this->callerShowNum = $callerShowNum;
		$this->apiParas["caller_show_num"] = $callerShowNum;
	}

	public function getCallerShowNum()
	{
		return $this->callerShowNum;
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

	public function setSessionTimeOut($sessionTimeOut)
	{
		$this->sessionTimeOut = $sessionTimeOut;
		$this->apiParas["session_time_out"] = $sessionTimeOut;
	}

	public function getSessionTimeOut()
	{
		return $this->sessionTimeOut;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.voice.num.doublecall";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->calledNum,"calledNum");
		RequestCheckUtil::checkNotNull($this->calledShowNum,"calledShowNum");
		RequestCheckUtil::checkNotNull($this->callerNum,"callerNum");
		RequestCheckUtil::checkNotNull($this->callerShowNum,"callerShowNum");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
