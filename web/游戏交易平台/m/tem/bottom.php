<div class="bottommain"></div>
<div id="bottommenu">
<ul>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;��ϵ�ͷ�</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1">
<span style="width:140px;">
<? $a1=preg_split("/,/",$rowcontrol[webqqv]);?>
<img src="<?=weburl?>m/img/navbg<?=count($a1)?>.png" width="100%" />
<div style=" line-height:55px">
 <?
 for($i=0;$i<count($a1);$i++){
  $b1=preg_split("/\*/",$a1[$i]);
  echo  $b1[0]."��".$b1[1]."<br>";
 }
 ?>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;��ݵ���</div>
<img class="line" src="<?=weburl?>m/img/line.png" width="1" />
<span>
<img src="<?=weburl?>m/img/navbg5.png" width="100%" />
<div>
<a href="<?=weburl?>m/reg/">�˺ŵ�¼</a>
<a href="<?=weburl?>m/reg/reg.php">ע���Ա</a>
<a href="<?=weburl?>m/news/newslist.html">��ҵ��Ѷ</a>
<a href="<?=weburl?>m/alltype/">ȫ������</a>
<a href="<?=weburl?>m/search/main.php">��Ʒ����</a>
</div>
</span>
</li>
<li>
<div class="menu_li"><img src="<?=weburl?>m/img/coin.png" width="10" />&nbsp;��Ա����</div>
<span>
<img src="<?=weburl?>m/img/navbg4.png" width="100%">
<div>
<a href="<?=weburl?>m/user/">�������</a>
<a href="<?=weburl?>m/user/sell.php">��������</a>
<a href="<?=weburl?>m/user/pwd.php">�޸�����</a>
<a href="<?=weburl?>m/user/un.php">��ȫ�˳�</a>
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