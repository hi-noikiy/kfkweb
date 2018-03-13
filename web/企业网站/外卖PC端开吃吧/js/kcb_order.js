var tools = new tool();
var params = {};

//OrderInfo
var orderInfo = {
    userID: 0,
    kcbcartInfo: "",
    //  originalPrice: 0,
    address: "",
    phone: "",
    altPhone: "",
    notes: "",
    uniID: 0,
    isSendMessage: 0,
    kcbPointType: 0,
    kcbPointCount: 0,
    voucherType: 0,
    voucherPrice: 0,
    ticketID: "",
    fullPrice: 0,
    couponPrice: 0,
    payType: 0,
    deliveryFee: 0,
    reservationSendTime: ""
};

//ContectInfo
var contectInfo = {
    userContactInfoID: 0, userID: 0, address: "", phone: "", altPhone: "", isDefault: 0
};

//RegistInfo
var registInfo = {
    Mail: "", NickName: "", PassWord: "", uniID: 0, regIP: ""
};

//匿名用户注册。在点击发送订单按钮的时候调用
function anonymous(phone) {
    var mail = phone + "@niming.com";
    //检验邮箱是否已存在
    var userID = tools.checkMailExist(mail);

    //该邮箱已存在则新建一个userID的cookie
    if (!tools.IsEmpty(userID) && parseInt(userID) > 0) {
        $.cookie('userID', userID, { path: "/", expires: 365 });
        return userID;
    }

    registInfo.Mail = mail;
    registInfo.NickName = tools.getRandom(3, 1) + phone.substring(6, 11);
    registInfo.uniID = $.cookie("uniID");
    registInfo.regIP = $.cookie("regIP");
    registInfo.PassWord = tools.getRandom(10, 3);

    params.type = "POST";
    params.async = false;
    params.url = "../ajax/Login_Register/userRegist.ashx";
    params.data = registInfo;
    params.success = function (data) {
        userID = data["userID"].toString();
        if (parseInt(userID) > 0) {
            //注册成功
            //$.cookie('nickname', '', { expires: -1 });
            $.cookie('kcb', '', { expires: -1 });
        }
        else {
            //注册失败
            userID = "-1";
        }
    };
    tools.ajax(params);
    return userID;
}

//回车键触发下单事件
function EnterKeyClickLogin(button) {
    if (event.keyCode == 13) {
        event.returnValue = false;
        event.cancel = true;
        if (button == "sendOrder") {
            $("#sendOrder").click();
        }
    }
}


//判断送餐地址是否修改
function isUpdateAddr() {
    $trigger = $(".a_c").children();
    if ($.trim($trigger.children(".address").html()) != $.trim($("#o_addr").val())) {
        return true;
    }
    else if ($.trim($trigger.children(".phone").html()) != $.trim($("#o_phone").val())) {
        return true;
    }
    else if ($.trim($trigger.children(".altphone").html()) != $.trim($("#o_altphone").val())) {
        return true;
    }
    else {
        return false;
    }
}


/*满减活动提示框隐藏*/
function tipFadeOut() {
    $('#saveTip').fadeOut('slow');
}

