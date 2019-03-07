<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
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
 <div class="d1"><a href="../">用户中心</a> - 设置头像</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="chushou" name="jvs" />

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
  'uploadScript':'uploadifive.php',
  
  'onUpload': function(file) {
   document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
   },
	
  'onUploadComplete':function(file, data){
   location.href="touxiang.php";
   }
  });
  });
  </script>
 
 </div>
</div>
</form>

<?
$usertx="../../upload/".$rowuser[id]."/user.jpg";
if(!is_file($usertx)){$usertx="../../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);}
?>
<div class="tishi box">
 <div class="d1" style="text-align:center;"><img src="<?=$usertx?>" width="200" height="200" /></div>
</div>


<? include("bottom.php");?>
</body>
</html>