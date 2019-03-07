<?php
/**
 * TOP API: taobao.kfc.keyword.search request
 * 
 * @author auto create
 * @since 1.0, 2016.03.19
 */
class KfcKeywordSearchRequest
{
	/** 
	 * ��씨�͹，分为一级应用点、二级应用点。其中一级应用点��벸�是指�Ґ一个系统或产品，比如淘宝的商品��씨（taobao_auction）��二级��씨�͹，是指一级应用点下的具体�Є分类，比如商品�݇题(title)、商品描�?content)〱���同的二级��씨可以设置不同关键词�?

这里�Єapply参数是由一级应用点与二级应用点合起来的字符（一级应用点+"."+二级��씨�͹Ｖ，如taobao_auction.title�?


��벸�apply参数是不需要传�͒的。如���特殊需求�ֽ比如特殊�Є��滤需求，需要自己维护一套自己词�°��，需传递此参数�?
	 **/
	private $apply;
	
	/** 
	 * 需要��滤的文本信息
	 **/
	private $content;
	
	/** 
	 * 发布信息�Є淘宝�ϸ���됍，可以不�?
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setApply($apply)
	{
		$this->apply = $apply;
		$this->apiParas["apply"] = $apply;
	}

	public function getApply()
	{
		return $this->apply;
	}

	public function setContent($content)
	{
		$this->content = $content;
		$this->apiParas["content"] = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function getApiMethodName()
	{
		return "taobao.kfc.keyword.search";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->content,"content");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
