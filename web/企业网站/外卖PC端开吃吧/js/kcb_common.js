//js工具，将通用的方法封装到一个对象中
function tool() {
};
tool.prototype = {

    //ajax请求
    ajax: function (data) {
        $.ajax(data);
    },

    //验证验证码
    checkValidateCode: function (code, time, type) {
        var param = {},
        result = "";

        if (this.IsEmpty(code)) {
            //验证码为空
            return "验证码不能为空 ";
        }
        param.type = "POST";
        param.async = false;
        param.url = "/ajax/ValidateCode.ashx";
        param.data = { validateCode: code, time: time, type: type };
        param.dataType = "text";
        param.success = function (data) {
            result = data;
        };
        this.ajax(param);
        switch (result) {
            case "-1":
                return "验证码错误";
            case "-2":
                return "验证码过期";
            case "-3":
                return "网络连接超时,请刷新页面重新操作"; //系统生成验证码为空
            case "1":
                return "1";
        }
    },

    //验证是否为空
    IsEmpty: function (data) {
        if (data == null || data == "" || data === "null") {
            return true;
        }
        else {
            return false;
        }
    },

    //验证邮箱格式
    mailboxFormat: function (data) {
        if (this.IsEmpty(data)) {
            return { "isCorrect": false, "message": "邮箱不能为空" };
        }
        RegularExp = new RegExp("^[\\w-]+(\\.[\\w-]+)*@[\\w-]+(\\.[\\w-]+)+$");
        if (!RegularExp.exec(data)) {
            return { "isCorrect": false, "message": "邮箱格式错误" };
        }
        return { "isCorrect": true, "message": "" };
    },

    //验证邮箱是否被注册
    checkMailExist: function (mail) {
        var params = {};
        var result = "";
        //验证邮箱合法性
        params.type = "POST";
        params.async = false;
        params.url = "/ajax/Login_Register/CheckUserMail.ashx";
        params.data = { mail: mail };
        params.dataType = "text";
        params.success = function (data) {
            result = data;
        };
        this.ajax(params);
        return result;
    },

    //验证手机号是否被注册 or 绑定
    checkPhoneExist: function (phone) {
        var params = {};
        var result = "";
        //验证手机号的合法性
        params.type = "POST";
        params.async = false;
        params.url = "/ajax/CheckCodeToPhone/CheckMobileIsBind.ashx";
        params.data = { phone: phone, userID: "0" };
        params.dataType = "text";
        params.success = function (data) {
            result = data;
        };
        this.ajax(params);
        return result;
    },

    //通用验证格式
    commonCheckFormat: function (data, format) {
        if (this.IsEmpty(data)) {
            return { "isCorrect": false, "message": "内容不能为空" };
        }
        RegularExp = new RegExp(format);
        if (!RegularExp.exec(data)) {
            return { "isCorrect": false, "message": "格式不符合要求" };
        }
        return { "isCorrect": true, "message": "" };
    },

    //验证密码格式
    commonCheckPassword: function (data, format) {
        if (this.IsEmpty(data)) {
            return { "isCorrect": false, "message": "密码不能为空" };
        }
        RegularExp = new RegExp(format);
        if (!RegularExp.exec(data)) {
            return { "isCorrect": false, "message": "密码不符合要求" };
        }
        return { "isCorrect": true, "message": "" };
    },

    //获取随机字母/数字
    getRandom: function (length, type) {
        /*
        type = 1 :获取随机字母
        type = 2 :获取随机数字
        type = 3 :获取随机字母/数字组合
        */
        var code = "";
        for (var i = 0; i < length; i++) {
            code += this.getLetters(type);
        }
        return code;
    },

    getLetters: function (type) {
        var chars = "1 2 3 4 5 6 7 8 9 0 a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z".split(" ");
        var letters = "a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z".split(" ");
        var numbers = "0 1 2 3 4 5 6 7 8 9".split(" ");
        switch (type) {
            case 1:
                return letters[Math.floor(Math.random() * 52)];
            case 2:
                return numbers[Math.floor(Math.random() * 10)];
            case 3:
                return chars[Math.floor(Math.random() * 62)];
            default:
                return "";
        }
    },

    //判断手机号码
    checkMobile: function (phone) {
        var regExpMobile = new RegExp("^1[0-9]{10}");
        if (this.IsEmpty(phone)) {
            return { "isCorrect": false, "message": "手机号不能为空" };
        }
        if (phone.length != 11) {
            return { "isCorrect": false, "message": "请输入11位手机号" };
        }
        if (!regExpMobile.exec(phone)) {
            return { "isCorrect": false, "message": "手机号码格式错误" };
        }
        if (regExpMobile.exec(phone)) {
            return { "isCorrect": true, "message": "手机号码正确" };
        }
        else {
            return { "isCorrect": false, "message": "手机号码格式错误" };
        }
    },

    //判断qq
    checkQQ: function (QQ) {
        var regExpQQ = new RegExp("^[1-9][0-9]{4,9}$");
        if (this.IsEmpty(QQ)) {
            return { "isCorrect": false, "message": "QQ号码不能为空" };
        }
        else if (!regExpQQ.test(QQ)) {
            return { "isCorrect": false, "message": "QQ号码格式错误" };
        }
        else
            return { "isCorrect": true, "message": "" }
    },

    //判断电话号码
    checkPhone: function (phone) {
        var regex = /^[0-9\-]*$/;
        if (this.IsEmpty(phone)) {
            return { "isCorrect": false, "message": "电话号码不能为空" };
        }
        if (phone.length < 7 || phone.indexOf("1") == 0 || !regex.test(phone)) {
            return { "isCorrect": false, "message": "电话号码格式错误" };
        }
        else if (regex.test(phone)) {
            return { "isCorrect": true, "message": "电话号码正确" };
        }
        else {
            return { "isCorrect": false, "message": "电话号码格式错误" };
        }
    },

    //判断是否为数字
    checkNum: function (data) {
        var regex = /^\d+$/;
        if (this.IsEmpty(data)) {
            return { "isCorrect": false, "message": "电话号码不能为空" };
        }
        else if (regex.test(data)) {
            return { "isCorrect": true, "message": "电话号码正确" };
        }
        else {
            return { "isCorrect": false, "message": "电话号码格式错误" };
        }
    },

    //验证密码
    checkPassword: function (data) {

        if (this.IsEmpty(data)) {
            return { "isCorrect": false, "message": "密码不能为空" };
        }
        else if (data.length < 6) {
            return { "isCorrect": false, "message": "密码长度不能小于6位" };
        }
        else if (data.length > 15) {
            return { "isCorrect": false, "message": "密码长度不能大于15位" };
        }
        else {
            return { "isCorrect": true, "message": "输入正确" };
        }
    },

    //浮点数加法运算  
    floatAdd: function (arg1, arg2) {
        var r1, r2, m;
        try { r1 = arg1.toString().split(".")[1].length } catch (e) { r1 = 0 }
        try { r2 = arg2.toString().split(".")[1].length } catch (e) { r2 = 0 }
        m = Math.pow(10, Math.max(r1, r2));
        return (arg1 * m + arg2 * m) / m;
    },

    //浮点数乘法运算  
    floatMul: function (arg1, arg2) {
        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
        try { m += s1.split(".")[1].length } catch (e) { }
        try { m += s2.split(".")[1].length } catch (e) { }
        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m);
    }
};



