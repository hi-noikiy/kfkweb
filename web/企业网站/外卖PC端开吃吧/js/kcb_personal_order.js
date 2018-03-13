var OrderID;
var SupplierID;
var tools = new tool();
var params = {};
$(document).ready(function () {


    ///////////动态总评内容
    $("#txtContent").focus(function () {
        var content = $("#txtContent").val();
        if (!ValidataInput(content)) {
            $("#txtContent").val("");
        }
    });
    $("#txtContent").blur(function () {
        var content = $("#txtContent").val();
        $("#txtContent").val(GetSumScore(content));
    });

    ///////////动态评价
    $(".orange_btn").live("click", function () {

        var obj = $(this);
        var isComment = obj.attr("IsComement");
        if (isComment != undefined && isComment == "true")
        { }
        else {
            $("#txtContent").val("还不错，改进空间很大哦");
            $(".com_slider_bar").slider("value", 3);
            OrderID = obj.attr("orderid");
            SupplierID = obj.attr("supplierID");
            $("#commentLayer,.layer_bg").show();
            $("#commentLayer").find("#pubComment").attr("orderid", OrderID);
        }
    });
    $("#commentLayer .close").click(function () {
        $("#commentLayer,.layer_bg").hide();
    });
    $("#pubComment").click(function () {

        PublishOrderComment(this, $(this).attr("orderid"));
    });

    //跳转到餐厅留言
    $("#toSupMessage").click(function () {
        location.href = "../shop/sm_" + SupplierID + "_" + OrderID + ".html";
        // location.href = "../shop/sm_" + OrderID + ".html";
    });


    $(".com_slider_bar").slider({
        min: 1,
        max: 5,
        anmiate: true,
        step: 1,
        value: 3,
        slide: changeSlider

    });

    //获取最新订单动态
    $(".tip").live("click", function () {
        GetProcList(1, $(this));
    });

    //用户确认已收到
    $(".received").live("click", function () {
        var orderID = $(this).attr("orderid");
        var admitTime = $(this).attr("admittime");
        var result = "";
        var $trigger = $(this);

        var nowTimeObject = new Date(),
            admitTime = new Date(Date.parse(admitTime.replace(/\-/g, "/"))),  //把订单确认时间转化成日期对象
            nowMillSecs = nowTimeObject.getTime(),
            orderMillSecs = admitTime.getTime(),
            diffMins = Math.round((nowMillSecs - orderMillSecs) / 60000);  //已收到时间与确认时间相差的分钟
        if (diffMins < 5) {
            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "360px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">还不到5分钟，难道是外星人在送餐？</p>",
                ___showbg: true,
                ___time: 1800
            });
            return;
        }

        params.type = "POST";
        params.url = "/ajax/Order/ReceivedMeal.ashx";
        params.data = { OrderID: orderID };
        params.success = function (data) {
            result = data.toString();
            switch (result) {
                case "1":
                    GetProcList(2, $trigger);
                    break;
                case "-3":
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "320px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">该订单已被确认!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                    break;
                default:
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "320px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">网路繁忙，请刷新页面再重新确认!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                    break;
            }
        };
        tools.ajax(params);

    });

    //催单判断
    $(".shadow .call").live("click", function () {
        //判断是否有电话打不通，有的话不让催单，提醒用户
        if ($(".urgency_message").length > 0) {
            if ($(".urgency_message").attr("NoticeID") != "") { //说明电话打不通
                $(".urgency_message").show();
                return;
            }
        }

        var orderID = $(this).attr("orderid"),  //订单号
            supID = $(this).attr("supplierid"),   //餐厅ID
            orderTime = $(this).attr("ordertime"),

            nowTimeObject = new Date(),
            orderTime = new Date(Date.parse(orderTime.replace(/\-/g, "/"))),  //把下单时间转化成日期对象
            nowMillSecs = nowTimeObject.getTime(),
            orderMillSecs = orderTime.getTime(),
            diffMins = Math.round((nowMillSecs - orderMillSecs) / 60000);  //催单时间与下单时间相差的分钟
        if (supID == undefined || supID == "") {
            supID = $(this).attr("supplierid");   //餐厅ID
        }
        if (diffMins < 25) {

            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "360px",
                ___height: "100px",
                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">下单时间距现在不到25分钟，请稍后再催!</p>",
                ___showbg: true,
                ___time: 1800
            });
            return;
        }
        else {
            location.href = "../sm_" + supID + "_1_" + orderID + ".html";
        }
    });

    //取消订单
    $(".refund").click(function () {

        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">退款请联系客服400-065-7117</p>",
            ___showbg: true,
            ___time: 1800
        });
    });

    //取消订单
    $(".order_list .cancel").click(function () {
        var $trigger = $(this).parents(".order_list");
        var isPay = $(this).attr("isPay");
        var $this = $(this);
        var isShowKcbPointTips = "您确定要取消当前订单吗？";
        if (isPay == "1") {
            isShowKcbPointTips = "您确定要取消当前订单吗？该订单已经支付，退款请联系客服400-065-7117";
        }
        orderID = $trigger.find(".order_num span").html(),
        supID = $(this).attr("supplierid"),
        isUsedKcbPoint = $(this).attr("isUsedKcbPoint"),
        $not_make_com = $(this).siblings(".not_make_com"),
        startTime = $(this).attr("startTime");
        if (isUsedKcbPoint == 1) {
            isShowKcbPointTips = "确认取消？";
        }
        $.XYTipsWindow({
            ___title: "取消订单",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "120px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + isShowKcbPointTips + "</p>",
            ___button: ["确定", "返回"],
            ___showbg: true,
            ___callback: function (val) {
                if (val == "确定") {
                    $.ajax({
                        type: "POST",
                        async: true,
                        url: "../ajax/Order/iCancleOrder.ashx",
                        data: { orderID: orderID, supID: supID, startTime: startTime },
                        success: function (data) {
                            if (data == "1") {
                                parent.$.XYTipsWindow.removeBox();
                                $.XYTipsWindow({
                                    ___title: "开吃吧提示",
                                    ___drag: "___boxTitle",
                                    ___width: "300px",
                                    ___height: "100px",
                                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">成功取消订单!</p>",
                                    ___showbg: true,
                                    ___time: 1800
                                });
                                $trigger.find(".ol_title span").html("[无效订单]").css("color", "red");
                                $not_make_com.html("无效订单");
                                $trigger.find(".cancel").css('display', 'none');
                                $trigger.find(".cancel").prev().hide();
                            }

                            else if (data == "-4") {
                            parent.$.XYTipsWindow.removeBox();
                             $.XYTipsWindow({
                                            ___title: "开吃吧提示",
                                            ___drag: "___boxTitle",
                                            ___width: "300px",
                                            ___height: "120px",
                                            ___content: "text:<p style=\"color:#555;text-align: center;margin:40px 15px 0;font-size:16px;font-weight:bold;\">已确认订单需直接联系餐厅取消，餐厅联系方式："+$this.attr("phone")+"</p>",
                                            ___showbg: true,
                                            //___time: 1800
                                        });
                          // $trigger.find(".ol_title span").html("已确认").append("<a class=\"call\" href=\"../sm_" + supID + "_1_" + orderID + ".html \">催单</a>");

                                                        }
                            else if (data == "4") {
                                parent.$.XYTipsWindow.removeBox();
                                $.XYTipsWindow({
                                    ___title: "开吃吧提示",
                                    ___drag: "___boxTitle",
                                    ___width: "300px",
                                    ___height: "120px",
                                    ___content: "text:<p style=\"color:#555;text-align: center;margin:40px 15px 0;font-size:16px;font-weight:bold;\">餐厅正在处理中，不能取消，请稍后查看结果</p>",
                                    ___showbg: true,
                                    ___time: 1800
                                });
                                $trigger.find(".ol_title span").html("餐厅正在处理中");
                            }
                            else {
                                parent.$.XYTipsWindow.removeBox();
                                $.XYTipsWindow({
                                    ___title: "开吃吧提示",
                                    ___drag: "___boxTitle",
                                    ___width: "300px",
                                    ___height: "100px",
                                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">暂时无法取消订单!</p>",
                                    ___showbg: true,
                                    ___time: 1800
                                });
                            }
                        },

                        error: function (data) {

                        }
                    });
                }
            }

        });
    });

});


