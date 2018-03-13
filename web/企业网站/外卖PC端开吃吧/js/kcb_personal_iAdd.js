var regExpMobile = new RegExp("^1[0-9]{10}"),
    regex = /^[0-9\-]*$/,
    userID = $.cookie("userID"),
    s = new tool();
//验证送餐信息
function checkDelivery(addr, phone, altphone) {
    var result = "";
    if (addr == null || addr == "") {
        $("#NewAddress").next().removeClass("focusTips").addClass("logTips").html("送餐地址不能为空");
        result = false;
    } 
    if (phone == null || phone == "") {
        $("#NewPhone").next().removeClass("focusTips").addClass("logTips").html("手机号码不能为空");
        result = false;
    }
    if (!s.checkMobile(phone).isCorrect) {
        $("#NewPhone").next().removeClass("focusTips").addClass("logTips").html(s.checkMobile(phone).message);
    }
    if (s.checkMobile(phone).isCorrect) {
        result = true;
    }
    if (altphone != null && altphone != "") {
        //如果备选手机存在则判断备选手机
        var newAltPhone = altphone;
        var result = "";
        result = s.checkMobile(newAltPhone);
        if (result.isCorrect == false) {
            result = s.checkPhone(newAltPhone);
            if (result.isCorrect == false) {
                $("#NewAltPhone").next().removeClass("focusTips").addClass("logTips").html(result.message);
                return false;
            }
            else {
                $("#NewAltPhone").next().removeClass("logTips").addClass("focusTips").html(result.message);
            }
        }
        else {
            $("#NewAltPhone").next().removeClass("logTips").addClass("focusTips").html(result.message);
        }
    }
    return result;
}

