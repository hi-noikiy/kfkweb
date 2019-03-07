<?php
/**
 * 
 * 微信支付API异常�?
 * @author widyhu
 *
 */
class WxPayException extends Exception {
	public function errorMessage()
	{
		return $this->getMessage();
	}
}
