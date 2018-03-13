function initializingMap(loca) {
    map = new BMap.Map("mapcontainer", { enableMapClick: !1 });
    map.enableScrollWheelZoom();
    var e = loca; // $.cookie("w_cpy_cn");
    (null == e || 0 == e.length) && (e = "北京");

    map.centerAndZoom(e, 12); //设置默认位置中心为北京
    map.setDefaultCursor("crosshair");  //这是鼠标在地图里的图表是十字
    map.addControl(new BMap.NavigationControl);  //被地图添加导航
    map.addEventListener("click", function (e) { //给地图添加单击事件
        singleclick(e)
    });
    local = new BMap.LocalSearch(e, { onSearchComplete: completeSearch });   //绑定搜索完成时的事件
    mapAutoComplete = new BMap.Autocomplete({ input: "sear_add_key", location: e });
    mapAutoComplete.addEventListener("onconfirm", function (e) {
        e.item.value;
        searchAddress()
    });
    scmarker = new BMap.Marker(new BMap.Point(116.404, 39.915), { icon: new BMap.Icon("http://maps.baidu.com/image/markers_new.png", new BMap.Size(25, 37), { offset: new BMap.Size(12, 37), imageOffset: new BMap.Size(0, -156) }) });
    scmarker.enableDragging();
    scmarker.addEventListener('dragend', function (e) {
        singleclick(e);
    });
    scinfowindow = new BMap.InfoWindow("", { enableMessage: !1 });
    //    scmarker.addEventListener("click", function () {
    //        scmarker.openInfoWindow(scinfowindow)
    //    });
    scmarker.addEventListener("infowindowclose", function () {
        map.removeOverlay(scmarker)
    });
    decoder = new BMap.Geocoder;
}
//点击地图位置
function singleclick(e) {
    e.overlay || (scmarker.setPosition(e.point), decoder.getLocation(e.point, function (a) {
   
        a && (scaddress = a.business, $.post("ajax.php?act=position", { lat: e.point.lat, lng: e.point.lng }, function (n) {
            n = JSON.parse(n);
            scinfowindow = new BMap.InfoWindow("", { enableMessage: !1 });  // 创建信息窗口对象


            scinfowindow.setContent($("#mapInfoWindow").render({ title: a.business, address: a.address, poi_list: n }));
            map.addOverlay(scmarker);
            map.openInfoWindow(scinfowindow, e.point);
        }))
    }),
    last_selected_index >= 0 && $("#result_item_" + last_selected_index).hasClass("selected") && $("#result_item_" + last_selected_index).toggleClass("selected"))
}

function searchAddress() {
    var e = $("#sear_add_key").val();  //搜索结果
    e = $.trim(e);
    "" != e && (isFirstSearch && (isFirstSearch = !1, $(".pg-map .addr-results").show()), searchAddressInner(e))
}

function searchAddressInner(e) {
    local.setPageCapacity(6);
    local.search(e, { forceLocal: !0 });
    newSearchFirstPage = !0
}
//搜索完成时调用的方法
function completeSearch(e) {
    $(".pg-map .addr-results").css("display", "block");
    var a = e.getNumPois(), n = e.getNumPages(), t = local.getPageCapacity(), o = e.getPageIndex();
    if ($("#result_panel").html(""), map.clearOverlays(), last_selected_index = -1, 1 > a)
        return $("#result_panel").html($("#mapEmptyResultWindow").render({})), void $("#page_index").html("");
    newSearchFirstPage && ($("#page_index").html(""), n > 1 && $("#page_index").paginate({ count: Math.min(MAX_PAGE_NUM, n), start: 1, display: 4, border_color: "#d2d2d2", images: !1, text_color: "#434343", background_color: "#fff", text_hover_color: "black", background_hover_color: "#eee", onChange: selectPageIndex }), $("#result_panel").html(""), map.clearOverlays(), newSearchFirstPage = !1);
    for (var s = new Array, i = 0; i < Math.min(t, a - o * t); i++) {
        var r = e.getPoi(i);
        s.push(r.point), addMarker(i, r)
    }
    map.setViewport(s)
}