$(document).ready(function () {
    var shade = $('#shade');     //遮罩层

    var kcbPointType = 0;      //0没使用   1永久开吃点   2现实开吃点
    var voucherType = 0;      //0没使用   1普通优惠码   2商家推荐优惠码
    var voucherCode;       //记录验证成功的优惠码
    var voucherPrice = "0";        //记录验证成功的优惠码抵价
    var orderPrice = parseFloat($(".realTotalPrice").html());         //订单价格 
    var couponPrice = $("#h_couponPrice").val() == "" ? 0 : $("#h_couponPrice").val();  //满减价格
    var fullPrice = $("#h_fullPrice").val() == "" ? 0 : $("#h_fullPrice").val();
    //  var originalPrice = 0;
    var tradePrice = 0;                     //优惠价格
    var borderDashed = $('#border_dashed');    //选择优惠中的虚线
    var tradeSuccess = $('#trade_success');        //抵价成功后的提示
    var lastMustPay = $('#last_must_pay');        //抵价成功后的价格计算
    var pointNum = 0;

    /*满减活动提示框隐藏*/
    setTimeout(tipFadeOut, 8000);

    //进去页面时，订单价格是否满足满减
    //    var couponPrice = $("#h_couponPrice").val();
    //    if (couponPrice > 0) {
    //        showTradeSuccess(couponPrice, $('#k_c_coupon'));
    //    }


    $("#saveTip span").click(function () {
        $('#saveTip').fadeOut('fast');
    });
    /*给餐厅留言*/
    var leaveMessageBox = $('#leave_message_box');
    //得到焦点让餐厅留言板显示
    leaveMessageBox.focus(function () {
        if (leaveMessageBox.val() == '给餐厅留言') {
            leaveMessageBox.val('');
        }

        $('#leave_message').show();
    });


    $('#leave_message_box').on('input', function () {
        if (leaveMessageBox.val() == '') {
            $('#leave_message').find('a').removeClass('activeed');
        }
    });

    $('#leave_message').find('a').click(function () {
        stopProcess($(this));
        if (!$(this).hasClass('activeed')) {
            $(this).addClass('activeed')
            leaveMessageBox.val(leaveMessageBox.val() + $(this).find('span').text() + ' ');
        }
    });
    //餐厅留言隐藏，送餐时间隐藏
    $(document).bind('click', function (e) {
        var leaveMessage = $('#leave_message'),
			   leaveMessageBox = $('#leave_message_box'),
			   mouseX = e.pageX,
			   mouseY = e.pageY;
        if (!(mouseX > leaveMessage.offset().left && mouseX < leaveMessage.offset().left + leaveMessage.width() &&
		    mouseY > leaveMessage.offset().top && mouseY < leaveMessage.offset().top + leaveMessage.height() ||
			mouseX > leaveMessageBox.offset().left && mouseX < leaveMessageBox.offset().left + leaveMessageBox.width() + 37 &&
		    mouseY > leaveMessageBox.offset().top - 3 && mouseY < leaveMessageBox.offset().top + leaveMessageBox.height() + 6)) {
            if (leaveMessageBox.val() == '') {
                leaveMessageBox.val('给餐厅留言');
            }
            $('#leave_message').hide();
        }
        var timeDropdown = $('#time_dropdown');
        if (!(mouseX > timeDropdown.offset().left && mouseX < timeDropdown.offset().left + timeDropdown.width() &&
			mouseY > timeDropdown.offset().top && mouseY < timeDropdown.offset().top + timeDropdown.height())) {
            $('#time_list').hide();
        }
    });


    //取消选择优惠信息
    function cancelPrivilege() {
        kcbPointType = 0;
        voucherType = 0;
        tradePrice = 0;
        couponPrice = 0;
        $('#privilegePanel .active_btn').removeClass('active_btn');
        $('.disable').removeClass('disable');
        clearTradeSuccess();
    }
    //初始化优惠信息
    function initPrivilege() {
        $('#privilegePanel .active_btn').removeClass('active_btn');
        $('.disable').removeClass('disable');
        clearTradeSuccess();
    }
    //显示抵价成功信息
    function showTradeSuccess(num, obj) {
        borderDashed.show();
        tradeSuccess.show().find('em').text(num);
        var totalPrice = orderPrice - num;
        if (totalPrice < 0) {
            totalPrice = 0;
        }
        lastMustPay.show().find('em').text('￥' + orderPrice + '-' + num + '=' + totalPrice.toFixed(1));
        $('#privilegePanel .active_btn').removeClass('active_btn');
        $('.shelter_span a.btn').addClass('disable');
        obj.removeClass('disable');
        obj.addClass('active_btn');
    }
    //隐藏抵价成功信息
    function clearTradeSuccess() {
        borderDashed.hide();
        tradeSuccess.hide().find('em').text(' ');
        lastMustPay.hide().find('em').text(' ');
    }

    $('#use_promotion').click(function () {

        voucherPrice = "0";

        //验证订单原价是否满足使用优惠码的资格

        if (parseFloat($("#h_originalPrice").val()) < parseFloat($("#h_userVoucherPrice").val())) {
            alert("订单原价未到使用优惠码的最低金额");
            return;
        }

        var oldVoucherCode = $.trim($('.input_code').val());
        //var reg = new RegExp("^[0-9]*$"); //验证是否为数字
        if (oldVoucherCode == "" || (oldVoucherCode.length != 13 && oldVoucherCode.length != 6)) {
            voucherPrice = "-14";
            $('.input_code').addClass('c_red');
            $('.input_code').val('优惠码无效，请重新输入');
            return;
        }
        else {
            //第二次点击使用优惠码，若优惠码编号没变，则不需要异步请求验证数据
            if (voucherCode == oldVoucherCode && parseFloat(voucherPrice) > 0) {
                $('.promotion_code').hide();
                shade.hide();
                cancelPrivilege();
                showTradeSuccess(voucherPrice, $('#k_c_voucher'));
                voucherType = 1;  //使用普通优惠码
                tradePrice = voucherPrice;
            } else {
                //否则异步请求验证数据
                voucherCode = $.trim($('.input_code').val());

                $.ajax({
                    type: "post",
                    url: '/ajax/Order/ValidateVoucher.ashx',
                    data: { "TicketID": voucherCode, "SupID": $("#Supplier_id").attr("supid") },
                    success: function (data) {
                        var d = eval('(' + data + ')');
                        if (d.Msg == "-14") {
                            voucherPrice = d.VoucherPrice;
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('优惠码无效，请重新输入');
                        } else if (d.Msg == "-3") {
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('此优惠码该平台不可用');
                        }
                        else if (d.Msg == "-4") {
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('该优惠码仅首次下单可用');
                        }
                        else if (d.Msg == "-2") {
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('该优惠码超过有效期');
                        }
                        else if (d.Msg == "-5") {
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('该餐厅非推荐餐厅');
                        }
                        else if (d.Msg == "-1") {
                            $('.input_code').addClass('c_red');
                            $('.input_code').val('优惠码无效，请重新输入');
                        }
                        else {
                            voucherType = d.VoucherType;  //订单使用优惠码                            
                            tradePrice = d.VoucherPrice;
                            voucherPrice = d.VoucherPrice;
                            $('.promotion_code').hide();
                            shade.hide();
                            showTradeSuccess(voucherPrice, $('#k_c_voucher'));
                        }
                    }
                });
            }
        }
    });

//    function userCoupon() {

//        var checkCouponPrice = $("#h_couponPrice").val();
//        var checkFullPrice = $("#h_fullPrice").val();
//        var checkOriPrice = $("#h_originalPrice").val();
//        if (checkCouponPrice == 0 || parseFloat(checkFullPrice) > parseFloat(checkOriPrice)) {
//            $.XYTipsWindow({
//                ___title: "开吃吧提示",
//                ___drag: "___boxTitle",
//                ___width: "330px",
//                ___height: "100px",
//                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">订单金额（不含配送费）未到满减价格！</p>",
//                ___showbg: true,
//                ___time: 2000
//            });
//            return;
//        }
//        if (!checkLogin()) {
//            return;
//        }

//        if (couponPrice != 0) {
//            cancelPrivilege();
//            $('#k_c_voucher').click(function () {
//                kcvoucher();
//            });
//        } else {
//            cancelPrivilege();
//            $("#k_c_voucher").unbind("click");
//            showTradeSuccess($("#h_couponPrice").val(), $('#k_c_coupon'));
//            couponPrice = checkCouponPrice;
//            fullPrice = checkFullPrice;
//            // originalPrice = checkOriPrice;
//        }
//    }

    //验证使用优惠次数
    function verifyUserActivityUse(type) {
        if (!checkLogin()) {
            return;
        }
        var userId = $.cookie("userID");
        $.ajax({
            type: "POST",
            url: "/ajax/Order/VerifyUserActivityUse.ashx",
            data: { userId: userId, actType: type },
            success: function (data) {
                if (parseInt(data) < 2 && parseInt(data) != -2 && parseInt(data) != -11 && parseInt(data) != -13) {
//                    if (type == 1) { userCoupon(); }
                    if (type == 2) { kcvoucher(); }

                }
                else if (data == "-11") {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "330px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">系统异常！请重试</p>",
                        ___showbg: true,
                        ___time: 2000
                    });

                }
                else if (data == "-2") {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "330px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">一天只能使用两次相同优惠！</p>",
                        ___showbg: true,
                        ___time: 2000
                    });

                }
                else if (parseInt(data) >= 2) {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "330px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">一天只能使用两次相同优惠！</p>",
                        ___showbg: true,
                        ___time: 2000
                    });

                } else if (data == "-13") {
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "330px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">系统异常！请重试</p>",
                        ___showbg: true,
                        ___time: 2000
                    });
                }

            }
        });
    }
    /*使用满减*/
