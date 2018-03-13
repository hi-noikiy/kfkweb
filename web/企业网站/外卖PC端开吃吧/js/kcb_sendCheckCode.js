var checkcode = "";
var tools = new tool();
var params = {};
var isShowCountDown = 0; //是否显示倒计时
var sendCodeTimes = 0; //用户点击发送校验码的次数


//验证密码

function checkPassword(pwd, pwd2, type) {
    var result;
    //验证格式
    result = tools.commonCheckPassword(pwd, "^[0-9a-zA-z_]{6,15}$");
    if (result.isCorrect == false) {
        $("#PassWord").next("p").text(result.message).removeClass("focusTips").addClass("logTips");
        return false;
    }
    if (type == 2 && pwd != pwd2) {
        $("#PassWord2").next("p").text("前后输入不一致").removeClass("focusTips").addClass("logTips");
        return false;
    }
    if (result.isCorrect == true) {
        $("#PassWord2").next("p").removeClass("logTips").html("<img src=\"../image/tick_circle.png\" style='margin-right:100px;' alt=\"正确\" />");
    }
    $("#PassWord").next("p").removeClass("logTips").html("<img src=\"../image/tick_circle.png\" style='margin-right:100px;' alt=\"正确\" />");
    return true;
}

$("#PassWord").blur(function () {
    var password1 = $.trim($("#PassWord").val()),
            $password1 = $("#PassWord").next("p");
    if (password1 == "") {
        $password1.text("密码不能为空").removeClass("focusTips").addClass("logTips");
    }
    else {
        checkPassword(password1, 0, 1);
    }
});
$("#bind_phone").blur(function () {
    var result,
        phone = $(this).val().trim();

    //验证手机号格式
    result = tools.checkMobile(phone);

    if (!result.isCorrect) {
        $("#bind_phone").next("p").html(result.message).removeClass("focusTips").addClass("logTips");
    }
    //验证手机号合法性
    result = tools.checkPhoneExist(phone);
    result = parseInt(result);
    if (result < 0) {
        $("#bind_phone").next("p").removeClass("focusTips").addClass("logTips").html("帐号存在,请直接<a href='login.html' style='color:blue'>登录</a>");

    }
    else {
        $("#bind_phone").next("p").html("<img src=\"../image/tick_circle.png\" style='margin-right:100px;' alt=\"正确\" />");
        // return true;
    }
});

$("#PassWord2").blur(function () {
    var password2 = $.trim($("#PassWord2").val()),
        $password2 = $("#PassWord2").next("p"),
        password1 = $.trim($("#PassWord").val());
    if (password2 == "") {
        $password2.text("请确认密码").removeClass("focusTips").addClass("logTips");
    }
    else {
        checkPassword(password1, password2, 2);
    }
}).focus(function () {
    $("#PassWord2").next("p").text("").removeClass("logTips").addClass("focusTips");
});

//验证手机是否被绑定
function checkmobile() {
    var result = "";
    var userID = $.cookie("userID"),
        phone = $("#bind_phone").val();

    //验证手机
    result = tools.checkMobile(phone);
    if (result.isCorrect == false) {
        $("#validTips").html(result.message).css("display", "block");
        return false;
    }
    if (tools.IsEmpty(userID)) {
        userID = 0;
    }

    //验证手机是否绑定
    params.type = "POST";
    params.async = false;
    params.url = "../../ajax/CheckCodeToPhone/CheckMobileIsBind.ashx";
    params.data = { phone: phone, userID: userID };
    params.dataType = "text";
    params.success = function (data) {
        result = data;
    };
    tools.ajax(params);
    switch (result) {
        case "1": $("#validTips").html("").css("display", "none"); return true;
        case "-1": $("#validTips").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
        case "-2": $("#validTips").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
        case "-3": $("#validTips").html("请输入11位手机号。").css("display", "block"); return false;
        default: $("#validTips").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
    }
}

