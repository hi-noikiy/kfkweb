<?php
require("../../config/conn.php");
$yunpay=preg_split("/,/",$rowcontrol[yunpay]);
//���������id
$yun_config['partner']		= $yunpay[0];

//��ȫ������
$yun_config['key']			= $yunpay[1];

//�ƻ�Ա�˻������䣩
$seller_email = $yunpay[2];

//�����������������������������������Ļ�����Ϣ������������������������������

?>