//    $('#k_c_coupon').click(function () {
//        verifyUserActivityUse(1);


//    });

    /*使用优惠码*/
    $('#k_c_voucher').click(function () {
        verifyUserActivityUse(2);
        // kcvoucher();
    });

    function kcvoucher() {
        if (!checkLogin()) {
            return;
        }
        $(".input_code").val("");
        $('.input_code').removeClass('c_red');
        if (voucherType == 1) {
            cancelPrivilege();
            oldVoucherCode = ' ';
            voucherPrice = "0";
        } else {
            shade.show();
            $('.promotion_code').show();
        }
    }

    $('#promotion_cancel').click(function () {
        $('.promotion_code').hide();
        shade.hide();
    });

    $('p.pay_t_p select').change(function () {
        $(this).parent().click();
    });
    //输入验证码错误后得到焦点
    $('.input_code').focus(function () {
        if ($(this).val() != '') {
            $(this).val(' ');
            $(this).removeClass('c_red');
        }
    });

    /*使用开吃点*/
    $('#k_c_point').click(function () {
        if (checkLogin()) {
            if (kcbPointType == 1 || kcbPointType == 2) {
                cancelPrivilege();
                pointNum = 0;
            } else {
                //$(this).addClass('active_btn');
                $('p.pay_t_p:eq(0)').click();
                shade.show();
                $('.k_c_point').show();
            }
        }
    });

    $('#point_cancel').click(function () {
        $('.k_c_point').hide();
        shade.hide();
    });
    $('#use_point').click(function () {
        kcbPointType = parseInt($('input[name="kcbPointType"]:checked').val());
        pointNum = parseFloat($('input[name="kcbPointType"]:checked').parent().parent().find('select').val());
        tradePrice = pointNum / 10;
        showTradeSuccess(tradePrice, $('#k_c_point'));
        $('.k_c_point').hide();
        shade.hide();
    });
    $('p.pay_t_p').click(function () {
        var thisP = $(this);
        thisP.find(' input[type=radio]').attr('checked', 'checked');
        var thisPri = parseInt(thisP.find('select').val());
        $('p.pay_t_p').css('color', '#999');
        thisP.css('color', '#333');
        $('p.pay_t_p').find('.check_ok').hide();
        thisP.find('.check_ok').show().text('(抵价' + thisPri / 10 + '元)');
    });

    /*使用推荐餐厅抵价劵*/
    $('.trade_securities').click(function () {
        if (voucherType == 2) {
            cancelPrivilege();
        } else {
            voucherType = 2;
            showTradeSuccess(voucherPrice, $('.trade_securities'));
        }
    });
    /*读取cookie，该用户是否享受餐厅推荐优惠码*/
    /*
    var recommendSup = $.cookie("recommendSup");
    //alert(recommendSup);
    var supplierID = $("#Supplier_id").attr("SupID");
    //if (recommendSup == supplierID) {
    var uniID = $.cookie("uniID");

    var recommendTicket = $.cookie("recommendVoucher");
    if (!tools.IsEmpty(recommendTicket)) {     //!tools.IsEmpty(recommendSup) &&
    $.ajax({
    url: '/ajax/Order/ValidateRecommendVoucher.ashx',
    data: { "TicketID": recommendTicket, "SupID": supplierID, "UniID": uniID },
    success: function (data) {
    if (data == "-15" || data == "-14" || data == "0") {//优惠码无效 -15 为非推荐餐厅
    }
    else {
    voucherType = 2;    //餐厅推荐低价劵
    voucherPrice = data;
    voucherCode = recommendTicket;
    $(".trade_securities").css("display", "inline-block").addClass("active_btn").find(".voucherPrice").html(data);
    tradePrice = data;
    showTradeSuccess(data, $('.trade_securities'));
    }
    }
    });
    }
    */

    /*送餐时间更改*/
    $('.ui_dropdown_toggle').click(function () {
        $('#time_list').show();
    });
    $('#time_list li').click(function () {
        $('.ui_dropdown_toggle span').text($(this).find('span').text());
        $('#time_list').hide();
    });
    /*修改地址*/
    var IsNewAddress = 0;

    //验证送货地址
    function checkAdd(address, phone) {
        var regPhone = /^1[0-9]{10}/;
        var returnNum1 = 0;
        var returnNum2 = 0;
        if ($.trim(address) == "外卖送到的地址" || $.trim(address) == "地址输入错误" || $.trim(address) == "") {
            returnNum1 = 1;
        }
        if (!regPhone.test($.trim(phone))) {
            returnNum2 = 2;
        }
        return (returnNum1 + returnNum2);
    }
    //初始化地址信息
    var canAddNowAddress = true;   //是否可以添加新地址  默认可以
    if ($('#select_address p.add_address').length > 0) {
        var firstAddredd;
        if ($('#select_address input[type=radio][checked=checked]').length == 0) {
            firstAddredd = $('#select_address p.add_address').eq(0);   //选中第一个地址
            $('#select_address p.add_address').eq(0).find("input").attr("checked", true);
        }
        else {
            firstAddredd = $('input[type=radio][checked=checked]').parent();   //选中默认地址
        }
        $('.address_phone').html('<em>' + firstAddredd.find('.u_address').first().text() + '</em><em>' + firstAddredd.find('.u_phone').first().text() + '</em><em>' +

firstAddredd.find('.u_altphone').first().text() + '</em>'); //让用户的第一为第一个地址
        $(".change_address").html('[修改]');
    } else {
        //从没填过地址，默认输入框
        canAddNowAddress = false;
        $("#add_new_address").hide();
        $('#select_address h2').after('<p class="add_address new_input"><input type="radio" name="address" checked="checked"/><input type="text" id="o_addr" value="外卖送到的地址"/><input type="text" id="o_phone" value="联系手机"/><input type="text" id="o_altphone" value="备选手机(选填)"/></></p>');
    }
    //添加新地址
    $('#add_new_address').click(function () {
        if (canAddNowAddress) {
            $('#select_address p.add_address').find('input[type="text"]').parent().find('.cancel_save').click();   //把其他在修改的地址关闭
            $('#select_address p.add_address').find('input[type="radio"]').removeAttr('checked');           //解决ie78新建单选组问题
            $('#select_address h2').after('<p class="add_address new_input" style="display:none"><a href="javascript:;" class="cancel_save">×</a><input type="radio" name="address" checked="checked"/><input type="text" id="o_addr" value="外卖送到的地址"/><input type="text" id="o_phone" value="联系手机"/><input type="text" id="o_altphone" value="备选手机(选填)"/></p>');
            canAddNowAddress = false;
            $('#select_address p.add_address').first().slideDown(300);
        }
    });
    //选中某一地址
    $('.add_address').click(function () {
        $(this).find(' input[type=radio]').attr('checked', 'checked');
        //当前不是新增地址输入框
        if (!$(this).hasClass('new_input')) {
            if ($('p.new_input').length != 0) {
                $('p.new_input').slideUp();
                setTimeout(function () {
                    $('p.new_input').remove();
                }, 300);
            }
            canAddNowAddress = true;
            //如果当前的没有输入地址框 ，其他的地址列有的话，收起其他地址列
            if ($(this).find('input[type=text]').length == 0 && $('.add_address input[type=text]').length - $('.new_input input[type=text]').length != 0) {
                $('.add_address input[type=text]').last().parent().find('.cancel_save').click();
            }
        }
    });
    //修改地址
    $('.edit').click(function () {
        var thisPar = $(this).parent();
        $('#select_address p.add_address').find('input[type="text"]').parent().find('.cancel_save').click();   //把其他在修改的地址关闭
        thisPar.find('a').hide();
        thisPar.find(' span').hide();
        thisPar.prepend('<a href="javascript:;" class="cancel_save">取消</a><a href="javascript:;" class="do_save">保存</a>');
        thisPar.append('<input type="text" id="o_addr" value="' + $.trim(thisPar.find(' span').eq(0).text()) + '"/><input type="text" id="o_phone" value="' + $.trim

(thisPar.find(' span').eq(1).text()) + '"/><input type="text" id="o_altphone" value="' + $.trim(thisPar.find(' span').eq(2).text()) + '"/>');
    });
    //删除地址
    $('.delete').click(function () {
        stopProcess($(this));
        var thisPar = $(this).parent();
        //        thisPar.slideUp();
        //        setTimeout(function () {
        //            thisPar.remove();
        //        }, 300);


        var userContactInfoID = $(this).parent().attr("addressid");
        $.ajax({
            type: "POST",
            url: "../ajax/ContactInfo/DeleteContactInfoByID.ashx",
            data: { userContactInfoID: userContactInfoID },
            success: function (data) {
                thisPar.remove();
                if ($('.add_address').length <= 0) {
                    $("#add_new_address").hide();
                    $('#select_address h2').after('<p class="add_address new_input"><input type="radio" name="address" checked="checked"/><input type="text" id="o_addr" value="外卖送到的地址"/><input type="text" id="o_phone" value="联系手机"/><input type="text" id="o_altphone" value="备选手机(选填)"/></></p>');
                    canAddNowAddress = false;
                    $('.address_phone').html('<em>请填写地址</em>');
                    $(".change_address").html('[填写]');

                }
                if ($('.add_address input[type=radio]:checked').length <= 0) {
                    $('.add_address:eq(0)').click();
                }
            }
        });
    });

    $(".to_default").live('click', function () {
        var thisPar = $(this).parent(),
            address = $.trim(thisPar.find('.u_address').html()),
            phone = $.trim(thisPar.find('.u_phone').html()),
            altphone = $.trim(thisPar.find('.u_altphone').html()),
            userID = $.cookie("userID"),
            userContactInfoID = thisPar.attr("addressid");

        $.ajax({
            type: "POST",
            url: "/ajax/ContactInfo/ChangeContactInfo.ashx",
            data: { userContactInfoID: userContactInfoID, userID: userID, address: address, phone: phone, altphone: altphone, isDefault: "1" },
            success: function (data) {
                if (data == 1) {
                    $(".add_address .to_default").html("设为默认");
                    thisPar.children(".to_default").html("默认信息");
                } else {

                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">暂时无法设置为默认!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });

                }

            },
            error: function (data) {

            }
        });
    });

    //取消修改地址
    $('.cancel_save').live('click', function () {
        var thisPar = $(this).parent();
        if (!thisPar.hasClass('new_input')) {
            thisPar.find('a.cancel_save,a.do_save').remove();
            thisPar.find(' input[type=text]').remove();
            thisPar.find('a').css('display', '');
            thisPar.find(' span').show();
        } else {
            $('.add_address:eq(1)').click();
        }
    });
    //保存地址修改
    $('.do_save').live('click', function () {
        var thisPar = $(this).parent(),
		address = thisPar.find('input#o_addr').val(),
		phone = thisPar.find('input#o_phone').val(),
		altphone = thisPar.find('input#o_altphone').val();

        if (altphone == "备选手机(选填)") {
            $('input#o_altphone').val("").css("color", "#999");
        }
        if (altphone != "" && altphone != "备选手机(选填)") {
            var result = tools.checkMobile(altphone);
            if (result.isCorrect == false) {
                thisPar.find('input#o_altphone').val("电话有误");
                thisPar.find('input#o_altphone').focus();
                return;
            }
            if (altphone.length > 11) {
                thisPar.find('input#o_altphone').val("电话有误");
                thisPar.find('input#o_altphone').focus();
                return;
            }
        }
        var checkNum = checkAdd(address, phone);
        switch (checkNum) {
            case 0:
                thisPar.find(' span').eq(0).text(address);
                thisPar.find(' span').eq(1).text(phone);
                thisPar.find(' span').eq(2).text(altphone);
                thisPar.find('a.cancel_save').click();
                break;
            case 1:
                thisPar.find('#o_addr').addClass('c_red').val('地址输入错误');
                return;
                break;
            case 2:
                thisPar.find('#o_phone').addClass('c_red').val('电话输入错误');
                return;
                break;
            case 3:
                thisPar.find('#o_addr').addClass('c_red').val('地址输入错误');
                thisPar.find('#o_phone').addClass('c_red').val('电话输入错误');
                return;
                break;
        }
        //保存修改的地址
        PostChangeAddress($(this).parent().attr("addressID"), address, phone, altphone);
    });
    //异步请求保存修改的地址
    function PostChangeAddress(userContactInfoID, address, phone, altphone) {
        contectInfo.userContactInfoID = userContactInfoID;
        contectInfo.userID = $.cookie("userID");
        contectInfo.address = address;
        contectInfo.phone = phone;
        contectInfo.altPhone = altphone;
        contectInfo.isDefault = 1;
        params.url = "/ajax/ContactInfo/ChangeContactInfo.ashx";
        params.type = "POST";
        params.data = contectInfo;
        params.success = function () { };
        tools.ajax(params);
    }
    $("#o_phone,#o_altphone").live("input", function () {
        var phone = $(this).val();
        if (phone.length > 11) {
            $(this).val(phone.substring(0, 11));
        }
    });
    //显示地址列表
    //$('.order_p_address, .order_p_address a').click(function () {
    $('#updateAddress,.change_address').click(function () {
        shade.show();

        $('#select_address').show();
    });
    //取消使用选中地址
    $('#address_cancel').click(function () {
        $('#select_address').hide();
        shade.hide();
        $(".cancel_save").each(function () { $(this).click(); });
    });
    //使用选中地址
    $('#use_address').click(function () {
        if ($('input#o_altphone').length > 0) {
            var altphone = $('input#o_altphone').val();
            if (altphone == "备选手机(选填)") {
                $('input#o_altphone').val("").css("color", "#999");
            }
            if (altphone != "" && altphone != "备选手机(选填)") {
                var result = tools.checkMobile(altphone);
                if (result.isCorrect == false) {
                    $('input#o_altphone').val("手机有误").css("color", "red");
                    $('input#o_altphone').live('focus', function () { $(this).val("").css("color", "#999"); });
                    return;
                }
            }
        }

        var thisAdd = $('input[name="address"]:checked').parent();
        if (thisAdd.hasClass('new_input')) {
            var address = thisAdd.find('#o_addr').val(),
					phone = thisAdd.find('#o_phone').val(),
					altphone = thisAdd.find('#o_altphone').val();
            if ($.trim(altphone) == '备选手机(选填)') {
                altphone = '';
            }
            var checkNum = checkAdd(address, phone);
            if (checkNum == 0) {
                $('.address_phone').html('<em>' + address + '</em><em>' + phone + '</em><em>' + altphone + '</em>');
                $(".change_address").html('[修改]');
                thisAdd.find('.do_save').click();
            } else if (checkNum == 1) {
                thisAdd.find('#o_addr').addClass('c_red').val('地址输入错误');
                return;
            } else if (checkNum == 2) {
                thisAdd.find('#o_phone').addClass('c_red').val('电话输入错误');
                return;
            } else if (checkNum == 3) {
                thisAdd.find('#o_addr').addClass('c_red').val('地址输入错误');
                thisAdd.find('#o_phone').addClass('c_red').val('电话输入错误');
                return;
            }
            IsNewAddress = 1;
            $("#select_address").find("div").before();

            $('#address_cancel').click();    //隐藏浮层
        } else {
            thisAdd.find('.do_save').click();
            if (thisAdd.find('input.c_red').length < 1) {
                $('.address_phone').html('<em>' + thisAdd.find('.u_address').first().text() + '</em><em>' + thisAdd.find('.u_phone').first().text() + '</em><em>' +

thisAdd.find('.u_altphone').first().text() + '</em>');
                $('#address_cancel').click();
            }
            var userContactInfoID = $(thisAdd).attr("addressid");
            PostChangeAddress(userContactInfoID, thisAdd.find('.u_address').first().text(), thisAdd.find('.u_phone').first().text(), thisAdd.find('.u_altphone').first

().text()); //将当前选中的电话设置为默认送餐地址
            IsNewAddress = 0; //非新添地址，为下单的时候判断是否给用户添加新送餐地址
        }
    });
    //新建地址提示信息的显示与隐藏
    $('#o_addr,#o_phone,#o_altphone').live('click', function () {

        var thisObj = $(this);

        stopProcess(thisObj);
        window.focus();
        this.focus();
    })
    $('#o_addr,#o_phone,#o_altphone').live('focus', function () {
        var thisObj = $(this);
        stopProcess(thisObj);
        switch (thisObj.attr('id')) {
            case 'o_addr':
                if (thisObj.val() == '外卖送到的地址') {
                    thisObj.val('');
                } else if (thisObj.val() == '地址输入错误') {
                    thisObj.val('');
                    thisObj.removeClass('c_red');
                };
                break;
            case 'o_phone':
                if (thisObj.val() == '联系手机') {
                    thisObj.val('');
                } else if (thisObj.val() == '手机输入错误' || thisObj.val() == "电话输入错误") {
                    thisObj.val('');
                    thisObj.removeClass('c_red');
                };
                break;
            case 'o_altphone':
                if (thisObj.val() == '备选手机(选填)') {
                    thisObj.val('').css("color", "#999");
                };
                break;
        }
    });
    $('#o_addr,#o_phone,#o_altphone').live('blur', function () {
        var thisObj = $(this);
        switch (thisObj.attr('id')) {
            case 'o_addr':
                if (thisObj.val() == '') {
                    thisObj.val('外卖送到的地址');
                };
                break;
            case 'o_phone':
                if (thisObj.val() == '') {
                    thisObj.val('联系手机');
                };
                break;
            case 'o_altphone':
                if (thisObj.val() == '') {
                    thisObj.val('备选手机(选填)');
                };
                break;
        }
    });
    $("#sendOrder").bind("click", function () {

        var $trigger = $(this);
        //如果没有送餐地址，则弹出浮层设置送餐地址
        if ($(".address_phone em").html() == "" || $(".address_phone em").html() == "请填写地址") {
            $(".change_address").click();
            return;
        }

        if ($("#h_isPassCheck").val() == "0" && $("#h_isAnonymous").val() == "0" && $("#btnCancel").attr("nowbind") == "1") {
            $("#bindOverlay").fadeIn();
            $("#phoneBind").val($.trim($(".address_phone em").eq(1).html())).focus();
            return;
        }

        //判断是否选择支付方式
        var online = $("#onlinePay").attr("data");
        var off = $("#offPay").attr("data");
        if (online == 0 && off == 0) {

            var width = $(document.body).width();
            var height = $(window).height();
            var offtop = (height - 80) / 2 + "px";
            var offleft = (width - 200) / 2 + "px";
            $.XYTipsWindow({
                ___title: "开吃吧提示",
                ___drag: "___boxTitle",
                ___width: "200px",
                ___height: "40px",
                ___content: "text:<p style=\"color:#555;text-indent:2em;margin-top:15px;font-size:16px;font-weight:bold;padding:0 10px;\">请选择支付方式</p>",
                ___showbg: true,
                ___offsets: { top: offtop, left: offleft }
            });
            return;
        }

        /*验证是否手机注册过*/
        var a = $("#h_isRegist").val();
        if (a == 0 || a == "0") {
            showMinRegist();
            return false;
        }

        if (online == 1) {
            orderInfo.payType = 1; //在线支付
        }

        if (off == 1) {
            orderInfo.payType = 0; //餐到付款
        }
        //activeAltPhone = $.trim($(".altTel input").find(".altPhone").html());

        var FoodList = new Array(); //存放菜品的数组
        var kcbCarInFo = eval('(' + $.cookie("KcbCarInfo") + ')'); //取得购物车cookie
        if (!tools.IsEmpty(kcbCarInFo)) {//判断购物车是否为空
            FoodList = kcbCarInFo.FoodInfos; //不是则取出购物车中的菜品列表
        }
        if (FoodList.length == 0) {
            return;
        }
        orderInfo.userID = $.cookie("userID"),
        orderInfo.address = $.trim($(".address_phone em").eq(0).html()),
        orderInfo.phone = $.trim($(".address_phone em").eq(1).html()),
        orderInfo.altPhone = $.trim($(".address_phone em").eq(2).html()),
        orderInfo.uniID = uniID = $.cookie("uniID"),
        orderInfo.kcbcartInfo = $.cookie("KcbCarInfo");

        if (orderInfo.phone != null && orderInfo.phone != "") {
            var result = tools.checkMobile(orderInfo.phone);
            if (result.isCorrect == false) {
                var width = $(document.body).width();
                var height = $(window).height();
                var offtop = (height - 80) / 2 + "px";
                var offleft = (width - 200) / 2 + "px";
                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "200px",
                    ___height: "40px",
                    ___content: "text:<p style=\"color:#555;text-indent:2em;margin-top:15px;font-size:16px;font-weight:bold;padding:0 10px;\">手机号码错误</p>",
                    ___showbg: true,
                    ___offsets: { top: offtop, left: offleft }
                });
                return;
            }
        }

        //是否使用了开吃点
        if (kcbPointType != 0) {    //如果使用了开吃点
            orderInfo.kcbPointCount = parseFloat($("#trade_success em").html()) * 10;
        }
        $trigger.attr("disabled", "disabled");  //让按钮无法点击
        orderInfo.isSendMessage = 0; //不在使用发送信息
        //是否使用了优惠码
        //当选择优惠码优惠，但验证优惠码失败时。不让下单
        //PayType=3为正常使用的优惠码，PayType=4为推荐餐厅用的优惠码
        //优惠码标识为-14表示验证失败，为0表示还未验证优惠码
        if (voucherType != 0) {
            if (voucherPrice == "-14") {
                ShowMessage("无效的优惠码！");
                $trigger.removeAttr("disabled");
                return false;
            }
            else if (voucherPrice == "0") {
                ShowMessage("还未验证优惠码");
                $trigger.removeAttr("disabled");
                return false;
            }
            else {
                orderInfo.ticketID = voucherCode;
                orderInfo.voucherPrice = parseFloat(voucherPrice);
            }
        }
        orderInfo.kcbPointType = kcbPointType;
        orderInfo.voucherType = voucherType;
        orderInfo.couponPrice = couponPrice;
        // orderInfo.originalPrice = originalPrice;
        orderInfo.fullPrice = fullPrice;
        orderInfo.deliveryFee = $("#h_deliveryFee").val();
        var sendTime = $("#input_time").html(),
        sendNotes = $("#leave_message_box").val();
        if (sendNotes == "给餐厅留言") {
            sendNotes = "";
        }

        var isSupportReservation = $("#h_isSupportReservation").val();
        var isFeatured = $("#h_isFeatured").val();
        if (isFeatured == 1) {
            if ($("#h_isKey1").val() == 1) {
                sendTime = sendTime.substring(0, 5) + "送达";
            } else {
                if (sendTime == "立即送出") {
                    sendTime = "";
                } else {
                    sendTime = sendTime.substring(0, 5) + "送出";
                }
            }
            orderInfo.notes = sendNotes + sendTime;
        } else {
            if (isSupportReservation == 1 || isSupportReservation == "1") {
                //选择了送出时间，则判断该餐厅当前是否为预定模式
                orderInfo.reservationSendTime = sendTime; //预定送出时间
                sendTime = sendTime.substring(0, 5) + "送出";
                orderInfo.notes = sendNotes + sendTime;
            } else {
                //非预定餐厅，备注设置送出时间
                if (sendTime == "立即送出") {
                    sendTime = "";
                }
                else {
                    sendTime = sendTime.substring(0, 5) + "送出";
                }
                orderInfo.notes = sendNotes + sendTime;
            }
        }

        //匿名注册
        if (tools.IsEmpty(orderInfo.userID) || parseInt(orderInfo.userID) <= 0) {
            orderInfo.userID = anonymous(orderInfo.phone);
            if (parseInt(orderInfo.userID) < 0) {
                ShowMessage("系统繁忙，暂时无法下单，您可以刷新页面再尝试下单");
                $trigger.removeAttr("disabled");
                return false;
            }
        }

        $trigger.css({
            "background-position": "left bottom",
            "color": "#818181"
        }).val("正在提交").attr("disabled", "disabled");  //让按钮无法点击

        //如果标识为新添地址，则在该用户送餐信息添加新记录
        if (IsNewAddress == 1) {
            contectInfo.userID = orderInfo.userID;
            contectInfo.address = orderInfo.address;
            contectInfo.phone = orderInfo.phone;
            contectInfo.altPhone = orderInfo.altPhone;
            contectInfo.isDefault = 1;
            params.url = "/ajax/ContactInfo/AddNewContactInfo.ashx";
            params.type = "POST";
            params.data = contectInfo;
            params.success = function () { };
            tools.ajax(params);
        }
        //提交订单


        $.post("/ajax/Order/SendOrder.ashx", orderInfo, function (result) {

            var flag = "";
            switch (result) {
                case "-1":
                case "-2":
                    {
                        ShowMessage("订单信息不真实！");
                        flag = "1"; break;
                    }
                case "-3":
                    {
                        ShowMessage("餐厅不在正常营业时间内！");
                        flag = "1"; break;
                    }
                case "-4":
                    {
                        ShowMessage("订单总金额未到餐厅起送价！");
                        flag = "1"; break;
                    }
                case "-5":
                    {
                        ShowMessage("开吃点数据不真实！");
                        break;
                    }
                case "-6":
                    {
                        break;
                    }
                case "-10":
                case "-11":
                case "-12":
                    {
                        ShowMessage("系统异常！");
                        flag = "1"; break;
                    }
                case "-13": { $(".validRs").html("验证码错误"); flag = "1"; break; }
                case "-14":
                    {
                        ShowMessage("优惠码无效！");
                        flag = "1"; break;
                    }
                case "-15":
                    {
                        ShowMessage("该餐厅不是推荐餐厅，请重新下单！");
                        window.location = "/area/" + uniID;
                        flag = "1"; break;
                    }
                case "-16":
                    {
                        ShowMessage("优惠码价格！");
                        flag = "1";
                        break;
                    }
                case "-17":
                    {
                        ShowMessage("满减价格数据有误！");
                        flag = "1";
                        break;
                    }
                case "-18":
                    {
                        ShowMessage("菜品数据有误！");
                        flag = "1";
                        break;
                    }
                case "-19":
                    {
                        ShowMessage("订单价格不真实！");
                        flag = "1";
                        break;
                    }
                case "-20":
                    {
                        ShowMessage("配送费数据有误！");
                        flag = "1";
                        break;
                    }
                case "-30":
                    {
                        ShowMessage("订单原价未到使用优惠码的最低金额！");
                        flag = "1";
                        break;
                    }
                default:
                    {
                        if (result == null || result == "") {
                            ShowMessage("下单失败，请重新点击确认下单按钮！");
                            flag = "1";
                        }
                        else if (parseInt(result) > 0) {
                            if (voucherType == 2) {
                                $.cookie("recommendVoucher", null, { path: "/", expires: -1 });
                                $.cookie("recommendSup", null, { path: "/", expires: -1 });
                            }
                            if (orderInfo.payType == 0)//餐到付款
                            {
                                location.href = "/order/success/" + result + "?isphoneregist=" + $("#isphoneregist").val();
                            }
                            if (orderInfo.payType == 1) {
                                location.href = "/order/payonline/" + result + "?isphoneregist=" + $("#isphoneregist").val();
                            }
                        }
                        break;
                    }
            }
            if (flag == "1") {
                $trigger.val("确认下单").css({
                    "background": "url(../image/base/button-big.png)",
                    "color": "#963"
                });
                $trigger.removeAttr("disabled");
            }
        }, "text");
    });


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

    //支付
    $('#offPay').click(function () {

        $('#onlinePay').attr("data", 0);
        $('#onlinePay').removeClass("active_btn");
        alertcss('offPay');
    });

    $('#onlinePay').click(function () {
        $('#offPay').attr("data", 0);
        $('#offPay').removeClass("active_btn");
        alertcss('onlinePay');
    });

    function alertcss(id) {
        var data = $("#" + id).attr("data");
        if (data == "0") {
            $("#" + id).addClass("active_btn");
            $("#" + id).attr("data", "1");
        }
    }

    function checkLogin() {
        var a = $("#h_isRegist").val();
        if (a == 0 || a == "0") {
            $.XYTipsWindow({ ___title: "开吃吧提示", ___drag: "___boxTitle", ___width: "400px", ___height: "100px", ___content: "id:unlogin", ___showbg: true });
            return false;
        } else {
            return true;
        }
    };

    $("#bind_info h3").click(function () {
        if ($(this).parent().find("input[name='bind']").val() == 1) {
            $(".bind1").show();
            $(".bind2").hide();
        } else {
            $(".bind2").show();
            $(".bind1").hide();
        }
        $(this).parent().find("input[name='bind']").attr("checked", true);
    });

    //设置选中的时间
    if ($.cookie("osendtime") != null && $.cookie("osendtime") != "" && $("#h_isFeatured").val() == 1 && $("#h_isKey1").val() == 1) {
        var ost = $.cookie("osendtime");
        $("#input_time").text(ost);
    }

});

