<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbtop fontyh">
<div class="yjcode">

 <div class="top">
  <ul class="u1">
  <li class="l1">
   <span id="notlogin" style="display:none">
    <a href="<?=weburl?>reg/">�˺ŵ�¼</a>
    <a href="<?=weburl?>config/qq/oauth/index.php">QQ��¼</a>
    <a href="<?=weburl?>reg/reg.php">���ע��</a>
    <a class="feng" href="<?=weburl?>user/qiandao.php">ÿ��ǩ��</a>
   </span>
   <span id="yeslogin" style="display:none">
   <a id="yesuid" href="<?=weburl?>user/"></a>
   <a class="feng" href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;">ÿ��ǩ��</a>
   <a class="blue" id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php">������ǩ��</a>
   <a href="<?=weburl?>user/un.php">�˳�</a>
   </span>
  </li>
  <li class="l2">
  <a href="<?=weburl?>">��վ��ҳ</a>
  <a href="<?=weburl?>user/order.php">�ҵĶ���</a>
  <a href="<?=weburl?>user/" class="a1">��Ա����</a>
  <a href="<?=weburl?>user/pay.php" class="feng">��ֵ</a>
  <a href="<?=weburl?>user/tixian.php" class="green">����</a>
  <a href="<?=weburl?>help/">���ְ���</a>
  <a href="<?=weburl?>user/gdlx.php" target="_blank">���ʱش�</a>
  </li>
  </ul>
 </div> 
 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>