//QQ
var regQQ = /^[1-9]*[1-9][0-9]*$/;
//手机
var regMoblie = /0?(13|14|15|18)[0-9]{9}/;
//电话
var regPhone = /^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
//正整数
//var regInt = /^[0-9]\d*$/;
//正浮点数
//var regFloat = /^[0-9\.]*$|0.\d*[0-9]\d*$/;

var regPrice = /^([1-9]\d*|0)(\.\d*[1-9])?$/;
//验证密码是否6-15位字母数字下划线
var regExp = /^[A-Za-z0-9_-]{6,15}$/;
//餐厅加盟信息
var basic = {SupplierAccount:"",Password:"",SupplierName:"",LinkmanName:"",LinkmanPhone:"",
    ContactQQ:"",SendArea:"",BusinessTime:"",Style:"",SendPrice:"",
    ReservationCall:"",AlternateCall:"",Address:"",MenuName:"",Type:""
};

//修改密码
function changePwd() {
    $.XYTipsWindow({
        ___title: "修改密码",
        ___drag: "___boxTitle",
        ___width: "600px",
        ___height: "260px",
        ___content: "id:layerPwd",
        ___showbg: true
    });
}

//修改餐厅基本信息
function changeBaseInfo() {
    $.XYTipsWindow({
        ___title: "修改餐厅信息",
        ___drag: "___boxTitle",
        ___width: "780px",
        ___height: "420px",
        ___content: "id:layerSupInfo",
        ___showbg: true
    });
}

//修改送餐信息
function changeSendInfo() {
    $.XYTipsWindow({
        ___title: "修改送餐信息",
        ___drag: "___boxTitle",
        ___width: "780px",
        ___height: "430px",
        ___content: "id:layerSendInfo",
        ___showbg: true
    });
}

//获取营业时间
function getbusinessTime() {
    var timehtml = $(".send_time").html();
    var businessTime = "";
    $(".send_time").remove();
    $.post("/ajax/SupplierJoin/getBusinessTime.ashx", function (data) {
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                var tmp = data[i];

                $(".del_time").after("<span class=\"send_time\">" + timehtml + "</span>");
                var $sendTime = $(".send_time")[0];
                $($sendTime).find(".dtStart_H").val(tmp.BeginTime.toString().split(":")[0]);
                $($sendTime).find(".dtStart_M").val(tmp.BeginTime.toString().split(":")[1]);
                $($sendTime).find(".dtEnd_H").val(tmp.EndTime.toString().split(":")[0]);
                $($sendTime).find(".dtEnd_M").val(tmp.EndTime.toString().split(":")[1]);
                businessTime += tmp.BeginTime.toString() + "-" + tmp.EndTime.toString() + ",";
            }
            if (businessTime.length > 0) {
                $("#td_businesstime").html(businessTime.substring(0, businessTime.length - 1));
            }
            if (data.length > 1) {
                $(".del_time").show();
            }
        } else {
            $(".del_time").after("<span class=\"send_time\">" + timehtml + "</span>");
        }

    }, "json");
}

