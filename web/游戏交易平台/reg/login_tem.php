<?
if(empty($uid) || empty($pwd)){Audit_alert("�ʺŻ������������󣬷�������","./");}
 $sql="select id,uid,pwd,zt from yjcode_user where uid='".$uid."' and pwd='".sha1($pwd)."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);
 ;if(!$row=mysql_fetch_array($res)){Audit_alert("�ʺ�������֤���󣬷�������","./");}
 if(0==$row[zt]){Audit_alert("�����ʺ��ѱ����ã�����ϵ��վ�ͷ�����","./");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$uid;
?>