//发送手机验证码倒计时提示
function showCountdown(str) {
    if (str == "btn") {
        var num = 60;
        $("#request_valid").val("重新发送(" + num + ")").attr("disabled", "disabled").css({ "background-color": "#d0d0d0", "color": "#666666" });
        $("#helpRegistP").show();
        var si = setInterval(function () {
            if (num == 0) {
                clearInterval(si);
                $("#request_valid").val("重新发送").removeAttr("disabled").css({ "background-color": "#0c9efc", "color": "#fff" });
            } else {
                num--;
                $("#request_valid").val("重新发送(" + num + ")").attr("disabled", "disabled");
            }
        }, 1000);
    }
    else if (str == "a") {
        var num = 60;
        $("#forHelp2").html("语音验证码(<span style='color:Red'>" + num + "</span>秒后可重新拨打)").removeAttr("onclick").css("color", "#a29f9f");
        $("#phonecalltip2").show();
        var si_a = setInterval(function () {
            if (num == 0) {
                clearInterval(si_a);
                $("#phonecalltip2").hide();
                $("#forHelp2").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
            }
            else {
                num--;
                $("#forHelp2").html("语音验证码(<span style='color:Red'>" + num + "</span>秒后可重新拨打)");
            }
        }, 1000);
    }
}

function sendCheckCode(source) {

    //点击免费获取校验码
    var phone = $("#bind_phone").val();
    var result = "";
    if (source != "" && source != "order" && !checkall('invite')) {
        return false;
    }
    if ($("#txtValidateCode").val() == "") {
        $("#validTips").html("验证码不能为空").css("display", "block");
        return false;
    }

    if (!checkmobile()) { return false; }

    params.type = "POST";
    params.async = false; /// <reference path="kcb_joinIn.js" />
    params.url = "/ajax/CheckCodeToPhone/GetCheckCodeToPhone.ashx";
    params.data = { source: source, phone: phone, validateCode: $("#txtValidateCode").val() };
    params.success = function (data) {
        result = data;
    }
    tools.ajax(params);
    switch (result) {
        case "0":
            $("#validTips").html("距离上一次发送校验码不超过1分钟。").css("display", "block");
            return false;
        case "-1":
            //提示发送校验码失败
            $("#validTips").html("很抱歉，暂时无法发送校验码，再重新试下好吗？").css("display", "block");
            return false;
        case "-2":
            $("#validTips").html("很抱歉，您现在不是注册用户，无法使用此功能。").css("display", "block");
            return false;
        case "-3":
            //验证码验证失败
            $("#validTips").html("验证码错误，请刷新重新输入").css("display", "block"); $("#phonecalltip2").hide();
            return false;
        case "-12":
            $("#validTips").html("很抱歉，您暂时无法使用此功能，请刷新页面重新使用。").css("display", "block");
            return false;
        default:

            //判断是第几次点击获取校验码
            sendCodeTimes++;
            if (sendCodeTimes >= 2) {
                //如果是第二次点击，则显示帮助用户注册申请入口
                $("#helpRegistP").css("display", "block");
            }

            //发送校验码成功
            checkcode = result;
            showCountdown("btn");
            return true;
    };
    //发送校验码
}

function checkCode() {
    //验证校验码
    var validcode = $("#input_valid").val(),
        phone = $("#bind_phone").val(),
        flag = 0;
    if (checkcode == "") {
        $("#validTips").html("您还没有获取校验码。").css("display", "block");
        return false;
    }
    else {
        $.ajax({
            type: "POST",
            async: false,
            url: "/ajax/CheckCodeToPhone/CheckValidCodeAndMobile.ashx",
            data: { phone: phone, code: validcode },
            dataType: "text",
            success: function (data) {
                switch (data) {
                    case "1": flag = 1; break;
                    case "-1": $("#validTips").html("手机号和校验码不匹配").css("display", "block"); break;
                    case "-2": $("#validTips").html("该校验码已失效，请重新获取").css("display", "block"); break;
                    default: $("#validTips").html("暂时无法绑定，请稍候再试").css("display", "block"); break;
                }
            }
        });
        return flag == 0 ? false : true;
    }
}