function changeSlider(event, ui) {
    var obj = $(event.target).next();
    obj.html(ui.value);
    ShowComent(obj.attr("id"), event.target, ui.value);
    AddSum();
    $("#txtContent").val(GetSumScore($("#txtContent").val()));
}
function ShowComent(id, obj, level) {
    obj = $(obj).parents(".com_item").children(".stips");
    var content = "";
    if (id == "FoodDelivery") {

        switch (level) {
            case 1:
                content = "大于80分钟";
                break;
            case 2:
                content = "60分钟~80分钟";
                break;
            case 3:
                content = "40分钟~60分钟";
                break;
            case 4:
                content = "20分钟~40分钟";
                break;
            case 5:
                content = "20分钟以内";
                break;
        }
    }
    if (id == "FoodTaste") {

        switch (level) {
            case 1:
                content = "太难吃了，下次绝不会再点";
                break;
            case 2:
                content = "一般般，总感觉差点什么";
                break;
            case 3:
                content = "还可以，味道中规中矩";
                break;
            case 4:
                content = "蛮好吃，下次还想点哦";
                break;
            case 5:
                content = "超赞，实在太好吃啦";
                break;
        }
    }
    if (id == "FoodWeight") {

        switch (level) {
            case 1:
                content = "偏差太多了，完全货不对版";
                break;
            case 2:
                content = "差别很大，不合饭量";
                break;
            case 3:
                content = "有点差距，凑合吃了";
                break;
            case 4:
                content = "还行，不太多也不太少";
                break;
            case 5:
                content = "正好吃完，肚子饱饱的";
                break;
        }

    }
    $(obj).html(content);
}