//阻止冒泡事件
function stopProcess(e) {
    e = e || window.event;
    if (e.stopPropagation) { //W3C阻止冒泡方法
        e.stopPropagation();
    } else {
        e.cancelBubble = true; //IE阻止冒泡方法
    }
}

/*
* 统计文本域字数
* 函数传递两个参数obj即为输入框对象，number表示准许输入的字数限制
* 输入框对象必须具有class="satNumbers"
* eg.  
* <textarea class="satNumbers" onkeyup="satTextarea(this,50)"></textarea>
* <span>还可输入<strong>50</strong>字</span>
* reply_addtip strong显示的是可输入字数   
*/
function satTextarea(obj, number) {
    var textLength = obj.value.length;
    if (textLength < number) {
        $(".satNumbers").next().html("还可以输入<strong>" + number + "</strong>个汉字");
        $(".reply_addtip strong").html(number - textLength);
    }
    else {
        $(".satNumbers").next().html("已超过<strong>50</strong>个汉字");
        $(".reply_addtip strong").html(textLength - number);
    }
}

function request(paras) {
    var url = location.href,
            paraString = url.substring(url.indexOf("?") + 1, url.length).split("&"),
            paraObj = {},
            returnValue;
    for (i = 0; j = paraString[i]; i++) {
        paraObj[j.substring(0, j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=") + 1, j.length);
    }
    returnValue = paraObj[paras.toLowerCase()];
    if (typeof (returnValue) == "undefined") {
        return "";
    } else {
        return returnValue;
    }
}

if ($('#orderDynamicList').length > 0) {
    //订单滚动
    var aniSpeed = { slow: 2000, med: 1000, fast: 500, flash: 200 };
    function foodListScroll() {
        $('#orderDynamicList').stop().animate({ 'top': '46px' }, aniSpeed.med,
		function () {
		    $('#orderDynamicList').css('top', '0');
		    $('#orderDynamicList li:last').stop().css('opacity', 0).prependTo('#orderDynamicList').animate({ 'opacity': 1 }, aniSpeed.med);
		});
    }
    setInterval('foodListScroll()', 4000); //订单滚动
}


//将未读消息设置为已读
function setMessageReaded() {
    var tools = new tool();
    var params = {};
    //将未读新消息设置为已读
    params.type = "POST";
    params.async = false;
    params.url = "http://kaichiba.com/ajax/Notice/SetaAllMessageReaded.ashx";
    params.dataType = "text";
    params.success = function (result) {
    };
    tools.ajax(params);
}

//最新消息
function newUnreadMessage() {
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/Notice/GetUnReadMessageByUserID.ashx",
        dataType: "text",
        success: function (result) {
            if (result == "") {
                $(".num").html(0).hide();
            }
            else if (result == "-1") {//非法用戶
                window.clearTimeout(t);
                return;
            }
            else {
                messageArray = result.split("|");
                var num = parseInt(messageArray[1]);
                var ReceivedIDAndPhone = messageArray[2];
                if (num == 0 || isNaN(num)) {
                    $(".num").hide();
                    $(".notification").removeClass("has_noti");
                }
                else {
                    $(".num").html(num).show();
                }
                if (ReceivedIDAndPhone != "") {  //是否存在用户电话打不通的公告
                    var RandP = ReceivedIDAndPhone.split(",");
                    $(".urgency_message").attr("NoticeID", RandP[0]);
                    $(".urgency_message .urgency_message_show").html(RandP[1]);
                    $(".urgency_message").show();
                    $('#shade').show();
                }
                $(".MessageBox").html(messageArray[0]);
                //点击查看消息跳转
                NavMessage();
            }
        }
    });

    //t = setTimeout(function () { newUnreadMessage(); }, 40000);
}


