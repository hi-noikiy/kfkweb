<?php
/**
 * TOP API: alibaba.aliqin.fc.sms.num.query request
 * 
 * @author auto create
 * @since 1.0, 2016.03.01
 */
class AlibabaAliqinFcSmsNumQueryRequest
{
	/** 
	 * 短信发送流�?
	 **/
	private $bizId;
	
	/** 
	 * 分页参数,页码
	 **/
	private $currentPage;
	
	/** 
	 * 分页参数，洯页数量。最大�?0
	 **/
	private $pageSize;
	
	/** 
	 * 短信发送日���，支持�?0天记录查询，�ݼ��yyyyMMdd
	 **/
	private $queryDate;
	
	/** 
	 * 短信接收号码
	 **/
	private $recNum;
	
	private $apiParas = array();
	
	public function setBizId($bizId)
	{
		$this->bizId = $bizId;
		$this->apiParas["biz_id"] = $bizId;
	}

	public function getBizId()
	{
		return $this->bizId;
	}

	public function setCurrentPage($currentPage)
	{
		$this->currentPage = $currentPage;
		$this->apiParas["current_page"] = $currentPage;
	}

	public function getCurrentPage()
	{
		return $this->currentPage;
	}

	public function setPageSize($pageSize)
	{
		$this->pageSize = $pageSize;
		$this->apiParas["page_size"] = $pageSize;
	}

	public function getPageSize()
	{
		return $this->pageSize;
	}

	public function setQueryDate($queryDate)
	{
		$this->queryDate = $queryDate;
		$this->apiParas["query_date"] = $queryDate;
	}

	public function getQueryDate()
	{
		return $this->queryDate;
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

	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.sms.num.query";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->currentPage,"currentPage");
		RequestCheckUtil::checkNotNull($this->pageSize,"pageSize");
		RequestCheckUtil::checkNotNull($this->queryDate,"queryDate");
		RequestCheckUtil::checkNotNull($this->recNum,"recNum");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