function showMinRegist() {
    $(".minLoginBg,.minLogReg").css("display", "block");

    var addphone = $.trim($(".address_phone em").eq(1).html());

    $("#bind_phone").val(addphone);

    $("#loginAccount").val(addphone);
    $("#txtValidateCode").val("");
    $("#input_valid").val("");

    //验证手机号是否已经注册过
    //验证手机是否绑定
    var params = {};
    var result;
    params.type = "POST";
    params.async = false;
    params.url = "/ajax/CheckCodeToPhone/CheckMobileIsBind.ashx";
    params.data = { phone: addphone, userID: "0" };
    params.dataType = "text";
    params.success = function (data) {
        result = data;
    };
    tools.ajax(params);
    if (result != "1") {
        $("input[name='bind'][value='1'").trigger("click");
    } else {
        $("input[name='bind'][value='2'").trigger("click");
    }

    $("#bind_phone").focus();
}

//用户检验并登录
function AccountLogin() {
    var account = $("#loginAccount").val();
    var password = $("#loginPassword").val();
    var result = LoginCheck(account, password);
    if (!result.isCorrect) {
        //登录失败处理
        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + result.message + "</p>",
            ___showbg: true,
            ___time: 1800
        });
    }
    else {
        $("#h_isRegist").val("1");
        $.XYTipsWindow({
            ___title: "开吃吧提示",
            ___drag: "___boxTitle",
            ___width: "300px",
            ___height: "100px",
            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">登录成功</p>",
            ___showbg: true,
            ___time: 1800
        });
        //登录成功后直接点击下单按钮
        //        $("#sendOrder").trigger("click");

        this.location.href = this.location.href;
    }
}

function LoginCheck(account, password) {

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
}

