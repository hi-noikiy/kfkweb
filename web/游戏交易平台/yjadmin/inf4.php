<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $sellbl=sqlzhuru($_POST[tsellbl]);
 updatetable("yjcode_control","
			  dbsj=".sqlzhuru($_POST[tdbsj]).",
			  ycsj=".sqlzhuru($_POST[tycsj]).",
			  tksj=".sqlzhuru($_POST[ttksj]).",
			  regmoney=".sqlzhuru($_POST[tregmoney]).",
			  regjf=".sqlzhuru($_POST[tregjf]).",
			  pjjf=".sqlzhuru($_POST[tpjjf]).",
			  qdjf=".sqlzhuru($_POST[tqdjf]).",
			  jfmoney=".sqlzhuru($_POST[tjfmoney]).",
			  tjmoney=".sqlzhuru($_POST[ttjmoney]).",
			  sellbl=".$sellbl.",
			  tknum=".sqlzhuru($_POST[ttknum]).",
			  txdi=".sqlzhuru($_POST[ttxdi]).",
			  taskyj=".sqlzhuru($_POST[ttaskyj]).",
			  taskoksj=".sqlzhuru($_POST[ttaskoksj]).",
			  taskerrsj=".sqlzhuru($_POST[ttaskerrsj]).",
			  txfl=".sqlzhuru($_POST[ttxfl]).",
			  inittj='".sqlzhuru($_POST[tinittj])."',
			  txyh='".sqlzhuru($_POST[txyh])."'
			  ");
 if(intval($_POST[R1])==2){updatetable("yjcode_user","sellbl=".$sellbl."");}
 deletetable("yjcode_qiandaojf");
 for($i=1;$i<=5;$i++){
 $d=$_POST["day_".$i];
 $jf=$_POST["jf_".$i];
 intotable("yjcode_qiandaojf","daynum,jf","".$d.",".$jf."");
 }
 php_toheader("inf4.php?t=suc");
}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function tj(){
c=document.getElementsByName("Ctxyh");
cstr="";
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.txyh.value=cstr;
tjwait();
f1.action="inf4.php";
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu1").className="l11";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_quanju.html");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">��ǰλ�ã�<a href="default.php">��̨��ҳ</a> - <strong>ӯ����������</strong></li><li class="l2"></li>
 </ul>
 
 <? include("rightcap1.php");?>
 <script language="javascript">$("rtit5").className="l1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf4.php");}?>
 
 <!--Begin-->
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">����ʱ�䣺</li>
 <li class="l2">
 <input name="tdbsj" value="<?=$row[dbsj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������Ϊ3����ʾ������3�������δȷ���ջ���ϵͳ���Զ�ȷ���ջ�</span>
 </li>
 <li class="l1">�ӳ��ջ�ʱ�䣺</li>
 <li class="l2">
 <input name="tycsj" value="<?=$row[ycsj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������Ϊ7����ʾ���ӳ�7��ȷ���ջ�</span>
 </li>
 <li class="l1">�˿�ʱ�䣺</li>
 <li class="l2">
 <input name="ttksj" value="<?=$row[tksj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" /> 
 <span class="hui">������Ϊ5����ʾ���ҷ����������5���ڿ��������˿�</span>
 </li>
 <li class="l1">ע�����ͽ�Ǯ��</li>
 <li class="l2">
 <input name="tregmoney" value="<?=$row[regmoney]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">Ĭ��Ϊ0����ֵ��ʾ��Աע��ʱ���͵Ľ���Ҫ̫��Ŷ</span>
 </li>
 <li class="l1">ע�����ͻ��֣�</li>
 <li class="l2">
 <input name="tregjf" value="<?=$row[regjf]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">Ĭ��Ϊ0����ֵ��ʾ��Աע��ʱ���͵Ļ��֣���Ҫ̫��Ŷ</span>
 </li>
 <li class="l1">���ֶһ�������</li>
 <li class="l2">
 <input name="tjfmoney" value="<?=$row[jfmoney]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">100��ʾ100���ֶһ�1����ң�10��ʾ10���ֶһ�1����ң���������</span>
 </li>
 <li class="l1">���ۻ��֣�</li>
 <li class="l2">
 <input name="tpjjf" value="<?=$row[pjjf]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">���׳ɹ�����ҷ��������õĻ�����</span>
 </li>
 <li class="l1">ǩ�����֣�</li>
 <li class="l2">
 <input name="tqdjf" value="<?=$row[qdjf]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">�� (ÿ��ǩ�����û��ɻ�õĻ���)</span>
 </li>
 </ul>
 
 <ul class="openyf">
 <li class="l1">����ǩ������</li>
 <li class="l2">��������</li>
 </ul>
 <? 
 while1("*","yjcode_qiandaojf order by daynum asc");for($j=1;$j<=5;$j++){
 if($row1=mysql_fetch_array($res1)){$d=$row1[daynum];$jf=$row1[jf];}else{$d="";$jf="";}
 ?>
 <ul class="yue">
 <li class="l1"><input type="text" name="day_<?=$j?>" value="<?=$d?>" /></li>
 <li class="l2"><input type="text" name="jf_<?=$j?>" value="<?=$jf?>" /></li>
 </ul>
 <? }?>
 
 <ul class="uk">
 <li class="l1">�����н�Ӷ��</li>
 <li class="l2">
 <input name="ttaskyj" value="<?=$row[taskyj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">��������ɺ�ƽ̨�ɻ�õ�Ӷ����� <span class="red">0.01��ʾ�ٷ�֮һ��0.02��ʾ�ٷ�֮��</span>����������</span>
 </li>
 <li class="l1">�����������գ�</li>
 <li class="l2">
 <input name="ttaskoksj" value="<?=$row[taskoksj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">�죬���ַ��������պ�������Ҫ�����ʱ���ڴ��������Զ�����</span>
 </li>
 <li class="l1">����������գ�</li>
 <li class="l2">
 <input name="ttaskerrsj" value="<?=$row[taskerrsj]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">�죬�������ղ�ͨ���������Ҫ����������ڴ��������Զ�����</span>
 </li>
 <li class="l1">�Ƽ�Ӷ�������</li>
 <li class="l2">
 <input name="ttjmoney" value="<?=$row[tjmoney]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">�Ƽ����û��ɻ�õĽ���Ӷ�������0.01��ʾ1%��0.02��ʾ2%��<span class="red">(�����Ʒ���������ã�����Ʒ��������Ϊ׼)</span></span>
 </li>
 <li class="l1">�������������</li>
 <li class="l2">
 <input name="tsellbl" value="<?=$row[sellbl]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">���ҿɻ�õĽ�����:1��ʾȫ�����ң�0.9��ʾ90%�����ҡ�<span class="red">(�����Ʒ���������ã�����Ʒ��������Ϊ׼)</span></span>
 </li>
 <li class="l1">�������Ӧ�ã�</li>
 <li class="l2">
 <span class="finp">
 <label><input name="R1" type="radio" value="1" checked="checked" /> ����ע���û�</label>&nbsp;&nbsp;
 <label><input name="R1" type="radio" value="2" /> ȫվ�û�����</label>
 </span>
 </li>
 <li class="l1">�������ֵ��</li>
 <li class="l2">
 <input name="ttxdi" value="<?=returnjgdw($row[txdi],"",0)?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">����Ϊ���������ܴ�С����</span>
 </li>
 <li class="l1">���������ѣ�</li>
 <li class="l2">
 <input name="ttxfl" value="<?=returnjgdw($row[txfl],"",0)?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">��0.01����ʾ�ٷ�֮һ����100Ԫ��ȡ1Ԫ������</span>
 </li>
 <li class="l1">�������У�</li>
 <li class="l2">
 <span class="finp">
 <input type="hidden" name="txyh" />
 <? $txarr=array("֧����","΢��","��������","ũҵ����","��������","�й�����");for($i=0;$i<count($txarr);$i++){?>
 <label><input name="Ctxyh" type="checkbox" value="<?=$txarr[$i]?>" <? if(strstr($row[txyh],$txarr[$i])){?>checked="checked"<? }?> /> <?=$txarr[$i]?></label> &nbsp;&nbsp;
 <? }?>
 </span>
 </li>
 <li class="l1">ͳ�����ݳ�ʼ��</li>
 <li class="l2">
 <input name="tinittj" value="<?=$row[inittj]?>" size="30" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">�ö��Ÿ�������ʽΪ����Ա��,��Ʒ��,���ױ���,���׽�������� 100,50,200,10000</span>
 </li>
 <li class="l1">�˿�������ƣ�</li>
 <li class="l2">
 <input name="ttknum" value="<?=$row[tknum]?>" size="10" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="hui">������Ϊ3����ʾ����������3���˿���ͬ�ʶ����˿��3�Σ��ͻᱻ�������޷��ٽ����˿�</span>
 </li>
 <li class="l3"><? tjbtnr("�����޸�");?></li>
 </ul>
 </form>

 <!--End-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>