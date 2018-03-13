var spiner = createSpinner();
var background = document.getElementById("background");
var spinerShow = function() {
    background.style.display = "block";
    spiner.spin(background);
    var a = parseInt(document.documentElement.clientHeight / 2);
    console.log("midScreen=" + a + ",type=" + typeof a);
    $("#background > div").css({position: "fixed", top: a})
};
var spinerHide = function() {
    background.style.display = "none";
    spiner.stop()
};
var addCartWare = function(h, d, g, c, f, e, b) {
    var a = "/cart/add.json?wareId=" + h + "&num=" + d + "&sid=" + $("#sid").val();
    a = appendSuit(a, g, c, f, e, b);
    spinerShow();
    jQuery.get(a, {}, function(i) {
        calcCartCheck(i, h);
        calcCartGifts(i, h);
        calcCartYanBao(i, h, c)
    })
};
var addCartWareDirect = function(h, d, g, c, f, e, b) {
    var a = "/cart/add.json?wareId=" + h + "&num=" + d + "&sid=" + $("#sid").val();
    a = appendSuit(a, g, c, f, e, b);
    jQuery.get(a)
};
var modifyWare = function(b, e, a, j, c, k, d) {
    var f;
    if ((!isBlank(a) && a != 4)) {
        f = j
    } else {
        f = b
    }
    var h = $("#num" + f).val();
    var i = $("#limitSukNum" + f).val();
    if (!/^\d+$/.test(h)) {
        alert("\u4fee\u6539\u6570\u91cf\u5931\u8d25\uff0c\u8bf7\u91cd\u8bd5");
        $("#num" + f).val(1);
        h = 1
    }
    if (Number(h) > i) {
        alert("\u4fee\u6539\u6570\u91cf\u5931\u8d25\uff0c\u8bf7\u91cd\u8bd5");
        $("#num" + f).val(i);
        h = i
    }
    if (Number(h) < 1) {
        alert("\u4fee\u6539\u6570\u91cf\u5931\u8d25\uff0c\u8bf7\u91cd\u8bd5");
        $("#num" + f).val(1);
        h = 1
    }
    if (h == 1) {
        $("#subnum" + f).addClass("disabled")
    }
    if (h < i) {
        $("#addnum" + f).removeClass("disabled")
    }
    if (h > 1) {
        $("#subnum" + f).removeClass("disabled")
    }
    if (h == i) {
        $("#addnum" + f).addClass("disabled")
    }
    $("#numerror" + b).text("");
    if (isBlank(e) || (!isBlank(a) && a == 4)) {
        e = $("#num" + b).val()
    } else {
        c = $("#num" + j).val()
    }
    var g = "ajax.php?wareId=" + b + "&num=" + e + "&sid=" + $("#sid").val();
    g = appendSuit(g, a, j, c, k, d);
    spinerShow();
    jQuery.get(g, {}, function(l) {
        calcCartCheck(l, b);
        calcCartGifts(l, b);
        $("span[name='suitSkuNum" + b + "']").text(h);
        pingClick(cartUse, "Shopcart_Amount", f, "modifyWare", "http://p.m.jd.com/cart/modify.action")
    })
};
var deleteWare = function(h, c, g, b, f, e, d) {
    if (confirm("\u786e\u5b9a\u5220\u9664\u5417\uff1f")) {
        var a = "/cart/remove.json?wareId=" + h + "&num=" + c + "&sid=" + $("#sid").val();
        a = appendSuit(a, g, b, f, e);
        spinerShow();
        jQuery.get(a, {}, function(l) {
            calcCartCheck(l, h);
            calcCartGifts(l, h);
            var i = b;
            if (d != "gift") {
                if (!g || g == 4) {
                    $("#product" + h).hide();
                    i = h
                } else {
                    var m = document.getElementsByName("item" + h);
                    var k = m.length;
                    if (k == 1) {
                        $("#product" + h).hide()
                    } else {
                        $("#product" + b).hide();
                        $("#hr" + b).hide();
                        if (m[k - 1].id == "product" + b) {
                            $("#hr" + m[k - 2].id.substring(7)).hide()
                        }
                        $("#product" + b).attr("name", "deleteitem" + h)
                    }
                }
            }
            var j = new Array();
            j[0] = i;
            pingCartDel(cartUse, "Shopcart_Delete", "", j)
        })
    }
};
var deleteWareDirect = function(h, c, g, b, f, e, d) {
    var a = "/cart/remove.json?wareId=" + h + "&num=" + c + "&sid=" + $("#sid").val();
    a = appendSuit(a, g, b, f, e);
    jQuery.get(a)
};
var showChooseGifts = function(b, g, e, f, d, c) {
    if (b == "0") {
        var a = "/cart/check.json?wareId=" + g + "&num=" + $("#num" + g).val() + "&checked=5&sid=" + $("#sid").val();
        a = appendSuit(a, f, d, c);
        spinerShow();
        jQuery.get(a, {}, function(h) {
            calcCartCheck(h, g);
            document.getElementById("mask-con").innerHTML = document.getElementById("chooseGifts" + g).innerHTML;
            document.getElementById("chooseGifts" + g).innerHTML = "";
            appendant()
        })
    } else {
        document.getElementById("mask-con").innerHTML = document.getElementById("chooseGifts" + g).innerHTML;
        document.getElementById("chooseGifts" + g).innerHTML = "";
        appendant()
    }
};
var appendant = function() {
    var g, d, j, f, i, h = 0;
    function a() {
        i = document.body.scrollTop;
        $(".shp-cart-list").css({height: d}).addClass(".crop-list").hide();
        $(".shp-cart-list .cart-checkbox").hide();
        $(".shp-cart-icon-remove").css("display", "none");
        $(".shp-cart-list .cart-product-cell-1").css("visibility", "hidden");
        $("body").css({"padding-bottom": 0, width: "100%", height: d, overflow: "hidden", position: "relative"});
        $(window).bind("scroll", function(l) {
            l.preventDefault;
            return false
        })
    }
    function c() {
        $(".shp-cart-list .cart-checkbox").show();
        $(".shp-cart-icon-remove").css("display", "inline-block");
        $(".shp-cart-list .cart-product-cell-1").css("visibility", "visible");
        $("#mask").css({visibility: "hidden"});
        $("#mask-con").css({top: "1px"});
        $("body").css({"padding-bottom": 50, width: "100%", height: "auto", overflow: "auto"});
        $(".shp-cart-list").css({height: "auto"}).removeClass(".crop-list").show();
        window.scrollTo(0, i)
    }
    function k() {
        i = document.body.scrollTop;
        d = document.documentElement.clientHeight;
        g = document.documentElement.clientWidth;
        j = $("#mask .additional-list-container").height() + 15;
        f = (parseInt(d * 0.6) > j) ? j : parseInt(d * 0.6);
        if ($(".additional-item-title").length > 0) {
            f += $(".additional-item-title").height()
        }
        window.addEventListener("orientationchange", e)
    }
    function b() {
        $("#mask").css({visibility: "visible"});
        k();
        a();
        h = -(f + 42);
        setTimeout(function() {
            $("#mask .additional-list-wrapper").css({height: f, overflow: "auto"});
            $("#mask-con").css({top: h})
        }, 100);
        $("#mask .btn-jd-red").bind("click", function(l) {
            c()
        })
    }
    function e() {
        if ($("#mask").css("visibility") == "hidden") {
            return
        }
        var l = 0;
        switch (window.orientation) {
            case -90:
            case 90:
                setTimeout(function() {
                    b()
                }, 300);
                break;
            default:
                setTimeout(function() {
                    b()
                }, 300);
                break
        }
        return l
    }
    b()
};
function resizePriseFontSize() {
    $(".shp-cart-item-price").each(function() {
        var a = $(this).html();
        var b = a.replace(/\,/g, "");
        $(this).html(b);
        if (b.length > 10 && b.length <= 12) {
            $(this).addClass("priceSizeMid")
        } else {
            if (b.length > 12) {
                $(this).addClass("priceSizeSmall")
            }
        }
    })
}
function resizeBottomPriseFontSize() {
    var a = 0;
    $(".bottom-bar-price").each(function() {
        var b = $(this).html();
        if (b.length > 10) {
            $(this).addClass("priceSizeMid");
            a = 1
        } else {
            if (a == 1) {
                $(this).addClass("priceSizeMid")
            }
        }
    })
}
var showGifts = function(b) {
    var a = "/cart/cart.json?sid=" + $("#sid").val();
    spinerShow();
    jQuery.get(a, {}, function(c) {
        calcCartGifts(c, b)
    })
};
var hideChooseGifts = function(e) {
    if (Number($("#hidegiftSelectNum" + e).val()) > 0) {
        showGifts(e);
        $("#hr" + e).removeClass("diver-hr-dashed");
        $("#hr" + e).addClass("diver-hr-solid")
    }
    document.getElementById("mask").style.visibility = "hidden";
    document.getElementById("chooseGifts" + e).innerHTML = document.getElementById("mask-con").innerHTML;
    document.getElementById("mask-con").innerHTML = "";
    if (cartUse) {
        var c = "manzeng";
        if (Number($("#hidegiftSelectType" + e).val()) > 0) {
            c = "jiajiagou"
        }
        var a = document.getElementsByName("gift" + e);
        for (var b = 0; b < a.length; b++) {
            var d = a[b];
            if ($(d).hasClass("checked")) {
                pingCartAdd(cartUse, "MProductdetail_Addtocart", c, $("#giftId" + d.id).val() + "")
            }
        }
    }
};
var showChooseYanBao = function(b, g, e, f, d, c) {
    if (b == "0") {
        var a = "/cart/check.json?wareId=" + g + "&num=" + $("#num" + g).val() + "&checked=5&sid=" + $("#sid").val();
        a = appendSuit(a, f, d, c);
        spinerShow();
        jQuery.get(a, {}, function(h) {
            calcCartCheck(h, g);
            document.getElementById("mask-con").innerHTML = document.getElementById("chooseYanbao" + g + d).innerHTML;
            document.getElementById("mask-con").style.top = (document.documentElement.scrollTop || document.body.scrollTop) + 10 + "px"
        })
    } else {
        document.getElementById("mask-con").innerHTML = document.getElementById("chooseYanbao" + g + d).innerHTML;
        document.getElementById("chooseYanbao" + g + d).innerHTML = "";
        appendant();
        pingClick(cartUse, "Shopcart_Warranty", "", "showChooseYanBao", "http://p.m.jd.comcart.html")
    }
};
var hideChooseYanBao = function(b, a) {
    document.getElementById("mask").style.visibility = "hidden";
    document.getElementById("chooseYanbao" + b + a).innerHTML = document.getElementById("mask-con").innerHTML;
    document.getElementById("mask-con").innerHTML = ""
};
var selectGifts = function(f, e, g, b, a, d) {
    var c = 0;
    if ($("#" + f + b).hasClass("checked")) {
        c = Number($("#hidegiftSelectNum" + f).val()) - Number(a);
        $("#hidegiftSelectNum" + f).val(c);
        $("#giftSelectNum" + f).html(c);
        $("#" + f + b).removeClass("checked");
        deleteWareDirect(f, e, g, b, a, "", "gift")
    } else {
        c = Number($("#hidegiftSelectNum" + f).val()) + Number(a);
        if (c > d) {
            toaster("\u6362\u8d2d\u6570\u91cf\u5df2\u7ecf\u6ee1\u55bd~", "", true);
            return
        }
        $("#hidegiftSelectNum" + f).val(c);
        $("#giftSelectNum" + f).html(c);
        $("#" + f + b).addClass("checked");
        addCartWareDirect(f, e, g, b, a)
    }
};
var deleteGifts = function(d, c, e, b, a) {
    deleteWare(d, c, e, b, a, "", "gift")
};
var deleteYanBao = function(g, f, h, c, b, e, d) {
    var a = "/cart/removeYB.json?wareId=" + g + "&num=" + f + "&sid=" + $("#sid").val();
    a = appendSuit(a, h, c, b, e, d);
    jQuery.get(a)
};
var keydown = function(a) {
    $("#" + a).addClass("checked")
};
var changeSelected = function(b, h, a, m, o) {
    var n = 6;
    var l = b;
    if (a == undefined || a == 4) {
        l = b
    } else {
        l = m
    }
    var d = new Array();
    if ($("#checkIcon" + l).hasClass("checked")) {
        $("#checkIcon" + l).removeClass("checked");
        var d = new Array();
        if (cartUse) {
            try {
                if (a != undefined && a != 4) {
                    var f = document.getElementsByName("showgift" + b);
                    var c = f.length;
                    for (var g = 0; g < c; g++) {
                        d[g] = f[g].value + ""
                    }
                }
            } catch (j) {
            }
        }
    } else {
        $("#checkIcon" + l).addClass("checked");
        n = 5
    }
    var k = "/cart/check.json?wareId=" + b + "&num=" + h + "&checked=" + n + "&sid=" + $("#sid").val();
    k = appendSuit(k, a, m, o);
    spinerShow();
    jQuery.get(k, {}, function(e) {
        if (e != undefined) {
            calcCartCheck(e, b);
            calcCartGifts(e, b);
            spinerHide();
            if (d != "") {
                pingCartDel(cartUse, "Shopcart_Delete", "", d)
            }
        } else {
            if ($("#checkIcon" + b).hasClass("checked")) {
                $("#checkIcon" + b).removeClass("checked")
            } else {
                $("#checkIcon" + b).addClass("checked")
            }
        }
    })
};
var calcCartCheck = function(n, b) {
    try {
        if (!isBlank(n.cart)) {
            n = n.cart;
            var f = n.Price - n.Discount;
            var c = f - n.RePrice;
            document.getElementById("cart_oriPrice").innerHTML = f.toFixed(2);
            document.getElementById("cart_rePrice").innerHTML = n.RePrice.toFixed(2);
            document.getElementById("cart_realPrice").innerHTML = c.toFixed(2);
            var a;
            if (n.checkedWareNum > 99) {
                a = "99+"
            } else {
                a = n.checkedWareNum
            }
            document.getElementById("checkedNum").innerHTML = a;
            var l = n.Skus;
            for (var h = 0; h < l.length; h++) {
                var m = l[h];
                if (m.Id == (b == -1 ? m.Id : b)) {
                    if (m.CheckType == 1) {
                        $("#checkIcon" + (b == -1 ? m.Id : b)).addClass("checked")
                    } else {
                        $("#checkIcon" + (b == -1 ? m.Id : b)).removeClass("checked")
                    }
                }
            }
            l = n.Gifts;
            for (var h = 0; h < l.length; h++) {
                var g = l[h];
                if (g.Id == (b == -1 ? g.Id : b)) {
                    if (g.MainSku.CheckType == 1) {
                        $("#checkIcon" + (b == -1 ? g.MainSku.Id : b)).addClass("checked")
                    } else {
                        $("#checkIcon" + (b == -1 ? g.MainSku.Id : b)).removeClass("checked")
                    }
                }
            }
            l = n.Suits;
            for (var h = 0; h < l.length; h++) {
                var o = l[h];
                if (o.Id == (b == -1 ? o.Id : b)) {
                    if (o.SType == 4) {
                        if (o.CheckType == 1) {
                            $("#checkIcon" + (b == -1 ? o.Id : b)).addClass("checked")
                        } else {
                            $("#checkIcon" + (b == -1 ? o.Id : b)).removeClass("checked")
                        }
                    } else {
                        for (var d = 0; d < o.Skus.length; d++) {
                            var m = o.Skus[d];
                            if (m.CheckType == 1) {
                                $("#checkIcon" + m.Id).addClass("checked")
                            } else {
                                $("#checkIcon" + m.Id).removeClass("checked")
                            }
                        }
                    }
                }
            }
            if (n.Num == n.checkedWareNum) {
                $("#checkIcon-1").addClass("checked")
            } else {
                $("#checkIcon-1").removeClass("checked")
            }
            judgeSubmit(c)
        } else {
            $("#notEmptyCart").hide();
            $("#payment_p").hide();
            $("#emptyCart").show()
        }
    } catch (k) {
    }
    spinerHide()
};
var calcCartGifts = function(q, c) {
    try {
        if (!isBlank(q.cart)) {
            q = q.cart;
            var h = q.Price - q.Discount;
            var d = h - q.RePrice;
            document.getElementById("cart_oriPrice").innerHTML = h.toFixed(2);
            document.getElementById("cart_rePrice").innerHTML = q.RePrice.toFixed(2);
            document.getElementById("cart_realPrice").innerHTML = d.toFixed(2);
            resizeBottomPriseFontSize();
            var a;
            if (q.checkedWareNum > 99) {
                a = "99+"
            } else {
                a = q.checkedWareNum
            }
            document.getElementById("checkedNum").innerHTML = a;
            var o = q.Skus;
            for (var l = 0; l < o.length; l++) {
                var p = o[l];
                if (p.Id == (c == -1 ? p.Id : c)) {
                }
            }
            o = q.Gifts;
            for (var l = 0; l < o.length; l++) {
                var k = o[l];
                if (k.Id == (c == -1 ? k.Id : c)) {
                }
            }
            o = q.Suits;
            for (var l = 0; l < o.length; l++) {
                var r = o[l];
                if (r.Id == (c == -1 ? r.Id : c)) {
                    if (r.SType == 11 || r.SType == 16) {
                        if (r.linkUrl && !(r.SType == 16 && r.CanSelectGifts.length >= 1 && r.CanSelectedGiftNum > 0)) {
                            document.getElementById("shopping" + r.Id).innerHTML = document.getElementById("spanshopping" + r.Id) == undefined ? "" : document.getElementById("spanshopping" + r.Id).innerHTML;
                            $("#shopping" + r.Id).show();
                            $("#spanshopping" + r.Id).hide()
                        } else {
                            $("#spanshopping" + r.Id).show();
                            document.getElementById("shopping" + r.Id).innerHTML = "";
                            $("#shopping" + r.Id).hide()
                        }
                    }
                    if (!!r.STip) {
                        if (r.STip.indexOf("\u9886\u53d6\u8d60\u54c1") != -1 && r.STip.indexOf("\u5148\u5230\u5148\u5f97") == -1) {
                            $("#sTip" + r.Id).html(r.STip.substr(0, r.STip.indexOf("\u9886\u53d6\u8d60\u54c1")))
                        } else {
                            $("#sTip" + r.Id).html(r.STip)
                        }
                    }
                    if (r.SType == 4) {
                    } else {
                        var b = "";
                        for (var f = 0; f < r.Gifts.length; f++) {
                            var m = r.Gifts[f];
                            b += '<input type="hidden" name="showgift' + r.Id + '" class="cart-suit-showgift-input" value="' + m.Id + '">';
                            if (r.AddMoney > 0) {
                                b += '<div class="diver-hr-dashed clear"></div><div class="items"><div class="shp-cart-item-core"><div class="cart-product-cell-3"><span class="shp-cart-item-price">' + m.PriceShow + '</span></div><a class="cart-product-cell-1 shp-cart-tag-trade" href=\'$murl.composite("http://m.jd.com/product/' + m.Id + '.html",' + sid + ')\'><img class="cart-photo-thumb" alt="" src="http://img10.360buyimg.com/n7/' + m.ImgUrl + '"  onerror="http://misc.360buyimg.com/lib/skin/e/i/error-jd.gif"/></a><div class="cart-product-cell-2"><div class="cart-product-name"><a href=\'$murl.composite("http://m.jd.com/product/' + m.Id + +'.html",' + sid + ")'><span>" + m.Name + '</span></a></div><div class="shp-cart-opt"><span class="shp-cart-amount">x </span><span class="shp-cart-amount">' + m.Num + '</span><a class="shp-cart-icon-remove" href="javascript:deleteGifts(' + r.Id + "," + r.Num + "," + r.SType + "," + m.Id + "," + m.Num + ')"></a></div></div></div></div>'
                            } else {
                                b += '<span class="gifts-details"><div class="gifts-detail-description">[\u8d60\u54c1] ' + m.Name + " x" + m.Num + ' </div><a class="shp-cart-icon-remove" href="javascript:deleteGifts(' + r.Id + "," + r.Num + "," + r.SType + "," + m.Id + "," + m.Num + ')"></a></span>'
                            }
                        }
                        $("#givenGift" + r.Id).html(b);
                        if (r.Gifts.length == 0) {
                            $("#hr" + r.Id).removeClass("diver-hr-solid");
                            $("#hr" + r.Id).addClass("diver-hr-dashed");
                            $("#hidegiftSelectNum" + r.Id).val(0)
                        }
                        if (r.CanSelectGifts.length > 0) {
                            makeChooseGift(r.Id, r.Num, r.SType, r.CheckType, r.CanSelectGifts, r.Gifts.length, r.CanSelectedGiftNum, r.AddMoney)
                        }
                        if (r.CanSelectGifts.length >= 1) {
                            $("#notGivenGift" + r.Id).show()
                        } else {
                            $("#notGivenGift" + r.Id).hide()
                        }
                        $("span[name='optionsGift']").removeClass("checked")
                    }
                }
            }
            judgeSubmit(d)
        } else {
            $("#notEmptyCart").hide();
            $("#payment_p").hide();
            $("#emptyCart").show()
        }
    } catch (n) {
    }
    spinerHide()
};
var makeChooseGift = function(c, j, a, b, h, l, o, d) {
    if ($("#chooseGifts" + c).html() == "") {
        return
    }
    var n = '<input type="hidden" id="hidegiftSelectNum' + c + '" value="' + l + '"><input type="hidden" id="hidegiftSelectType' + c + '" value="' + d + '" ><div class="additional-list-items" ><div class="additional-list-header"><span class="additional-list-header-right"><a class="btn-jd-red" href="javascript:hideChooseGifts(\'' + c + '\')">\u786e\u5b9a</a></span>\u5df2\u9009\u62e9 <span class="highlight"><span id="giftSelectNum' + c + '">' + l + "</span>/" + o + '</span> \u4ef6</div><div class="additional-list-wrapper"><div class="additional-list-container"> ';
    var m = "";
    for (var f = 0; f < h.length; f++) {
        var e = h[f];
        m += '<div class="additional-items"><div class="item-wrapper"><div class="additional-item-content"><div class="cart-product-name"><a href="#" style="cursor:default;"><span>\u3010\u8d60\u54c1\u3011' + e.Name + '</span></a></div><div class="shp-cart-promotion-opt"><span class="shp-cart-promotion-right"><span class="shp-cart-item-price">' + e.PriceShow + '</span></span><span class="shp-cart-promotion-left">';
        if (e.giftMsg) {
            m += '<span class="icon-exchange">' + e.giftMsg + "</span>"
        } else {
            m += '<span class="shp-cart-amount">x ' + e.Num + "</span>"
        }
        m += "</span></div></div></div>";
        if (!e.giftMsg) {
            m += '<div class="additional-check-wrapper"><span id="' + c + e.Id + '" name="gift' + c + '"';
            if (e.CheckType == 1) {
                m += 'class="cart-checkbox checked"'
            } else {
                m += 'class="cart-checkbox"'
            }
            m += "onclick=\"selectGifts('" + c + "'," + j + "," + a + "," + e.Id + "," + e.Num + "," + o + ')"></span><input type="hidden" id="num' + c + e.Id + '" value="' + e.Num + '"><input type="hidden" id="giftId' + c + e.Id + '" value="' + e.Id + '"></div>'
        }
        m += '<div class="additional-item-thumb"><img class="cart-photo-thumb" alt="" src="http://img10.360buyimg.com/n7/' + e.ImgUrl + '" onerror="http://misc.360buyimg.com/lib/skin/e/i/error-jd.gif"></div>';
        m += '</div><div class="diver-hr-solid clear"></div>'
    }
    var k = "</div></div></div>";
    var g = n + m + k;
    $("#chooseGifts" + c).html(g)
};
var calcCartYanBao = function(l, a, n) {
    try {
        if (!isBlank(l.cart)) {
            var g = l.cart.Skus;
            for (var d = 0; d < g.length; d++) {
                var k = g[d];
                if (k.Id == (n == -1 ? k.Id : n)) {
                    showCartYanBao("", "", "", k)
                }
            }
            g = l.cart.Gifts;
            for (var d = 0; d < g.length; d++) {
                var c = g[d];
                if (c.MainSku.Id == (n == -1 ? c.MainSku.Id : n)) {
                    showCartYanBao("", "", "", c.MainSku)
                }
            }
            g = l.cart.Suits;
            var o;
            for (var d = 0; d < g.length; d++) {
                var m = g[d];
                if (m.Id == (a == -1 ? m.Id : a)) {
                    var h = m.Skus;
                    for (var b = 0; b < h.length; b++) {
                        var o = h[b];
                        if (o.Id == (n == -1 ? o.Id : n)) {
                            showCartYanBao(m.Id, m.Num, m.SType, o)
                        }
                    }
                }
            }
        } else {
            $("#notEmptyCart").hide();
            $("#payment_p").hide();
            $("#emptyCart").show()
        }
    } catch (f) {
    }
    spinerHide()
};
var showCartYanBao = function(g, f, h, b) {
    var a;
    var d;
    if (b.YbSkus && b.YbSkus.length > 0) {
        var e = b.YbSkus;
        a = '<div id="showyanbao' + g + b.Id + '">';
        for (var c = 0; c < e.length; c++) {
            d = e[c];
            a += '<div class="shp-cart-item-abstract clear">';
            a += '<div class="cart-product-cell-3"><span class="shp-cart-item-price">' + d.MainYbSku.PriceShow + "</span></div>";
            if (c == 0) {
                a += '<span class="cart-product-cell-additional" href="#"><a href="javascript:showChooseYanBao(\'1\',\'' + g + "','" + f + "','" + h + "','" + b.Id + "','" + b.Num + '\')" class="btn-white">\u4fee\u6539\u670d\u52a1</a></span>'
            } else {
                a += '<span class="cart-product-cell-additional" href="#">&nbsp;</span>'
            }
            if (d && d.MainYbSku) {
                a += '<div class="cart-product-cell-2"><div class="cart-product-name" id="yanbao' + d.MainYbSku.Id + '"><a href="#"><span>' + d.MainYbSku.Name + "</span></a></div></div>"
            }
            a += "</div>"
        }
        a += "</div>"
    } else {
        a = '<div class="shp-cart-item-abstract empty clear" id="showyanbao' + g + b.Id + '"><span class="cart-product-cell-additional" href="#"><a href="javascript:showChooseYanBao(\'1\',\'' + g + "','" + f + "','" + h + "','" + b.Id + "','" + b.Num + '\')" class="btn-white">\u5ef6\u4fdd\u670d\u52a1</a></span></div>'
    }
    $("#givenYanbao" + g + b.Id).html(a)
};
var calcCartPrice = function(l, a, n) {
    try {
        if (!isBlank(l.cart)) {
            var g = l.cart.Skus;
            for (var d = 0; d < g.length; d++) {
                var k = g[d];
                if (k.Id == (n == -1 ? k.Id : n)) {
                    if ($("#price" + k.Id).html() != k.PriceShow) {
                        $("#price" + k.Id).html(k.PriceShow)
                    }
                }
            }
            g = l.cart.Gifts;
            for (var d = 0; d < g.length; d++) {
                var c = g[d];
                if (c.MainSku.Id == (n == -1 ? c.MainSku.Id : n)) {
                    if ($("#price" + c.MainSku.Id).html() != c.MainSku.PriceShow) {
                        $("#price" + c.MainSku.Id).html(c.MainSku.PriceShow)
                    }
                }
            }
            g = l.cart.Suits;
            var o;
            for (var d = 0; d < g.length; d++) {
                var m = g[d];
                if (m.Id == (a == -1 ? m.Id : a)) {
                    var h = m.Skus;
                    for (var b = 0; b < h.length; b++) {
                        var o = h[b];
                        if (o.Id == (n == -1 ? o.Id : n)) {
                            if ($("#price" + m.Id + o.Id).html() != o.PriceShow) {
                                $("#price" + m.Id + o.Id).html(o.PriceShow)
                            }
                        }
                    }
                }
            }
        }
    } catch (f) {
    }
};
var disableSubmit = function() {
    $("#submit").css("background", "#999");
    $("#submit").click("")
};
var enableSubmit = function() {
    $("#submit").css("background", "#c00000");
    $("#submit").click(submit)
};
var judgeSubmit = function(a) {
    if (Number(a) <= 0) {
        disableSubmit();
        $("#checkAll").removeClass("checked")
    } else {
        enableSubmit()
    }
};
var appendSuit = function(e, f, b, d, c, a) {
    if (!isBlank(e)) {
        if (!isBlank(f)) {
            e += "&sType=" + f
        }
        if (!isBlank(b)) {
            e += "&suitSkuId=" + b
        }
        if (!isBlank(d)) {
            e += "&suitSkuNum=" + d
        }
        if (!isBlank(c)) {
            e += "&ybId=" + c
        }
        if (!isBlank(a)) {
            e += "&ybNum=" + a
        }
    }
    return e
};
var submit = function() {
    var a = $("#newOrderServer").val();
    var b = document.getElementById("cart_realPrice").innerHTML;
    if (Number(b) <= 0) {
        return
    }
    if (Number($("#cartNum").val()) > Number($("#limitCartNum").val())) {
        alert("\u5546\u54c1\u79cd\u7c7b\u4e0d\u80fd\u5927\u4e8e" + $("#limitCartNum").val());
        return
    }
    pingClick(cartUse, "Shopcart_Pay", "", "submit", "http://p.m.jd.com/norder/order.action");
    if (a == "true") {
        location.href = "/norder/order.action?enterOrder=true&sid=" + $("#sid").val()
    } else {
        location.href = "/order/order.action?enterOrder=true&yys=false&from=0&sid=" + $("#sid").val()
    }
};
var isBlank = function(a) {
    if (a == undefined || a == null || a.length == 0) {
        return true
    } else {
        return false
    }
};
var deSelectedAll = function() {
    var h = -1;
    $("#checkIcon" + h).removeClass("checked");
    var b = new Array();
    if (cartUse) {
        try {
            var c = document.getElementsByClassName("cart-suit-showgift-input");
            var f = c.length;
            for (var d = 0; d < c.length; d++) {
                b[d] = c[d].value + ""
            }
        } catch (g) {
        }
    }
    spinerShow();
    var a = "/cart/check.json?checked=" + 8 + "&sid=" + $("#sid").val();
    jQuery.get(a, {}, function(e) {
        if (e != undefined) {
            calcCartCheck(e, h);
            calcCartGifts(e, h);
            spinerHide();
            if (b != "") {
                pingCartDel(cartUse, "Shopcart_Delete", "", b)
            }
        } else {
            if ($("#checkIcon" + h).hasClass("checked")) {
                $("#checkIcon" + h).removeClass("checked")
            } else {
                $("#checkIcon" + h).addClass("checked")
            }
        }
    })
};
var selectedAll = function() {
    var b = -1;
    $("#checkIcon" + b).addClass("checked");
    spinerShow();
    var a = "/cart/check.json?checked=" + 7 + "&sid=" + $("#sid").val();
    jQuery.get(a, {}, function(c) {
        if (c != undefined) {
            calcCartCheck(c, b);
            calcCartGifts(c, b);
            spinerHide()
        } else {
            if ($("#checkIcon" + b).hasClass("checked")) {
                $("#checkIcon" + b).removeClass("checked")
            } else {
                $("#checkIcon" + b).addClass("checked")
            }
        }
    })
};
var checkAllHandler = function() {
    if ($("#checkIcon-1").hasClass("checked")) {
        $("#checkIcon-1").removeClass("checked ");
        deSelectedAll()
    } else {
        $("#checkIcon-1").addClass("checked");
        selectedAll()
    }
};
var setFixTip = function(b, a) {
    window.onscroll = function() {
        var d = document.documentElement.scrollTop || document.body.scrollTop;
        var c = $("#" + a).offset().top;
        if (d >= c - 10) {
            $("#" + b + "p").css("height", $("#" + b).height());
            $("#" + b).css("position", "fixed");
            $("#" + b).css("z-index", "10001");
            $("#" + b).css("top", "0px");
            $("#" + b).css("border-bottom", "1px solid #e4393c")
        } else {
            $("#" + b + "p").css("height", "0px");
            $("#" + b).css("position", "");
            $("#" + b).css("z-index", "");
            $("#" + b).css("border-bottom", "0px solid #e4393c");
            $("#" + b).css("top", $("#" + a).offset().top + "px")
        }
    }
};
var addWareBybutton = function(b, e, a, j, c, k, d) {
    var h = 0;
    var f;
    if (isBlank(e) || (!isBlank(a) && a == 4)) {
        f = b
    } else {
        f = j
    }
    h = Number($("#num" + f).val()) + 1;
    var i = $("#limitSukNum" + f).val();
    if (h > i) {
        return
    }
    if (h > 1) {
        $("#subnum" + f).removeClass("disabled")
    }
    if (h == i) {
        $("#addnum" + f).addClass("disabled")
    }
    if (isBlank(e) || (!isBlank(a) && a == 4)) {
        e = h
    } else {
        c = h
    }
    $("#num" + f).val(h);
    var g = "ajax.php?wareId=" + b + "&num=" + e + "&sid=" + $("#sid").val();
    g = appendSuit(g, a, j, c, k, d);
    spinerShow();
    jQuery.get(g, {}, function(l) {
        l = JSON.parse(l);
        calcCartCheck(l, b);
        calcCartGifts(l, b);
        $("span[name='suitSkuNum" + b + "']").text(h);
        pingClick(cartUse, "Shopcart_EditAmount", f, "addWareBybutton", "http://p.m.jd.com/cart/modify.action")
    })
};
var subWareBybutton = function(b, e, a, i, c, j, d) {
    var h = 0;
    var f;
    if (isBlank(e) || (!isBlank(a) && a == 4)) {
        f = b
    } else {
        f = i
    }
    h = Number($("#num" + f).val()) - 1;
    if (h <= 0) {
        return
    }
    if (h == 1) {
        $("#subnum" + f).addClass("disabled")
    }
    if (h < $("#limitSukNum" + f).val()) {
        $("#addnum" + f).removeClass("disabled")
    }
    if (isBlank(e) || (!isBlank(a) && a == 4)) {
        e = h
    } else {
        c = h
    }
    $("#num" + f).val(h);
    var g = "ajax.php?wareId=" + b + "&num=" + e + "&sid=" + $("#sid").val();
    g = appendSuit(g, a, i, c, j, d);
    spinerShow();
    jQuery.get(g, {}, function(k) {
        k = JSON.parse(k);
        calcCartCheck(k, b);
        calcCartGifts(k, b);
        $("span[name='suitSkuNum" + b + "']").text(h);
        pingClick(cartUse, "Shopcart_EditAmount", f, "subWareBybutton", "http://p.m.jd.com/cart/modify.action")
    })
};
var selectYanbao = function(d, j, b, m, f, o, h, e) {
    if ($("#" + d + m + o).hasClass("checked")) {
        deleteYanBao(d, j, b, m, f, o, h);
        $("#" + d + m + o).removeClass("checked")
    } else {
        var a = "" + d + m + e;
        var k = document.getElementsByName(a);
        var c;
        var n;
        for (var g = 0; g < k.length; g++) {
            var l = k[g];
            if (l.className == "cart-checkbox checked") {
                l.className = "cart-checkbox"
            }
        }
        $("#" + d + m + o).addClass("checked")
    }
};
var addYanbao = function(e, l, b, p, f) {
    var q = null;
    var k = null;
    var m = e + p;
    var d = document.getElementsByName("brandId" + m);
    for (var h = 0; h < d.length; h++) {
        var c = d[h].value;
        var a = "" + e + p + c;
        var n = document.getElementsByName(a);
        for (var g = 0; g < n.length; g++) {
            var o = n[g];
            if (o.className == "cart-checkbox checked") {
                platformId = $("#ybId" + o.id).val();
                platformNum = $("#num" + o.id).val();
                if (q == null) {
                    q = platformId;
                    k = platformNum
                } else {
                    q += "@@" + platformId;
                    k += "@@" + platformNum
                }
            }
        }
    }
    if (q != null) {
        addCartWare(e, l, b, p, f, q, k)
    } else {
        showYanbao(e, p)
    }
    hideChooseYanBao(e, p)
};
var showYanbao = function(c, b) {
    var a = "/cart/cart.json?sid=" + $("#sid").val();
    spinerShow();
    jQuery.get(a, {}, function(d) {
        calcCartYanBao(d, c, b)
    })
};
var beWalk = function() {
    var b = $("#sid").val();
    var a = "http://m.jd.comindex.html";
    pingClick(cartUse, "Shopcart_Stroll", "", "beWalk", a);
    if (b != null && b == "") {
        a += "?sid=" + b
    }
    window.location.href = a
};
var beActPage = function(f, g, d, e) {
    var b = $("#sid").val();
    var a = "http://m.jd.com/sale/" + f;
    if (cartUse) {
        var c;
        if (g == 11) {
            c = "manjian"
        } else {
            if (Number(d) > 0) {
                c = "jiajiagou"
            } else {
                c = "manzeng"
            }
        }
        pingClick(cartUse, "Shopcart_Label", c, "beActPage", a)
    }
    if (e != null && e != "") {
        a += "?cartFlag=" + e
    }
    window.location.href = a
};
var pingClick = function(b, h, f, d, a) {
    if (b) {
        try {
            var g = new MPing.inputs.Click(h);
            g.event_param = f;
            var c = new MPing();
            c.send(g)
        } catch (i) {
        }
    }
};
var pingCartDel = function(a, f, d, c) {
    if (a) {
        try {
            var h = new MPing.inputs.RmCart(f, c);
            h.event_param = d;
            var b = new MPing();
            b.send(h)
        } catch (g) {
        }
    }
};
var pingCartAdd = function(b, f, d, a) {
    if (b) {
        try {
            var h = new MPing.inputs.AddCart(f, a);
            h.event_param = d;
            var c = new MPing();
            c.send(h)
        } catch (g) {
        }
    }
};
var timerEvt;
function toaster(a, i, f) {
    clearTimeout(timerEvt);
    timerEvt = function() {
        return false
    };
    var b = 2000;
    if ($("#popup_block").length == 0) {
        $("body").append('<div id="popup_block" class="pop-block"><div class="popup_wrapper"><div class="popup_title"></div><div class="popup_content"></div></div></div>')
    }
    var l = $("#popup_block");
    $("#popup_block .popup_content").html(a);
    $("#popup_block .popup_title").html(i);
    var g = (f) ? "nowrap" : "inherit";
    $("#popup_block").show();
    var k = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;
    var c = document.documentElement.clientWidth || document.body.clientWidth;
    var j = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
    var d = document.documentElement.clientHeight || document.body.clientHeight;
    var e = (d - $("#popup_block").height()) / 2 + j;
    var h = (c - $("#popup_block").width()) / 2 + k;
    l.css({top: e, left: h, "white-space": g});
    timerEvt = setTimeout(function() {
        $("#popup_block").hide()
    }, b)
}
;