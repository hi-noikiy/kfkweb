<?php
/* *
 * ���ܣ��������첽֪ͨҳ��
 */
include("../../config/conn.php");
include("../../config/function.php");


require_once("yun.config.php");
require_once("lib/yun_md5.function.php");

//����ó�֪ͨ��֤���
$yunNotify = md5Verify($_REQUEST['i1'],$_REQUEST['i2'],$_REQUEST['i3'],$yun_config['key'],$yun_config['partner']);

if($yunNotify) {//��֤�ɹ�
	/////////////////////////////////////////////////////////
	
	//�̻�������

	$out_trade_no = $_REQUEST['i2'];

	//��֧�����׺�

	$trade_no = $_REQUEST['i4'];

	//�۸�
	$yunprice=$_REQUEST['i1'];

$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
while1("*","yjcode_dingdang where ddbh='".$out_trade_no."' and ddzt='wait'");if($row1=mysql_fetch_array($res1)){
 updatetable("yjcode_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='TRADE_SUCCESS',ddzt='suc' where id=".$row1[id]);
 $money1=$row1["money1"];
 PointIntoM($row1[userid],"��֧����ֵ".$money1."Ԫ",$money1);
 PointUpdateM($row1[userid],$money1);
 $buyuserid=$row1[userid];
 $bharr=$row1[probh];
 $numarr=$row1[pronum];
 $tcidarr=$row1[tcid];
 $buyformarr=$row1[buyform];
 $shdzarr=$row1[shdz];
 include("../buy.php"); 
}

   
        
	echo "success";		//�벻Ҫ�޸Ļ�ɾ��
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //��֤ʧ��
    echo "fail";//�벻Ҫ�޸Ļ�ɾ��

    //�����ã�д�ı�������¼������������Ƿ�����
    //logResult("����д����Ҫ���ԵĴ������ֵ�����������еĽ����¼");
}
?>