function addMarker(e, a) {
    var n = !1, t = n ? 34 : 24, o = n ? 26 : 19, s = n ? 13 : 9, i = n ? 36 : 27, r = n ? -73 : -199;
    d = new BMap.Marker(a.point, { icon: new BMap.Icon("http://maps.baidu.com/image/markers_new.png", new BMap.Size(o, i), { offset: new BMap.Size(s, i), imageOffset: new BMap.Size(0 - e * t, r) }) });
    markers[e] = d;
    addresses[e] = a.title;
    $.post("/ajax/poi/poinum.ashx", { lat: a.point.lat, lng: a.point.lng }, function (n) {

        var t = new BMap.InfoWindow($("#mapInfoWindow").render({ title: a.title, address: a.address, poi_list: n }), { enableMessage: !1 });
        infowindows[e] = t;

        0 > last_selected_index && 0 == e && openMarkerById(0)
    });
    d.addEventListener("click", function () {
        openMarkerById(e)
    });
    d.addEventListener("infowindowclose", function () {
        var a = new BMap.Icon("http://maps.baidu.com/image/markers_new.png", new BMap.Size(o, i), { offset: new BMap.Size(s, i), imageOffset: new BMap.Size(0 - e * t, r) });
        this.setIcon(a)
    });
    $("#result_panel").append($("#mapResultWindow").render({ index: e, title: a.title, address: a.address.length > 38 ? a.address.substr(0, 38) : a.address, method: "openMarkerById(" + e + ")" })), $("#result_item_" + e).hover(function () {
        e !== last_selected_index && $(this).toggleClass("selected")
    });
    map.addOverlay(d)
}

function openMarkerById(e) {
    var a = markers[e], n = !0, t = n ? 34 : 24, o = n ? 26 : 19, s = n ? 13 : 9, i = n ? 36 : 27, r = n ? -73 : -199, d = new BMap.Icon("http://maps.baidu.com/image/markers_new.png", new BMap.Size(o, i), { offset: new BMap.Size(s, i), imageOffset: new BMap.Size(0 - e * t, r) });
    a.setIcon(d), a.openInfoWindow(infowindows[e]), last_selected_index !== e && (last_selected_index >= 0 && $("#result_item_" + last_selected_index).hasClass("selected") && $("#result_item_" + last_selected_index).toggleClass("selected"), $("#result_item_" + e).hasClass("selected") || $("#result_item_" + e).toggleClass("selected"), last_selected_index = e)
}


function selectPageIndex(e) {
    local.gotoPage(e - 1)
}

function changeHistorySeq(e) {
    var a = $.cookie("w_ah");
    if ("" != a) {
        var n = a.split("|");
        if (!(0 >= e || e >= n.length)) {
            for (var t = n[e], o = 0; o < n.length; o++)
                o != e && (t += "|" + n[o]);
            var s = new Date;
            s.setTime(s.getTime() + 252288e7), $.cookie("w_ah", t, { path: "/", expires: s })
        }
    }
}

function changecity() {
    showMap(null);
}

window.onload = function () {
    $("#sea_add_btn").click(function () {
        searchAddress()
    });
    $("#sear_add_key").on("keydown", function (e) {
        13 === e.keyCode && searchAddress()
    });
    $("#address_history ul li a").click(function () {
        var e = $(this).attr("data_seq");
        return "" != e && $.isNumeric(e) ? (changeHistorySeq(parseInt(e)), !0) : !0
    })
};
var map, local, markers = new Array, addresses = new Array, infowindows = new Array, newSearchFirstPage = !0, mapAutoComplete, scmarker = null, scinfowindow = null, scaddress = "", decoder, last_selected_index = -1, MAX_PAGE_NUM = 4, isFirstSearch = !0;
$(".hist-link").click(function () {
    $("#address_history").show()
});