//同步高度
function setHeight(obj, srcObj) {
    var height = srcObj.height();
    if (obj.height() < height) {
        obj.height(height + 20);
    }

}
//点击查看消息跳转
function NavMessage() {
    $(".MessageBox li").bind("click", function () {
        var MessageType = $(this).attr("messagetype");
        if (MessageType == 1) {
            if ($.cookie("isLogin") == 0 || $.cookie("isLogin") == null) {
                window.location.href = "http://kaichiba.com/personal/iTodayOrder_anonymous.aspx";
                return;
            }
            window.location.href = "http://kaichiba.commember_order.html";
        }
        else if (MessageType == 2) {
            if ($.cookie("isLogin") == 0 || $.cookie("isLogin") == null) {
                window.location.href = "http://kaichiba.com/personal/sysNotice_anonymous.aspx";
                return;
            }
            window.location.href = "http://kaichiba.com/personal/member_announce.html";
        }
        else if (MessageType == 3) {
            window.location.href = "http://kaichiba.com/personal/member_message.html";
        }
        else if (MessageType == 4) {
            window.location.href = "http://kaichiba.com/personal/iMessage.aspx";
        }
    });
}

$(".f1click_bind").click(function () {
    $("#XYTipsWindowBgBind").css("display", "block");
    $("#bindPhone").show();
});


