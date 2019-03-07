<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
 
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$tit?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/jquery1.42.min.js"></script>
<script language="javascript">
function wlyx(){
	$("#sjyx").removeClass("game-hover");
	$("#wlyx").addClass("game-hover");
	$("#webGame").show();
	$("#gameName").hide();
}
function sjyx(){
	$("#wlyx").removeClass("game-hover");
	$("#sjyx").addClass("game-hover");
	
	$("#gameName").show();
	$("#webGame").hide();
}

function wlyxli(z){
	$("li.wlyzlizm").each(function() {
		 
        if($(this).attr("ref")==z){
			$(this).show();
			}else{
				$(this).hide();
			}
    });
	}
	
	
	
function sjyxli(z){
	$("li.sjyzlizm").each(function() {
		 
        if($(this).attr("ref")==z){
			$(this).show();
			}else{
				$(this).hide();
			}
    });
	}
</script>
</head>
<body>

<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="crumbs"  >
		<div class="crumbs-address" style="text-align: left;">当前位置：<a href="/">首页</a>&gt;<span>全部游戏</span></div>
		<div class="crumbs-bt">
			 
		</div>
	</div>
 <div class="game-box">
		<div class="game-top">
			<ul>
				<li class="game-hover" id="wlyx"><a href="javascript:wlyx()"><em class="pc"></em>网络游戏</a></li>
				<li id="sjyx"><a href="javascript:sjyx()"><em class="apple" ></em>手机游戏</a></li>
				 
			</ul>
		</div>
		<div class="game-mid">
			<div class="game"  id="webGame"  style="display: block;">
				<div class="gameTitle intgame">
					<b style="left: 42px; width: 68px; overflow: hidden;"></b>
					<span selected="true"><a href="javascript:wlyxli('HOT');">热门游戏</a></span>
					<ul class="letter">
						
							<li><a href="javascript:wlyxli('A');"  >A</a></li>
						
							<li><a href="javascript:wlyxli('B');">B</a></li>
						
							<li><a href="javascript:wlyxli('C');">C</a></li>
						
							<li><a href="javascript:wlyxli('D');">D</a></li>
						
							<li><a href="javascript:wlyxli('E');">E</a></li>
						
							<li><a href="javascript:wlyxli('F');">F</a></li>
						
							<li><a href="javascript:wlyxli('G');">G</a></li>
						
							<li><a href="javascript:wlyxli('H');">H</a></li>
						
							<li><a href="javascript:wlyxli('I');">I</a></li>
						
							<li><a href="javascript:wlyxli('J');">J</a></li>
						
							<li><a href="javascript:wlyxli('K');">K</a></li>
						
							<li><a href="javascript:wlyxli('L');">L</a></li>
						
							<li><a href="javascript:wlyxli('M');">M</a></li>
						
							<li><a href="javascript:wlyxli('N');">N</a></li>
						
							<li><a href="javascript:wlyxli('O');">O</a></li>
						
							<li><a href="javascript:wlyxli('P');">P</a></li>
						
							<li><a href="javascript:wlyxli('Q');">Q</a></li>
						
							<li><a href="javascript:wlyxli('R');">R</a></li>
						
							<li><a href="javascript:wlyxli('S');">S</a></li>
						
							<li><a href="javascript:wlyxli('T');">T</a></li>
						
							<li><a href="javascript:wlyxli('U');">U</a></li>
						
							<li><a href="javascript:wlyxli('V');">V</a></li>
						
							<li><a href="javascript:wlyxli('W');">W</a></li>
						
							<li><a href="javascript:wlyxli('X');">X</a></li>
						
							<li><a href="javascript:wlyxli('Y');">Y</a></li>
						
							<li><a href="javascript:wlyxli('Z');">Z</a></li>
						
					</ul>
				</div>
				<div class="webGame" style="display:block;">
					<ul>
						
                        
                        <?php
						
						while1("*","yjcode_type where admin=2 and rm=1   and type1='网络游戏' ");while($row1=mysql_fetch_array($res1)){
							
							?>
							<li class="wlyzlizm" ref="HOT">
								
							<a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><img src="/upload/type/type2_<?php echo $row1[id];?>.png" ><p><?=$row1[type2]?></p></a>
								
								
							</li>
						 <?php
						}
						 ?>
                         
                             <?php
						
						while1("*","yjcode_type where admin=2 and  type1='网络游戏' ");while($row1=mysql_fetch_array($res1)){
							
							?>
							<li class="wlyzlizm" ref="<?php echo $row1[zm];?>" style="display:none">
								
								<a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><img src="/upload/type/type2_<?php echo $row1[id];?>.png" ><p><?=$row1[type2]?></p></a>
								
								
							</li>
						 <?php
						}
						 ?>
						
					</ul>
				</div>
				<div class="gameName"  style="display:none;">
					<ul></ul>
				</div>
			</div>
			<div class="game" id="gameName" style="display:none">
				<div class="gameTitle appgame">
					<b></b>
					<span selected="true"><a href="javascript:void(0)">热门游戏</a></span>
					<ul class="letter">
						
							<li><a href="javascript:sjyxli('A');">A</a></li>
						
							<li><a href="javascript:sjyxli('B');">B</a></li>
						
							<li><a href="javascript:sjyxli('C');">C</a></li>
						
							<li><a href="javascript:sjyxli('D');">D</a></li>
						
							<li><a href="javascript:sjyxli('E');">E</a></li>
						
							<li><a href="javascript:sjyxli('F');">F</a></li>
						
							<li><a href="javascript:sjyxli('G');">G</a></li>
						
							<li><a href="javascript:sjyxli('H');">H</a></li>
						
							<li><a href="javascript:sjyxli('I');">I</a></li>
						
							<li><a href="javascript:sjyxli('J');">J</a></li>
						
							<li><a href="javascript:sjyxli('K');">K</a></li>
						
							<li><a href="javascript:sjyxli('L');">L</a></li>
						
							<li><a href="javascript:sjyxli('A');">M</a></li>
						
							<li><a href="javascript:sjyxli('N');">N</a></li>
						
							<li><a href="javascript:sjyxli('O');">O</a></li>
						
							<li><a href="javascript:sjyxli('P');">P</a></li>
						
							<li><a href="javascript:sjyxli('Q');">Q</a></li>
						
							<li><a href="javascript:sjyxli('R');">R</a></li>
						
							<li><a href="javascript:sjyxli('S');">S</a></li>
						
							<li><a href="javascript:sjyxli('T');">T</a></li>
						
							<li><a href="javascript:sjyxli('U');">U</a></li>
						
							<li><a href="javascript:sjyxli('V');">V</a></li>
						
							<li><a href="javascript:sjyxli('W');">W</a></li>
						
							<li><a href="javascript:sjyxli('X');">X</a></li>
						
							<li><a href="javascript:sjyxli('Y');">Y</a></li>
						
							<li><a href="javascript:sjyxli('Z');">Z</a></li>
						
					</ul>
				</div>
				<div class="appleGame" style="display:block;">
					<ul>
                    
                      <?php
						
						while1("*","yjcode_type where admin=2 and rm=1   and type1='手机游戏' ");while($row1=mysql_fetch_array($res1)){
							
							?>
							<li class="sjyzlizm" ref="HOT">
								
								<a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><img src="/upload/type/type2_<?php echo $row1[id];?>.png" ><p><?=$row1[type2]?></p></a>
								
								
							</li>
						 <?php
						}
						 ?>
                    
                         <?php
						
						while1("*","yjcode_type where admin=2 and  type1='手机游戏' ");while($row1=mysql_fetch_array($res1)){
							
							?>
                    	<li class="sjyzlizm" ref="<?php echo $row1[zm];?>" style="display:none"><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><img src="/upload/type/type2_<?php echo $row1[id];?>.png"><p><?=$row1[type2]?></p></a></li>
                    	 <?php
						}
						 ?>
                   </ul>
				</div>
			</div>
		 
		</div>
	</div>
<? include("../tem/bottom.html");?>
</body>
</html>