function AddSum() {
    var FoodDelivery = parseInt($("#FoodDelivery").html()) * 0.5;
    var FoodTaste = parseInt($("#FoodTaste").html()) * 0.25;
    var FoodWeight = parseInt($("#FoodWeight").html()) * 0.25;
    var sum = FoodDelivery + FoodTaste + FoodWeight;
    var obj = $("#commentLayer .row1 .star");
    obj.removeClass();
    obj.addClass("star");


    if (sum >= 0 && sum <= 0.5) {
        $("#commentLayer .row1 .star").addClass("star_half");
    }
    else if (sum > 0.5 && sum <= 1.0) {
        $("#commentLayer .row1 .star").addClass("star1");
    }
    else if (sum >= 1.0 && sum <= 1.5) {
        $("#commentLayer .row1 .star").addClass("star1_half");
    }
    else if (sum > 1.5 && sum <= 2) {
        $("#commentLayer .row1 .star").addClass("star2");
    }
    else if (sum > 2 && sum <= 2.5) {
        $("#commentLayer .row1 .star").addClass("star2_half");
    }
    else if (sum > 2.5 && sum <= 3) {
        $("#commentLayer .row1 .star").addClass("star3");
    }
    else if (sum > 3 && sum <= 3.5) {
        $("#commentLayer .row1 .star").addClass("star3_half");
    } else if (sum > 3.5 && sum <= 4) {
        $("#commentLayer .row1 .star").addClass("star4");
    }
    else if (sum > 4 && sum <= 4.5) {
        $("#commentLayer .row1 .star").addClass("star4_half");
    }
    else if (sum > 4.5 && sum <= 5) {
        $("#commentLayer .row1 .star").addClass("star5");
    }




    $("#SumScore").html(sum);
}


