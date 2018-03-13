$(document).ready(function () {

    $(".noticTitle").live("click", function () {
        $trigger = $(this);
        var noticeID = $trigger.attr("noticeID");
        if ($trigger.parent().next(".unfold_con").is(":hidden")) {
            $trigger.parent().next(".unfold_con").show();
            if ($trigger.attr("class") == "noticTitle new_color") {
                $trigger.removeClass("noticTitle new_color").addClass("noticTitle old_color");
                $.ajax({
                        type: "POST",
                        url: "../ajax/Notice/ChangeSysNoticeState.ashx",
                        data: { noticeID: noticeID }
                    });
            }
        }else {
                $trigger.parent().next(".unfold_con").hide();
        }
    });
})