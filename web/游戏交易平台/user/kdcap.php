<?
if($rowcontrol[ifsell]=="off"){
if(strstr($rowcontrol[shoprz],"xcf1xcf")){if($rowuser[ifmot]!=1){php_toheader("openshoprz.php");}}
if(strstr($rowcontrol[shoprz],"xcf2xcf")){if($rowuser[ifemail]!=1){php_toheader("openshoprz.php");}}
if(strstr($rowcontrol[shoprz],"xcf3xcf")){if($rowuser[sfzrz]!=1 && $rowuser[sfzrz]!=0){php_toheader("openshoprz.php");}}
}
?>
 <ul class="rstep">
 <li class="l1" id="step1">1.���ƿ������ϣ��ύ����</li>
 <li class="l0"><img src="img/jianright1.gif" width="11" height="16" /></li>
 <li class="l1" id="step2">2.���ɿ������</li>
 <li class="l0"><img src="img/jianright1.gif" width="11" height="16" /></li>
 <li class="l1" id="step3">3.������˽��</li>
 </ul>