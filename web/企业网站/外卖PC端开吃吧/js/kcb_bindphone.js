var checkcode = "";
var tools = new tool();
var params = {};
var isShowCountDown = 0; //是否显示倒计时
var sendCodeTimes = 0; //用户点击发送校验码的次数

//绑定手机
function olduserbindmobile() {
    var validcode = $("#verifyNum").val(),
        flag = 0,
        phone = $("#phoneBind").val(),
        result = "",
        regExpMobile = new RegExp("^[1][0-9]{10}");

    var source = "order";

    //验证手机
    result = tools.checkMobile(phone);
    if (result.isCorrect == false) {
        $("#validtip").html(result.message).css("display", "block");
        return false;
    }

    //验证校验码是否正确
    if (!checkBindCode()) {
        return false;
    }

    //验证手机号码是否被绑定过
    if (!checkbindmobile()) {
        return false;
    }

    //绑定手机
    var userID = $.cookie("userID") != null ? $.cookie("userID") : "",
        newPhone = $("#phoneBind").val();
   
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/UserBindPhone.ashx",
        data: { userID: userID, phone: newPhone },
        success: function (data) {
            if (data == "1") {
                $("#bindOverlay").fadeOut(100, function () {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">绑定成功!</p>",
                        ___showbg: true,
                        ___time: 3000
                    });
                    $("#btnCancel").attr("nowbind", "0");
                    $("#phoneBind").val("");
                    $("#verifyNum").val("");
                    $("#validtip").html("").css("display", "none");
                    flag = 1;
                });
            }
            else if (data == "-1") {
                $("#validtip").html("哦～您忘了该手机号已经绑定了。").css("display", "block");
            }
            else if (data == "-2") {
                $("#validtip").html("手机号好像错了～").css("display", "block");
            }
            else if (data == "-3") {
                $("#validtip").html("该手机号已被绑定，请更换手机号。").css("display", "block");
            }
            else {
                $("#validtip").html("系统暂时无法处理，请稍后再试！").css("display", "block");
            }
        }
    });
    if (flag == 0) {
        return false;
    }
    //绑定成功之后删除验证码
    checkcode = "";

    return true;
}

function checkBindCode() {
    //验证校验码
    var validcode = $("#verifyNum").val(),
        phone = $("#phoneBind").val(),
        flag = 0;
    if (checkcode == "") {
        $("#validtip").html("您还没有获取校验码。").css("display", "block");
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
                    case "-1": $("#validtip").html("手机号和校验码不匹配").css("display", "block"); break;
                    case "-2": $("#validtip").html("该校验码已失效，请重新获取").css("display", "block"); break;
                    default: $("#validtip").html("暂时无法绑定，请稍候再试").css("display", "block"); break;
                }
            }
        });
        return flag == 0 ? false : true;
    }
}
//验证手机是否被绑定
function checkbindmobile() {
    var result = "";
    var userID = $.cookie("userID"),
        phone = $("#phoneBind").val();

    //验证手机
    result = tools.checkMobile(phone);
    if (result.isCorrect == false) {
        $("#validtip").html(result.message).css("display", "block");
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
        case "1": $("#validtip").html("").css("display", "none"); return true;
        case "-1": $("#validtip").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
        case "-2": $("#validtip").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
        case "-3": $("#validtip").html("请输入11位手机号。").css("display", "block"); return false;
        default: $("#validtip").html("该手机号已被使用。<a href='/member/pwd_find.html' target='_blank' style='display: block;margin-right: 40px; margin-top: 0px; float: right; text-decoration: underline'>忘记密码？</a>").css("display", "block"); return false;
    }
}
function bindCheckCode() {

    //点击免费获取校验码
    var phone = $("#phoneBind").val();
    var result = "";
    if (!checkbindmobile()) { return false; }

    params.type = "POST";
    params.async = false; /// <reference path="kcb_joinIn.js" />
    params.url = "/ajax/CheckCodeToPhone/GetBindPhoneCode.ashx";
    params.data = { phone: phone };
    params.success = function (data) {
        result = data;
    }
    tools.ajax(params);
    switch (result) {
        case "0":
            $("#validtip").html("距离上一次发送校验码不超过1分钟。").css("display", "block");
            return false;
        case "-1":
            //提示发送校验码失败
            $("#validtip").html("很抱歉，暂时无法发送校验码，再重新试下好吗？").css("display", "block");
            return false;
        case "-2":
            $("#validtip").html("很抱歉，您现在不是注册用户，无法使用此功能。").css("display", "block");
            return false;
        case "-3":
            //验证码验证失败
            $("#validtip").html("验证码错误，请刷新重新输入").css("display", "block"); $("#validtip").hide();
            return false;
        case "-12":
            $("#validtip").html("很抱歉，您暂时无法使用此功能，请刷新页面重新使用。").css("display", "block");
            return false;
        default:
            //发送校验码成功
            checkcode = result;
            bindtimeticker("btn");
            return true;
    };
}
//发送手机验证码倒计时提示
function bindtimeticker(str) {
    if (str == "btn") {
        var num = 60;
        $("#getCheckCode").val("重新发送(" + num + ")").attr("disabled", "disabled").css({ "background-color": "#d0d0d0", "color": "#666666" });
        $("#helpTr").show(); //显示获取语音验证码
        var si = setInterval(function () {
            if (num == 0) {
                clearInterval(si);
                $("#getCheckCode").val("重新发送").removeAttr("disabled").css({ "background-color": "#0c9efc", "color": "#fff" });
            }
            else {
                num--;
                $("#getCheckCode").val("重新发送(" + num + ")").attr("disabled", "disabled");
            }
        }, 1000);
    }
    else if (str == "a") {
        var num = 60;
        $("#forhelp").text("语音验证码(" + num + "秒后可重新拨打)").removeAttr("onclick").css("color", "#a29f9f");
        $("#phonecalltip").show();
        var si_a = setInterval(function () {
            if (num == 0) {
                clearInterval(si_a);
                $("#phonecalltip").hide();
                $("#forhelp").text("语音验证码").attr("onclick", "applyHelpBind();").css({ "color": "blue" });
            }
            else {
                num--;
                $("#forhelp").text("语音验证码(" + num + "秒后可重新拨打)");
            }
        }, 1000);
    }
}

