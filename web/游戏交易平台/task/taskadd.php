<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if($_GET[control]=="add"){
 zwzr();
 if(empty($rowuser[uqq])){Audit_alert("���Ȳ���������ϵQQ��","taskadd.php");}
 $sj=date("Y-m-d H:i:s");
 $userid=returnuserid($_SESSION["SHOPUSER"]);
 $jgxs=intval($_POST[R1]);
 $money1=0;
 $money2=0;
 if(0==$jgxs){$money1=$_POST[tmoneyu0];}
 elseif(1==$jgxs){$money1=$_POST[tmoneyu1_1];$money2=$_POST[tmoneyu1_2];}
 $money1=abs($money1);
 $money2=abs($money2);
 $rwxs=intval($_POST[R5]);
 if($jgxs!=0){$rwxs=0;}
 if($rwxs==0){$renshu=1;}
 else{ //��������
 $renshu=abs($_POST[trwxsu1]);
 if(empty($renshu)){Audit_alert("��������Ϊ�գ�","taskadd.php");}
 if($money1 % $renshu!=0){Audit_alert("Ԥ��������������������޸ģ�","taskadd.php");}
 }
 $zq=intval($_POST[R2]);
 if($zq==-1){$zq=sqlzhuru($_POST[zqtext]);} 
 if(!is_numeric($zq)){$zq=0;}
 $yxq=intval($_POST[R3]);
 if($yxq==-1){$yxq=sqlzhuru($_POST[yxqtext]);} 
 if(!is_numeric($yxq)){$yxq=0;}
 $endsj=date("Y-m-d H:i:s",strtotime("+".$yxq." day"));
 $bh=time()."task".$userid;
 if(empty($rowcontrol[taskok])){$zt=1;$zt1=105;}else{$zt=0;$zt1=100;}
 $ty=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 $up1=$_FILES["inp1"]["name"];
 if(!empty($up1)){
 $mc=MakePassAll(2)."-".time()."-".$userid.".".returnhz($up1);
 $lj="../upload/".$userid."/".$bh."/";
 createDir($lj);
 move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
 }
 if(empty($rwxs)){$t="tasklist.php";$ztv=$zt;}else{$t="taskmoney.php?bh=".$bh;$ztv=$zt1;}
 intotable("yjcode_task","bh,userid,sj,lastsj,zt,tit,txt,type1id,type2id,jgxs,money1,money2,money3,money4,money5,djl,useridhf,rwzq,yxq,yjtx,qqxs,motxs,yjfs,fj,taskty,tasknum,taskcy","'".$bh."',".$userid.",'".$sj."','".$sj."',".$ztv.",'".sqlzhuru($_POST[t1])."','".sqlzhuru($_POST[content])."',".$ty[0].",".$ty[1].",".$jgxs.",".$money1.",".$money2.",0,0,0,0,0,".$zq.",'".$endsj."',".$_GET[yjtz].",".intval($_POST[qqxsinp]).",".intval($_POST[motxsinp]).",".$_POST[R4].",'".$mc."',".$rwxs.",".$renshu.",0");
 //PointIntoM($rowuser[id],"��������Ԥ������(������".$bh.")",$money4*(-1));
 //PointUpdateM($rowuser[id],$money4*(-1));
 php_toheader("../user/".$t);
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������");document.f1.t1.focus();return false;}	
 if(moneyv!=0 && rwxsv==1){alert("��������ֻ����һ�ڼ۷�ʽ");return false;}	
 c=document.getElementsByName("C1");if(c[0].checked){cv=1;}else{cv=0;}
 tjwait();
 f1.action="taskadd.php?control=add&yjtz="+cv;
}

var moneyv=0;
function moneycaponc(x){
moneyv=x;
for(i=0;i<=2;i++){
document.getElementById("moneycap"+i).className="";
document.getElementById("moneyu"+i).style.display="none";
}
document.getElementById("moneycap"+x).className="l1";
document.getElementById("moneyu"+x).style.display="";
}

var rwxsv=0;
function rwxsonc(x){
rwxsv=x;
for(i=0;i<=1;i++){
document.getElementById("rwxs"+i).className="";
document.getElementById("rwxsu"+i).style.display="none";
}
document.getElementById("rwxs"+x).className="l1";
document.getElementById("rwxsu"+x).style.display="";
}

