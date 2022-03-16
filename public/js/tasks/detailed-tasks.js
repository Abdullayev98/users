
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



$(document).ready(function () {
    $(".st-remove-label").each(function () {
        $(this).removeAttr("style");
        $(this).addClass("my-4");
        var tweet = $(this).attr("data-network");
        if (tweet == 'twitter') {
            $(this).after('<br>');
        }
    });
});

function toggleModal44(){
    document.getElementById("modal-id44").classList.toggle("hidden");
    document.getElementById("modal-id44" + "-backdrop").classList.toggle("hidden");
    document.getElementById("modal-id44").classList.toggle("flex");
    document.getElementById("modal-id44" + "-backdrop").classList.toggle("flex");
     }
     function    toggleModal45(){
    document.getElementById("modal-id45").classList.toggle("hidden");
    document.getElementById("modal-id45" + "-backdrop").classList.toggle("hidden");
    document.getElementById("modal-id45").classList.toggle("flex");
    document.getElementById("modal-id45" + "-backdrop").classList.toggle("flex");
     }
        const telegram=document.querySelector(".telegram");
        const twitter=document.querySelector(".twitter");
        const whatsapp=document.querySelector(".whatsapp");
        const facebook=document.querySelector(".facebook");
        const linkedin=document.querySelector(".linkedin");
        const instagram=document.querySelector(".instagram");
        const email=document.querySelector(".email");
        const google=document.querySelector(".google");

        const pageUrl=location.href;
        const telegramApi=`https://t.me/share/url?url=${pageUrl}`;
        const twitterApi=`https://twitter.com/intent/tweet?text=${pageUrl}`;
        const whatsappApi=`https://wa.me/?text=${pageUrl}`;
        const facebookApi=`https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;
        const linkedinApi=`https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`;
        const instagramApi=`https://www.instagram.com/?url=${pageUrl}`;
        const emailApi=`https://mail.google.com/mail/?url=${pageUrl}`;
        const googleApi=`https://plus.google.com/share?url=${pageUrl}`;

        telegram.addEventListener('click', ()=>{
            window.open(url=telegramApi, target='blank')
        })
        twitter.addEventListener('click', ()=>{
            window.open(url=twitterApi, target='blank')
        })
        whatsapp.addEventListener('click', ()=>{
            window.open(url=whatsappApi, target='blank')
        })
        facebook.addEventListener('click', ()=>{
            window.open(url=facebookApi, target='blank')
        })
        linkedin.addEventListener('click', ()=>{
            window.open(url=linkedinApi, target='blank')
        })
        instagram.addEventListener('click', ()=>{
            window.open(url=instagramApi, target='blank')
        })
        email.addEventListener('click', ()=>{
            window.open(url=emailApi, target='blank')
        })
        google.addEventListener('click', ()=>{
            window.open(url=googleApi, target='blank')
        })