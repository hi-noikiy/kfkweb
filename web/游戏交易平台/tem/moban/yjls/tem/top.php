<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbtop">
<div class="yjcode">

 <div class="top">
  <ul class="u1">
  <li class="l1">
   <span id="notlogin" style="display:none">
    <span class="s1">您好，欢迎来<?=webname?>！[<a href="<?=weburl?>reg/">登录</a> | <a href="<?=weburl?>reg/reg.php">免费注册</a> | <a class="feng" href="<?=weburl?>user/qiandao.php">每日签到</a>]</span>
    <span class="s2"><a href="<?=weburl?>config/qq/oauth/index.php"><img border="0" src="<?=weburl?>img/qq_login.png" /></a></span>
   </span>
   <span id="yeslogin" style="display:none">欢迎您：<span id="yesuid"></span>&nbsp;&nbsp;账户余额：<span id="yue"></span>元&nbsp;&nbsp;账户积分：<span id="jifen"></span>分&nbsp;&nbsp;[<a class="feng" href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;">每日签到</a><a class="blue" id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php">今日已签到</a>]&nbsp;&nbsp;<a href="<?=weburl?>user/un.php">退出</a></span>
  </li>
  <li class="l2"><a href="<?=weburl?>">网站首页</a></li>
  <li class="l2"><a href="<?=weburl?>user/order.php">我的订单</a></li>
  <li class="l3" onmouseover="lover(3)" onmouseout="lout(3)" id="topu1l3">
  <a href="<?=weburl?>user/" class="a1">会员中心</a>
  <div class="umenu" id="umenu3" style="display:none;">
  <a href="<?=weburl?>user/">购买记录</a>
  <a href="<?=weburl?>user/pay.php">在线充值</a>
  <a href="<?=weburl?>user/paylog.php">资金明细</a>
  <a href="<?=weburl?>user/favpro.php">我的收藏</a>
  <a href="<?=weburl?>user/inf.php">个人信息</a>
  </div>
  </li>
  <li class="l0"></li>
  <li class="l2 l21"><a href="<?=weburl?>user/pay.php" class="feng">充值</a></li>
  <li class="l2 l21"><a href="<?=weburl?>user/tixian.php" class="green">提现</a></li>
  <li class="l2"><a href="<?=weburl?>help/">新手帮助</a></li>
  <li class="l2"><a href="<?=weburl?>user/gdlx.php" target="_blank" class="red">有问必答</a></li>
  </ul>
 </div> 
 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
function is_mobile() {
    var regex_match = /(nokia|iphone|android|motorola|^mot-|softbank|foma|docomo|kddi|up.browser|up.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte-|longcos|pantech|gionee|^sie-|portalmmm|jigs browser|hiptop|^benq|haier|^lct|operas*mobi|opera*mini|320x320|240x320|176x220)/i;
  var u = navigator.userAgent;
  if (null == u) {
   return true;
  }
  var result = regex_match.exec(u);
  if (null == result) {
   return false
  } else {
   return true
  }
 }
 if (is_mobile()) {
  document.location.href= 'http://yungou.taotaofanli.com/m/';
 }
</script>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>