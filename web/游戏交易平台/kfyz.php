<?
include("config/conn.php");
include("config/function.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?></title>
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
 <style>

.kefu01{ width:1150px; margin-left:auto; margin-right:auto;border:1px solid #d6d7dc; margin-bottom:24px; margin-top:24px;}

.kefuck01{ width:320px; border:2px solid #5c9bc6; background-color:#FFF; margin-top:60px; margin-bottom:80px;}
.kftu01{ width:100%; height:90px;}
.kftu01 img{ width:100%; height:100%;}
.kfwenzi01{ line-height:26px; text-align:center; font-size:14px; color:#323232; padding:12px 0;}
.kfshuru01{ border-bottom:2px solid #5c9bc6; border-top:2px solid #5c9bc6}
.kfshuru01 input{ width:266px; line-height:16px; margin:16px auto; padding:4px 6px;}
.anniu01{ text-align:center}

.anniu0101{ display:inline-table;}
.anniu0101 button{ padding:4px 20px; font-size:14px; margin:16px 8px; cursor:pointer}
.yanzheng{ background-color:#f5f5f5; border-bottom:1px solid #d6d7dc; padding:8px 12px; font-size:16px; font-weight:bold; text-align:left;}


 </style>
</head>
<body>
<? include("tem/top.html");?>
<div class="yjcode">
<? while1("*","yjcode_ad where adbh='ADLP' and zt=0 order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
<div id="toplsad" onMouseOver="rels()"><a href="<?=$row1[aurl]?>" target="_blank"><img border="0" src="<?=weburl?>gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>" /></a></div>
<span id="toplsimg" style="display:none;"><?=weburl?>gg/<?=$row1[bh]?>.<?=$row1[jpggif]?></span>
<? }?>
</div>

<? include("tem/top1.html");?>

<div style="clear:both"></div>
 <div class="kefu01">
	<div class="yanzheng">验证客服QQ-官网</div>
	<div class="kefuck01">
    <form method="post" action="" onsubmit="return false;">
        <div class="kftu01"><img src="/img/kefutu.png"></div>
        
        <div class="kfwenzi01">以下功能为您辨别 本站 客服QQ的真伪<br>请输入需要验证的QQ号，点击「验证」</div>
        <div class="kfshuru01"><input type="text" name="kefu" id="kefu" required=""></div>
        <div class="anniu01">
        	<div class="anniu0101">
        	<button type="submit" onclick="isKu();">验&nbsp;&nbsp;&nbsp;证</button>
            <button type="reset">重&nbsp;&nbsp;&nbsp;置</button>
            </div>
        </div>
	</form>
	</div>
</div>
<script>
	function isKu(){
		var xs=document.getElementById("kefu");
		if(xs.value == ''){
			alert('QQ号码不能为空');
			return;
		}
		var reg = eval('/'+xs.value+'\\*/');
		var qqkf = '<?=$rowcontrol[webqqv] ?>';
		if(qqkf.indexOf(xs.value)>=0){
			alert('您输入的QQ号码是本站的客服QQ，请放心咨询');
		}
		else{
			alert('请注意！！！您输入的QQ号码不是本站的客服QQ，请勿上当受骗');
		}
		return false;
	}
</script>

<? include("tem/bottom.html");?>
</body>
</html>