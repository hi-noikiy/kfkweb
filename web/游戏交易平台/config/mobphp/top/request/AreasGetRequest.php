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
	 * 需返回�Є字段列�?可选�?Area 结构中的�؀���字�?��⸪字段之间�?,"分隔.�?id,type,name,parent_id,zip.
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