$(document).ready(function () {

    //判断浏览器是否ie6
    if ($.browser.msie) {
        if ($.browser.version == "6.0" || $.browser.version == "7.0") {
            $(document.body).append("<div id=\"ie6_bg\"></div><div id=\"ie6_tip\"><div id=\"ie6_sorry\">对不起，您的浏览器版本过低，您可以尝试：</div><div id=\"ie6_wap\">访问简洁版开吃吧</div><div id=\"ie6_update\">升级浏览器</div></div>");
            $("#ie6_wap").click(function () { location.href = "http://wap.kaichiba.com" });
            $("#ie6_update").click(function () { location.href = "http://chrome.360.cn/" });
        }
    };

    //个人中心
    var showAccount,
        hideAccount;
    $(".login_regist").click(function () {
        if ($(".layer_topInfo").is(":hidden")) {
            $(".layer_top_Message").hide();
            $(".layer_topInfo").css("display", "block");
        }
        else {
            $(".layer_topInfo").css("display", "none");
        }
    });



    //搜索提示
    $("#keyword").focus(function () {
        var $trigger = $(this);
        var val = $trigger.val();
        if (val == "搜索餐厅、美食") {
            $trigger.val("");
        }
    }).blur(function () {
        if ($(this).val() == "" || $(this).val() == "搜索餐厅、美食") {
            $(this).val("搜索餐厅、美食");
        }

    });

    //动态更新个人中心和fside左侧高度
    if ($("#fSidebar").length > 0) { setHeight($("#fSidebar"), $("#about")); }
    if ($("#pCenter").length > 0) { setHeight($("#pMenu"), $("#pCenter")); }

    var uniID = $.cookie("uniID"),
        uniName = $.cookie("uniName"),
        title = $.trim($(".title-txt").html()),
        params = {},
        tools = new tool();
    $(".fSideNav a").each(function () {
        if ($(this).html() == title) {
            $(this).parent().addClass("active");  //选中当前活动
        }
    });
    $("#uniName").html(uniName);
    $("#uniName").css("cursor", "pointer").bind("click", function () {
        if ($.cookie("uniID") == null) {
            window.location.href = "/index.aspx";
            return;
        }
        window.location = "/area/" + $.cookie("uniID");
    });

    if ($("#needUniCookie").length == 0) {  //一般页
        if (tools.IsEmpty(uniID) || tools.IsEmpty(uniName)) {
//            location.href = "http://kaichiba.com/CommomPage/c.aspx?CleanType=1";
//            return;
        }
        else {
            //            $("#school_index").prepend(uniName);
            $("#school_index").prepend("<a style='color:#000000' href='area/" + uniID + "'>" + uniName + "</a>");
            $("#school a").eq(0).attr("href", "http://kaichiba.com/area/" + uniID).html(uniName);
            $("#school a").eq(1).attr("href", "http://kaichiba.com/CommomPage/c.aspx?CleanType=1");
        }
    }
    else {
        //餐厅页，没有大学信息的cookie也不跳转
        if (tools.IsEmpty(uniID) || tools.IsEmpty(uniName)) {
            $("#school_index").prepend("请选择您的大学");
            $("#school a").eq(0).attr("href", "index.html").html("请选择您的大学");
            $("#school a").eq(1).attr("href", "index.html");
        }
        else {
//            $("#school_index").prepend(uniName);
            $("#school_index").prepend("<a style='color:#000000' href='area/" + uniID + "'>" + uniName + "</a>");
            $("#school a").eq(0).attr("href", "http://kaichiba.com/area/" + uniID).html(uniName);
            $("#school a").eq(1).attr("href", "http://kaichiba.com/CommomPage/c.aspx?CleanType=1");
        }
    }




    //刷新未读消息//當用戶登入后才一步请求数据
    if (!tools.IsEmpty($.cookie("userID"))) {
        t = setTimeout(function () { newUnreadMessage(); }, 0);
    }

    $(".urgency_message_bottom").live("click", function () {
        var noticeID = $(".urgency_message").attr("NoticeID");
        $(".urgency_message").hide();
        $('#shade').hide();
        $.ajax({
            type: "POST",
            url: "../ajax/Notice/ChangeSysNoticeState.ashx",
            data: { noticeID: noticeID },
            success: function (data) {
                //还原提醒面板的信息。
                $(".urgency_message").attr("NoticeID", "");
                $(".urgency_message #UserPhone").html("");
                t = setTimeout(function () { newUnreadMessage(); }, 0);
            }
        });


    });

    //点击取消查看信息
    $(".setallmessage").live("click", function () {
        $(".layer_top_Message").css("display", "none");
        $(".num").hide();
        $(".notification").removeClass("has_noti");
        $(".MessageBox li").addClass("readed");
        $(".MessageBox strong").css("color", "#b4b4b4");
        setMessageReaded();
        return false; //阻止事件冒泡
    });

    //点击查看消息跳转
    NavMessage();


    //提交问题反馈
    $(".feedBackBt").click(function () {
        var msgContent = $.trim($("#feedBackTipContent").val()),
            validateCode = $.trim($("#fBackValiDateCode").val()),
            ajaxUrl = $.trim($("#ajaxUrl").val());
        var result = tools.checkValidateCode(validateCode, 100, 1);
        if (msgContent == null || msgContent == "") {
            $(".fBackValiRs").html("内容不能为空");
            return;
        }
        if (result != "1") {
            $(".fBackValiRs").html(result);
            $("#authenticationCode_fBack").click();
            return;
        }
        //获取游客联系邮箱
        var userID = $.cookie("userID");
        if (userID == null) {
            var visitorMail = $("#visitorMail").val();
            //检验邮箱格式
            if (visitorMail != null) {
                result = tools.mailboxFormat(visitorMail);
                if (result.isCorrect == false) {
                    $(".fBackValiRs").html(result.message).css("color", "red");
                    return;
                }
                msgContent += " *****游客联系邮箱：" + visitorMail;
            }
        }

        params.type = "POST";
        params.async = false;
        params.url = "/ajax/FeedBackMessage.ashx";
        params.dataType = "text";
        params.data = { content: msgContent, validateCode: validateCode };
        params.success = function (data) {
            if (data == "1") {
                parent.$.XYTipsWindow.removeBox();  //成功后关闭弹窗
                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align:center;margin-top:40px;font-size:16px;font-weight:bold;\">感谢您的宝贵建议！</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                $("#feedBackTipContent").val("");
            }
            else {
                parent.$.XYTipsWindow.removeBox();
                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">问题反馈失败，请重试！</p>",
                    ___showbg: true,
                    ___time: 1800
                });
            }
            //更新验证码
            $("#top_authenticationCode_fBack").click();
        };

        tools.ajax(params);
    });
    //自定义按钮取消事件
    $(".fCancelBt").live("click", function () {
        parent.$.XYTipsWindow.removeBox();
        $(".validRs").html("");
        $("#feedBackTip").next().val("");
        $(".fBackValiDateCode").val("");
    });

    //如果存在热门菜品，则请求出数据，否则不显示
    if ($.trim($("#hotFoodExsit").val()) == 1 && !tools.IsEmpty(uniID)) {
        //ajax读取txt文件
        var text;
        params.type = "GET";
        params.url = "../inc/RecommendFood/" + uniID + ".txt";
        params.dataType = "text";
        params.success = function (data) {
            text = data.toString();
            $("#hotFood").css("display", "block");
            $("#hotFoodContent").html(text);

            $("a.addHotFood").click(function () {
                var searchFoodId = $(this).next().html();
                $.cookie("searchFoodId", searchFoodId, {
                    path: "/",
                    expires: 1
                });
            });
        };
        tools.ajax(params);
    }
    else {
        $("#hotFood").css("display", "none");
    }

    //加载公告
