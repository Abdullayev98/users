//Open Modal4
function toggleModal4(modalID4) {
    document.getElementById(modalID4).classList.toggle("hidden");
    document.getElementById(modalID4 + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID4).classList.toggle("flex");
    document.getElementById(modalID4 + "-backdrop").classList.toggle("flex");
}

//Ajax requests
$(document).ready(function () {
    $("#class_demo").click(function () {
        $("#class_demo").removeClass("text-gray-500");
        $("#class_demo").addClass("text-amber-500");
        $("#class_demo1").removeClass("text-amber-500");
        $("#class_demo1").addClass("text-gray-500");
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

    $("#class_demo1").click(function () {
        $("#class_demo1").removeClass("text-gray-500");
        $("#class_demo1").addClass("text-amber-500");
        $("#class_demo").removeClass("text-amber-500");
        $("#class_demo").addClass("text-gray-500");
    });
});

function valueChanged() {
    if ($('.coupon_question').is(":checked"))
        $(".answer").show();
    else
        $(".answer").hide();
}

//review modal
const modal = document.querySelector('.modal');

const closeModal = document.querySelectorAll('.close-modal');

closeModal.forEach(close => {
    close.addEventListener('click', function () {
        modal.classList.add('hidden')
    });
});

//Open and close modals

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

//
