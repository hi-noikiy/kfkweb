<?php
header("Content-type:text/html; charset=gb2312");

include("../../config/conn.php");
include("../../config/function.php");

//�̻���������
$BillDate = date('Ymd');

//�̻����ص�ַ
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
$url .= str_ireplace('localhost', '127.0.0.1', $_SERVER['HTTP_HOST']) . $_SERVER['SCRIPT_NAME'];
$url = str_ireplace('orderpay', 'OrderReturn', $url);

$userid=returnuserid($_SESSION["SHOPUSER"]);
$sj=date("Y-m-d H:i:s");
$BillNo = date('YmdHis') . mt_rand(100000,999999)."|".$userid;
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=sqlzhuru($_POST[t1]);
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$BillNo."',".$userid.",'".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','��Ѷ֧��',0");



$arr = explode("|",$rowcontrol[ipsshh]);

 //��ȡ�������
$pVersion = 'v1.0.0';//�汾��
$pMerCode = $arr[0];//�̻���
$pMerName = webname;//�̻���
$pMerCert = $rowcontrol[ipszs];//�̻�֤��
$pAccount  =  $arr[1];//�˻���
$pMsgId = "msg".rand(1000,9999);//��Ϣ���
$pReqDate = date("Ymdhis");//�̻�����ʱ��

$pMerBillNo = $BillNo;//�̻�������
$pAmount = $money1;//������� 
$pDate =date("Ymd");//��������
$pCurrencyType = "GB";//����
$pGatewayType = "01";//֧����ʽ
$pLang = "GB";//����
$pMerchanturl = $url;//֧������ɹ����ص��̻�URL 
$pFailUrl = "";//֧�����ʧ�ܷ��ص��̻�URL 
$pAttach = "";//�̻����ݰ�
$pOrderEncodeTyp = "5";//����֧���ӿڼ��ܷ�ʽ Ĭ��Ϊ5#md5
$pRetEncodeType ="17";//���׷��ؽӿڼ��ܷ�ʽ
$pRetType = "3";//���ط�ʽ 
$pServerUrl = $url;//Server to Server����ҳ�� 
$pBillEXP = 1;//������Ч��(����ʱ������Ϊ1Сʱ)
$pGoodsName = "pay";//��Ʒ����
$pIsCredit = "0";//ֱ��ѡ��
$pBankCode = "";//���к�
$pProductType= "1";//��Ʒ����

