
    $(document).ready(function () {
    $("#close-id4").click( function () {
        $("#modal-id4").hide();
        $("#modal-id4-backdrop").hide();
    });
    $("#modal-open-id4").click( function () {
    $("#modal-id4").show();
    $("#class_demo1").click();
});
    $("#modal-open-id5").click( function () {
    $("#modal-id4").show();
    $("#class_demo").click();
});
    $("#class_demo").click(function () {
    $("#class_demo").addClass("bg-green-500");
    $("#class_demo").addClass("text-white");
    $("#class_demo").removeClass("text-gray-500");
    $("#class_demo1").removeClass("bg-red-500");
    $("#class_demo1").addClass("text-gray-500");
});
    $("#class_demo1").click(function () {
    $("#class_demo1").addClass("bg-red-500");
    $("#class_demo1").addClass("text-white");
    $("#class_demo1").removeClass("text-gray-500");
    $("#class_demo").removeClass("bg-green-500");
    $("#class_demo").addClass("text-gray-500");
});

});



    $(document).ready(function () {

    $(".pay").click(function () {
        $(".pays").attr("value", 4000);
    });
    var $temp = $("<input>");
    var $url = $(location).attr('href');
});

    function valueChanged() {
    if ($('.coupon_question').is(":checked"))
    $(".answer").show();
    else
    $(".answer").hide();
}

    $(".save-data").click(function (event) {
    event.preventDefault();
    let response_desc = $('textarea#form8').val();
    var notificate = null;
    if ($("input[name=notificate]").is(':checked')) {
    var notificate = 1;
} else {
    var notificate = 0;
}
    var response_time = null;
    if ($('.answer').is(':visible')) {
    var response_time = 1;
}
    window.setTimeout(function () {
    $('.preloader').hide();
    $('.modal___1').show();
}, 1000);
    $('.modal___1').hide();
    window.location.reload();
});


    const modal = document.querySelector('.modal');

    const closeModal = document.querySelectorAll('.close-modal');

    closeModal.forEach(close => {
    close.addEventListener('click', function () {
        modal.classList.add('hidden')
    });
});


    $(".send-data").click(function (event) {
    event.preventDefault();
});




    $(".modal").each(function () {
    $(this).wrap('<div class="overlay"></div>')
});

    $(".open-modal").on('click', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation;

    var $this = $(this),
    modal = $($this).data("modal");

    $(modal).parents(".overlay").addClass("open");
    setTimeout(function () {
    $(modal).addClass("open");
}, 350);

    $(document).on('click', function (e) {
    var target = $(e.target);

    if ($(target).hasClass("overlay")) {
    $(target).find(".modal").each(function () {
    $(this).removeClass("open");
});
    setTimeout(function () {
    $(target).removeClass("open");
}, 350);
}

});

});

    $(".close-modal").on('click', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation;

    var $this = $(this),
    modal = $($this).data("modal");

    $(modal).removeClass("open");
    setTimeout(function () {
    $(modal).parents(".overlay").removeClass("open");
}, 50);

});



    $(".send-comment").click(function (event) {
    event.preventDefault();
    window.setTimeout(function () {

}, 3000);
    window.location.reload();
});

