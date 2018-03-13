$(document).ready(function () {
    var main_Top = $("#left").offset().top;
    // 这行是 Opera 的补丁, 少了它 Opera 是直接用跳的而且画面闪烁 by willin
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    //这行代码是控制餐厅页顶部送餐时间的div与整个顶部div高度一致，
    $("#shopOverall").children("div").eq(1).height($("#shopOverall").height());

    //点击菜品类型
    $("#FoodTypeList li").click(function () {
        $("#keyword").val("");
        var foodtypeid = $(this).attr("id");
        //如果选择全部菜品，则全部显示
        if (foodtypeid == 0) {
            $(".foodList").show(); //隐藏整个类别的菜品
            $(".foodListItem").show(); //隐藏菜品
            $(".foodsort").hide();
            $(".foodsort:first").show();
            $(".foodsort h3").css("width", "680px");
            $(".foodsort h3:first").css("width", "480px");
        }
        else {
            //遍历每个类别，显示当前选择的类别 ，其他隐藏
            $(".foodList").each(function () {
                if ($(this).find("h3").attr("FoodTypeID") == foodtypeid) {
                    $(".foodList").hide();
                    $(this).show();
                    $(this).find(".foodListItem").show();
                    $(this).find(".foodsort").show();
                    $(this).find("h3").css("width", "480px");
                }
            });
        }
        //$("#foodTypeID").val($(this).attr("id"));
        //显示选择的类别
        $(this).parent().find(".active").removeClass("active");
        $(this).addClass("active");
    });
    $("li .saleup").prev("span").remove();
    //价格和销量字体颜色改变
    $(".foodsort .price").hover(function () {
        $(this).css("color", "#f58b64");
    }, function () {
        $(this).css("color", "#7d7d7d");
    });
    $(".foodsort .sales-volume").hover(function () {
        $(this).css("color", "#f58b64");
    }, function () {
        $(this).css("color", "#7d7d7d");
    });
    //价格排序
    $(".foodsort .price").click(function () {

        function compactPrice(v1, v2) {

            var n1 = parseFloat(v1.p),
                n2 = parseFloat(v2.p);

            if (n1 < n2) {
                return -1;
            } else if (n1 > n2) {
                return 1;
            } else {
                return 0;
            }
        }

        //设置排序类型选中
        $(".foodsort a").removeClass("active");
        $(this).addClass("active");

        var lists = $(".foodList");
        for (var j = 0; j < lists.length; j++) {

            var $parent = $(lists[j]);  //foodList clearfix
            var foodListTag = $parent.find(".foodListItem");

            var arr = new Array();

            for (var i = 0; i < foodListTag.length; i++) {
                var sortObj = {};
                sortObj.i = i;
                sortObj.p = $(foodListTag[i]).attr("food-price");
                sortObj.s = foodListTag[i].outerHTML;
                sortObj.t = foodListTag[i].tagName;
                arr.push(sortObj);
            }
            foodListTag = arr.sort(compactPrice);

            $parent.find("table:first tbody").html("");
            $parent.find(".foodListNonImg").html("");

            var imgNum = 0;
            for (var i = 0; i < foodListTag.length; i++) {
                if (foodListTag[i].t == "TD") {
                    //如果是有图片的菜品
                    if (imgNum == 0) {
                        $parent.find("table:first tbody").append("<tr></tr>");
                    }
                    if (++imgNum % 3 == 0) {
                        imgNum = 0;
                    }
                    $parent.find("table:first tbody:last-child").append(foodListTag[i].s);
                } else {
                    $parent.find(".foodListNonImg").append(foodListTag[i].s);
                }
            }
        }
    });

    //销量排序
    $(".foodsort .sales-volume").click(function () {

        function compactAmount(v1, v2) {

            var n1 = parseFloat(v1.a),
                n2 = parseFloat(v2.a);

            if (n1 < n2) {
                return 1;
            } else if (n1 > n2) {
                return -1;
            } else {
                return 0;
            }
        }

        //设置排序类型选中
        $(".foodsort a").removeClass("active");
        $(this).addClass("active");

        var lists = $(".foodList");
        for (var j = 0; j < lists.length; j++) {

            var $parent = $(lists[j]); //foodList clearfix

            var foodListTag = $parent.find(".foodListItem");

            var arr = new Array();

            for (var i = 0; i < foodListTag.length; i++) {
                var sortObj = {};
                sortObj.i = i;
                sortObj.a = $(foodListTag[i]).attr("food-amount");
                sortObj.s = foodListTag[i].outerHTML;
                sortObj.t = foodListTag[i].tagName;
                arr.push(sortObj);
            }
            foodListTag = arr.sort(compactAmount);
            $parent.find("table:first tbody").html("");
            $parent.find(".foodListNonImg").html("");

            var imgNum = 0;

            for (var i = 0; i < foodListTag.length; i++) {
                if (foodListTag[i].t == "TD") {
                    //如果是有图片的菜品
                    if (imgNum == 0) {
                        $parent.find("table:first tbody").append("<tr></tr>");
                    }
                    if (++imgNum % 3 == 0) {
                        imgNum = 0;
                    }
                    $parent.find("table:first tbody:last-child").append(foodListTag[i].s);
                } else {
                    $parent.find(".foodListNonImg").append(foodListTag[i].s);  //$('<div/>').append($(foodListTag[i]).clone(true)).html()
                }
            }
        }

    });

});

