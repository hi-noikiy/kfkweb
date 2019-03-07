<?php
header("Content-type:text/html; charset=UTF-8"); 
include("../../config/conn.php");
include("../../config/function.php");



$arr = explode("|",$rowcontrol[ipsshh]);

 //公司�᫧��뵿������息科技���限公司
 //系统:新系统接口S2S返回
 //�ɟ能:新系统返�ƞ报文处�?
 //创建Կ?IPS
 //�ߥ期�?015-01-29

$paymentResult = $_POST["paymentResult"];//�Ƿ取信息
$xml=simplexml_load_string($paymentResult,'SimpleXMLElement', LIBXML_NOCDATA); 

  //读取相关xml中信�?
   $ReferenceIDs = $xml->xpath("GateWayRsp/head/ReferenceID");//关联�?
   //var_dump($ReferenceIDs); 
   $ReferenceID = $ReferenceIDs[0];//关联�?
   $RspCodes = $xml->xpath("GateWayRsp/head/RspCode");//响应编码
   $RspCode=$RspCodes[0];
   $RspMsgs = $xml->xpath("GateWayRsp/head/RspMsg"); //响应说明
   $RspMsg=$RspMsgs[0];
   $ReqDates = $xml->xpath("GateWayRsp/head/ReqDate"); // 接嵯�߶间
    $ReqDate=$ReqDates[0];
   $RspDates = $xml->xpath("GateWayRsp/head/RspDate");// 响应�߶间
    $RspDate=$RspDates[0];
   $Signatures = $xml->xpath("GateWayRsp/head/Signature"); //数字�о名
    $Signature=$Signatures[0];
   $MerBillNos = $xml->xpath("GateWayRsp/body/MerBillNo"); // 商户订单�?
    $MerBillNo=$MerBillNos[0];
   $CurrencyTypes = $xml->xpath("GateWayRsp/body/CurrencyType");//币种
    $CurrencyType=$CurrencyTypes[0];
   $Amounts = $xml->xpath("GateWayRsp/body/Amount"); //订单金额
    $Amount=$Amounts[0];
   $Dates = $xml->xpath("GateWayRsp/body/Date");    //订单�ߥ期
    $Date=$Dates[0];
   $Statuss = $xml->xpath("GateWayRsp/body/Status");  //交易�Ӷ�?
    $Status=$Statuss[0];
   $Msgs = $xml->xpath("GateWayRsp/body/Msg");    //发卡行返�ƞ信�?
    $Msg=$Msgs[0];
   $Attachs = $xml->xpath("GateWayRsp/body/Attach");    //数据�?
    $Attach=$Attachs[0];
   $IpsBillNos = $xml->xpath("GateWayRsp/body/IpsBillNo"); //IPS订单�?
    $IpsBillNo=$IpsBillNos[0];
   $IpsTradeNos = $xml->xpath("GateWayRsp/body/IpsTradeNo"); //IPS交易流水�?
    $IpsTradeNo=$IpsTradeNos[0];
   $RetEncodeTypes = $xml->xpath("GateWayRsp/body/RetEncodeType");    //交易返回方��
    $RetEncodeType=$RetEncodeTypes[0];
   $BankBillNos = $xml->xpath("GateWayRsp/body/BankBillNo"); //�ж行订单�?
    $BankBillNo=$BankBillNos[0];
   $ResultTypes = $xml->xpath("GateWayRsp/body/ResultType"); //支付返回方��
    $ResultType=$ResultTypes[0];
   $IpsBillTimes = $xml->xpath("GateWayRsp/body/IpsBillTime"); //IPS处理�߶间
    $IpsBillTime=$IpsBillTimes[0];
	
$resParam="关联�?"
          .$ReferenceID
          ."响应编码:"
          .$RspCode
          ."响应说明:"
          .$RspMsg
          ."接嵯�߶间:"
          .$ReqDate
          ."响应�߶间:"
          .$RspDate
          ."数字�о名:"
          .$Signature
          ."商户订单�?"
          .$MerBillNo
          ."币种:"
          .$CurrencyType
          ."订单金额:"
          .$Amount
          ."订单�ߥ期:"
          .$Date
          ."交易�Ӷ�?"
          .$Status
          ."发卡行返�ƞ信�?"
          .$Msg
          ."数据�?"
          .$Attach
		   ."IPS订单�?"
		     .$IpsBillNo
		   ."交易返回方��:"
          .$RetEncodeType
		   ."�ж行订单�?"
		     .$BankBillNo
			  ."支付返回方��:"
		     .$ResultType
			   ."IPS处理�߶间:"
		     .$IpsBillTime;
//file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s').'S2S新系统获取参数信�?'.$resParam."\r\n",FILE_APPEND);

//验签明文
//billno+【订卿���号�?currencytype+【币种�?amount+【订单金额�?date+【订单日����?succ+【成�ɟ标志�?ipsbillno+【IPS订单编���?retencodetype +【交易返�ƞ签名方式�?【商户内部证书�?

 $sbReq = "<body>"
                          . "<MerBillNo>" . $MerBillNo . "</MerBillNo>"
                          . "<CurrencyType>" . $CurrencyType . "</CurrencyType>"
                          . "<Amount>" . $Amount . "</Amount>"
                          . "<Date>" . $Date . "</Date>"
                          . "<Status>" . $Status . "</Status>"
                          . "<Msg><![CDATA[" . $Msg . "]]></Msg>"
                          //. "<Attach><![CDATA[" . $Attach . "]]></Attach>"
                          . "<IpsBillNo>" . $IpsBillNo . "</IpsBillNo>"
                          . "<IpsTradeNo>" . $IpsTradeNo . "</IpsTradeNo>"
                          . "<RetEncodeType>" . $RetEncodeType . "</RetEncodeType>"
                          . "<BankBillNo>" . $BankBillNo . "</BankBillNo>"
                          . "<ResultType>" . $ResultType . "</ResultType>"
                          . "<IpsBillTime>" . $IpsBillTime . "</IpsBillTime>"
                       . "</body>";
$sign=$sbReq.$arr[0].$rowcontrol[ipszs];




$md5sign=  md5($sign);


//判断�о名
if($Signature==$md5sign)
{

      if($RspCode=='000000')
    {
	
		
		$billno=$MerBillNo;
		$amount=$Amount;
		
       $sj=date("Y-m-d H:i:s");
       $uip=$_SERVER["REMOTE_ADDR"];

		
		//while1("*","yjcode_dingdang where ddbh='".$billno."' and ddzt='�Љ待买家付款'");


		$sqltype="select * from yjcode_dingdang where ddbh='".$billno."'";



		$restype=mysql_query($sqltype);
		$rowtype=mysql_fetch_array($restype);
		//print_r($rowtype);
		
		if($rowtype['alipayzt']!="TRADE_SUCCESS"){

			$url="http://".$_SERVER['SERVER_NAME']."/user/ips/ok.php?billno=".$billno."&amount=".$amount;
		//echo $url;
        file_get_contents($url);

       }
		

        

      


	  
		//php_toheader("../paylog.php");		
				
		
		echo "支付成功";
	
    }
    
 }
else
{

    echo "订单�о名���ﯯ";
}


?>
