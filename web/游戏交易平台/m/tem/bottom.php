<div class="bottommain"></div>
<div id="bottommenu">
<ul>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;联系客服</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1">
<span style="width:140px;">
<? $a1=preg_split("/,/",$rowcontrol[webqqv]);?>
<img src="<?=weburl?>m/img/navbg<?=count($a1)?>.png" width="100%" />
<div style=" line-height:55px">
 <?
 for($i=0;$i<count($a1);$i++){
  $b1=preg_split("/\*/",$a1[$i]);
  echo  $b1[0]."：".$b1[1]."<br>";
 }
 ?>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;快捷导航</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1" />
<span>
<img src="<?=weburl?>m/img/navbg5.png" width="100%" />
<div>
<a href="<?=weburl?>m/reg/">账号登录</a>
<a href="<?=weburl?>m/reg/reg.php">注册会员</a>
<a href="<?=weburl?>m/news/newslist.html">行业资讯</a>
<a href="<?=weburl?>m/alltype/">全部分类</a>
<a href="<?=weburl?>m/search/main.php">商品搜索</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;会员中心</div>
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/user/">我是买家</a>
<a href="<?=weburl?>m/user/sell.php">我是卖家</a>
<a href="<?=weburl?>m/user/pwd.php">修改密码</a>
<a href="<?=weburl?>m/user/un.php">安全退出</a>
</div>
</span>
</li>
</ul>
</div>

<div class="footer_front"><img src="<?=weburl?>m/img/front.png" width="100%" height="100%"></div>
<script language="javascript">
//底部样式
window.onload = function(){
$('#bottommenu ul li').each(function(j){
$('#bottommenu ul li').eq(j).removeClass("on");
$('#bottommenu ul li span').eq(j).animate({bottom:-$('#bottommenu ul li span').eq(j).height()},100);
});
}

$('#bottommenu ul li').each(function(i){
$(this).click(function(){
if($(this).attr("class")!="on"){
$('#bottommenu ul .on span').animate({bottom:-$('#bottommenu ul .on span').height()},200);
$('#bottommenu ul .on').removeClass("on");
$(this).addClass("on");
$('#bottommenu ul li span').eq(i).animate({bottom:30},200);
$('.footer_front').show();
}else{
$('#bottommenu ul li span').eq(i).animate({bottom:-$('#bottommenu ul li span').eq(i).height()},200);
$(this).removeClass("on");
$('.footer_front').hide();
}
});
});

$('.footer_front').click(function(){
$('#bottommenu ul .on span').animate({bottom:-$('#bottommenu ul .on span').height()},200);
$('#bottommenu ul .on').removeClass("on");
$(this).hide();
});
</script>