function zqonc(x){
if(x==-1){document.getElementById("zqtext").style.display="";zqcha();}
else{
 document.getElementById("zqtext").style.display="none";
 if(x!=0){document.getElementById("zqs1").innerHTML=x+"��";}else{document.getElementById("zqs1").innerHTML="�Լ�����";}
}
}
function zqcha(){
document.getElementById("zqs1").innerHTML=document.getElementById("zqtext").value+"��";
}

function yxqonc(x){
if(x==-1){document.getElementById("yxqtext").style.display="";yxqcha();}
else{
 document.getElementById("yxqtext").style.display="none";
 if(x!=0){document.getElementById("zqs2").innerHTML=x+"��";}else{document.getElementById("zqs2").innerHTML="�Լ�����";}
}
}
function yxqcha(){
document.getElementById("zqs2").innerHTML=document.getElementById("yxqtext").value+"��";
}

function qqxsover(){
 document.getElementById("qqxsm").style.display="";
}

function qqxsout(){
 document.getElementById("qqxsm").style.display="none";
}

function motxsover(){
 document.getElementById("motxsm").style.display="";
}

function motxsout(){
 document.getElementById("motxsm").style.display="none";
}

function qqxsonc(x,y){
document.f1.qqxsinp.value=x;
document.getElementById("qqxs").innerHTML=y;
qqxsout();
}

