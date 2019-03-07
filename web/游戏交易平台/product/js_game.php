<?
include("../config/conn.php");
include("../config/function.php");
 echo "var array = new Array();";
 $i=0;
 $j=0;
while1("*","yjcode_type where admin=2");while($row1=mysql_fetch_array($res1)){
	echo "array[".$i."] = new Array(".$row1[id].", 0, '".$row1[type2]."', '".$row1[zm]."', '0,1,3,9,85', '1');";
	$i++;	
	
	while2("*","yjcode_type where admin=3  and type2='".$row1[type2]."'");

	while($row2=mysql_fetch_array($res2)){
	echo "array[".$i."] = new Array(".$row2[id].", ".$row1[id].", '".$row2[type3]."', '".$row2[zm]."', '0,1,3,9,85', '1');";
	$i++;
	
	while3("*","yjcode_type where admin=4  and type2='".$row1[type2]."'");while($row3=mysql_fetch_array($res3)){
	echo "array[".$i."] = new Array(".$row3[id].", ".$row2[id].", '".$row3[type4]."', '".$row3[zm]."', '0,1,3,9,85', '1');";
	$i++;
	if($j==0){
		while4("*","yjcode_type where admin=5  and type2='".$row1[type2]."'");while($row4=mysql_fetch_array($res4)){
	echo "array[".$i."] = new Array(".$row4[id].", ".$row3[id].", '".$row4[type5]."', '".$row4[zm]."', '0,1,3,9,85', '1');";
	$i++;

	}
	$j++;
	
	
	}
	
	
	}
	}
	
}
 