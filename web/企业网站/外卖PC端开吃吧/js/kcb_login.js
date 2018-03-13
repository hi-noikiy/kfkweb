function login() { };

login.prototype = {

    //用户检验并登录
    checkAndLogin: function (account, password) {
        if (account == "已验证的手机号/邮箱" || account == "") {
            return { "isCorrect": false, "message": "请输入帐号", "type": -4 };
        }

        if (password == "") {
            return { "isCorrect": false, "message": "请输入密码", "type": -4 };
        }

        var param = {};
        var result;
        var tools = new tool();

        param.type = "POST";
        param.async = false;
        param.url = "/ajax/Login_Register/vertifyUserAccount.ashx";
        param.data = {
            account: account,
            password: password
        };
        param.success = function (data) {
            result = data;
        };
        tools.ajax(param);
        switch (result) {
            case 1:
                return { "isCorrect": true, "message": result, "type": result };
            case -1:
                return { "isCorrect": false, "message": "您的帐号不存在", "type": result };
            case -2:
                return { "isCorrect": false, "message": "密码错误", "type": result };
            default:
                return { "isCorrect": false, "message": "登录失败,请稍候再重新登录", "type": -3 };
        }
    },

    //成功处理
    successDeal: function (source, result) {
        var preurl = $.cookie("preURL"),
            uniID = $.cookie("uniID");
        if (preurl == null || preurl == "" || preurl == "null") {
            parent.location.href = "/area/" + uniID.toString();
            return;
        }
        switch (source) {
            case "LoginIn":
                this.LoginInSuccess(preurl);
                return;
            case "float":
                parent.location.href = preurl;
                return;
            case "checkout":
                //this.anonymousSuccess();
                parent.location.href = "order_checkout.html";
                return;
            case "SupplierJoin":
                parent.location.href = "shop_join.html";
                return;
            case "Lottery":
                parent.location.reload();
                return;
        }
    },

    //失败处理
    failDeal: function (source, result) {
        switch (source) {
            case "LoginIn":
            case "float":
                switch (result.type) {
                    case "-2":
                        $("#LoginIn").next("p").text(result.message).addClass("logTips");
                        $("#LoginIn").next("p").append("<a style=\"color:blue\" href=\"../pwd_find.html\">忘了密码?</a>");
                        return;
                    default:
                        $("#LoginIn").next("p").text(result.message).addClass("logTips");
                        return;
                }
            case "anonymous":
                switch (result.type) {
                    case "-3":

                        $.XYTipsWindow({
                            ___title: "开吃吧提示",
                            ___drag: "___boxTitle",
                            ___width: "300px",
                            ___height: "100px",
                            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">暂时无法获取历史地址，您可以选择登录再获取送餐地址.</p>",
                            ___showbg: true,
                            ___time: 1800
                        });
                        return;
                    default:

                        $.XYTipsWindow({
                            ___title: "开吃吧提示",
                            ___drag: "___boxTitle",
                            ___width: "300px",
                            ___height: "100px",
                            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + result.message + "</p>",
                            ___showbg: true,
                            ___time: 1800
                        });
                        return;
                }
                return;
        }
    },

    //LoginIn登录成功后处理
    LoginInSuccess: function (preurl) {
        if (preurl.indexOf("personal/iTodayOrder_anonymous") >= 0) {
            parent.location.href = "personal/member_order.html";
        }
        else if (preurl.indexOf("checkout_anonymous") >= 0 || preurl.indexOf("success") >= 0)   //如果是从游客下单页面，则跳到正常下单页面
        {
            parent.location.href = "order_checkout.html";
        }
        else {
            //点击topbar登录，跳转到登录前页面
            parent.location.href = preurl;
        }
        return;
    },

    //anonymous登录成功处理
    anonymousSuccess: function () {
        var userID = $.cookie("userID"),
            tools = new tool(),
            param = {};

        param.type = "POST";
        param.async = false;
        param.url = "../ajax/ContactInfo/GetContactInfoByUserID.ashx";
        param.data = { userID: userID };
        param.success = function (result) {
            //成功获取地址后送餐地址列表显示
            $("#Account").parents(".has_account").hide("fast");
            $("#Account").parents().parents().find(".his_addr").html(result);
            $("#Account").parents().parents().find(".his_addr").css("display", "block");
            $(".his_addr input[type=radio]").live('click', function () {
                var $parentLi = $(this).parent().parent();
                $parentLi.siblings("li").removeClass("a_c");
                $parentLi.addClass("a_c");
                $("#o_addr").val($(this).siblings(".address").html());
                $("#o_phone").val($(this).siblings(".phone").html());
                $("#o_altphone").val($(this).siblings(".altphone").html());
            });
            if ($("#Account").parents().parents().find(".his_addr .a_c").children().length > 0) {
                $("#Account").parents().parents().find(".his_addr input[type=radio][checked=checked]").click();
            }
            else {
                $("#Account").parents().parents().find(".his_addr input[type=radio][name=address]:eq(0)").attr("checked", "checked").click();
            }
        };
        tools.ajax(param);
    }
};

//检验帐户并登录
function checkuser(source) {

    var account = $.trim($("#Account").val()),
        password = $.trim($("#Password").val()),
        $tips = $("#LoginIn").next("p"),
        L = new login(),
        result = "";

    result = L.checkAndLogin(account, password);
    if (!result.isCorrect) {
        //登录失败处理
        L.failDeal(source, result);
        return false;
    }
    else {
        //成功处理
        L.successDeal(source, result);
        //$(".kcb_dot").show();
        return true;
    }
}

//回车键触发登录事件
function EnterKeyClickLogin(button) {
    if (event.keyCode == 13) {
        event.returnValue = false;
        event.cancel = true;
        if (button == "Password") {
            $("#Password").focus();
        }
        else {
            document.all[button].click();
        }

    }
}


$(document).ready(function () {
    $("#Account").mousedown(function () {
        $("#Account").val("");
    });

    $("#Account").live("focus", function () {
        if ($("#Account").val() == "已验证的手机号/邮箱") {
            $("#Account").val("").css("color", "#000");
        }
    });
    $(".login input[type=\"text\"]").focus(function () {
        $(this).css({
            "border": "1px solid #aaa",
            "color": "#000"
        });
    }).blur(function () {
        $(this).css({
            "border": "1px solid #ccc",
            "color": "#666"
        });
    });
    $("#Password").live("focus", function () {
        if ($("#Account").val() == "") {
            $("#Account").val("已验证的手机号/邮箱").css("color", "#666");
        }
    });

});