//    if (!tools.IsEmpty(uniID)) {
//        params.type = "GET";
//        params.url = "http://kaichiba.com/inc/SysNotice/" + $.cookie("uniID") + ".txt";
//        params.dataType = "text";
//        params.success = function (data) {
//            if (data.indexOf("</html>") > 0)
//            { return; }
//            else {
//                $("#siteNotice .ri_body").html(data.toString());
//            }
//        };
//        tools.ajax(params);
//    }

    //浮层登录注册
    $(".tabHd li").click(function () {
        $trigger = $(this);
        //更改选中tab标签
        if (!$trigger.hasClass("tabSelect")) {
            $trigger.addClass("tabSelect").siblings().removeClass("tabSelect");
            if ($.trim($trigger.html()) == "注册") {
                $(".minLogin").css("display", "none");
                $(".minRegist").css("display", "block");
            }
            if ($.trim($trigger.html()) == "登录") {
                $(".minLogin").css("display", "block");
                $(".minRegist").css("display", "none");
            }
        }
    });
    //关闭浮层
    $(".close").click(function () {
        $(".minLoginBg,.minLogReg").css("display", "none");
        //$("#XYTipsWindowBg").css("display", "none");
        $("#XYTipsWindowBgBind").css("display", "none");
    });
});
//电话餐厅弹出的注册登入，当注册时填入已注册用户名，切换到浮层的登入
function ChangeTrigger() {
    //获取ifream的父窗体，并找到id为tabhd的li模拟点击事件
    dispatch(window.parent.document.getElementById("Tb_tabHd"), 'click');
}
//解决搜狗浏览器下高速模式（Webkit内核）下非INPUT元素Click事件无效
function dispatch(c, b) {
    try {
        var a = document.createEvent("Event");
        a.initEvent(b, true, true);
        c.dispatchEvent(a)
    } catch (d) {
        alert(d)
    }
}