//根据总分获取总体评价,当评价内容为空的时候获取
function GetSumScore(content) {
    var con = "";
    if ($.trim(content) == "" || !ValidataInput(content)) {
        var sumScore = parseInt($.trim($("#SumScore").html()));
        switch (sumScore) {
            case 1:
                con = "呃，不说什么了……";
                break;
            case 2:
                con = "一般般的餐厅，有待提高";
                break;
            case 3:
                con = "还不错，改进空间很大哦";
                break;
            case 4:
                con = "挺好的，下次还要来~";
                break;
            case 5:
                con = "太棒啦，强烈推荐这家餐厅~";
                break;
        }
    }
    else {
        con = content;
    }
    return con;
}

function ValidataInput(con) {
    if (con == "呃，不说什么了……")
        return false;
    if (con == "一般般的餐厅，有待提高")
        return false;
    if (con == "还不错，改进空间很大哦")
        return false;
    if (con == "挺好的，下次还要来~")
        return false;
    if (con == "太棒啦，强烈推荐这家餐厅~")
        return false;
    else {
        return true;
    }

};

function GetProcList(showType, trigger) {
    //showType：1 逐条显示  2 立即显示
    var $parent = trigger.parent().parent();
    var orderID = $parent.parent().find(".order_num span").html();
    trigger.text("订单更新中...").addClass("refreshing");
    params.type = "POST";
    params.url = "/ajax/Order/GetOrderProcList.ashx";
    params.data = { orderID: orderID, ShowType: showType };
    params.dataType = "json";
    params.success = function (data) {

        trigger.text("更新订单动态").removeClass("refreshing");
        var num = 0;
        var delayTime = 0;
        if (data.isShow == true) {
            $parent.html("");
            for (var i = 0; i < data.orderProcJson.length; i++) {
                //                if (showType == 1) {  //逐条显示
                delayTime = (i + 1) * 500;
                setTimeout(function () {
                    var showHtml = "<div class=\"" + (data.orderProcJson[num].pid == 1 ? "" : "mt10");
                    showHtml += data.orderProcJson[num].content.indexOf("餐厅已确认您的订单内容，开始备餐") > 0 ? " order_ready" : "";
                    showHtml += data.orderProcJson[num].content.indexOf("订单无效") > 0 ? " order_cancel" : "";
                    showHtml += "\"><span class=\"time\">" + data.orderProcJson[num].processtime + "</span>";
                    showHtml += data.orderProcJson[num].content + "</div>";

                    $parent.append(showHtml);
                    num++;
                }, delayTime);
                if (i == data.orderProcJson.length - 1) {
                    setTimeout(function () {
                        var showHtml = "<p class='refresh clearfix'>";
                        showHtml += "0345".indexOf(data.refresh.orderState) >= 0 ? "<a class='white tip br4 mr10 shadow' href='javascript:void(0);'>更新订单动态</a>" : "";
                        if (data.refresh.orderState == "1" && data.refresh.isCommentExists == "0") {
                            showHtml += "<a href='javascript:void(0);' class='base_ben orange_btn' orderid='" + data.refresh.orderid + "'";
                            showHtml += " supplierid='" + data.refresh.supplierid + "'>评价赚积分</a>";
                            showHtml += " <a class='white br4 mr10 shadow call'" +
                                    " supplierid='" + data.refresh.supplierid + "' orderid='" + data.refresh.orderid + "'" +
                                    " ordertime='" + data.refresh.ordertime + "' href='javascript:void(0);'>催单</a>";
                        }
                        if (data.refresh.orderState == "1" && data.refresh.isCommentExists == "1") {
                            showHtml += "<span class='not_make_com' orderid='" + data.refresh.orderid + "' supplierid='" + data.refresh.supplierid + "'>已评价(赚20积分)</span>";
                        }
                        showHtml += "</p>";
                        $parent.append(showHtml);
                    }, (i + 2) * 500);

                }
            }

            var commenthtml = "";
            if (data.orderCommentJson.orderState == 1 && data.orderCommentJson.isReceive == "1" && data.orderCommentJson.isCommentExists == "0") {
                if (data.orderCommentJson.supplierid == "22") {
                    commenthtml = "22";
                } else {
                    commenthtml = " <a href='javascript:;' class='make_com' orderid='";
                    commenthtml += orderID;
                    commenthtml += "' supplierid='" + data.orderCommentJson.supplierID + "'>评价赚积分</a>";
                }
            } else {
                commenthtml = "hideCancel";
            }

            if (commenthtml.length > 0) {
                if ($parent.parent().find(".make_com").length <= 0) {
                    if (commenthtml != "22" && commenthtml != "hideCancel") {
                        $parent.parent().find(".order_simp").append(commenthtml);
                    }
                    if ($parent.parent().find(".cancel").parent().find("span").html() == "已支付" && data.orderCommentJson.orderState != "0") {
                        $parent.parent().find(".cancel").parent().find("a").html("");
                    } else {
                        if (data.orderCommentJson.orderState == "0") {
                            $parent.parent().find(".cancel").parent().find("a").html("取消");
                        } else if (data.orderCommentJson.orderState == "5") {
                            //$parent.parent().find(".cancel").parent().find("a").html("取消");
                        } else {
                            $parent.parent().find(".cancel").parent().html("");
                        }
                    }
                }
            }
        }
    }
    tools.ajax(params);
}