function motxsonc(x,y){
document.f1.motxsinp.value=x;
document.getElementById("motxs").innerHTML=y;
motxsout();
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > <a href="./">�������</a> > ����������</li></ul>
 </div>
 
 <div class="tleft fontyh">
  <? if(empty($rowuser[uqq])){?>
  <div class="errts">���Ȳ�������QQ���룬���ܷ������񡣡�<a href="../user/inf.php" target="_blank">�������</a>��</div>
  <? }?>
  <form name="f1" method="post" onSubmit="return tj()" enctype="multipart/form-data">
  <ul class="u1">
  <li class="l1">01��һ�仰������������</li>
  <li class="l2"><input type="text" class="inp fontyh" autocomplete="off" disableautocomplete style="width:740px;" name="t1" /></li>
  <li class="l1">02��������˵����ϸЩ</li>
  <li class="l3"><script id="editor" name="content" type="text/plain" style="width:764px;height:380px;"></script></textarea></li>
  <li class="lf">�ϴ�������</li>
  <li class="lf1"><input type="file" name="inp1" id="inp1" size="25"></li>
  <li class="l1">03������</li>
  <li class="l2">
  <select name="d1" class="fontyh">
  <? while1("*","yjcode_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[id]?>xcf0"><?=$row1[name1]?></option>
  <? while2("*","yjcode_tasktype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <option value="<?=$row1[id]?>xcf<?=$row2[id]?>">-----<?=$row2[name2]?></option>
  <? }?>
  <? }?>
  </select>
  </li>
  <li class="l1">04��������</li>
  </ul>
  <div class="moneycap">
  <label class="l1" id="moneycap0" onClick="moneycaponc(0)"><input name="R1" type="radio" value="0" checked> <span>һ�ڼ�</span></label>
  <label id="moneycap1" onClick="moneycaponc(1)"><input name="R1" type="radio" value="1"> <span>��Χ����</span></label>
  <label id="moneycap2" onClick="moneycaponc(2)"><input name="R1" type="radio" value="2"> <span>���ű���</span></label>
  </div>
  <ul class="moneyu" id="moneyu0">
  <li class="l1">
  <strong>һ�ڼ�˵����</strong><br>
  1.�������̾���������������ܽ�������������ʱ������Ա����μӽӵ���<br>
  2.֮�������ڱ����б���ѡ���Ӷ�����еķ������������������  
  </li>
  <li class="l2">
  <span class="s1">��Ը֧����һ�ڼ۽�</span>
  <input type="text" name="tmoneyu0" />
  <span class="s2">Ԫ</span>
  </li>
  </ul>
  <ul class="moneyu" id="moneyu1" style="display:none;">
  <li class="l1">
  <strong>��Χ����˵����</strong><br>
  1.������ѡ��һ��Ԥ�㷶Χ�������̿����ڴ˷�Χ�ڽ��б��ۣ�<br>
  2.֮�������ڱ����б���ѡ���Ӷ�����ú��ʵķ������������������
  </li>
  <li class="l2">
  <span class="s1">����Ԥ���Χ��</span>
  <input type="text" name="tmoneyu1_1" />
  <span class="s2">~</span>
  <input type="text" name="tmoneyu1_2" />
  <span class="s2">Ԫ</span>
  </li>
  </ul>
  <ul class="moneyu" id="moneyu2" style="display:none;">
  <li class="l1">
  <strong>���ű���˵����</strong><br>
  <b class="blue">1.������Ԥ��۸�ͷ�Χ���ɷ��������ɱ��ۡ�</b><br>
  2.֮�������ڱ����б���ѡ���Ӷ�����ú��ʵķ������������������
  </li>
  </ul>
  
  <ul class="u1">
  <li class="l1">05��������ʽ</li>
  </ul>
  <div class="rwxs">
  <label class="l1" id="rwxs0" onClick="rwxsonc(0)"><input name="R5" type="radio" value="0" checked> <span>��������</span></label>
  <label id="rwxs1" onClick="rwxsonc(1)"><input name="R5" type="radio" value="1"> <span>��������</span></label>
  </div>
  <ul class="rwxsu" id="rwxsu0">
  <li class="l1">
  <strong>��������˵����</strong><br>
  1.����ֻ����һ���û����֣�<br>
  </li>
  </ul>
  <ul class="rwxsu" id="rwxsu1" style="display:none;">
  <li class="l1">
  <strong>��������˵����</strong><br>
  1.�������������Ϊ������ϵ����100Ԫ10��Ϊ��ȷʾ������100Ԫ9������Чʾ����<br>
  <span class="red">2.��������ֻ����һ�ڼ�����������ѡ��  </span>
  </li>
  <li class="l2">
  <span class="s1">��������������</span>
  <input type="text" name="trwxsu1" />
  <span class="s2">��</span>
  </li>
  </ul>

  
  <ul class="u1">
  <li class="l1">06��ƽ̨�н����</li>
  </ul>
  <div class="zhouqi">
  <ul class="zqu">
  <li class="l1">��<br>ʽ</li>
  <li class="l2">
  <span class="s1">
  <label><input name="R4" type="radio" value="0" checked> �����е�</label>
  <label><input name="R4" type="radio" value="1"> ���ַ��е�</label>
  <label><input name="R4" type="radio" value="2"> ˫�����е�һ��</label>
  </span>
  <span class="s2">������ɺ�ƽ̨����ȡ�ɽ����<strong class="red"><?=$rowcontrol[taskyj]*100?>%</strong>��Ӷ��</span>
  </li>
  </ul>
  </div>
  
  <ul class="u1">
  <li class="l1">07���������ڡ���Ч��</li>
  </ul>
  <div class="zhouqi">
  <ul class="zqu">
  <li class="l1">��<br>��</li>
  <li class="l2">
  <span class="s1">
  <label><input name="R2" type="radio" value="1" onClick="zqonc(1)"> 1��</label>
  <label><input name="R2" type="radio" value="3" onClick="zqonc(3)" checked> 3��</label>
  <label><input name="R2" type="radio" value="7" onClick="zqonc(7)"> 7��</label>
  <label><input name="R2" type="radio" value="10" onClick="zqonc(10)"> 10��</label>
  <label><input name="R2" type="radio" value="0" onClick="zqonc(0)"> �����̱�ʱ</label>
  <label><input name="R2" type="radio" value="-1" onClick="zqonc(-1)"> �Զ���</label>
  <input type="text" name="zqtext" id="zqtext" onKeyUp="zqcha()" class="zqt" style="display:none;" />
  </span>
  <span class="s2">�����������<strong id="zqs1">1��</strong>ʱ��������ɴ�����</span>
  </li>
  </ul>
  <ul class="zqu zqu1">
  <li class="l1">��<br>Ч<br>��</li>
  <li class="l2">
  <span class="s1">
  <label><input name="R3" type="radio" value="3" onClick="yxqonc(3)" checked> 3��</label>
  <label><input name="R3" type="radio" value="7" onClick="yxqonc(7)"> 7��</label>
  <label><input name="R3" type="radio" value="15" onClick="yxqonc(15)"> 15��</label>
  <label><input name="R3" type="radio" value="30" onClick="yxqonc(30)"> 30��</label>
  <label><input name="R3" type="radio" value="90" onClick="yxqonc(90)"> 90��</label>
  <label><input name="R3" type="radio" value="-1" onClick="yxqonc(-1)"> �Զ���</label>
  <input type="text" name="yxqtext" id="yxqtext" onKeyUp="yxqcha()" class="zqt" style="display:none;" />
  </span>
  <span class="s2">��������<strong id="zqs2">3��</strong>�������������ۣ����ڼ���������ʱ��Ӷ���ʵķ��������������<br>���������<strong id="zqs3">3</strong>�������ֹ���������ۺ��3����ѡ���Ӷ�����̣�����ϵͳ�Զ��ر�����</span>
  </li>
  </ul>
  </div>
  
  <ul class="u1">
  <li class="l1">08����ϵ��ʽ</li>
  </ul>
  <ul class="lxfs">
  <li class="l1">���ѣ�������Ҫ�޸���ϵ��Ϣ����<a href="../user/inf.php" target="_blank">��������</a>��<a href="../user/mobbd.php" target="_blank">�ֻ���</a>���޸ġ���Ҳ���Է�����������޸ģ�</li>
  <li class="l2">QQ��</li>
  <li class="l3" onMouseOver="qqxsover()" onMouseOut="qqxsout()">
   <span id="qqxs" class="xs">Ͷ������̿ɼ�</span>
   <span id="qqxsm" class="xsm" style="display:none;">
   <a href="javascript:void(0);" onClick="qqxsonc(1,'Ͷ������̿ɼ�')">Ͷ������̿ɼ�</a>
   <a href="javascript:void(0);" onClick="qqxsonc(0,'��¼(���ο�)�ɼ�')">��¼(���ο�)�ɼ�</a>
   <a href="javascript:void(0);" onClick="qqxsonc(2,'�б�����̿ɼ�')">�б�����̿ɼ�</a>
   </span>
   <input type="hidden" value="1" id="qqxsinp" name="qqxsinp" />
  </li>
  <li class="l2 l21">�绰��</li>
  <li class="l3" onMouseOver="motxsover()" onMouseOut="motxsout()">
   <span id="motxs" class="xs">Ͷ������̿ɼ�</span>
   <span id="motxsm" class="xsm" style="display:none;">
   <a href="javascript:void(0);" onClick="motxsonc(1,'Ͷ������̿ɼ�')">Ͷ������̿ɼ�</a>
   <a href="javascript:void(0);" onClick="motxsonc(0,'��¼(���ο�)�ɼ�')">��¼(���ο�)�ɼ�</a>
   <a href="javascript:void(0);" onClick="motxsonc(2,'�б�����̿ɼ�')">�б�����̿ɼ�</a>
   </span>
   <input type="hidden" value="1" id="motxsinp" name="motxsinp" />
  </li>
  </ul>

  <ul class="u1">
  <li class="l1">09������ѡ��</li>
  </ul>
  <div class="fuzhu">
  <label><input name="C1" type="checkbox" value=""><span>���˱������������ʼ�������</span></label>
  </div>

  <ul class="u1">
  <li class="l6"><? tjbtnr("�ύ����")?></li>
  </ul>
  </form>
 </div>
 
  <div class="xqright">
   <h2><?=webname?>Ϊ����ŵ</h2>
   <ul class="u1">
   <li class="l1">�̼�100%�ϸ������֤</li>
   <li class="l2">��Ʒ�����⣬ȫ���˿�</li>
   <li class="l3">ƽ̨��������������</li>
   <li class="l4">�ṩרҵ�ۺ���񣬷��Ĺ���</li>
   </ul>
   <h3>���ᷢ����</h3>
   <div class="tel">ȫ��ͳһ��������<br><strong><?=$rowcontrol[webtelv]?></strong></div>
  </div>

</div>
<? include("../tem/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>