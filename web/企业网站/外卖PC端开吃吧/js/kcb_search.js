//去掉搜索关键字的空格
function Trim(text) {
    //去掉字符串中的空格
    while (text.indexOf(" ") != -1) {

        text = text.replace(" ", "");
    }
    return text;
    //end
}

//点击搜索按钮调用searchClick
var isSupplier = false;
function searchClick() {
    if (isSupplier == true) {//如果是在餐厅也，则不跳转
        return;
    }
    var keyword = $("#keyword").val();
    keyword = Trim(keyword);
    location.href = 'search.html?keyword=' + escape(keyword);

}
//输入内容按Enter键调用enterIn
var lis = $('#searchRes li').has('a'),
		nowIndex = -1;
function enterIn(evt) {
    evt = evt ? evt : (window.event ? window.event : null); //兼容IE和FF
    if (evt.keyCode == 13) {
        if ($('#searchRes li.active').length != 0) {
            var thisA = $('#searchRes li.active').eq(0).find('a').eq(0);
            if (thisA.attr("food_id") != '') {
                $.cookie("searchFoodId", thisA.attr("food_id"), {
                    path: "/",
                    expires: 1
                });
            }
            location.href = thisA.attr('href');
        } else {
            searchClick();
        }
    } else if (evt.keyCode == 38) {
        if (nowIndex > 0) {
            $(lis[nowIndex]).removeClass('active');
            nowIndex--;
            $(lis[nowIndex]).addClass('active');
        } else if (nowIndex == 0) {
            $(lis[nowIndex]).removeClass('active');
            nowIndex = -1;
        } else { }
    } else if (evt.keyCode == 40) {
        if (nowIndex < 0) {
            nowIndex++;
            $(lis[nowIndex]).addClass('active');
        } else if (nowIndex < lis.length - 1) {
            $(lis[nowIndex]).removeClass('active');
            nowIndex++;
            $(lis[nowIndex]).addClass('active');
        } else { }
    } else { }
}


