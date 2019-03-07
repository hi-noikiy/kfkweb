<?
$luserid=$rowuser[id];
createDir("../../upload/".$luserid."/");
sellmoneytj($luserid);
$autoses="(selluserid=".$luserid." or userid=".$luserid.")";
include("../../user/auto.php");
?>


<div class="bottommain"></div>
<div id="bottommenu">
<ul>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;快捷菜单</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1">
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/">返回首页</a>
<a href="<?=weburl?>m/news/newslist.html">行业资讯</a>
<a href="<?=weburl?>m/alltype/">全部分类</a>
<a href="<?=weburl?>m/search/main.php">商品搜索</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;我是买家</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1" />
<span>
<img src="<?=weburl?>m/img/navbg5.png" width="100%" />
<div>
<a href="<?=weburl?>m/user/">会员中心</a>
<a href="<?=weburl?>m/user/order.php">我的订单</a>
<a href="<?=weburl?>m/user/car.php">购物车</a>
<a href="<?=weburl?>m/user/favpro.php">收藏夹</a>
<a href="<?=weburl?>m/user/inf.php">个人资料</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;我是卖家</div>
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/user/sell.php">卖家中心</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=wait">我要发货</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=back">处理退款</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=db">等待收货</a>
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