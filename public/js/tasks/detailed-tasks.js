
    $(document).ready(function () {
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
    $(".pay").click(function () {
    $(".pays").attr("value", 4000);
});
    var $temp = $("<input>");
    var $url = $(location).attr('href');
    $('.copylink').on('click', function () {
    $("body").append($temp);
    $temp.val($url).select();
    document.execCommand("copy");
    $temp.remove();
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Ссылка скопирована в буфер обмена!',
    showConfirmButton: false,
    timer: 1500
})
});
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
    let response_price = $("input[name=response_price]").val();
    let task_id = $("input[name=task_id]").val();
    let _token = $("input[name=csrf]").val();
    let user_id = $("input[name=task_user_id]").val();
    let name_task = $("input[name=name_task]").val();
    $.ajax({
    url: "/ajax-request",
    type: "POST",
    data: {
    response_desc: response_desc,
    notificate: notificate,
    response_time: response_time,
    response_price: response_price,
    task_id: task_id,
    _token: _token,
    user_id: user_id,
    name: name_task
},
    success: function (response) {
    console.log(response);
    if (response) {
    $('.success').text(response.success);
}
},
    error: function (error) {
    console.log(error);
}
});
    $('.preloader').show();
    $('.btn-preloader').hide();
    $('.bg-opacity-50').hide();
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


    $(document).ready(function () {
    $("#sendbutton").click(function () {
        $("#sendbutton").hide();
        $(".hideform").removeClass('hidden');
    });
    $(".done").click(async function () {
});
    $("#close-id4").click(function () {
    $("#modal-id4").hide();
    $("#modal-id4-backdrop").hide();
});
    $("#modal-open-id4").click(function () {
    $("#modal-id4").show();
    $("#class_demo1").click();
});
    $("#modal-open-id5").click(function () {
    $("#modal-id4").show();
    $("#class_demo").click();
});
});
    $(".send-comment").click(function (event) {
    event.preventDefault();
    let good = $(".good:checked").val();
    let comment = $("textarea[name=comment]").val();
    let _token = $("input[name=csrf]").val();
    let performer_id = $("input[name=performer_id]").val();
    let task_id = $("input[name=task_id]").val();
    let user_id = $("input[name=task_user_id]").val();
    $.ajax({
    url: "/ajax-request",
    type: "POST",
    data: {
    good: good,
    comment: comment,
    user_id: user_id,
    performer_id: performer_id,
    task_id: task_id,
    _token: $('meta[name="csrf-token"]').attr('content'),
},
    success: function (response) {
    console.log(response);
    if (response) {
    $('.success').text(response.success);
}
},
    error: function (error) {
    console.log(error);
}
});
    window.setTimeout(function () {
}, 3000);
    window.location.reload();
});