//绑定手机
function bindmobile(Tips) {
    var validcode = $("#input_valid").val(),
        flag = 0,
        phone = $("#bind_phone").val(),
        result = "",
        regExpMobile = new RegExp("^[1][0-9]{10}");

    var source = "";
    if (typeof ($(".bind_subBtn").attr("source")) != "undefined" && $(".bind_subBtn").attr("source") == "order") {
        source = "order";
    }
    if (!checkPassword($("#PassWord").val(), 0, 1) || !checkPassword($("#PassWord").val(), $("#PassWord2").val(), 2)) {
        return false;
    }
    //验证手机
    result = tools.checkMobile(phone);
    if (result.isCorrect == false) {
        $("#validTips").html(result.message).css("display", "block");
        return false;
    }

    //验证校验码是否正确
    if (!checkCode()) {
        return false;
    }

    //验证手机号码是否被绑定过
    if (!checkmobile()) {
        return false;
    }

    //绑定手机
    var userID = $.cookie("userID") != null ? $.cookie("userID") : "",
        newPhone = $("#bind_phone").val(),
        pwd = $.cookie("kcb");
    if (Tips == "float_order") {
        pwd = $("#PassWord").val();
    }
    //    if (pwd == null) {
    //        pwd = "";
    //        //return false;
    //    }
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/ChangeBindPhone.ashx",
        data: { source: source, userID: userID, phone: newPhone, password: pwd },
        success: function (data) {
            if (data == "1") {
                if (Tips.indexOf("float") >= 0) {
                    $(".minLoginBg,.minLogReg").css("display", "none");
                    var tipstext = (Tips == "float_order" ? "注册成功" : "绑定成功");
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#FB501C;text-align: center;margin-top:30px;font-size:16px;font-weight:bold;\">" + tipstext + "!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                    if (Tips.indexOf("float_show") >= 0) {
                        $("#bindPhone").html(newPhone);
                    }
                    if (Tips.indexOf("float_order" >= 0)) {
                        $("#h_isRegist").val("1");
                        $("#isphoneregist").val("1");
                    }
                    $("#bind_phone").val("");
                }
                if (Tips == "alert") {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">绑定成功!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                    $("#bind_phone").val("");
                }
                if (Tips == "notalert") {
                }
                $("#input_valid").val("");
                $("#validTips").html("").css("display", "none");
                flag = 1;
            }
            else if (data == "-1") {
                $("#validTips").html("哦～您忘了该手机号已经绑定了。").css("display", "block");
            }
            else if (data == "-2") {
                $("#validTips").html("手机号好像错了～").css("display", "block");
            }
            else if (data == "-3") {
                $("#validTips").html("该手机号已被绑定，请更换手机号。").css("display", "block");
            }
            else {
                $("#validTips").html("系统暂时无法处理，请稍后再试！").css("display", "block");
            }
        }
    });
    if (flag == 0) {
        return false;
    }
    //绑定成功之后删除验证码
    checkcode = "";

    //注册成功后，直接触发确认下单
    if (Tips.indexOf("float_order" >= 0)) {
        //        $("#sendOrder").trigger("click");
        this.location.href = this.location.href;
    }
    return true;
}

//点击发送让客服帮我注册申请
function applyHelpRegist() {
    showCountdown("a");
    var phone = $("#bind_phone").val();
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/CheckCodeToPhone/GetVoiceCode.ashx",
        data: { phone: phone },
        dataType: "json",
        success: function (data) {
            var respCode = data.resp.respCode;
            switch (respCode) {
                case "100006": $("#phonecalltip2").html("手机号不合法").css({ "display": "block", "color": "red", "border-color": "#d4d4d4" });
                    $("#forHelp2").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "100008": $("#phonecalltip2").html("手机号为空").css({ "display": "block", "color": "red", "border-color": "#d4d4d4" });
                    $("#forHelp2").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "104102": $("#phonecalltip2").html("语音验证码为空,请重新免费获取！").css({ "display": "block", "color": "red", "border-color": "#d4d4d4" });
                    $("#forHelp2").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "-1": $("#phonecalltip2").html("系统异常，请稍后重试").css({ "display": "block", "color": "red", "border-color": "#d4d4d4" });
                    $("#forHelp2").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "000000":
                default: $("#phonecalltip2").html("电话拨打中…请保持手机畅通!").css({ "display": "block", "color": "blue" }); break; //请留意来自<span style='color:#eb6100; margin:0px 4px'>4000657117</span>的电话
            }
        }
    });
}

$(document).ready(function () {
    //获取验证码
    $("#request_valid").click(function () {

        if (typeof ($(this).attr("source")) != "undefined" && $(this).attr("source") == "order") {
            sendCheckCode("order");
        } else {
            sendCheckCode("");
        }

    });

    //绑定手机
    $("#bind_Btn").click(function () {
        bindmobile("float");
    });
});