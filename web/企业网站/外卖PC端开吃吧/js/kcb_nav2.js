function pageLoad() {
    //判断有无大学编号和大学名称的cookie,有cookie则直接跳转到首页    
    if (isRedirect()) {
        var uniID = $.cookie("uniID");
        location.href = "/area/" + uniID;
    }
}
//验证跳到导航页之后是否该跳转
function isRedirect() {
    var uniID = $.cookie("uniID"),
        preURL = $.cookie("preURL");
    $.cookie("uniID") != null && $.cookie("uniID") != "" && $.cookie("uniName") != null && $.cookie("preURL") != null && $.cookie("preURL").indexOf("html") < 0 && preURL.indexOf("default") < 0
    if (uniID != null && uniID != "") {
        if (preURL != null && preURL != "" && (preURL.indexOf("html") >= 0 || preURL.indexOf("index") >= 0)) {
            return false;
        }
        else {
            return true;
        }
    }
    else {
        return false;
    }
}



//更改三角图形位置样式
function chooseThis(e) {
    liLeft = e.position().left + 10;
    eWidth = e.width();
    $(".triangle").css({
        "display": "block",
        "left": liLeft + 0.5 * eWidth + "px"
    });
}
//选择城市事件
function ChooseCity(e) {
    $(".body_top span").eq(0).html("").addClass("back").css("background", "url(images/back.png) no-repeat"); //将图片的样式写在这，防止IE7 8点击过后不显示
    $("#city").html(e.html()).css("background", "#F5F5F5").attr("class", e.attr("class")).removeClass("topspan").siblings("span").addClass("topspan");
    chooseThis($("#city")); //控制三角图形位置
    $(".cities").hide(10); //隐藏所有城市
    $(".allareas").show(); //显示区
    $("#" + e.attr("class")).show().siblings("ul").hide(10); ; //显示对应城市的区
    $("#schools").hide(10); //隐藏学校
    $(".body_top img").hide(10);
}

