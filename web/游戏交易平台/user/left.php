<!--LEFT B-->
<div class="treebox">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="./" class="a0" id="ico99"><em></em>��̨����<i></i></a>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico1"><em></em>��������<i></i></a>
  <ul class="level2">
  <? 
  $sj=date("Y-m-d H:i:s");
  $sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
  $rowuser=mysql_fetch_array($resuser);
  if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("yjcode_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);}
  if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("��������Ϊ123456���������޸�","pwd.php");}}
  if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){
  ?>
  <li><a href="openshop1.php">��Ҫ����</a></li>
  <? }elseif(4==$rowuser[shopzt]){?>
  <li><a href="openshop4.php">���̵�������</a></li>
  <? }else{?>
  <li><a href="sellorder.php?ddzt=wait">����(<strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='wait'")?></strong>)</a></li>
  <li><a href="shop.php">��������</a></li>
  <li><a href="../shop/view<?=$rowuser[id]?>.html" target="_blank">Ԥ������</a></li>
  <li><a href="productlist.php">��Ʒ�б�</a></li>
  <li><a href="productlx.php">������Ʒ</a></li>
  <li><a href="productlist.php?ifxj=1">�ֿ��еı���</a></li>
  <li><a href="sellorder.php">��������</a></li>
  <li><a href="adlx1.php">�������ϵͳ</a></li>
  <li><a href="yunfeilist.php">�˷�ģ��</a></li>
  <? }?>
  </ul>
 </li>
 <li class="level1<? if($leftid==2){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico2"><em></em>�ҵĲ�Ʒ<i></i></a>
  <ul class="level2">
  <li><a href="order.php">�ҵĶ���</a></li>
  <li><a href="car.php">���ﳵ</a></li>
  <li><a href="favpro.php">�ҵ��ղ�</a></li>
  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
 <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="tasklist.php">���ǹ���</a></li>
  <li><a href="taskhflist.php">���ǽ��ַ�</a></li>
  <li><a href="../task/taskadd.php" target="_blank">��������</a></li>
  </ul>
 </li>
 <? }?>
 <li class="level1<? if($leftid==6){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico6"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="newslist.php">�������</a></li>
  <li><a href="newslx.php">��ҪͶ��</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==5){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico5"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="pay.php">��Ҫ��ֵ</a></li>
  <li><a href="paylog.php">�ʽ���ϸ</a></li>
  <li><a href="tixian.php">��Ҫ����</a></li>
  <li><a href="tixianlog.php">���ּ�¼</a></li>
  <li><a href="jflog.php">���ֹ���</a></li>
  <li><a href="baomoneylog.php">��֤�����</a></li>
  
  <li><a href="tjuid.php">���Ƽ��Ļ�Ա</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==3){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico3"><em></em>��Ա����<i></i></a>
  <ul class="level2">
  <li><a href="inf.php">������Ϣ</a></li>
  <li><a href="msglist.php">ϵͳ֪ͨ</a></li>
  <li><a href="touxiang.php">����ͷ��</a></li>
  <li><a href="mobbd.php">�ֻ���֤</a></li>
  
  <li><a href="shdzlist.php">�ջ���ַ</a></li>
  <li><a href="pwd.php">�޸�����</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==4){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico4"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="gdlist.php">�ҵĹ���</a></li>
  <li><a href="gdlx.php">�ύ����</a></li>
  </ul>
 </li>
 </ul>
</div>
<!--LEFT E-->
<script language="javascript" src="js/easing.js"></script>
<script>
//�ȴ�domԪ�ؼ������.
$(function(){
	$(".treebox .level1 .a1").click(function(){
		$(this).addClass('current')   //����ǰԪ�����"current"��ʽ
		.find('i').addClass('down')   //С��ͷ������ʽ
		.parent().next().slideDown('slow','easeOutQuad')  //��һ��Ԫ����ʾ
		.parent().siblings().children('a').removeClass('current')//��Ԫ�ص��ֵ�Ԫ�ص���Ԫ��ȥ��"current"��ʽ
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//����
		 return false; //��ֹĬ��ʱ��
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