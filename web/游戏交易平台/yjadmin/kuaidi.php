<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=$_GET[bh];
while0("*","yjcode_kuaidi where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("kuaidilist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_kuaidi where tit='".sqlzhuru($_POST[ttit])."' and bh<>'".$bh."'")==1)
 {Audit_alert("�ÿ�ݹ�˾�Ѵ��ڣ�","kuaidi.php?bh=".$bh);}
 updatetable("yjcode_kuaidi","tit='".sqlzhuru($_POST[ttit])."',kdweb='".sqlzhuru($_POST[tkdweb])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",zt=0 where bh='".$bh."'");
 php_toheader("kuaidi.php?t=suc&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
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
 <ul class="wz"><li class="l1">��ǰλ�ã�<a href="./" class="a2">��̨��ҳ</a> - <strong>��ݹ���</strong> [<a href="kuaidilist.php">����</a>]</li><li class="l2"></li></ul>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","kuaidi.php?bh=".$bh);}?>
 
 <!--begin-->
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�������ݹ�˾���ƣ�");document.f1.ttit.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="kuaidi.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��ݹ�˾���ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[tit]?>" class="inp" name="ttit" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1">�����ַ��</li>
 <li class="l2"><input type="text" value="<?=$row[kdweb]?>" class="inp" size="80" name="tkdweb" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l1"><span class="red">*</span> ����</li>
 <li class="l2"><input type="text" class="inp" name="t2" onfocus="inpf(this)" onblur="inpb(this)" value="<?=$row[xh]?>" /> <span class="hui">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><? tjbtnr("�����޸�","kuaidilist.php");?></li>
 </ul>
 </form>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>