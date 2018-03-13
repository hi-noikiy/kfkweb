var priceLevel = 1;//菜品等级
var foodInfo = "";//获取的菜品
var startTimer;
var oldInfo = $('#dynamic').html();//保留摇杆的菜品
var isSelect = false; //是否选择了菜品
var isRunning = false;//是否正在摇杆当中

    function addSong(src){
		var iesong = document.getElementById("ieSound");
		var chsong=document.getElementById("chSound");
		iesong.src=src;
		chsong.src=src;
		iesong.setAttribute("loop",-1);
		chsong.setAttribute("loop",-1);
	}

	//拉杆下半部分朝下运动
	function downMoveDown(){
		
		$("#boxR").animate({
			"top":"185"
		},100);
		$("#down").animate({
			//"display":"block",
			"height":"100px"	
		},100,function(){
			//运动到底部后，开始朝上运动
			downMoveUp();
		});	
	}
	
	//拉杆下半部分朝上运动
	function downMoveUp(){
		$("#boxR").animate({
			"top":"85"
		},50);
		$("#down").animate({
			"height":"0px"	
		},50,function(){
			//下半部分运动完成，上半部分复位
			upMoveUp();
		});	
	}
	
	//拉杆上部分朝上运动
	function upMoveUp(){
		$("#boxR").animate({
			"top":"-35px"
		},50);
		$("#up").animate({
			"height":"100px"
		},50,function(){
			
			start=setInvalid;  //拉杆运动完成，则将拉杆的事件设置为无，防止再次点击
			startScroll();  //拉杆运动完成，开始滚动菜品
			addSong("../audio/607.wav");//菜品滚动的声音
		});
	}
	
	//菜品滚动
	function menuScroll(){
		$('#dynamic').animate(
			{ 'top': '-40px' }, 
			50,
			function () {
				$('#dynamic').css('top', '0');
				$('#dynamic li:first').css('opacity', 0).appendTo('#dynamic').animate({ 'opacity': 1 }, 50);
			}
		);
    }

    function getFood() {
        //开始获取菜品数据
        $.ajax({
            type: "post",
            url: "/ajax/Food/GetRandomFood.ashx",
            data: { universityID: $.cookie("uniID"), priceLevel: priceLevel },
            dataType: "json",
            success: function (data) {
                foodInfo = data;
                clearInterval(startTimer);
                $(".prr").next().css("background-position", "0 -42px").html('<a href="javascript:;">吃一份</a>');
                $(".prr a").css("background-position", "0 0");
                //$(".gfood").css("background-position", "0 -42px");  //显示可以点击的颜色
                addSong("");  //清除声音
                start = end;  //拉一次完成后才可以继续拉杆
                isSelect = true;
                isRunning = false;
                showInfo(foodInfo);
            }
        });
    }

    //开始执行菜品滚动
	function startScroll(){
	    startTimer = setInterval('menuScroll()', 50);
	    setTimeout(function () { getFood(); }, 2000);  
    }

    function showInfo(foodInfo) {
        var index = 0;
        if (foodInfo == null || foodInfo == "" || parseInt(foodInfo.result) < 0) {
            alert("未获取到菜品，请重新再试一次!");
            return;
        }
        $('#dynamic').html(foodInfo.foodInfoHtml);
    }

	function setInvalid(){
		return false;
	}
	var start = end = function () {

	    if (!checkUniversity()) {
	        return false;
	    }
	    checkUserInfo();
	    isRunning = true;
	    $(".prr").next().html('吃一份').css("background-position", "0 0");
	    $(".prr a").css("background-position", "0 -42px");
	    //$(".gfood").css("background-position", "0 0");
	    $('#dynamic').html(oldInfo);
	    addSong("../audio/s2.wav"); //拉杆运动的声音
	    $("#boxR").animate({
	        "top": "85px"
	    }, 200);
	    $("#up").animate({
	        "height": "0px"
	    }, 200, function () {
	        //上半部分运动完成后开始下半部分运动
	        downMoveDown();
	    });

	}

	function checkUserInfo() {
	    if ($.cookie("cartFoodInfo") != null && $.cookie("cartFoodInfo") == "") {
	        $.cookie("cartFoodInfo",null); 
	    }
	    if ($.cookie("cartSupInfo") == null && $.cookie("cartSupInfo") == "") {
            $.cookie("cartSupInfo",null);
        }
        return true;
    }

    function checkUniversity() {
        if ($.cookie("uniID") == null || $.cookie("uniID") == "") {
            alert("还没有选择大学，先选选你在哪个大学吧！");
            window.location = "/index.aspx";
            return false;
        }
        else {
            return true;
        }
    }

    //选好菜品，下单
    function CreateOrder() {
        if ($.cookie("userID") != null && $.cookie("userID") != "") {
            location.href = "/order.aspx";
            return false;
        }
        else {
            //未登录，跳转到匿名下单
            location.href = "/order_anonymous.aspx";
            return false;
        }
    }

    $(function () {
        $("#radFood").click(function () {
            $(".layer_bg,.gfb").css("display", "block");
        });

        if ($.cookie("rem") != "1") {
            $(".gfb .go1").show();
        } 

        //点击知道了去掉引导层
        $(".rem").click(function () {
            $.cookie("rem", "1");
            $(this).parent().remove();
        });

        //选择价位
        $(".prr a").click(function () {
            if (isRunning) {
                return;
            }
            $(this).next().show();
        });
        //填充价格
        $(".prr li").click(function () {
            $(".prr a").text($(this).text());
            $(".prr ul").hide();
            priceLevel = $(this).val();
        });

        //选择菜品下单
        $("#boxOuter .gfood a").live("click", function () {
            if (isRunning) {
                return;
            }
            if (!isSelect || $.cookie("cartFoodInfo") == null || $.cookie("cartFoodInfo") == "" || $.cookie("cartSupInfo") == null || $.cookie("cartSupInfo") == "") {
                alert("您还没有拉杆选菜品呢！");
            }
            else {
                CreateOrder();
            }
        });


    })