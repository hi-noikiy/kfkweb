 <script language="javascript" src="/product/js_game.php"></script>
<script language="javascript" src="/js/js_games_phone.js"></script>
<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbtop1">
<div class="yjcode">
 <div class="top1">
  <h1 class="logo"><a href="<?=weburl?>"><img alt="<?=webname?>" border="0" src="<?=weburl?>img/logo.png" /></a></h1>
  
 
<div class="menu_div2">
          <div class="menu-select" style="width:420px;">
        
            
            <div class="input_div"> <form name="topf1" method="post" onSubmit="return topftj()">
               
                <input class="input_txtjyj"  style="width:250px" placeholder="ÇëÊäÈë¹Ø¼ü×Ö" type="text" name="topt" id="topt"   style="color:#999">
                
                <input class="fond_a" value="&nbsp;" type="submit" style="border:0px;">
              </form>
            </div>
          </div>
  
  
          
        </div><div class="blank" style="height:5px;_height:0px;overflow:hidden;margin:0px;padding:0px"></div>
 
  
  <div class="topsad"> </div>
  
 
  <div class="menu">
  
   <!--×óB-->
 
   
   <div class="m2">
   <a href="<?=weburl?>">Ê×Ò³</a>
   <? while1("*","yjcode_ad where adbh='ADI02' and type1='ÎÄ×Ö' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="<?=$row1[aurl]?>"><?=$row1[tit]?></a>
   <? }?>
   </div>
  </div>
  
 </div>
 
</div>
</div>