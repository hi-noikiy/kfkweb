<?php
/**
 * 
 * �ƞ调基础�?
 * @author widyhu
 *
 */
class WxPayNotify extends WxPayNotifyReply
{
	/**
	 * 
	 * �ƞ调入口
	 * @param bool $needSign  是否需要签名输�?
	 */
	final public function Handle($needSign = true)
	{
		$msg = "OK";
		//当返�ƞfalse�Є时���，表示notify中调用NotifyCallBack�ƞ调失败�Ƿ取�о名�ݡ验失败，此�߶直接回复失�?
		$result = WxpayApi::notify(array($this, 'NotifyCallBack'), $msg);
		if($result == false){
			$this->SetReturn_code("FAIL");
			$this->SetReturn_msg($msg);
			$this->ReplyNotify(false);
			return;
		} else {
			//该分支在成功�ƞ调到NotifyCallBack方法，处理��成之后流�?
			$this->SetReturn_code("SUCCESS");
			$this->SetReturn_msg("OK");
		}
		$this->ReplyNotify($needSign);
	}
	
	/**
	 * 
	 * �ƞ调方法入口，子类可重写该方�?
	 * 注意�?
	 * 1、微信回调超�߶时间为2s，建议用户使用��步处理流程，确认成功��ɐ���Ɉ��ƞ复微信���务�?
	 * 2、微信服�ɡ器在调用失败或Կ�接到回包为�Ǟ确认包�Є时���，�벏�起��试，需确���你的�ƞ调是可以���?
	 * @param array $data �ƞ调解���出的参数
	 * @param string $msg 如果�ƞ调处理失败，可以将���ﯯ信息��쇺到该方法
	 * @return true�ƞ调出来完成不需要继续回调，false�ƞ调处理�����成需要继续回�?
	 */
	public function NotifyProcess($data, &$msg)
	{
		//TODO 用户基础该类��ɐ�需要����ﯥ方法，成�ɟ的�߶��ￔ����rue，失败返�ƞfalse
		return true;
	}
	
	/**
	 * 
	 * notify�ƞ调方法，该方法中需要赋���需要输出的参数,不可重写
	 * @param array $data
	 * @return true�ƞ调出来完成不需要继续回调，false�ƞ调处理�����成需要继续回�?
	 */
	final public function NotifyCallBack($data)
	{
		$msg = "OK";
		$result = $this->NotifyProcess($data, $msg);
		
		if($result == true){
			$this->SetReturn_code("SUCCESS");
			$this->SetReturn_msg("OK");
		} else {
			$this->SetReturn_code("FAIL");
			$this->SetReturn_msg($msg);
		}
		return $result;
	}
	
	/**
	 * 
	 * �ƞ复�͚知
	 * @param bool $needSign 是否需要签名输�?
	 */
	final private function ReplyNotify($needSign = true)
	{
		//如果需要签�?
		if($needSign == true && 
			$this->GetReturn_code($return_code) == "SUCCESS")
		{
			$this->SetSign();
		}
		WxpayApi::replyNotify($this->ToXml());
	}
}