$reqParam="�̻���".$pMerCode
          ."�̻���".$pMerName
          ."�˻���".$pAccount
          ."��Ϣ���".$pMsgId
          ."�̻�����ʱ��".$pReqDate
          ."�̻�������".$pMerBillNo
          ."�������".$pAmount
          ."��������".$pDate
          ."����".$pCurrencyType
          ."֧����ʽ".$pGatewayType
          ."����".$pLang
          ."֧������ɹ����ص��̻�URL".$pMerchanturl
          ."֧�����ʧ�ܷ��ص��̻�URL".$pFailUrl
          ."�̻����ݰ�".$pAttach
          ."����֧���ӿڼ��ܷ�ʽ".$pOrderEncodeTyp
          ."���׷��ؽӿڼ��ܷ�ʽ".$pRetEncodeType
          ."���ط�ʽ".$pRetType
          ."Server to Server����ҳ�� ".$pServerUrl
          ."������Ч��".$pBillEXP
          ."��Ʒ����".$pGoodsName
          ."ֱ��ѡ��".$pIsCredit
          ."���к�".$pBankCode
          ."��Ʒ����".$pProductType;


 if($pIsCredit==0)
 {
     $pBankCode="";
     $pProductType='';
 }

 //�����ĵ���Ϣ��
  $strbodyxml= "<body>"
	         ."<MerBillNo>".$pMerBillNo."</MerBillNo>"
	         ."<Amount>".$pAmount."</Amount>"
	         ."<Date>".$pDate."</Date>"
	         ."<CurrencyType>".$pCurrencyType."</CurrencyType>"
	         ."<GatewayType>".$pGatewayType."</GatewayType>"
                 ."<Lang>".$pLang."</Lang>"
	         ."<Merchanturl>".$pMerchanturl."</Merchanturl>"
	         ."<FailUrl>".$pFailUrl."</FailUrl>"
                 ."<Attach>".$pAttach."</Attach>"
                 ."<OrderEncodeType>".$pOrderEncodeTyp."</OrderEncodeType>"
                 ."<RetEncodeType>".$pRetEncodeType."</RetEncodeType>"
                 ."<RetType>".$pRetType."</RetType>"
                 ."<ServerUrl>".$pServerUrl."</ServerUrl>"
                 ."<BillEXP>".$pBillEXP."</BillEXP>"
                 ."<GoodsName>".$pGoodsName."</GoodsName>"
                 ."<IsCredit>".$pIsCredit."</IsCredit>"
                 ."<BankCode>".$pBankCode."</BankCode>"
                 ."<ProductType>".$pProductType."</ProductType>"
	      ."</body>";

  
  $Sign=$strbodyxml.$pMerCode.$pMerCert;//ǩ������



 
  $pSignature = md5($strbodyxml.$pMerCode.$pMerCert);//����ǩ�� 
  //�����ĵ���Ϣͷ
  $strheaderxml= "<head>"
                   ."<Version>".$pVersion."</Version>"
                   ."<MerCode>".$pMerCode."</MerCode>"
                   ."<MerName>".$pMerName."</MerName>"
                   ."<Account>".$pAccount."</Account>"
                   ."<MsgId>".$pMsgId."</MsgId>"
                   ."<ReqDate>".$pReqDate."</ReqDate>"
                   ."<Signature>".$pSignature."</Signature>"
              ."</head>";
 
//�ύ�����صı���
$strsubmitxml =  "<Ips>"
              ."<GateWayReq>"
              .$strheaderxml
              .$strbodyxml
	      ."</GateWayReq>"
            ."</Ips>";

//�ύ����������




?>


<!DOCTYPE html>
<html>
<head lang="en">
<meta NAME="robots" CONTENT="noindex,nofollow">
<meta name="robots" content="noarchive"> <!-- ����-->
<meta http-equiv="content-Type" content="text/html; charset=gb2312">
<form name="form1" id="form1" method="post" action="http://newpay.ips.com.cn/psfp-entry/gateway/payment.html" target="_self">
<input type="hidden" name="pGateWayReq" value="<?php echo $strsubmitxml ?>" />
</form>
<script language="javascript">document.form1.submit();</script>
<!--
<html>
  <head>
    <meta http-equiv="content-Type" content="text/html; charset=gb2312">
    <title>��Ѷ֧���ӿ���ת�С���</title>
  </head>
  <body onLoad="javascript:document.frm1.submit()">
    <form action="redirect.php" METHOD="POST" name="frm1">	
    <input type="hidden" value="0" name="test" />
    <input type="hidden" value="<?=$rowcontrol[ipsshh]?>" name="Mer_code" />
    <input type="hidden" value="<?=$rowcontrol[ipszs]?>" name="Mer_key" />
    <input type="hidden" value="<?=$BillNo?>" name="Billno" />
    <input type="hidden" value="<?=$money1?>" name="Amount" />
    <input type="hidden" value="<?=$money1?>" name="DispAmount" />
    <input type="hidden" value="<?=$BillDate?>" name="Date" />
    <input type="hidden" value="RMB" name="Currency_Type" />
    <input type="hidden" value="01" name="Gateway_Type" />
    <input type="hidden" value="GB" name="Lang" />
    <input type="hidden" value="<?=$url?>" name="Merchanturl" />
    <input type="hidden" value="5" name="OrderEncodeType" />
    <input type="hidden" value="17" name="RetEncodeType" />
    <input type="hidden" value="1" name="Rettype" />
    <input type="hidden" value="<?=$url?>" name="ServerUrl" />
    </form> 
  </body> 
</html>-->