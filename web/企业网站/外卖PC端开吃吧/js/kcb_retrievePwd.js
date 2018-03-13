var tools = new tool();
var params = {};
var checkcode = "";
function showErrorInfo(message) {
    $("#showInfo").text(message).addClass("logTips");
    $("#sendToMail").removeAttr("disabled");
    $("#validCode").val("");
}

$(document).ready(function () {

    $("#registMail").val("手机号/邮箱");
    $("#registMail").blur(function () {
        $(this).val() == "" ? $(this).val("手机号/邮箱") : 0;
    }).focus(function () {
        $(this).val() == "手机号/邮箱" ? $(this).val("") : 0;
    });
    //找回密码
    $("#sendToMail").click(function () {
        var account = $.trim($("#registMail").val()),
                validateCode = $.trim($("#validCode").val()),
                $tips = $("#showInfo"),
                result = "";
        $("#sendToMail").attr("disabled", "disabled");

        result = tools.mailboxFormat(account);

        if (result.isCorrect == true) {
            //是邮箱，验证邮箱是否存在
            result = tools.checkMailExist(account);
            if (parseInt(result) > 0) {
                //存在
                //验证码验证
                result = tools.checkValidateCode(validateCode, 100, 0);
                if (result != "1") {
                    showErrorInfo(result);
                    $("#authenticationCode_retrievePwd").click();
                    return false;
                }

                $tips.text("请稍等...").removeClass().addClass("wait");

                //发送到邮箱
                params.type = "POST";
                params.async = false;
                params.data = { userMail: account };
                params.url = "/ajax/Login_Register/retrievePwd.ashx";
                params.success = function (data) {
                    switch (data) {
                        case "1":
                            $tips.text("找回链接已发送至您的邮箱，请注意查收。").removeClass("wait").addClass("success");
                            $tips.append("<a style=\"color:blue\" href=\"login.aspx\">返回登录页面</a>");
                            break;
                        case "-1":
                            showErrorInfo("该邮箱未被注册，请正确填写您的注册邮箱!");
                            break;
                        case "-2":
                            showErrorInfo("邮箱非法，无法发送，请联系开吃吧客服");
                            break;
                        case "-3":
                            showErrorInfo("暂时无法发送邮件，请稍候重试。");
                            break;
                    }
                };
                tools.ajax(params);
            } else {
                showErrorInfo("对不起，该邮箱未在本网站注册。");
            }

            return false;
        } else {
            result = tools.checkMobile(account);
            if (result.isCorrect == true) {
                //是手机号，验证手机号是否存在
                result = tools.checkPhoneExist(account);
                if (parseInt(result) < 0) {
                    //存在，则跳转到输入校验码页面
                    window.location.href = "/member/retrievePwdPhone.aspx?phone=" + account;
                } else {
                    showErrorInfo("对不起，该手机号未在本网站注册。");
                }
            } else {
                showErrorInfo(result.message);
            }
        }

    });

    //更换验证码
    $("#ValidateCodeClick_retrievePwd").click(function () {
        $("#authenticationCode_retrievePwd").click();
    });

    $("#Phone").blur(function () {
        var phone = $.trim($(this).val()),
            $mail = $(this).next("p");
        if (phone == "") {
            //如果没输入则离开时不提示
            $(this).next("p").text("手机号不能为空").removeClass("focusTips").addClass("logTips");
        }
        else {
            checkphone(phone, "");
        }

    }).focus(function () {
        $(this).next("p").text("请输入您的注册手机号").removeClass("logTips").addClass("focusTips");
    });

    $("#PassWord").blur(function () {
        var password1 = $.trim($("#PassWord").val()),
            $password1 = $("#PassWord").next("p");
        if (password1 == "") {
            $password1.text("密码不能为空").removeClass("focusTips").addClass("logTips");
        }
        else {
            checkPassword(password1, 0, 1);
        }
    }).focus(function () {
        $("#PassWord").next("p").text("密码必须由6-15个字符组成").removeClass("logTips").addClass("focusTips");
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

    //获取验证码点击事件
    $("#getCheckCode").click(function () {
        if ($(this).hasClass("disabled")) {
            return false;
        }
        var result;
        //验证手机号格式
        var phone = $("#Phone").val();
        result = tools.checkMobile(phone);
        if (!result.isCorrect) {
            $("#Phone").next("p").html(result.message).removeClass("focusTips").addClass("logTips");
            return false;
        }

        params.type = "POST";
        params.async = false; /// <reference path="kcb_joinIn.js" />
        params.url = "/ajax/CheckCodeToPhone/GetCheckCodeToPhone.ashx";
        params.data = { source: "", phone: phone, validateCode: $("#txtValidateCode").val() };
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
                $("#validTips").html("验证码错误，请刷新重新输入").css("display", "block"); $("#phonecalltip").hide();
                return false;
            case "-12":
                $("#validTips").html("很抱歉，您暂时无法使用此功能，请刷新页面重新使用。").css("display", "block");
                return false;
            default:
                checkcode = result;
                showCountdown("btn");
                $(this).addClass("disabled");
                return true;
        };
    });

});

function checkphone(phone, source) {
    var result;
    //验证手机号格式
    result = tools.checkMobile(phone);

    if (!result.isCorrect) {
        $("#Phone").next("p").html(result.message).removeClass("focusTips").addClass("logTips");
        return false;
    }
    //验证手机号合法性
    result = tools.checkPhoneExist(phone);
    result = parseInt(result);
    if (result < 0) {
        $("#Phone").next("p").html("<img src=\"../image/tick_circle.png\" alt=\"正确\" />");
        return true;
    }
    else {
        $("#Phone").next("p").removeClass("focusTips").addClass("logTips").html("手机号不存在,请直接<a href='/member/register' style='color:blue'>注册</a>");
        return false;
    }
}

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
        $("#PassWord2").next("p").removeClass("logTips").html("<img src=\"../image/tick_circle.png\" alt=\"正确\" />");
    }
    $("#PassWord").next("p").removeClass("logTips").html("<img src=\"../image/tick_circle.png\" alt=\"正确\" />");
    return true;
}