//浮层保存修改密码
function savePwd() {
    var $curpwd = $("#curpwd"), $newpwd = $("#newpwd"),$conpwd = $("#conpwd");
    var curpwd = $.trim($curpwd.val()),
        newpwd = $.trim($newpwd.val()),
        conpwd = $.trim($conpwd.val());

    if (curpwd == "") {
        $curpwd.next().html("密码不能为空").addClass("logTips");
        return false;
    } else {
        if (regExp.test(curpwd)) {
            $curpwd.next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
        }
        else {
            $curpwd.next().html("密码格式错误").addClass("logTips");
            return false;
        }
    }
    if (newpwd == "") {
        $newpwd.next().html("密码不能为空").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regExp.test(newpwd)) {
            $newpwd.next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
        }
        else {
            $newpwd.next().html("密码格式错误").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    if (conpwd != newpwd) {
        $conpwd.next().html("两次密码不一致").addClass("logTips");
        return false;
    } else {
        $conpwd.next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
    }

    //验证通过，调用ajax修改
    $.ajax({
        type: 'POST',
        url: "/ajax/SupplierJoin/AddSendFoodInfo.ashx",
        data: { Password: curpwd, Password1: newpwd, Password2: conpwd, Type: "UpdatePassword" },
        success: function (data) {
            data = data.split(",");
            if (data != null && data.length == 2 && data[1] == "true") {
                alert("修改成功！");
                $("#curpwd,#newpwd,#conpwd").val("");
                parent.$.XYTipsWindow.removeBox();
            }
            else {
                alert(data[0]);
            }
        }
    });
}

//验证餐厅基本信息
function checkBaseInfo() {
    var style = "", style_text = "";

    $("#styles").find("input:checked").each(function () {
        style_text += $(this).parent().text() + ",";
        style += $(this).val() + ",";
    });
    if (style.length > 0) {
        style = style.substring(0, style.length - 1);
    }
    basic.SupplierName = $.trim($("#supName").val());
    basic.Address = $.trim($("#supAddress").val());
    basic.LinkmanName = $.trim($("#supHost").val());
    basic.LinkmanPhone = $.trim($("#supPhone").val());
    basic.ContactQQ = $.trim($("#supQQ").val());
    basic.SendArea = $.trim($("#supService").val());
    basic.Style = style;
    basic.Type = "SupplierInfo";
    basic.style_text = style_text;

    //餐厅名称
    if (basic.SupplierName == "") {
        $("#supName").next().html("请填写餐厅名称！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        $("#supName").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    //地址
    if (basic.Address == "") {
        $("#supAddress").next().html("请填写餐厅地址！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        $("#supAddress").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    //联系人
    if (basic.LinkmanName == "") {
        $("#supHost").next().html("请填写联系人！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        $("#supHost").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    //电话
    if (basic.LinkmanPhone == "") {
        $("#supPhone").next().html("联系人电话不能为空！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regMoblie.test(basic.LinkmanPhone) || regPhone.test(basic.LinkmanPhone)) {
            $("#supPhone").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        } else {
            $("#supPhone").next().html("电话或手机格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    //QQ
    if (basic.ContactQQ == "") {
        $("#supQQ").next().html("请填写QQ号码！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regQQ.test(basic.ContactQQ)) {
            $("#supQQ").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        } else {
            $("#supQQ").next().html("QQ号码格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    //送餐区域
    if (basic.SendArea == "") {
        $("#supService").next().html("请填写送餐区域！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        $("#supService").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    return basic;
}

//浮层保存餐厅基本信息
function saveSupInfo() {
    var basic = checkBaseInfo();

    if (basic!=false) {

        //验证通过，调用ajax修改
        $.post("/ajax/SupplierJoin/AddSendFoodInfo.ashx", basic, function (data) {
            data = data.split(",");
            if (data != null && data.length == 2 && data[1] == "true") {
                alert("修改成功！"); //这里再次调用XYTipsWindow
                $("#td_style").html(basic.style_text.length > 0 ? basic.style_text.substring(0, basic.style_text.length - 1) : "");
                $("#td_supname").html(basic.SupplierName);
                $("#td_supHost").html(basic.LinkmanName);
                $("#td_address").html(basic.Address);
                $("#td_Phone").html(basic.LinkmanPhone);
                $("#td_supQQ").html(basic.ContactQQ);
                $("#td_supArea").html(basic.SendArea);
                parent.$.XYTipsWindow.removeBox();
            }
            else {
                alert("修改失败！");
            }
        });
    }
}

//验证送餐信息
function checkSendFoodInfo() {
    var str = "";

    $(".send_time").each(function () {
        var tmp = $(this).find(".dtStart_H").val() + "," + $(this).find(".dtStart_M").val() + "," + $(this).find(".dtEnd_H").val() + "," + $(this).find(".dtEnd_M").val() + "|";
        if (tmp != "00,00,00,00|") {
            str += tmp;
        }
    });

    //    var basic = {};
    basic.SendPrice = $.trim($("#sendprice").val());
    basic.ReservationCall = $.trim($("#reservationcall").val());
    basic.AlternateCall = $.trim($("#alternatecall").val());
    basic.MenuName = $.trim($("#menufilename").val());
    basic.Type = "SendFoodInfo";
    basic.BusinessTime = str.length > 0 ? str.substring(0, str.length - 1) : "";
    if (basic.SendPrice == "") {
        $("#sendprice").siblings(".tips").html("请填写起送价！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regPrice.test(basic.SendPrice)) {
            $("#sendprice").siblings(".tips").html('<img src="../image/tick_circle.png" alt="正确">').removeClass("focusTips").removeClass("logTips");
        } else {
            $("#sendprice").siblings(".tips").html("起送价格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    if (basic.ReservationCall == "") {
        $("#reservationcall").next().html("请填写订餐电话！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regMoblie.test(basic.ReservationCall) || regPhone.test(basic.ReservationCall)) {
            $("#reservationcall").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        } else {
            $("#reservationcall").next().html("格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    if (basic.AlternateCall == "") {
        $("#alternatecall").next().html("请填写手机号码！").removeClass("focusTips").addClass("logTips");
        return false;
    } else {
        if (regMoblie.test(basic.AlternateCall)) {
            $("#alternatecall").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        } else {
            $("#alternatecall").next().html("手机号码格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    if (basic.MenuName == "") {
        $("#menufilename").next().html("请先上传菜单（图片或文件）！").addClass("logTips");
        return false;
    } else {
        $("#menufilename").next().html("").removeClass("logTips");
    }
    return basic;
}

//浮层保存送餐信息
function saveSendFoodInfo() {
    var basic = checkSendFoodInfo();
    if (basic!=false) {
        //验证通过，调用ajax修改
        $.post("/ajax/SupplierJoin/AddSendFoodInfo.ashx", basic, function (data) {
            data = data.split(",");
            if (data != null && data.length == 2 && data[1] == "true") {
                alert(data[0]);
                $("#td_sendprice").html(basic.SendPrice);
                $("#td_reservationcall").html(basic.ReservationCall);
                $("#td_alternatecall").html(basic.AlternateCall);
                getbusinessTime();
                parent.$.XYTipsWindow.removeBox();
            }
            else {
                alert("修改失败");
            }
        });
    }
}

//合作伙伴滚动
function partScroll() {
    var liFirst = $(".dynamic li:first");
    var liLast = $(".dynamic li:last");
    var height = liLast.height();

    liFirst.css({
        "opacity": 0
    });
    liLast.after(liFirst);
    liLast.animate(
        {
            "height": height,
            "opacity": 1
        }, 1000
    );
    //设置5秒滚动一次
    setTimeout("partScroll()", 5000);

}

//显示下一步
function showNextStep(obj) {
    obj.parents(".item").hide().next().show();
}

var JoinInfo = { CitiID: "", UserName: "", Phone: "", altPhone: "", QQ: "", SupplierName: "", Address: "" };
var tools = new tool();
var params = {};
//获取数据并提交
function SaveSupplierInfo() {
    JoinInfo.CitiID = $("#City").val();
    JoinInfo.UserName = $("#txtUserName").val();
    JoinInfo.Phone = $("#txtPhone").val();
    JoinInfo.altPhone = $("#txtaltPhone").val();
    JoinInfo.QQ = $("#txtQQ").val();
    JoinInfo.SupplierName = $("#txtSupplierName").val();
    JoinInfo.Address = $("#txtAddress").val();

    if (CheckSupInfo(JoinInfo)) {
        params.type = "POST";
        params.async = false;
        params.url = "/ajax/SupplierJoin/AddNewSupplierForJoin.ashx";
        params.data = JoinInfo;
        params.dataType = "text";
        params.success = function (data) {
            if (data == "true") {
                //$(".join_box li").eq(0).removeClass("type2").addClass("type3");
                $("#SupplierInfoForm,.join-input-message").hide();
                $("#approving").show();
            }

        };
        tools.ajax(params);        
    }
    
    
}
//验证餐厅提交的信息
function CheckSupInfo(joininfo) {
    //验证用户名
    if ($.trim(joininfo.UserName) == "") {
        $("#txtUserName").next().html("请填写店主姓名！").removeClass("focusTips").addClass("logTips");
        return false;
    }
    else {
        $("#txtUserName").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    //验证手机
    if ($.trim(joininfo.Phone) == "") {
        $("#txtPhone").next().html("请填写手机号码！").removeClass("focusTips").addClass("logTips");
        return false;
    }
    else {
        if (regMoblie.test(joininfo.Phone)) {
            $("#txtPhone").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        }
        else {
            $("#txtPhone").next().html("手机号码格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    //有填则验证，没有则不验证
    if (joininfo.altPhone != "") {
        if (regPhone.test(joininfo.altPhone) || regPhone.test(basic.ReservationCall)) {
            $("#txtaltPhone").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        }
        else {
            $("#txtaltPhone").next().html("格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    else {
        $("#txtaltPhone").next().html("").attr("class", "");
    }
    //验证QQ
    if ($.trim(joininfo.QQ) == "") {
        $("#txtQQ").next().html("请填QQ！").removeClass("focusTips").addClass("logTips");
        return false;
    }
    else {
        if (regQQ.test(joininfo.QQ)) {
            $("#txtQQ").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
        }
        else {
            $("#txtQQ").next().html("QQ号码格式错误！").removeClass("focusTips").addClass("logTips");
            return false;
        }
    }
    //验证餐厅名称
    if ($.trim(joininfo.SupplierName) == "") {
        $("#txtSupplierName").next().html("请填写餐厅名称！").removeClass("focusTips").addClass("logTips");
        return false;
    }
    else {
        $("#txtSupplierName").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    //验证餐厅地址
    if ($.trim(joininfo.Address) == "") {
        $("#txtAddress").next().html("请填写餐厅地址！").removeClass("focusTips").addClass("logTips");
        return false;
    }
    else {
        $("#txtAddress").next().html('<img src="../image/tick_circle.png" alt="正确">').attr("class", "");
    }
    return true;

 }

$(function () {
    //getbusinessTime();

    //合作伙伴滚动
    if ($(".dynamic").length > 0) {
        partScroll();
    }

        //第一步注册开吃吧帐号
        $("#joinReg .save").click(function () {
            var account = $.trim($("#supAccount").val());
            var pwd = $.trim($("#Password1").val());
            var conpwd = $.trim($("#Password2").val());
            var result = "";
            if (account == "") {
                $("#supAccount").next().html("帐号不能为空！").addClass("logTips");
                return false;
            } else {
                $.ajax({
                    url: '/ajax/SupplierJoin/checkSupplierExists.ashx',
                    data: { SupplierAccount: account },
                    type: 'post',
                    async: false,
                    success: function (data) {
                        result = data;
                    }
                });
                if(result=="True") {
                    $("#supAccount").next().html("该账号已经被注册！").addClass("logTips");
                    return false;
                }
                else {
                    $("#supAccount").next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
                }
            }
            if (pwd == "") {
                $("#Password1").next().html("密码不能为空").removeClass("focusTips").addClass("logTips");
                return false;
            } else {
                if (regExp.test(pwd)) {
                    $("#Password1").next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
                }
                else {
                    $("#Password1").next().html("密码格式错误").removeClass("focusTips").addClass("logTips");
                    return false;
                }
            }
            if (conpwd != pwd) {

                $("#Password2").next().html("两次密码不一致").addClass("logTips");
                return false;
            } else {
                $("#Password2").next().html('<img src="../image/tick_circle.png" alt="正确">').removeClass("logTips");
            }
            //验证通过，显示下一步并注册
            basic.SupplierAccount = account;
            basic.Password = conpwd;
            showNextStep($(this));
            $(".steps").children().removeClass("active").eq(1).addClass("active");
        });

        //第二步基本信息添加
        $("#supBaseInfo .save").click(function () {
            var $trigger = $(this);
            var chkResult = checkBaseInfo();

            if (chkResult != false) {
                showNextStep($trigger);
                $(".steps").children().removeClass("active").eq(2).addClass("active");
            }
        });

        //第三步外卖送餐信息
        $("#supSendInfo .save").click(function () {
            var $trigger = $(this);
            var chkResult = checkSendFoodInfo();
            if (chkResult != false) {
                basic.Type = "";
                $.post("/ajax/SupplierJoin/AddSendFoodInfo.ashx", basic, function (data) {
                    data = data.split(",");
                    if (data != null && data.length == 2 && data[1] == "true") {
                        alert(data[0]);
                        showNextStep($trigger);
                        $(".steps").children().removeClass("active").eq(3).addClass("active");
                        basic = null;
                    }
                    else {
                        alert(data[0]);
                    }
                });
            }
        });


        //浮层保存密码
        $("#layerPwd .save").click(function () {
            savePwd();
        });
        //浮层保存餐厅信息
        $("#layerSupInfo .save").click(function () {
            saveSupInfo();
        });
        //浮层保存送餐信息
        $("#layerSendInfo .save").click(function () {
            saveSendFoodInfo();
        });

        //添加送餐时间
        $(".add_time").click(function () {
            var timehtml = $(".send_time")[0].innerHTML;
            if ($(".send_time").length < 3) {
                $(".del_time").css("display", "block");
                $(".del_time").after("<span class=\"send_time\">" + timehtml + "</span>");
            } else if ($(".send_time").find(".logTips").length == 0) {
                //alert("您最多可选择三个送餐时间段!");
                $($(".send_time")[2]).append('<span class="logTips" style="float: right;margin-right: 15px;">您最多可选择三个送餐时间段!</span>')
            }

        });

        //删除送餐时间
        $(".del_time").click(function () {
            if ($(".send_time").length > 1) {
                $($(".send_time")[0]).remove();
                $(".send_time").find(".logTips").remove();
                if ($(".send_time").length == 1) {
                    $(".del_time").hide();
                }
            }
        });

        //上传文件
        $("#file_menu").uploadify({
            height: 30,
            swf: '/js/uploadify/uploadify.swf',
            uploader: '/ajax/SupplierJoin/uploadMenu.ashx',
            buttonText: '上传文件',
            fileTypeExts: '*.gif; *.jpg; *.png;*.doc;*.docx;*.jpeg;*.txt',
            width: 120,
            fileSizeLimit: "5MB",
            onUploadSuccess: function (file, data, response) {
                $("#menufilename").val(data);
                if ($("#td_uploadmenu") != null && $("#td_uploadmenu") != undefined) {
                    $("#td_uploadmenu").html("已上传");
                }
            }
        });

        //注销餐厅加盟用户
        $("#supplierClear").click(function () {
            $.cookie('SupplierForJoin_SupplierAccount', null, { path: '/' });
            $.cookie('SupplierForJoin_SupplierId', null, { path: '/' });
            window.location = "SupplierIndex.aspx";
            return false;
        });

    $("#GoApplyFor").bind("click", function () {
        //判断是否同意开吃吧服务协议
        if ($("#IAgree").attr("checked") != "checked") {
            ShowMessage("请阅读并同意《开吃吧服务协议》");
            return;
        }
        else {
            SaveSupplierInfo();
        }
    });

})
//浮层提示信息
function ShowMessage(message) {
    $.XYTipsWindow({
        ___title: "开吃吧提示",
        ___drag: "___boxTitle",
        ___width: "300px",
        ___height: "100px",
        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + message + "！</p>",
        ___showbg: true,
        ___time: 1800
    });
}