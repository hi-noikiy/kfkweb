<?php 
include("../../../../config/conn.php");
include("../../../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../../../reg/");}
$sj=date("Y-m-d H:i:s");

if(sqlzhuru($_POST[jvs])=="carpay"){
include("../../../../user/buycheck.php");
if($needmoney<=$usermoney){Audit_alert("���Ŀ������㣬�������ֱ��֧����","../../carpay.php?carid=".$carid);}
zwzr();
updatetable("yjcode_user","uqq='".sqlzhuru($_POST[tuqq])."' where uid='".$_SESSION[SHOPUSER]."'");
$bh=time();
$_SESSION[wxddbh]=time()."wx".$rowuser[id]."wx".rnd_num(1000);
$uip=$_SERVER["REMOTE_ADDR"];
$ddbh=time()."|".$rowuser[id];	
$money1=sprintf("%.2f",($needmoney-$usermoney));
$buyformarr=sqlzhuru($_POST[buyformv]);
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok,probh,pronum,tcid,wxddbh,buyform","'".$bh."','".$ddbh."',".$rowuser[id].",'".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','΢���ֻ�֧��',0,'".$bharr."','".$numarr."','".$tcidarr."','".$_SESSION[wxddbh]."','".$buyformarr."'");
}

//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//��ʼ����־
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//��ӡ���������Ϣ
function printf_info($data)
{
    foreach($data as $key=>$value){
        //echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//�١���ȡ�û�openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//�ڡ�ͳһ�µ�
while1("*","yjcode_dingdang where wxddbh='".$_SESSION[wxddbh]."'");$row1=mysql_fetch_array($res1);$moneyv=$row1[money1]*100;
$input = new WxPayUnifiedOrder();
$input->SetBody(iconv("GB2312","UTF-8//IGNORE",webname."��Ʒ����"));
$input->SetAttach("test");
$input->SetOut_trade_no("$_SESSION[wxddbh]");
$input->SetTotal_fee($moneyv);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url(weburl."m/user/wxpay_gz/example/buy_notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
//echo '<font color="#f00"><b>ͳһ�µ�֧������Ϣ</b></font><br/>';
//printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//��ȡ�����ջ���ַjs��������
$editAddress = $tools->GetEditAddressParameters();

//�ۡ���֧�ֳɹ��ص�֪ͨ�д���ɹ�֮������ˣ��� notify.php
/**
 * ע�⣺
 * 1������Ļص���ַ���ɷ��ʵ�ʱ�򣬻ص�֪ͨ��ʧ�ܣ�����ͨ����ѯ������ȷ��֧���Ƿ�ɹ�
 * 2��jsapi֧��ʱ��Ҫ�����û�openid��WxPay.JsApiPay.php���л�ȡopenid���� ���ĵ����Բο�΢�Ź���ƽ̨����ҳ��Ȩ�ӿڡ���
 * �ο�http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html��
 */
 

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=gb2312"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>΢��֧������-֧��</title>
    <script type="text/javascript">
	//����΢��JS api ֧��
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok"){
                   //alert(res.err_code+res.err_desc+res.err_msg);
                       window.location.href="../../order.php";
                   }else{
                       //������ת����������ҳ��
                       window.location.href="../../car.php";
                         
                   };
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
</head>
<body onLoad="callpay()">
</body>
</html>