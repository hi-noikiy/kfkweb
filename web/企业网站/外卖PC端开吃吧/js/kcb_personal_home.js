//禁用Enter键表单自动提交  
document.onkeydown = function (event) {
    var target, code, tag;
    if (!event) {
        event = window.event; //针对ie浏览器  
        target = event.srcElement;
        code = event.keyCode;
        if (code == 13) {
            tag = target.tagName;
            if (tag == "TEXTAREA") { return true; }
            else { return false; }
        }
    }
    else {
        target = event.target; //针对遵循w3c标准的浏览器，如Firefox  
        code = event.keyCode;
        if (code == 13) {
            tag = target.tagName;
            if (tag == "INPUT") { return false; }
            else { return true; }
        }
    }
};
//验证密码格式
function checkChgPwd(obj) {
    var curObj = obj,
        curChkId = curObj.attr("id"),
        curPwd = $.trim(curObj.val()),
        $tipObj = curObj.next(),
        params = {};
    var s = new tool(),
        result = "",
        pwdResult = "";

    if (curChkId == "curPassword") {
        //验证输入的当前密码是否正确
        result = showTips(curPwd, $tipObj, curChkId); //显示提示，参数1：当前输入密码，参数2：提示对象
        if (result.flag == true) {
            params.type = "POST";
            params.async = false;
            params.url = "/ajax/Login_Register/check.ashx";
            params.data = { userID: $.cookie("userID"), pwd: curPwd };
            params.success = function (data) {
                pwdResult = data;
            };
            s.ajax(params);
            switch (pwdResult) {
                case "1":
                    $tipObj.addClass("focusTips").html('<img src="../image/tick_circle.png" alt="正确">');
                    return true;
                case "-2":
                    $tipObj.removeClass("focusTips").addClass("logTips").html("密码错误");
                    return false;
                default:
                    $tipObj.removeClass("focusTips").addClass("logTips").html("请重新输入密码");
                    return false;
            }
        }
    }
    if (curChkId == "newPassword") {
        result = showTips(curPwd, $tipObj, curChkId);
        return result.flag;
    }
    if (curChkId == "comfirmPassword") {
        var newpassword = $("#newPassword").val();
        if (s.IsEmpty(newpassword)) {
            $tipObj.removeClass("focusTips").addClass("logTips").html("重复密码不能为空！");
            return false;
        }
        if (newpassword.length < 6) {
            $tipObj.removeClass("focusTips").addClass("logTips").html("重复密码长度不能小于6！");
            return false;
        }
        if (curPwd != $.trim($("#newPassword").val())) {
            $tipObj.removeClass("focusTips").addClass("logTips").html("两次密码不一致！");
            return false;
        }
        else {
            $tipObj.removeClass("logTips").addClass("focusTips").html('<img src="../image/tick_circle.png" alt="正确">');
            return true;
        }
    }
}
//显示提示内容
function showTips(chkObj, tipsObj, curChkId) {
    var s = new tool();
    if (s.checkPassword(chkObj).isCorrect) { //验证通过
        tipsObj.removeClass("logTips").addClass(curChkId == "curPassword" ? "" : "focusTips").html(curChkId == "curPassword" ? '' : '<img src="../image/tick_circle.png" alt="正确">');
        return { "flag": true };
    }
    else {
        tipsObj.removeClass("focusTips").addClass("logTips").html(s.checkPassword(chkObj).message);
        return { "flag": false };
    }
}
//确定修改密码
function btnSubmitClick() {

    var curPwd = $("#curPassword"),
        newPwd = $("#newPassword"),
        comfPwd = $("#comfirmPassword");
    if (checkChgPwd(curPwd) == false || checkChgPwd(newPwd) == false || checkChgPwd(comfPwd) == false) {
        return;
    }
    else {
        var params = "curPass=" + $.trim(curPwd.val()) + "&newPass=" + $.trim(newPwd.val());
        $.ajax({
            url: '../ajax/UpdateUserInfo.ashx',
            data: params,
            dataType: 'json',
            success: function (data) {
                $("#personalPwd input[type='password']").val("");
                $("#personalPwd .focusTips").html("");
                $.cookie('userID', null, { path: '/' });
                $.cookie('kcb', null, { path: '/' });
                $.cookie('nickname', null, { path: '/' });
                $.cookie('RelatedWebID', null, { path: '/' });
                $.cookie('inviteUserID', null, { path: '/' });
                $.cookie('preURL', null, { path: '/' });

                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + data.Message + "请重新登录!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                window.location = "/login.aspx";
                return false;
            },
            error: function (data) {

                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">修改密码失败,请重试!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
            }

        });
    }
}


function showPersnoalInfoPanel() {
    $("#alter_info").show();
    ("#ChgPwd").hide();
    $("#showInfo").click();
}

function showPasswordPanel() {
    $("#ChgPwd").show();
    $("#alter_info").hide();
    $("#showPwd").click();
}
//修改昵称
function chgNickName() {
    $("#dispName").css("display", "none");
    $("#updateName").css("display", "block");
}

function checkNickname() {
    if ($("#NewNickname").val().length == 0) {
        $("#nicknameNotEmpty").css("display", "block");
        setTimeout(function () { $("#nicknameNotEmpty").css("display", "none"); }, 3000);
        return false;
    }
    else {
        return true;
    }
}


//微信二维码相关全局变量
var qrgettime = 1700;  //存储已经获取了二维码的时间长度
var qrtimer;
var qrtimer2;   //读取pc帐号是否已经绑定了微信号
var isbindwx;
function getwxqrimg() {
    //读取用户绑定微信号的二维码
    isbindwx = 0;
    var userID = $.cookie("userID");
    if (qrgettime == 1700) {
        $("#wxqrimg").attr("src", "/image/refresh.gif").removeAttr("height").removeAttr("width");
        $.post("/ajax/WeiXin/GetWeixinQrticket.ashx", { "userID": userID }, function (ret) {
            if (ret != "-1") {
                qrgettime = 1700;
                clearInterval(qrtimer);
                qrtimer = setInterval(function () {
                    if (qrgettime == 0) { qrgettime = 1700; clearInterval(qrtimer); } else { qrgettime--; };
                }, 1000);  //每秒执行一次，计数加1
                $("#wxqrimg").attr("src", "").attr("src", ret).attr("width", "135px").attr("height", "135px");
            }
        });
    }

    //查询是否扫描绑定成功
    clearInterval(qrtimer2);
    qrtimer2 = setInterval(function () {
        $.post("/ajax/WeiXin/CheckIsBindWeixin.ashx", { "userID": userID, "relatedWebId": "5" }, function (ret) {
            if (ret == "1" && isbindwx == 0) {
                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">绑定微信成功，3秒后自动关闭!</p>",
                    ___showbg: true,
                    ___time: 3000
                });
                clearInterval(qrtimer2);
                window.location.reload();
            }
        });
    }, 2000);

}




$(function () {
    var userID = $.cookie("userID");
    //checkcode = "";
    //光标位置
    $("#invite_url").select().focus();

    //点击修改绑定电话，弹出浮层
    $(".click_bind").bind("click", function () { $(".minLoginBg,.minLogReg").css("display", "block"); });
    //修改密码先进行验证
    $("input[type='password']").blur(function () { checkChgPwd($(this)); });
    $("#chgName").live("click", function () { chgNickName(); });

    $("#bindwechat").hover(function () { getwxqrimg(); });

});
