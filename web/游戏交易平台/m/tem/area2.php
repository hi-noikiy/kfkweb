<?php
include("../../config/conn.php");
include("../../config/function.php");
if($_GET[area1id]!=""){$ses1=" and parentid='".$_GET[area1id]."'";}
if($_GET[area2id]!=""){$ses2=" and parentid='".$_GET[area2id]."'";}else{$ses2=" and id=0";}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<meta http-equiv="refresh" content="5;url=<?=$bkurl?>">  
<title>ѡ����</title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
select{float:left;margin:8px 0 0 0;width:100%;}
</style>
<script language="javascript">
function area2cha(){
location.href="area2.php?area1id=<?=$_GET[area1id]?>&area2id="+document.getElementById("area2").value;	
}
function area3cha(){
parent.document.f1.add2.value=document.getElementById("area2").value;
parent.document.f1.add3.value=document.getElementById("area3").value;
}
</script>
</head>
<body>

 <!--begin-->
   <select name="area2" id="area2" onchange="area2cha()">
   <option value="0">��ѡ��</option>
   <? while1("*","yjcode_city where level=2".$ses1." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <option value="<?=$row1[bh]?>"<? if($row1[bh]==$_GET[area2id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
   <? }?>
   </select>
   
   <select name="area3" id="area3" onchange="area3cha()">
   <option value="0">��ѡ��</option>
   <? while2("*","yjcode_city where level=3".$ses2." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
   <option value="<?=$row2[bh]?>"<? if($row2[bh]==$_GET[area3id]){?> selected="selected"<? }?>><?=$row2[name1]?></option>
   <? }?>
   </select>
 <!--end-->
 
 <script language="javascript">
 area3cha();
 </script>
</body>
</html>