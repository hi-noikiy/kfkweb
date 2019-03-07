<!--LEFT B-->
<div class="treebox">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="./" class="a0" id="ico99"><em></em>后台总览<i></i></a>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico1"><em></em>我是卖家<i></i></a>
  <ul class="level2">
  <? 
  $sj=date("Y-m-d H:i:s");
  $sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
  $rowuser=mysql_fetch_array($resuser);
  if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("yjcode_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);}
  if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("您的密码为123456，请立即修改","pwd.php");}}
  if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){
  ?>
  <li><a href="openshop1.php">我要开店</a></li>
  <? }elseif(4==$rowuser[shopzt]){?>
  <li><a href="openshop4.php">店铺到期续费</a></li>
  <? }else{?>
  <li><a href="sellorder.php?ddzt=wait">发货(<strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='wait'")?></strong>)</a></li>
  <li><a href="shop.php">店铺设置</a></li>
  <li><a href="../shop/view<?=$rowuser[id]?>.html" target="_blank">预览店铺</a></li>
  <li><a href="productlist.php">商品列表</a></li>
  <li><a href="productlx.php">发布商品</a></li>
  <li><a href="productlist.php?ifxj=1">仓库中的宝贝</a></li>
  <li><a href="sellorder.php">订单管理</a></li>
  <li><a href="adlx1.php">自助广告系统</a></li>
  <li><a href="yunfeilist.php">运费模板</a></li>
  <? }?>
  </ul>
 </li>
 <li class="level1<? if($leftid==2){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico2"><em></em>我的产品<i></i></a>
  <ul class="level2">
  <li><a href="order.php">我的订单</a></li>
  <li><a href="car.php">购物车</a></li>
  <li><a href="favpro.php">我的收藏</a></li>
  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
 <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>任务大厅<i></i></a>
  <ul class="level2">
  <li><a href="tasklist.php">我是雇主</a></li>
  <li><a href="taskhflist.php">我是接手方</a></li>
  <li><a href="../task/taskadd.php" target="_blank">发起任务</a></li>
  </ul>
 </li>
 <? }?>
 <li class="level1<? if($leftid==6){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico6"><em></em>互动管理<i></i></a>
  <ul class="level2">
  <li><a href="newslist.php">稿件中心</a></li>
  <li><a href="newslx.php">我要投稿</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==5){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico5"><em></em>财务管理<i></i></a>
  <ul class="level2">
  <li><a href="pay.php">我要充值</a></li>
  <li><a href="paylog.php">资金明细</a></li>
  <li><a href="tixian.php">我要提现</a></li>
  <li><a href="tixianlog.php">提现记录</a></li>
  <li><a href="jflog.php">积分管理</a></li>
  <li><a href="baomoneylog.php">保证金管理</a></li>
  
  <li><a href="tjuid.php">我推荐的会员</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==3){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico3"><em></em>会员中心<i></i></a>
  <ul class="level2">
  <li><a href="inf.php">基本信息</a></li>
  <li><a href="msglist.php">系统通知</a></li>
  <li><a href="touxiang.php">设置头像</a></li>
  <li><a href="mobbd.php">手机认证</a></li>
  
  <li><a href="shdzlist.php">收货地址</a></li>
  <li><a href="pwd.php">修改密码</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==4){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico4"><em></em>工单管理<i></i></a>
  <ul class="level2">
  <li><a href="gdlist.php">我的工单</a></li>
  <li><a href="gdlx.php">提交工单</a></li>
  </ul>
 </li>
 </ul>
</div>
<!--LEFT E-->
<script language="javascript" src="js/easing.js"></script>
<script>
//等待dom元素加载完毕.
$(function(){
	$(".treebox .level1 .a1").click(function(){
		$(this).addClass('current')   //给当前元素添加"current"样式
		.find('i').addClass('down')   //小箭头向下样式
		.parent().next().slideDown('slow','easeOutQuad')  //下一个元素显示
		.parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//隐藏
		 return false; //阻止默认时间
	});
})
</script>
<?
$luserid=returnuserid($_SESSION[SHOPUSER]);
createDir("../upload/".$luserid."/");
sellmoneytj($luserid);
$autoses="(selluserid=".$luserid." or userid=".$luserid.")";
include("auto.php");
?>