<?php
/**
 * TOP API: taobao.areas.get request
 * 
 * @author auto create
 * @since 1.0, 2016.04.13
 */
class AreasGetRequest
{
	/** 
	 * éœ€è¿”å›žïÐ„å­—æ®µåˆ—è¡?å¯é€‰å€?Area ç»“æž„ä¸­çš„ïØ€Á´‰å­—æ®?å¤Çâ¸ªå­—æ®µä¹‹é—´ç”?,"åˆ†éš”.å¦?id,type,name,parent_id,zip.
	 **/
	private $fields;
	
	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function getApiMethodName()
	{
		return "taobao.areas.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->fields,"fields");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