$(document).ready(function () {
    //显示隐藏菜品
    $(".showAll").click(
		function () {
		    var $p = $(this).parent().parent();
		    var d = $(this).attr("data-id");
		    if (d == 0) {
		        $p.find("ul.resultFood_list2").css("display", "block");
		        $p.find("a.showAll").html("收起全部" + $(this).attr("data-num") + "个");
		        $(this).attr("data-id", 1);
		    } else {
		        $p.find("ul.resultFood_list2").css("display", "none");
		        $p.find("a.showAll").html("显示全部" + $(this).attr("data-num") + "个");
		        $(this).attr("data-id", 0);
		    }
		});

    //转到菜品所属餐厅
    $(".resultFood").bind("click", function () {
        var $trigger = $(this),
		        searchFoodId = $trigger.attr("data-id"),
        //获取餐厅ID字符串 
                supId = $trigger.parent().parent().find("div .resultRst").find(".resultRst_title a").attr("data-id");
        var regexp = new RegExp("^[0-9]*$"); //判断是否为数字，是为餐厅页
        if (regexp.test(searchFoodId)) {
            $.cookie("searchFoodId", searchFoodId, {
                path: "/",
                expires: 1
            });
        }
        window.location.href = "/shop/" + supId;
    });





    var url = window.location.href;

    function serchFood(supplierid) {

        if ($("#keyword").val() != "") {

            var flag = 0;
            $(".foodListItem").each(function () {
                if ($(this).attr("food-foodname").indexOf(Trim($("#keyword").val())) != -1) {
                    if (flag == 0) {
                        $(".foodList").hide(); //隐藏整个类别的菜品
                        $(".foodListItem").hide(); //隐藏菜品
                        flag = 1;
                    }

                    $(this).parent().parent(".foodList").show(); //显示每个类别的菜品
                    $(this).show(); //显示该菜品
                }
            });





            //            $.ajax({
            //                url: '/ajax/Food/SerchFoodByKey.ashx',
            //                data: { "key": Trim($("#keyword").val()), "SupplierID": supplierid },
            //                success: function (data) {
            //                    console.log(data);
            //                    if (data != "") {
            //                        $(".foodList").hide(); //隐藏整个类别的菜品
            //                        $(".foodListItem").hide(); //隐藏菜品
            //                        var SupplierIDList = data.split(",");
            //                        for (var i = 0; i < SupplierIDList.length; i++) {
            //                            ShowFindFood(SupplierIDList[i]);
            //                        }
            //                    }
            //                }
            //            });
        }
    }
    //显示找到的菜品
    function ShowFindFood(foodid) {
        var cho = $(".foodListItem[food-foodid='" + foodid + "']");
        cho.parent(".foodList").show();
        cho.show();
        //            if ($(this).attr("food-foodid") == foodid.toString()) {
        //                $(this).parent(".foodList").show(); //显示每个类别的菜品
        //                $(this).show(); //显示所有菜品
        //            }
        //        
    }


    var reg = new RegExp("(http://kaichiba.com/shop/)(\\d+)", "gmi");
    var reg1 = new RegExp("(http://kaichiba.com/shop/)(\\d+)#", "gmi");
    var SupplierID = url.replace(reg, "$2");
    var SupplierID1 = url.replace(reg1, "$2");
    SupplierID1 = SupplierID1.replace("#", "");
    var regexp = new RegExp("^[0-9]*$"); //判断是否为数字，是为餐厅页
    if (regexp.test(SupplierID) || regexp.test(SupplierID1)) {
        $("#search .serch_btn_a").after("<span class='search_this_shop'>搜本店<em>×</em></span>");
        $('#keyword').addClass('this_shop');
        isSupplier = true;
    }
    else {
        isSupplier = false;
    }
    $("#keyword").live("input", function () {
        if ($(".search_this_shop").length > 0) {
            if ($("#keyword").val() == "") {
                $(".foodList").show();
                $(".foodListItem").show();
            }
            setTimeout(serchFood(SupplierID), 10);
        }
        else {
            SerchFoodAndSupplier();
        }
    });
    //去掉搜本地
    $('.search_this_shop em').click(function () {
        $('.search_this_shop').remove();
        $('#keyword').removeClass('this_shop');
        isSupplier = false;
    });



    //绑定鼠标点击事件，不在搜出的菜品列表上，则隐藏菜品列表
    $(document).live("click", function (e) {
        if ($(".searchRes").length) {
            var HeightsearchRes = $(".searchRes").height();
            var WidthsearchRes = $(".searchRes").width();
            var OffsetleftsearchRes = $(".searchRes").offset().left;
            var OffsettopsearchRes = $(".searchRes").offset().top;
            var MouseX = e.clientX;
            var MouseY = e.clientY;

            if (MouseY > HeightsearchRes + OffsettopsearchRes || MouseY < 0 || MouseX < OffsetleftsearchRes || MouseX > WidthsearchRes + OffsetleftsearchRes) {
                $(".searchRes").hide();
            }
        }
    });

    $(".search_all").live("click", function () {
        searchClick();
    });

});

function SerchFoodAndSupplier() {
    if ($("#keyword").val() != "") {

        var key = $("#keyword").val();
        key = Trim(key);
        $.ajax({
            url: '/ajax/Food/SerchFoodAndSupplierByKey.ashx',
            data: { 'key': key },
            success: function (data) {
                if (key == "") { $(".searchRes").hide(); return; }
                $(".searchRes").html("");
                $(".searchRes").html(data).show();
                lis = $('#searchRes li').has('a');       //初始化下拉变量
                nowIndex = -1;                                 //初始化下拉变量
                $(".searchRes .serch_fooid").click(function () {//点击菜品后跳到餐厅页后并点餐
                    var searchFoodId = $(this).attr("food_id");
                    $.cookie("searchFoodId", searchFoodId, {
                        path: "/",
                        expires: 1
                    }); //将菜品的ID保存在searchFoodIdcookie中。跳转后会自动点餐
                });
            }
        });
    }
    else { $(".searchRes").html("").hide(); }
}