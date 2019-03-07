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
	 * è¢«å«å·ç ï¼Œæ”¯æŒå›½å†…æ×¹Á´ºå·ðä¸Žå›ºè¯å·ðÁ­?ïÝ¼å·Äå¦±¸¸‹057188773344,13911112222,4001112222,95500
	 **/
	private $calledNum;
	
	/** 
	 * è¢«å«å·ç ä¾§çš„å·ç æ˜¾ç¤ºï¼Œä¼ å…¥çš„æ˜¾ç¤ºå·ç å¯ä»¥æ˜¯é˜¿é‡Œå¤§é±¼â€Ãð®¡ç†ä¸­å¿?å·ç ç®¡ç†îØä¸­ç”³è¯·ãÍëµ±ÁïÐ„å·ðÁ­²¢€‚æ˜¾ç¤ºå·ðÁ­æ ¼å¼å¦‚ä¸?57188773344ï¼?001112222ï¼?5500ã€‚æ˜¾ç¤ºå·ðÁ­ä¹Ÿå¯ä»¥ä¸ºä¸»å«å·ðÁ­²¢€?
	 **/
	private $calledShowNum;
	
	/** 
	 * ä¸»å«å·ç ï¼Œæ”¯æŒå›½å†…æ×¹Á´ºå·ðä¸Žå›ºè¯å·ðÁ­?ïÝ¼å·Äå¦±¸¸‹057188773344,13911112222,4001112222,95500
	 **/
	private $callerNum;
	
	/** 
	 * ä¸»å«å·ç ä¾§çš„å·ç æ˜¾ç¤ºï¼Œä¼ å…¥çš„æ˜¾ç¤ºå·ç å¿…é¡»æ˜¯é˜¿é‡Œå¤§é±¼â€Ãð®¡ç†ä¸­å¿?å·ç ç®¡ç†îØä¸­ç”³è¯·ãÍëµ±ÁïÐ„å·ðÁ­²¢€‚æ˜¾ç¤ºå·ðÁ­æ ¼å¼å¦‚ä¸?57188773344ï¼?001112222ï¼?5500
	 **/
	private $callerShowNum;
	
	/** 
	 * å…¬å…±ïÆžä¼ å‚æ•°ï¼Œåœ¨îØ²×¶ˆæ¯è¿”ïÆžâ€ä¸­ä¼šé€ä¼ ïÆžè¯¥å‚æ•°ï¼›ä¸¾ä¾‹ïÏ¸ç”¨æˆ·å¯ä»¥ä¼ å…¥Ä÷ªå·±ä¸‹çº§ïÐ„äÏ¸¶ÍÒµDï¼Œåœ¨æ¶ˆæ¯è¿”å›žïß¶ï¼Œè¯¥äÏ¸¶ÍÒµDä¼ë²Œ…å«åœ¨å†…ï¼Œç”¨æˆ·å¯ä»¥ïÝ¹æ®è¯¥äÏ¸¶ÍÒµDè¯†åˆ«æ˜¯å“ªä½Õ¸Ï¸¶ÍÊ÷½¿ç”¨ä¼òä½ çš„åºÆì”¨
	 **/
	private $extend;
	
	/** 
	 * ãÍëµ¯è¶…æ—¶ïß¶éêÇï¼Œå¦‚æŽ¥é€ë²Žåˆ°è¾¾120ç§’æ—¶ï¼Œé€ëµ¯ä¼ë²› ä¸ºè¶…ïß¶è‡ªïÉ¨æŒ‚æ–­ã€‚è‹¥ïß éœ€è®¾ç½®è¶…æ—¶ïß¶éêÇï¼Œå¯ä¸Õ¸¼ ã€?
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