//保存新增送餐信息
function saveDeliveryFoodTel() {
    var newAddress = $.trim($("#NewAddress").val()),
        newPhone = $.trim($("#NewPhone").val()),
        newAltPhone = $.trim($("#NewAltPhone").val());
    if (checkDelivery(newAddress, newPhone, newAltPhone)) {
        var params = "NewAddress=" + newAddress + "&NewPhone=" + newPhone + "&NewAltPhone=" + newAltPhone;
        $.ajax({
            url: '../ajax/ContactInfo/AddDeliveryFood.ashx',
            data: params,
            dataType: 'json',
            success: function (data) {
                if (data.Status) {
                    var row = "<tr><td type='address'>" + newAddress + "</td><td class='td_center' type='phone'>" + newPhone + "</td><td  class='td_center' type='AlternatePhone'>" + newAltPhone + "</td><td><a class=\"to_default\" href=\"javascript:;\">设为默认</a> <span style=\"display: none;\">" + data.id + "</span><a href=\"#\" class=\"change\">修改</a><a href=\"#\" class=\"del\">删除</a></td></tr>";
                    $("#NewAddress,#NewPhone,#NewAltPhone").val("");
                    $("#tbDeliveryInfo").append(row);
                }
                else {
                    
                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">" + data.Info + "！</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                }
                setHeight($("#pMenu"), $("#pCenter"));
                $("#NewAddress").next().html("请详细一点");
                $("#NewPhone").next().html("外卖到时将以该电话通知您");
                $("#NewAltPhone").next().html("为方便送餐员联系，请再留一个备用电话");
            },
            error: function (data) {
            }
        });
    }
}

//设置默认地址
function setDefaultAddr(obj) {
    var $trigger = $(obj).parent();
    var address = $.trim($trigger.siblings("[type=\"address\"]").html()); //要修改的地址
    var phone = $.trim($trigger.siblings("[type=\"phone\"]").html());   //要修改的电话 
    var altphone = $.trim($trigger.siblings("[type=\"AlternatePhone\"]").html()); //要修改的备注电话
    var userContactInfoID = $.trim($(obj).next().html());
    var userID = $.cookie("userID");

    $.ajax({
        type: "POST",
        url: "../ajax/ContactInfo/ChangeContactInfo.ashx",
        data: { userContactInfoID: userContactInfoID, userID: userID, address: address, phone: phone, altphone: altphone, isDefault: "1" },
        success: function (data) {
            if (data == 1) {
                $(".default").removeClass("default").addClass("to_default").html("设为默认");
                $trigger.children(".to_default").removeClass("to_default").addClass("default").html("默认信息");
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
}

//修改地址
function changeAddr(obj) {
    var $trigger = obj.parent().siblings(),
        address = $trigger.filter("[type=\"address\"]").html(), //要修改的地址
        phone = $trigger.filter("[type=\"phone\"]").html(), //要修改的电话
        altphone = $trigger.filter("[type=\"AlternatePhone\"]").html(), //要修改的备注电话
        userContactInfoID = obj.prev().html();

    //填充数据
    $(".chg_add .changeAddr").val($.trim(address));
    $(".chg_add .changeTel").val($.trim(phone));
    $(".chg_add .changeAltTel").val($.trim(altphone));

    $.XYTipsWindow({   //弹窗
        ___title: "修改送餐信息",
        ___drag: "___boxTitle",
        ___width: "400px",      //宽度
        ___height: "180px",
        ___content: "id:hideChg",   //弹出层内容
        ___button: ["确定"],
        ___showbg: true,    //显示遮罩层
        ___time: 300000,
        ___callback: function () {
            //判断修改时是否设为默认
            var isDefault,
                newAddr = $(".chg_add .changeAddr").val(),
                newPhone = $(".chg_add .changeTel").val(),
                newAltPhone = $(".chg_add .changeAltTel").val();

            if ($(".chg_add .chkDefault").attr("checked")) {
                isDefault = 1;
            } else {
                isDefault = 0;
            }

            if (newAddr == "" || newAddr == null) {
                //parent.$.XYTipsWindow.removeBox();
                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">送餐地址不能为空!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                //alert("a");
                return false;
            }
            if (newPhone == "" || newPhone == null) {

                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">联系电话不能为空!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                return false;
            }

            //判断联系电话
            if (!regExpMobile.exec(newPhone)) {

                $.XYTipsWindow({
                    ___title: "开吃吧提示",
                    ___drag: "___boxTitle",
                    ___width: "300px",
                    ___height: "100px",
                    ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">联系电话格式错误(必须是手机号码)!</p>",
                    ___showbg: true,
                    ___time: 1800
                });
                return false;
            }

            //如果备选手机存在则判断备选手机
            if (newAltPhone.length > 0) {
                if (!regExpMobile.exec(newAltPhone)) {
                    if (newAltPhone.length < 7 || newAltPhone.indexOf("1") == 0 || !regex.test(newAltPhone)) {
                        $.XYTipsWindow({
                            ___title: "开吃吧提示",
                            ___drag: "___boxTitle",
                            ___width: "300px",
                            ___height: "100px",
                            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">备选手机格式错误!</p>",
                            ___showbg: true,
                            ___time: 1800
                        });
                        return false;
                    }
                }
                else if (newAltPhone.length != 11) {

                    $.XYTipsWindow({
                        ___title: "开吃吧提示",
                        ___drag: "___boxTitle",
                        ___width: "300px",
                        ___height: "100px",
                        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">备选手机格式错误!</p>",
                        ___showbg: true,
                        ___time: 1800
                    });
                    return false;
                }
            }

            $.ajax({
                type: "POST",
                url: "../ajax/ContactInfo/ChangeContactInfo.ashx",
                data: { userContactInfoID: userContactInfoID, userID: userID, address: newAddr, phone: newPhone, altPhone: newAltPhone, isDefault: isDefault },
                success: function (data) {
                    if (data == 1) {
                        parent.$.XYTipsWindow.removeBox();  //修改成功后关闭弹窗  

                        $.XYTipsWindow({
                            ___title: "开吃吧提示",
                            ___drag: "___boxTitle",
                            ___width: "300px",
                            ___height: "100px",
                            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">修改成功!</p>",
                            ___showbg: true,
                            ___time: 1800
                        });

                        $trigger.filter("[type=\"address\"]").html(newAddr); //要修改的地址
                        $trigger.filter("[type=\"phone\"]").html(newPhone); //要修改的电话
                        $trigger.filter("[type=\"AlternatePhone\"]").html(newAltPhone); //要修改的备注电话
                        if (isDefault == 1) {
                            $(".default").removeClass("default").addClass("to_default").html("设为默认");
                            $trigger.siblings().children(".to_default").removeClass("to_default").addClass("default").html("默认信息");
                        } else {
                            $trigger.siblings().children(".default").removeClass("default").addClass("to_default").html("设为默认");
                        }

                    } else {
                        $.XYTipsWindow({
                            ___title: "开吃吧提示",
                            ___drag: "___boxTitle",
                            ___width: "300px",
                            ___height: "100px",
                            ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">修改失败!</p>",
                            ___showbg: true,
                            ___time: 1800
                        });
                    }
                }
            });
        }

    });
}

//删除地址
function deleteAddr(obj) {
    var $tirgger = obj,
        userContactInfoID = $tirgger.prev().prev().html();

    $.XYTipsWindow({
        ___title: "开吃吧提示",
        ___drag: "___boxTitle",
        ___width: "300px",
        ___height: "100px",
        ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">您确定要删除该地址吗？</p>",
        ___button: ["确定", "取消"],
        ___showbg: true,
        ___callback: function (val) {
            if (val == "确定") {
                $.ajax({
                    type: "POST",
                    url: "../ajax/ContactInfo/DeleteContactInfoByID.ashx",
                    data: { userContactInfoID: userContactInfoID },
                    success: function (data) {
                        if (data == 1) {
                            if ($tirgger.siblings(".default").length > 0 && $tirgger.siblings(".default").html() == "默认信息") {
                                var last = $tirgger.parents("tr").next();
                                if (last.length <= 0)
                                    last = $tirgger.parents("tr").prev();
                                if (last.length > 0) {
                                    var setObj = last.children("td").children(".to_default");
                                    setDefaultAddr(setObj);
                                }
                            }
                            $tirgger.parents("tr").remove();
                            setHeight($("#pMenu"), $("#pAccount"));
                            parent.$.XYTipsWindow.removeBox();  //关闭弹窗
                        } else {
                            $.XYTipsWindow({
                                ___title: "开吃吧提示",
                                ___drag: "___boxTitle",
                                ___width: "300px",
                                ___height: "100px",
                                ___content: "text:<p style=\"color:#555;text-align: center;margin-top:40px;font-size:16px;font-weight:bold;\">删除失败!</p>",
                                ___showbg: true,
                                ___time: 1800
                            });
                            parent.$.XYTipsWindow.removeBox();
                        }
                    }
                });
            }
        }

    });
}


$(document).ready(function () {
    //增加送餐信息时验证
    $("#NewAddress").blur(function () {
        var $trigger = $(this),
            tipInfo = $.trim($trigger.val());
        if (tipInfo == null || tipInfo == "") {
            $trigger.next().removeClass("focusTips").addClass("logTips").html("送餐地址不能为空");
        }
        else {
            $trigger.next().removeClass("logTips").addClass("focusTips").html("地址正确");
        }
    });
    $("#NewPhone").blur(function () {
        var $trigger = $(this),
            val = $.trim($trigger.val());
        if (!s.checkMobile(val).isCorrect) {
            $trigger.next().removeClass("focusTips").addClass("logTips").html(s.checkMobile(val).message);
        }
        else {
            $trigger.next().removeClass("logTips").addClass("focusTips").html(s.checkMobile(val).message);
        }
    });
    $("#NewAltPhone").blur(function () {
        var $trigger = $(this);
        if (!s.IsEmpty($trigger.val())) {
            //如果备选手机存在则判断备选手机
            var newAltPhone = $trigger.val();
            var result = "";
            result = s.checkMobile(newAltPhone);
            if (result.isCorrect == false) {
                result = s.checkPhone(newAltPhone);
                if (result.isCorrect == false) {
                    $trigger.next().removeClass("focusTips").addClass("logTips").html(result.message);
                    return false;
                }
                else {
                    $trigger.next().removeClass("logTips").addClass("focusTips").html(result.message);
                }
            }
            else {
                $trigger.next().removeClass("logTips").addClass("focusTips").html(result.message);
            }
        }
        else {
            $trigger.next().removeClass().html("");
        }
    });

    //修改事件
    $(".change").live('click', function () { changeAddr($(this)); });
    //默认地址
    $('.to_default').live('click', function () { setDefaultAddr(this); });
    //删除地址
    $(".del").live('click', function () { deleteAddr($(this)); });
    //保存新增送餐信息
    $("#saveNewAddr").bind('click', function () { saveDeliveryFoodTel(); });
    //折叠新增送餐信息
    $("#newInfo .fold_sign").live('click', function () {
        var $trigger = $(this);
        if ($trigger.hasClass("fsign_down")) {
            $trigger.removeClass("fsign_down").addClass("fsign_up");
        }
        else {
            $trigger.removeClass("fsign_up").addClass("fsign_down");
        }
        $("#newInfo .ac_content").toggle();
    });
})