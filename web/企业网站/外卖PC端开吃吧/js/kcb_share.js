var shareWebSite = {
    renren: 0, qq: 0, weibo: 0, count: 0, Content: "", OrderID: "", UserID: ""
};
//-1 代表不存在 0 代表没有选择 1 代表选择

function SendShare() {
    var tools = new tool();
    var params = {};
    var content;
    var result = "";
    var shareUrl = "";
    shareWebSite.OrderID = $("#orderID").val();
    shareWebSite.UserID = $.cookie("userID");
    

    //获取分享的网站
    CheckShareChoice();
    if (shareWebSite.count == 0) {

        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">请选择需要分享的社交网站!</p>",
            ___showbg: true,
            ___time: 1800
        });
        return;
    }

    $("#W_btn").attr("disabled", true);
    $("#W_btn").val("提交中...");
    if ($("#txta_content").val() == "") {
        $("#W_btn").val("分享");

        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">分享内容不能为空!</p>",
            ___showbg: true,
            ___time: 1800
        });
        $("#W_btn").removeAttr("disabled");
        return;
    }
    else {
        shareWebSite.Content = $("#txta_content").val();
    }

    //显示分享等待浮层
    $("#XYTipsWindowBgBind").css("display", "block");
     $("#shareLayer").css("display", "block");

    

    if (shareWebSite.renren == 1) {
        shareUrl = "/ajax/Share/RenrenShare.ashx";
    }
    if (shareWebSite.qq == 1) {
        shareUrl = "/ajax/Share/QQShare.ashx";
    }
    if (shareWebSite.weibo == 1) {
        shareUrl = "/ajax/Share/WeiboShare.ashx";
    }
    params.type = "POST";
    params.async = true;
    params.url = shareUrl;
    params.data = shareWebSite;
    params.dataType = "text";
    params.success = function (data) {
        result = data;
        ShowResponseMessage(result);
        $("#shareLayer").css("display", "none");
        $("#XYTipsWindowBgBind").css("display", "none");
    };
    tools.ajax(params);


}

function CheckShareChoice() {
    shareWebSite.qq = CheckIsExist($("#qqShare"));
    if (shareWebSite.qq == 1) {
        shareWebSite.count++;
    }
    shareWebSite.renren = CheckIsExist($("#renrenShare"));
    if (shareWebSite.renren == 1) {
        shareWebSite.count++;
    }
    shareWebSite.weibo = CheckIsExist($("#weiboShare"));
    if (shareWebSite.weibo == 1) {
        shareWebSite.count++;
    }
}
function CheckIsExist($obj) {
    if ($obj.length == 0) {
        //不存在
        return -1;
    }
    else if ($obj.attr("checked")) {
        //以选中
        return 1;
    }
    else {
        //没有被选中
        return 0;
    }
}

function ShowResponseMessage(result) {
    switch (result) {
        case "1":
            $("#W_btn").val("分享成功");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">订单分享成功!</p>",
                ___showbg: true,
                ___time: 1800
            });
            break;
        case "-1":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">很抱歉，分享失败，您需要重新登录并授权才能分享订单!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-21":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">人人分享失败!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-23":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">QQ分享失败!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-24":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">微博分享失败!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-3":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">网络繁忙，分享失败!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-4":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">很抱歉，您不是第三方网站用户，不能分享订单!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-51":
        case "-53":
        case "-54":
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">订单已被分享!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
        case "-61":
            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">分享需要重新授权!</p>",
                ___showbg: true,
                ___time: 1000
            });
            window.location = "https://graph.renren.com/oauth/authorize?client_id=150045&response_type=code&redirect_uri=http://kaichiba.com/thirdparty/UserCheckFromRenRen.aspx&display=dialog&scope=publish_share+publish_feed";
            break;
        case "-63":
            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">分享需要重新授权!</p>",
                ___showbg: true,
                ___time: 1000
            });
            window.location = "/thirdparty/qqlogin.aspx";
            break;
        case "-64":
            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">分享需要重新授权!</p>",
                ___showbg: true,
                ___time: 1000
            });
            window.location = "/thirdparty/weibologin.aspx";
            break;
        default:
            $("#W_btn").val("分享");

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "300px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">分享失败!</p>",
                ___showbg: true,
                ___time: 1800
            });
            $("#W_btn").removeAttr("disabled");
            break;
    }
}

//验证

var tools = new tool();

function CheckRegistInfo(type) {
    var $obj = $("#" + type);
    var inputStr = $obj.val();


    switch (type.toString()) {
        case "Mail":
            {
                var result;
                //验证邮箱格式

                result = tools.mailboxFormat(inputStr);
                if (!result.isCorrect) {
                    $obj.next().html("邮箱格式错误").css("color", "red");
                    return false;
                }
                //验证邮箱是否存在
                result = tools.checkMailExist(inputStr);
                if (parseInt(result) > 0) {
                    $obj.next().html("该帐号已注册").css("color", "red");
                    return false;
                }
                else {
                    $obj.next().html("帐号可以注册").css("color", "green");
                    return true;
                }
                break;
            }
        case "Pwd":
            {
                var result;
                //验证密码格式
                result = tools.commonCheckPassword(inputStr, "^[0-9a-zA-z_]{6,15}$");
                if (!result.isCorrect) {
                    $obj.next().html("密码格式错误").css("color", "red");
                    return false;
                } else {
                    $obj.next().html("密码格式正确").css("color", "green");
                }
                break;
            }
    }


}

$(document).ready(function () {
    //光标位置
    $("#invite_url").select().focus();
    $(".click_bind").click(function () {
        $(".minLoginBg,.minLogReg").css("display", "block");
    });


    //帮定快捷注册验证事件
    $(".check").blur(function () {

        CheckRegistInfo($(this).attr("id"));
    })


});



