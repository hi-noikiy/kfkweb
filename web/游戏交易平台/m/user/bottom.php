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
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;��ݲ˵�</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1">
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/">������ҳ</a>
<a href="<?=weburl?>m/news/newslist.html">��ҵ��Ѷ</a>
<a href="<?=weburl?>m/alltype/">ȫ������</a>
<a href="<?=weburl?>m/search/main.php">��Ʒ����</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;�������</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1" />
<span>
<img src="<?=weburl?>m/img/navbg5.png" width="100%" />
<div>
<a href="<?=weburl?>m/user/">��Ա����</a>
<a href="<?=weburl?>m/user/order.php">�ҵĶ���</a>
<a href="<?=weburl?>m/user/car.php">���ﳵ</a>
<a href="<?=weburl?>m/user/favpro.php">�ղؼ�</a>
<a href="<?=weburl?>m/user/inf.php">��������</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;��������</div>
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/user/sell.php">��������</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=wait">��Ҫ����</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=back">�����˿�</a>
<a href="<?=weburl?>m/user/sellorder.php?ddzt=db">�ȴ��ջ�</a>
</div>
</span>
</li>
</ul>
</div>

<div class="footer_front"><img src="<?=weburl?>m/img/front.png" width="100%" height="100%"></div>
<script language="javascript">
//�ײ���ʽ
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