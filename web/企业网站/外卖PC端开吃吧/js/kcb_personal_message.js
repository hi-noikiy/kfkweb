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

function checkValidCode() {
    var tools = new tool(),
        result = "",
        validateCode = $.trim($("#validateCode").val());
    result = tools.checkValidateCode(validateCode, 100,0);
    if (result !== "1") {
        $("#validateTips").text(result).show();
        return false;
    }
    return true;
}

$(document).ready(function() {

    $(".sm_reply").click(function() {
        $(".make_msg").show();
        setHeight($("#pMenu"), $("#pCenter"));
        var replyID = $(this).attr("id");
        $("#i_newComment").focus();
        $("#i_newComment").val("#" + replyID + "#  ");
        return false;
    });
    $("#questionClick").click(function() {
        $("#feedback_btn").click();
    });
    $("#ValidateCodeClick_Message").click(function() {
        $("#authenticationCode_Message").click();
    });
});
 