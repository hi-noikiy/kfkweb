<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$timestamp=time();
$pwd=$rowuser[pwd];
$userid=$rowuser[id];

$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and ddzt='suc' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}
if(panduan("bh","yjcode_pro where bh='".$row[probh]."'")==0){Audit_alert("����Ʒ�ѱ�ɾ�����޷��������ۣ�","order.php");}
$sqlpj="select * from yjcode_propj where orderbh='".$orderbh."' and userid=".$userid;mysql_query("SET NAMES 'GBK'");$respj=mysql_query($sqlpj);
if($rowpj=mysql_fetch_array($respj)){$ifpj=1;}else{$ifpj=0;}

if(sqlzhuru($_POST[jvs])=="pj"){
 zwzr();
 if(1==$ifpj){Audit_alert("�������۹��������ظ�������","orderpj.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if(panduan("*","yjcode_tp where bh='".$orderbh."'")==1){$iftp=1;}else{$iftp=0;}
 intotable("yjcode_propj","probh,selluserid,userid,sj,uip,pf1,pf2,pf3,txt,orderbh,pjlx,iftp","'".$row[probh]."',".$row[selluserid].",".$row[userid].",'".$sj."','".$uip."',".sqlzhuru($_POST[hpjjf1]).",".sqlzhuru($_POST[hpjjf2]).",".sqlzhuru($_POST[hpjjf3]).",'".sqlzhuru($_POST[s1])."','".$row[orderbh]."',".$_POST[Rpj].",".$iftp."");$id=mysql_insert_id();
 if(empty($id)){Audit_alert("�������۹��������ظ�������","orderpj.php?orderbh=".$orderbh);}
 $sql1="select avg(pf1) as pf1v,avg(pf2) as pf2v,avg(pf3) as pf3v from yjcode_propj where probh='".$row[probh]."' and selluserid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$res1=mysql_query($sql1);
 $row1=mysql_fetch_array($res1);
 updatetable("yjcode_pro","pf1=".round($row1[pf1v],2).",pf2=".round($row1[pf2v],2).",pf3=".round($row1[pf3v],2)." where bh='".$row[probh]."'");
 PointInto($userid,"���׳ɹ���������Ʒ��û���",$rowcontrol[pjjf]);
 PointUpdate($userid,$rowcontrol[pjjf]); 

 $sqlp="select avg(pf1) pf1v,avg(pf2) pf2v,avg(pf3) pf3v from yjcode_pro where zt=0 and userid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");
 $resp=mysql_query($sqlp);$rowp=mysql_fetch_array($resp);
 updatetable("yjcode_user","pf1=".round($rowp[pf1v],2).",pf2=".round($rowp[pf2v],2).",pf3=".round($rowp[pf3v],2)." where id=".$row[selluserid]);

 php_toheader("orderpj.php?orderbh=".$orderbh);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>

<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">

<script language="javascript">
function pjover(x,y){
document.getElementById("pjbg"+x).style.backgroundImage="url(img/pj"+y+"v.gif)";
if(y==0){sv="δ���";}
else if(y==1){sv="ʧ��";}
else if(y==2){sv="����";}
else if(y==3){sv="һ��";}
else if(y==4){sv="����";}
else if(y==5){sv="��ϲ";}
document.getElementById("pjf"+x).innerHTML=y+"��&nbsp;"+sv;
}

function pjonc(x,y){
document.getElementById("hpjjf"+x).value=y;
}

function pjout(x,y){
 pjjf=parseInt(document.getElementById("hpjjf"+x).value);
 if(pjjf!=0){pjover(x,pjjf);}
 else{pjover(x,0);}
}

function tj(){
 if(parseInt(document.getElementById("hpjjf1").value)==0){alert("���ȶ�����������");return false;}
 if(parseInt(document.getElementById("hpjjf2").value)==0){alert("���ȶԷ����ٶȴ��");return false;}
 if(parseInt(document.getElementById("hpjjf3").value)==0){alert("���ȶԷ���̬�ȴ��");return false;}
 if((document.f1.s1.value).replace(/\s/,"")==""){alert("�������Ҫ�ĵ�������");document.f1.s1.focus();return false;}
 tjwait();
 f1.action="orderpj.php?orderbh=<?=$orderbh?>";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����</li>
</ul>
<? $leftid=2;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">��������</li>
 <li class="l1"><a href="order.php">�ҵĶ���</a></li>
 </ul>
 <? include("orderv.php");?>
 
 <? if(0==$ifpj){?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="pj" name="jvs" />
 <input type="hidden" id="hpjjf1" name="hpjjf1" value="0" />
 <input type="hidden" id="hpjjf2" name="hpjjf2" value="0" />
 <input type="hidden" id="hpjjf3" name="hpjjf3" value="0" />
 <div class="orderpj">
 <ul class="u1">
 <li class="l1">��д��ʵ������Ϣ���ɻ����վ���͵�<?=$rowcontrol[pjjf]?>����</li>
 <li class="l2">����<br>��Ʒ</li>
 <li class="l3"><textarea name="s1"></textarea></li>
 <!--�ϴ�B-->
 <li class="l4">
 
 <div id="pltp1">
  <div id="queue"></div>
  <input id="file_upload" style="display:none;" name="file_upload" type="file" multiple="true">
 </div>
 
 <div id="pltp2" class="red" style="display:none;">
  <img src="img/ajax_loader.gif" width="208" style="margin-bottom:7px;" height="13" /><br>
  ������,ʣ��<strong id="synum">0</strong>�ţ�����ˢ�»�ر�ҳ��<br>
 </div>

 <script language="javascript">
 $(function() {
  $('#file_upload').uploadify({
    'formData'     : {
    'timestamp' : '<?= $timestamp?>',
    'token'     : '<?=md5('unique_salt'.$timestamp);?>',
	'bh'       : '<?=$orderbh?>',
	'uid'       : '<?=$luserid?>',
	'pwd'       : '<?=$pwd?>'
    },
    'swf'      : 'uploadify.swf',
	'queueID'  : 'uploaddiv',
    'uploader' : 'orderify.php',
				
    'removeTimeout' : 1,
				
    'onDialogClose'  : function(queueData) {
     if(queueData.filesQueued>0){
	  document.getElementById("synum").innerHTML=queueData.filesQueued;
	  document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
     }
    },
    'onQueueComplete' : function(queueData) {
    document.getElementById("pltp1").className="pltp1h";document.getElementById("pltp2").style.display="none";
    },
	'onUploadComplete' : function(file) {
	 document.getElementById("synum").innerHTML=parseInt(document.getElementById("synum").innerHTML)-1;
	 nt=parseInt(document.getElementById("nowtpnum").innerHTML);document.getElementById("nowtpnum").innerHTML=nt+1;
    }
				 
    });
  });
 </script>
 <div id="uploaddiv" style="display:none;"></div>
 
 </li>
 <li class="l5">���ϴ�<strong class="red" id="nowtpnum"><?=returncount("yjcode_tp where bh='".$orderbh."' and type1='����'")?></strong>��ͼƬ<br> ��<a href="orderpjtp.php?orderbh=<?=$orderbh?>" class="feng" target="_blank">����ͼƬ</a>��</li>
 <!--�ϴ�E-->
 </ul>
 <ul class="u2">
 <li class="l1">���������</li>
 <li class="l2" id="pjbg1"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(1,<?=$i?>)" onmouseout="pjout(1,<?=$i?>)" onmouseover="pjover(1,<?=$i?>)"></span><? }?><span id="pjf1" class="pjf"></span></li>
 <li class="l1">�����ٶȣ�</li>
 <li class="l2" id="pjbg2"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(2,<?=$i?>)" onmouseout="pjout(2,<?=$i?>)" onmouseover="pjover(2,<?=$i?>)"></span><? }?><span id="pjf2" class="pjf"></span></li>
 <li class="l1">����̬�ȣ�</li>
 <li class="l2" id="pjbg3"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(3,<?=$i?>)" onmouseout="pjout(3,<?=$i?>)" onmouseover="pjover(3,<?=$i?>)"></span><? }?><span id="pjf3" class="pjf"></span></li>
 <li class="l3">�ۺ����ۣ�</li>
 <li class="l4">
 <label><input name="Rpj" type="radio" value="1" checked="checked" /> ����</label> 
 <label><input name="Rpj" type="radio" value="2" /> ����</label> 
 <label><input name="Rpj" type="radio" value="3" /> ����</label>
 </li>
 </ul>
 <div class="pjbtn"><? tjbtnr("��������")?></div>
 </div>
 </form>
 
 <? }else{?>
 <ul class="typeuk1">
 <li class="l1">��������</li><li class="l2">���� <?=$rowpj[sj]?> �Ա��ν��׽��������ۣ�<br>
 <strong class="feng">���������<?=$rowpj[pf1]?>�֣������ٶ�<?=$rowpj[pf2]?>�֣����ҷ���̬��<?=$rowpj[pf3]?>��</strong><br>
 ���ۣ�<?=$rowpj[txt]?><br>
 <? while1("*","yjcode_tp where bh='".$orderbh."' order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../".str_replace(".","-1.",$row1[tp]);?>
 <a href="../<?=$row1[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>