//显示地图
function showMap(locat) {
    if (locat == null) {
        $(".Sub_body").css("z-index", "0");
        $(".Sub_body").animate({ left: "23%", right: "23%", top: "30%", border: "1px solid #C5C4C1" }, function () {
            $(".body_top").show();
            $(".Main_subbody").show();
            $("#mapnav").hide();
            showshadow(false);
            $(".pg-map .addr-results").hide();
        });

    } else {

        $(".Sub_body").css("z-index", "500");
        $("#choosedcity").text(locat);
        $(".body_top").hide();
        $(".Main_subbody").hide();
        $("#mapnav").show();
        showshadow(true);
        $(".Sub_body").animate({ top: "10%", left: "10%", right: "10%", border: "0px" }, function () {
            initializingMap(locat);
        });
    }
}
$(function () {

    //判断浏览器是否ie6
    if ($.browser.msie) {
        if ($.browser.version == "6.0") {
            $(document.body).append('<div id="ie6_bg"></div><div id="ie6_tip"><div id="ie6_sorry">对不起，您的浏览器版本过低，您可以尝试：</div><div id="ie6_wap" onclick="goWap();">访问简洁版开吃吧</div><div id="ie6_update" onclick="upBrow();">升级浏览器</div></div>');
            $("#ie6_wap").click(function () { location.href = "http://wap.kaichiba.com"; });
            $("#ie6_update").click(function () { location.href = "http://chrome.360.cn/"; });
        }
        else if ($.browser.version == "7.0") {//如果是IE7  修改样式不兼容问题
            $("#city,#area,#shoparea").css("margin-top", "6px");
            $(".body_top span").eq(0).css({ "top": "2px", "position": "relative" });
        }
    };
    //由切换位置跳转到主页不显示"我们猜您在"
    //var cleanType = $("script")[4].src.split("&")[1].split("=")[1];
    //var city = $("script")[4].src.split("&")[2].split("=")[1];
    var cleanType = $("#navjs").attr("src").split("&")[1].split("=")[1];
    var city = $("#navjs").attr("src").split("&")[2].split("=")[1];
    
   // alert(city);
    //alert(cleanType);
    if (cleanType == "" || cleanType != "1") {
        FindPosition(); //找到位置        
    } else {
        var $this = $(".cities li").find("span[cid='" + city + "']");
        var ismapnav = $this.attr("ismap");
        if (ismapnav) {
            showMap($this.text());
        } else {
            ChooseCity($this);
            $(".back").hover(function () { if ($this.html() == "") { $this.css("background", "url(../image/newnavi/back-hover.png) no-repeat"); } }, function () { if ($this.html() == "") { $this.css("background", "url(images/back.png) no-repeat"); } });
        }
    }
    $(".shoparea a").hover(function () {
        $(this).css({ "background": "#FD7837" });
    }, function () {
        $(this).css({ "background": "url(../image/newnavi/backgroundshop.png) no-repeat" });
    });
    //选择城市事件
    $(".cities li").find("span").bind("click", function () {

        var ismapnav = $(this).attr("ismap");
        if (ismapnav) {
            showMap($(this).text());
        } else {
            ChooseCity($(this));
            $(".back").hover(function () { if ($(this).html() == "") { $(this).css("background", "url(../image/newnavi/back-hover.png) no-repeat"); } }, function () { if ($(this).html() == "") { $(this).css("background", "url(images/back.png) no-repeat"); } });
        }
    });
    //绑定返回按钮事件
    $(".back").live("click", back); //绑定返回按钮事件
    //绑定选择区事件
    $(".areas li").find("span").bind("click", function () {

        $targer = $("#schools #" + $(this).attr("class")).find(".shoparea");
        //若有商圈，则显示区分商圈和大学的div

        $(".body_top img").eq(0).show();
        $("#area").html($(this).html()).css("background", "#F5F5F5").removeClass("topspan").siblings("span").addClass("topspan");
        $("#city").addClass("choose").siblings().removeClass("choose");
        chooseThis($("#area")); //控制三角图形位置
        $(".allareas").hide(10);
        $("#schools").show(); //显示所有城市            
        $(".shoparea").css({ "padding": "0px 10px 0px 0px" }).find("ul").show().find("li").css({ "border": "0px", "margin-left": "10px" }).addClass("shopareali").find("a").css("background", "url(../image/newnavi/backgroundshop.png) no-repeat");
        $(".shoparea ul").css("margin-left", "-11px")
        $("#schools #" + $(this).attr("class")).show().siblings("ul").hide(); //显示对应的大学 
        if ($targer.length > 0) {
            var schoolestr = "<li class='tip'><div><em class='div_schoole'>大学</em><div  class='divhr'></div></div></li>";
            var shopareastr = "<li class='tip'><div ><em class='div_shoparea'>商圈</em><div  class='divhr'></div></div></li>";
            $(".tip").remove();
            $targer.eq(0).before(shopareastr);
            $targer.eq($targer.length - 1).after(schoolestr);
            $targer.eq($targer.length - 1).css({ "border": "0px", "margin-bottom": "-13px" })
            $(".tip").css("border", 0);
            //控制IE7下样式

            if ($.browser.version == "7.0") {
                $(".divhr").addClass("div_hrIE");
                $(".shoparea li").css({ "margin-left": "0px", "margin-right": "8px" });
            }
            else
                $(".divhr").addClass("div_hr");
            $(".Sub_body").width("735px");
        }
    });
    //商圈选择事件绑定
    $(".shoparea ul").find("a").bind("click", function () {

        var ha = $(this).attr("href"); //如果商圈下有大厦或者大学
        if (typeof ha == 'undefined') {
            $(".body_top img").eq(1).show();
            $("#schools").hide(10);
            $(".shopareas").show();
            $(".shopareas #" + $(this).attr("class")).show().siblings("ul").hide(); //显示对应的大学
            $("#shoparea").html($(this).html()).css("background", "#F5F5F5").removeClass("topspan").siblings("span").addClass("topspan");
            $("#area").addClass("choose").siblings().removeClass("choose");
            chooseThis($("#shoparea")); //控制三角图形位置
        }
    });
    //绑定顶部城市事件
    $("#city").live("click", function () {
        livecity();
    });
    //绑定顶部区事件
    $("#area").live("click", function () {
        livearea();
    });
});

