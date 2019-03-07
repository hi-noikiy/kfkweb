<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);if($rowuser[sfzrz]!=2 && $rowuser[sfzrz]!=3){php_toheader("smrz.php"); }
$sfz1="../../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-1.jpg";
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadifive.css">

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 实名认证</div>
</div>

<div class="tishi box">
<div class="d1">
认证步骤：<br>
一、填写真实姓名和身份证号码<br>
<strong class="blue">二、上传身份证正面照片</strong><br>
三、上传身份证反面照片<br>
四、上传手持身份证半身人像照片<br>
</div>
</div>

<div class="listcap box"><div class="d2">请上传身份证正面：</div></div>
<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="smrz" name="jvs" />
<div class="tishi box">
 <div class="d1">
 
  <div id="pltp1">
  <div id="queue" style="display:none;"></div>
  <input id="file_upload" name="file_upload" type="file">
  </div>
  
  <div id="pltp2" class="red" style="display:none;">
  <img src="../img/load1.gif" style="margin-bottom:7px;" width="20" height="20" /><span class="fd">正在上传中，请勿刷新或关闭页面……</span><br>
  </div>

  <script type="text/javascript">
  <?php $timestamp = time();?>
  $(function() {
  $('#file_upload').uploadifive({
  'auto': true,
  'formData': {
    'timestamp' : '<?= $timestamp?>',
    'token'     : '<?=md5('unique_salt'.$timestamp);?>',
	'uid'       : '<?=$rowuser[id]?>',
	'pwd'       : '<?=$rowuser[pwd]?>'
              },
  'queueID': 'queue',
  'uploadScript':'uploadifive2.php',
  
  'onUpload': function(file) {
   document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
   },
	
  'onUploadComplete':function(file, data){
   location.href="smrz3.php";
   }
  });
  });
  </script>
 
 </div>
</div>

</form>

<? if(is_file($sfz1)){?>
<div class="tishi box">
<div class="d1" style="text-align:center;"><a href="<?=$sfz1?>" target="_blank"><img border="0" src="<?=$sfz1?>" width="170" height="100" /></a></d1>
</div>
<? }?>

<? include("bottom.php");?>
</body>
</html>