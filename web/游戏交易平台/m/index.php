<?
include("../config/conn.php");
include("../config/function.php");
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>�ֻ���<?=webname?></title>
<link rel="stylesheet" href="css/basic.css">
<link rel="stylesheet" href="css/index.css">
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/jquery-1.9.1.min.js"></script>
<script language="javascript" src="js/index.js"></script>
</head>
<body>
<div class="yjcode">

<!--ͷ��B-->
<div class="indextop box">
 <div class="d1"><img src="img/logo.png" /></div>
 <div class="d2" onClick="gourl('search/main.php');"><span class="s1"></span><span class="s2">�����������ؼ��ʣ�</span></div>
 <div class="d3"><a href="user/"><img src="img/tx.png" /></a></div>
</div>
<!--ͷ��E-->
<div style="display:none;" id="webhttp"><?=weburl?></div>

<!--ͼƬB-->
<div class="qh">
<div class="addWrap">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $i=0;
   while1("*","yjcode_ad where adbh='ADMT01' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
   $tp="../../gg/".$row1[bh].".".$row1[jpggif];
   ?>
   <div><a href="<?=$row1[aurl]?>"><img class="img-responsive" src="<?=$tp?>" /></a></div>
   <? $i++;}?>
   </div>
  </div>
  <ul id="position"><? for($j=0;$j<$i;$j++){?><li class="<? if(0==$j){?>cur<? }?>"></li><? }?></ul>
</div>
<script src="js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
auto: 2000,
continuous: true,
disableScroll:false,
callback: function(pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'cur';
}});
</script>
</div>
<!--ͼƬE-->

<!--ͼ��B-->
<div class="indexm box">

 <div class="d1"><a href="user/pay.php"><img src="img/chong.png"><br>��Ҫ��ֵ</a></div>

 <div class="d1"><a href="user/tixian.php"><img src="img/qu.png"><br>��Ҫ����</a></div>

 <!--div class="d1"><a href="news/newslist.html"><img src="img/tb6.png" /><br>��ҵ��Ѷ</a></div-->
 
 <div class="d1"><a href="user/paylog.php"><img src="img/tb4.png"><br>�ʽ����</a></div>

 <div class="d1"><a href="user/car.php"><img border="0" src="img/tb1.png"><br>���ﳵ</a></div>


</div>
<div class="indexm indexm1 box">

 <div class="d1"><a href="alltype/"><img src="img/tb5.png"><br>ȫ������</a></div>

 <div class="d1"><a href="/user/productlx.php"><img src="img/tb2.png"><br>��Ҫ��</a></div>

 <div class="d1"><a href="user/"><img src="img/tb8.png"><br>��Ա����</a></div>

 <div class="d1"><a href="user/favpro.php"><img src="img/tb3.png"><br>�ҵ��ղ�</a></div>

</div>


<div class="indexm indexm1 box">

 <div class="d1" style="position: relative;"><a href="user/msglist.php"><img src="img/getp2.gif" width="40" height="40" border="0" alt=""><br>ϵͳ֪ͨ</a></div>

 <div class="d1"><a href="/m/user/gglist.php"><img src="img/gonggao.png" width="40" height="40" border="0" alt=""><br>���¹���</a></div>

 <div class="d1"><a href="/m/reg/"><img src="img/login.png" width="40" height="40" border="0" alt=""><br>�û���½</a></div>

 <div class="d1"><a href="/m/reg/reg.php"><img src="img/reg.png" width="40" height="40" border="0" alt=""><br>�û�ע��</a></div>

</div>
<!--ͼ��E-->

<div class="ggbox box">
<div class="ggnei">
<? adwhile("ADMT02")?>
</div>
</div>

<div class="indexcap box">
 <div class="d1">�����LINE���߿ͷ�</div>
</div>

<div class="kfkuang">
<form>
	<ul class="kf">
		        <li>
            <!--div class="ddkf f_l" style="background-image:url(img/qq.gif)"><a href="http://wpa.qq.com/msgrd?v=3&uin=c9191&site=http://www.scrcgz.cn/&menu=yes">&nbsp;c9191</a></div>
            <input class="f_l" type="radio" checked="checked" name="Sex" value="male" -->
            <div class="f_l qqhao">
            <? $a1=preg_split("/,/",$rowcontrol[webqqv]);?>
             <?
 for($i=0;$i<count($a1);$i++){
  $b1=preg_split("/\*/",$a1[$i]);
  echo  $b1[0]."��<span>".$b1[1]."</span> ";
 }
 ?>
            </div>
            <div style="clear:both"></div>
        </li>
		    </ul>
</form>
</div>

<!--��Ʒ����B-->
<div class="indexcap box">
 <div class="d1">��Ʒ���</div>
</div>
<div class="indexty box">
 <div class="dm">
 <? while1("*","yjcode_type where admin=1 and iftj<>1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <div class="d1"><a href="product/search_j<?=$row1[id]?>v.html"> <?=$row1[type1]?></a></div>
 <? }?>
 </div>
</div>
<!--��Ʒ����E-->

<!--�Ƽ�B-->

<script language="javascript">
userChecksj();
</script>
<!--�Ƽ�E-->

<!--����B-->
<div class="indexcap box">
 <div class="d1">��������</div>
</div>
<div class="prolist box">
<?
$i=1;
while1("*","yjcode_pro where zt=0 and ifxj=0 order by xsnum desc limit 6");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
?>
<div class="dm" onClick="gourl('product/view<?=$row1[id]?>.html')">
 <div class="d1"><img class="protp" src="<?=returntppd("../".returntp("bh='".$row1[bh]."'","-1"),"../img/none200x200.gif")?>" /></div>
 <div class="d2"><?=returntitdian($row1[tit],50)?></div>
 <div class="d3"><strong><?=sprintf("%.2f",$money1)?></strong></div>
 <div class="d4">��ʡ<?=$row1[money1]-$money1?>Ԫ</div>
 <div class="d5"><?=$row1[xsnum]?>�˸���</div>
</div>
<? if($i % 2==0){?></div><div class="prolist box"><? }?>
<? $i++;}?>
</div>
<!--����E-->
 
<!--��ѶE-->


</div>

<? include("tem/bottom.php");?>

</body>
</html>