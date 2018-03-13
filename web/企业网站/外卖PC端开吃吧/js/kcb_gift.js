function closeLayer() {
    $(".layer_bg,#commentLayer").remove();
}
$(function () {
    $(".top_NewNava").children().eq(2).addClass("active").siblings("li").removeClass("active"); //选项卡颜
    $("button").click(function () {
        $("body").append('<div class="layer_bg"></div><div id="commentLayer" class="br8"><div class="layer_inner br4"><p class="help_info g_con">您好，开吃吧积分兑换已经结束，<br/>未兑换积分会按照礼品等额比例换成超人君的氪星币。<br/>请您继续关注开吃吧</p><button onclick="closeLayer();">确定</button></div></div>');
        $("#commentLayer").css({
            "width": "437px",
            "margin-left": "-219px"
        });
        $(".layer_bg").show();
    });


    var myPoint = parseInt($('#my_point').text()),
								exchangePointSelect = $('#exchange_point_select'),
								havePoint = $('#have_point'),
								NotHavePoint = $('#not_have_point'),
								usePoint = $('#use_point');

    //初始化信息
    function init() {
        myPoint = parseInt($('#my_point').text());
        exchangePointSelect.empty();
        if (Math.floor(myPoint / 2000) == 0) {
            havePoint.hide();
            NotHavePoint.show();
        } else {
            for (var i = 0; i < Math.floor(myPoint / 2000); i++) {
                $('<option value="' + 10 * (i + 1) + '">' + 10 * (i + 1) + '</option>').appendTo(exchangePointSelect);
            }
            usePoint.text(2000);
        }
    }
    init();
    //兑换开吃点数目改变时
    exchangePointSelect.change(function () {
        var thisPoint = parseInt($(this).val());
        usePoint.text(thisPoint * 200);
    });
    //点击兑换
    $('.do_exchange').click(function () {

        $("body").append('<div class="layer_bg"></div><div id="commentLayer" class="br8"><div class="layer_inner br4"><p class="help_info g_con">抱歉，暂时关闭开吃点兑换功能，<br/>详情请看站内公告。</p><button onclick="closeLayer();">确定</button></div></div>');
        $("#commentLayer").css({
            "width": "437px",
            "margin-left": "-219px"
        });
        $(".layer_bg").show();

        return;

        var exchangePoint = parseInt(exchangePointSelect.val());

        $.ajax({
            type: 'post',
            url: '/ajax/ExchangeCreditKcp.ashx',
            data: { "ChangePoint": exchangePoint },
            success: function (data) {
                if (data == "1") {
                    $('#my_point').text(myPoint - exchangePoint * 200);

                    $(".exchange_point").html("<span class='c_green' >我的积分：<em id='my_point'>" + $("#my_point").html() + "</em></span><span class='c_orange' id=''>(您已经有" + exchangePoint + " 个开吃点将于" + $(".exchange_point_pic").find("p").html() + "到期，请用完再兑换）</span>");
                    ShowMessage("兑换成功");
                    init();
                }
                else if (data == "0") {
                    ShowMessage("已存在");
                }
                else if (data = "-1") {
                    ShowMessage("积分不够");
                }
            }
        });
    });


    //固定抽奖栏
    var topScroll;
    window.onscroll = function () {
        topScroll = $(window).scrollTop();
        if (topScroll > 100) {
            $('#goto_draw').css({
                "position": "fixed",
                "top": "0px",
                "margin-top": "0px"
            });
        } else {
            $('#goto_draw').css({
                "position": "relative",
                "top": "",
                "margin-top": "0px"
            });
        }
    }




    var awardList = [$('#award1'), $('#award2'), $('#award3'), $('#award4'), $('#award5'), $('#award6'), $('#award7'), $('#award8')],
		       nowIndex = 1,      //标记当前的奖品
			   flag = false,  //标记是不是正在抽奖
			   sto,
			   si;
    //跳到下一个奖品处
    function nextAwar() {
        $(awardList[nowIndex - 1]).removeClass('active');
        nowIndex = (nowIndex + 1) > 8 ? 1 : nowIndex + 1;
        $(awardList[nowIndex - 1]).addClass('active');
    }
    //如果抽中积分，飘移到目标位置，第一个参数为其实的div处，第二个参数为增加开吃点数
    function moveTO(thisO, num) {
        var startX = thisO.offset().left + 75,
				startY = thisO.offset().top + 75,
				endX = $(".my_point em").offset().left,
				endY = $(".my_point em").offset().top;
        $('<span id="add_num" style="font-size:30px;color:#BF4904;">+' + num + '积分</span>').css({ 'position': 'absolute', 'left': startX, 'top': startY }).appendTo($('body'));
        $('#add_num').animate({ left: endX + 'px', top: endY + 'px', opacity: '0.4', fontSize: '14px' }, 1500, function () {
            $('#add_num').remove();
            $(".my_point em").html(parseInt($(".my_point em").html()) + num);
        });
    }

    //渐变的跳到指定奖品处
    function endAwar(index) {
        var changeNum = nowIndex > index ? index - nowIndex + 16 : index - nowIndex + 8;
        for (var i = 1; i <= changeNum; i++) {
            if (changeNum - i > 8) {
                setTimeout(nextAwar, 200 * i);
            } else {
                var time;
                switch (changeNum - i) {
                    case 8: time = 20; break;
                    case 7: time = 50; break;
                    case 6: time = 90; break;
                    case 5: time = 140; break;
                    case 4: time = 200; break;
                    case 3: time = 280; break;
                    case 2: time = 380; break;
                    case 1: time = 500; break;
                    case 0: time = 640; break;
                    default: time = 200; break;
                }
                setTimeout(nextAwar, 200 * i + time);
            }
        }
        setTimeout(function () {
            switch (parseInt(index)) {
                case 4:
                    $('#winning_message2').find('h2').text('恭喜您抽中100积分！！');
                    //var my_point = parseInt($(".my_point em").html());
                    $('#winning_message2').find('p').first().hide();
                    $('#winning_message2').find('p').eq(1).hide();
                    //$(".my_point em").html(my_point + 100);
                    moveTO($('#award4'), 100);
                    $('#winning_message2').slideDown(500);
                    break;
                case 7:
                    $('#winning_message2').find('h2').text('恭喜您抽中300积分！！');
                    //var my_point = parseInt($(".my_point em").html());
                    $('#winning_message2').find('p').first().hide();
                    $('#winning_message2').find('p').eq(1).hide();
                    //$(".my_point em").html(my_point + 300);
                    moveTO($('#award4'), 300);
                    $('#winning_message2').slideDown(500);
                    break;
                case 8:
                    $('#winning_message2').find('h2').text('恭喜您抽中三等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：小牛U型护颈枕');
                    $('#winning_message2').slideDown(500);
                    break;
                case 6:
                    $('#winning_message2').find('h2').text('恭喜您抽中三等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：50元移动充值卡');
                    $('#winning_message2').slideDown(500); break;
                case 5:
                    $('#winning_message2').find('h2').text('恭喜您抽中二等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：哥尔空气加湿器');
                    $('#winning_message2').slideDown(500);
                    break;
                case 3:
                    $('#winning_message2').find('h2').text('恭喜您抽中三等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：迷你兔音响');
                    $('#winning_message2').slideDown(500);
                    break;
                case 2:
                    $('#winning_message2').find('h2').text('恭喜您抽中二等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：两人三季休闲帐篷');
                    $('#winning_message2').slideDown(500); break;
                case 1:
                    $('#winning_message2').find('h2').text('恭喜您抽中一等奖！！');
                    $('#winning_message2').find('p').first().text('奖品：ipad 3(16GB)');
                    $('#winning_message2').slideDown(500);
                    break;
                default: break;
            }
            flag = false;
        }, 200 * changeNum + 950);

    }
    $('.winning').click(function () {
        $(this).find("p").toggle(500);
    });

    $('.do_draw').click(function () {
//        var userID = $.cookie("userID");
//        islogin = $.cookie("isLogin");
//        if (userID == null || islogin == null) {
//            //展开浮层
//            $(".minLoginBg,.minLogReg").css("display", "block");
//            return;
//        }

        if (!flag) {
            $("#winning_message2,#winning_message1").slideUp(500);
            flag = true;
            var my_point = parseInt($(".my_point em").html());
//            if (my_point < 200) {
//                ShowMessage("积分不够");
//                return;
//            }
            $(".my_point em").html(my_point - 200);
            si = setInterval(nextAwar, 200);
            setTimeout(function () {
                $.ajax({
                    type: 'post',
                    url: 'ajax.php',
                    success: function (data) {
                        if (data == "-1") {
                            alert("积分不够");
                        }
                        else if (data == "-2") { alert("抽奖失败，请重新尝试"); }
                        endAwar(data);
                    }
                });
                clearInterval(si);
            }, 1500);
        }
    });
    function ShowMessage(message) {
        $.XYTipsWindow({ ___title: "开吃吧提示", ___drag: "___boxTitle", ___width: "300px", ___height: "100px", ___content: 'text:<p style="color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;">' + message + "！</p>", ___showbg: true, ___time: 1800 })
        flag = false;
    }
})

//弹出层