function getUserInfo() {
    $.ajax({
        url: '../ajax/Login_Register/getUserInfo.ashx',
        data: 'UserID=' + $.cookie("userID"),
        success: function (data) {
            if (data != undefined && data.NickName != undefined) {
                NickName = data.NickName;
            }
            else {
                NickName = "kcb_" + new tool().getRandom(5, 3); ;
            }

        },
        error: function (data) {

        }
    });
}





function PublishOrderComment(obj, orderid) {
    var FoodDelivery = parseFloat($("#FoodDelivery").html());
    var FoodTaste = parseFloat($("#FoodTaste").html());
    var FoodWeight = parseFloat($("#FoodWeight").html());
    var SumScore = parseFloat($("#SumScore").html());
    var UniverisityID = $.cookie("uniID");
    var Content = GetSumScore($("#txtContent").val());
    var UserID = $.cookie("userID");
    var NickName = $.cookie("nickname");
    var FoodDetails = "";
    var selector = ".fl[orderid='" + OrderID + "']";
    $(selector).each(function () {
        FoodDetails += $.trim($(this).html()) + "  ";
    });

    if (UserID != "" && UserID != undefined && UniverisityID != "" && UniverisityID != undefined) {
        var params = "FoodDelivery=" + FoodDelivery + '&FoodTaste=' + FoodTaste + '&FoodWeight=' + FoodWeight + '&SumScore=' + SumScore + '&OrderID=' + OrderID + '&UniverisityID=' + UniverisityID + '&SupplierID=' + SupplierID + '&OperatorType=Add&Content=' + Content + '&User_ID=' + UserID + '&Nick_Name=' + NickName + '&FoodDetails=' + FoodDetails;
        $.ajax({
            url: '../ajax/DimensionCommentManager.ashx',
            data: params,
            type: 'post',
            dataType: 'json',

            success: function (data) {
                if (data.Result.toString().toLowerCase() == "true") {
                    $("#txtContent").val("");
                    $("#commentLayer,.layer_bg").hide();
                    var tmpObj = $(".orange_btn[orderid=" + OrderID + "]");
                    tmpObj.removeClass();
                    tmpObj.parent().html('<span class="not_make_com">已评价(赚20积分)</span>');
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">评价成功!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                } else {

                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">评价失败，请稍后再试!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                }

                //移除取消按钮
                $(".order_list .cancel[orderid='" + orderid + "']").remove();
            },
            error: function (data) {

                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + data.responseText + "!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                $(".order_list .cancel[orderid='" + orderid + "']").remove();
            }
        });
    }
    else {

        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">您还未登录或还未选择大学!</p>",
            ___showbg: true,
            ___time: 1800
        });
    }

}