








$("#tees").click(function (e) {
    // alert("hhgg");

    var txtEmail = $("#txtEmail").val();

    var option = {
        url: "http://zsr.iirii.com/aqq/test.php?yyy=888",
        type: "POST",
        data: {stt: "ggggg", txtEmail: txtEmail},
        success: function (result) {
            $("span#ccc").html(result);
        }
    };
    $.ajax(option);

});
$(".navigation").mousemove(function (e) {
    //alert("hhg---g");
    $("span#ddd").text(e.pageX + ", " + e.pageY);
})
