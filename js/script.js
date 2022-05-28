$(".form__input").click(function() {
    if (($(this).prop("checked"))) {
        $("#form__button").removeAttr("disabled");
    } else {
        $("#form__button").attr("disabled", "disabled");
    }
})

$(document).ready(function(){
    $('.header').height($(window).height());
})