//发送手机验证码倒计时提示
var isShowCountDown = 0; //是否显示倒计时
function showCountdown(str) {
    if (str == "btn") {
        var num = 60;
        $("#getCheckCode").text("重新发送(" + num + ")").attr("disabled", "disabled").css({ "background-color": "#d0d0d0", "color": "#666666" });
        $("#helpRegistP").show();
        var si = setInterval(function () {
            if (num == 0) {
                clearInterval(si);
                $("#getCheckCode").removeClass("disabled");
                $("#getCheckCode").text("重新发送").removeAttr("disabled").css({ "background-color": "#0c9efc", "color": "#fff" });
            } else {
                num--;
                $("#getCheckCode").text("重新发送(" + num + ")").attr("disabled", "disabled");
            }
        }, 1000);
        isShowCountDown = 1;
    }
    else if (str == "a") {
        var num = 60;
        $("#forhelp").html("语音验证码(<span style='color:Red'>" + num + "</span>秒后可重新拨打)").removeAttr("onclick").css("color", "#a29f9f");
        $("#phonecalltip").show();
        var si_a = setInterval(function () {
            if (num == 0) {
                clearInterval(si_a);
                $("#phonecalltip").hide();
                $("#forhelp").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
            }
            else {
                num--;
                $("#forhelp").html("语音验证码(<span style='color:Red'>" + num + "</span>秒后可重新拨打)");
            }
        }, 1000);
    }
}


//验证所有注册信息
function checkall(source) {

    var phone = $.trim($("#Phone").val()),
        password1 = $.trim($("#PassWord").val()),
        password2 = $.trim($("#PassWord2").val());

    if (!checkphone(phone, source)) {
        return false;
    }
    if (!checkPassword(password1, 0, 1)) {
        return false;
    }

    if (!checkPassword(password1, password2, 2)) {
        return false;
    }

    //验证校验码是否正确
    if (source != "mail") {
        if (!checkCode()) {
            return false;
        }
    }
    return true;
}

//验证校验码
function checkCode() {
    var validcode = $("#input_valid").val(),
        phone = $("#Phone").val(),
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
                    default: $("#validTips").html("验证码已过期，请重新发送").css("display", "block"); break;
                }
            }
        });
        return flag == 0 ? false : true;
    }
}

function savePwd() {
    var phone = $.trim($("#Phone").val());
    var password = $.trim($("#PassWord").val());
}

//点击发送让客服帮我注册申请
function applyHelpRegist() {
    showCountdown("a");
    var phone = $("#Phone").val();
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/CheckCodeToPhone/GetVoiceCode.ashx",
        data: { phone: phone },
        dataType: "json",
        success: function (data) {
            var respCode = data.resp.respCode;
            switch (respCode) {
                case "100006": $("#phonecalltip").html("手机号不合法").css({ "display": "block", "color": "red" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "100008": $("#phonecalltip").html("手机号为空").css({ "color": "red" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "104102": $("#phonecalltip").html("语音验证码为空，请重新获取").css({ "display": "block", "color": "red" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "-1": $("#phonecalltip").html("系统异常，请稍后重试").css({ "display": "block", "color": "red" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpRegist();").css({ "color": "blue" });
                    $("#helpRegistP").hide();
                    break;
                case "000000":
                default: $("#phonecalltip").html("电话拨打中…请保持手机通畅!").css({ "display": "block", "color": "blue" }); break; //请留意来自<span style='color:#eb6100; margin:0px 0px'>4000657117</span>的电话
            }
        }
    });
}