//判断当前处于哪个级别，并执行返回事件
function back() {
    var i = $(".body_top span").filter(function () {
        return $(this).html() != "";
    }).length; //    
    switch (i) {
        case 1:
            BackCity();
            break;
        case 2:
            livecity();
            break;
        case 3:
            livearea();
            break;
    }
    window.event.cancelBubble = true;
}
//顶部城市事件
function livecity() {
    ChooseCity($("#city"));
    $(".shopareas").hide(10);
    $("#area").html("").css("background", "#E7E4E1");
    $("#shoparea").html("").css("background", "#E7E4E1");
    $(".body_top img").eq(0).hide(10);
}
//顶部区事件
function livearea() {
    $(".body_top img").eq(1).hide(10);
    $(".shopareas").hide(10);
    chooseThis($("#area")); //控制三角图形位置
    $("#schools").show();
    $(".shopareas").hide(10);
    $("#shoparea").html("").css("background", "#E7E4E1");
    $("#area").removeClass("topspan").siblings("span").addClass("topspan");
}
//找到位置弹出浮层
function FindPosition() {
    if ($("#findcity").val() != "") {//找到城市
        var x = window.document.width;
        var y = window.document.height;

        var position = "", str = "", HtmlStr = "", SpanHtml = "";
        if ($("#findschool").val() != "") {//找到大学
            var value = $("#findschool").val().split(',');
            position = value[0];
            str = value[1];
            SpanHtml = " <a href='/area/" + str + "' id='position'>" + position + "</a>";
        }
        else {//没找到大学
            var value = $("#findcity").val().split(',');
            position = value[0];
            str = value[1];
            switch (position) {
                case "上海":
                    SpanHtml = " <a name='shanghai' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;               
                case "南京":
                    SpanHtml = " <a name='nanjing' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "苏州":
                    SpanHtml = " <a name='suzhou' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "福州":
                    SpanHtml = " <a name='fuzhou' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "广州":
                    SpanHtml = " <a name='guangzhou' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "杭州":
                    SpanHtml = " <a name='hangzhou' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "青岛":
                    SpanHtml = " <a name='qingdao' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "宁波":
                    SpanHtml = " <a name='ningbo' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "重庆":
                    SpanHtml = " <a name='chongqing' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";             
                case "深圳":
                    SpanHtml = " <a name='shenzhen' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "厦门":
                    SpanHtml = " <a name='xiamen' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";
                    break;  
                case "成都":
                    SpanHtml = " <a name='chengdu' onclick='javascript:navigateChaoRen(this)' id='position'>" + position + "</a>";                   
                    break;
                default: 
                    SpanHtml = " <a class='/area/" + str + "' id='position'>" + position + "</a>";
                    $("#position").live("click", function () { $(".Guess,.Guess_detail,.Guess_Info").remove(); $("." + str).click(); }); //显示找到的城市的区
                    break;
            }
        }
//        HtmlStr = "   <div class='Guess'></div><div class='Guess_detail'></div><div class='Guess_Info'><div id='Guess'><img src='images/loc.png' /><span>我们猜您在</span>" + SpanHtml + "<div class='Error'>没猜对&nbsp;?<a id='showall'>显示全部>></a></div></div></div>";
//        $("body").append(HtmlStr);
        $(".Guess").width(x);
        $(".Guess").height(y);

        $(".Guess").addClass("GuessStyle");
        $(".Guess_detail").addClass("Guess_detailStyle");
        //判断浏览器是否ie7和ie8，控制透明度
        if ($.browser.msie) {
            if ($.browser.version == "7.0" || $.browser.version == "8.0") {
                $(".Guess").removeClass("GuessStyle").addClass("IEGuess");
                $(".Guess_detail").removeClass("Guess_detailStyle").addClass("IEGuess_detail");
            }
        };
        $("#showall").live("click", function () {//显示全部城市
            $(".Guess,.Guess_detail,.Guess_Info").remove(); //移除浮层
            BackCity();
        });
    }
}

//返回选择城市
function BackCity() {
    $(".body_top img").hide(10);
    $(".body_top span").html("").css("background", "").eq(0).html("请选择所在城市").removeClass("back");
    chooseThis($(".body_top span").eq(0));
    $(".cities").show(); //显示所有城市
    $("#schools,.allareas").hide(10); //隐藏所有区和学校
    $(".shopareas").hide(10);
}

//显示遮罩层
function showshadow(e) {
    $(".Guess").remove();
    if (e) {
        var x = window.document.width;
        var y = window.document.height;
        var htmlStr = "";
        htmlStr = "<div class='Guess GuessStyle'></div>";
        $("body").append(htmlStr);
        $(".Guess").width(x);
        $(".Guess").height(y);
    }
}