//客服帮助绑定手机
function applyHelpBind() {
    bindtimeticker("a");
    var phone = $("#phoneBind").val();
    $.ajax({
        type: "POST",
        async: false,
        url: "/ajax/CheckCodeToPhone/GetVoiceCode.ashx",
        data: { phone: phone },
        dataType: "json",
        success: function (data) {
            var respCode = data.resp.respCode;
            switch (respCode) {
                case "100006": $("#validtip").html("手机号不合法").css({ "display": "block" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpBind();").css({ "color": "blue" });
                    $("#helpTr").hide();
                    break;
                case "100008": $("#validtip").html("手机号为空").css({ "display": "block" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpBind();").css({ "color": "blue" });
                    $("#helpTr").hide();
                    break;
                case "104102": $("#validtip").html("语音验证码为空，请重新获取").css({ "display": "block" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpBind();").css({ "color": "blue" });
                    $("#helpTr").hide();
                    break;
                case "-1": $("#validtip").html("系统异常，请稍后重试").css({ "display": "block" });
                    $("#forhelp").text("语音验证码").attr("onclick", "applyHelpBind();").css({ "color": "blue" });
                    $("#helpTr").hide();
                    break;
                case "000000":
                default: $("#validtip").html("").css({ "display": "block", "color": "blue" }); break;
            }
        }
    });
    /*
    var phone = $("#phoneBind").val();
    var mail = $.cookie("mail"),
    nickname = $.cookie("nickname"),
    userID = $.cookie("userID");   
    
    $.ajax({
    type: "POST",
    async: false,
    url: "/ajax/Login_Register/applyUserHelpBind.ashx",
    data: { phone: phone,mail:mail,nickname:nickname,userID:userID },
    dataType: "text",
    success: function (data) {
    switch (data) {
    case "-2":
    case "1":
    $("#helpSpanTip").html("请求已发送，请保持手机畅通，耐心等待客服处理！<br/>您现在可以关闭该页面继续订餐。").css({ "display": "block", "color": "blue", "border-color": "red" }); break;
    case "-1":
    case "-11": $("#validtip").html("系统异常，请稍后重试").css({ "border": "1px solid red", "display": "block", "color": "red" }); break;
    default: $("#validtip").html("暂时无法绑定，请稍候再试").css({ "border": "1px solid red", "display": "block", "color": "red" }); break;
    }
    }
    });
    */
}

$(document).ready(function () {
    $("#closeBind").click(function () {
        $("#bindOverlay").fadeOut(300, function () {
            $("#btnCancel").attr("nowbind", "0");
        });

    });
    $("#btnCancel").click(function () {
        $("#bindOverlay").fadeOut(300, function () {
            $("#btnCancel").attr("nowbind", "0");
        });
    });
    $("#getCheckCode").click(function () {
        bindCheckCode();
    });
})