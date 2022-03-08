//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    $('html,body').animate({ scrollTop: 0 }, 'slow');
}


//typelist in header
$("input[name=TypeList]").focusout(function(){
});
$(function() {
    $('#header_input').on('input',function() {
        var opt = $('option[value="'+$(this).val()+'"]');
        $("#createhref").attr("href", '/task/create?category_id='+opt.attr('id'));
    });
});

//open Re:Plain chat
function myFunctionesse() {
    var elems = document.getElementsByClassName("chat");
    elems.style.display = "block";
}

//scroll to top
setInterval(function () {
    var elem = document.getElementById('scrollbar');
    elem.scrollTop = elem.scrollHeight;
}, 5000);


// Grabs all the Elements by their IDs which we had given them (Open-modal)
let modal = document.getElementById("my-modal");

let btn = document.getElementById("open-btn");

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//Ads swiper
var swiper = new Swiper('.mySwiper', {
    autoplay: {
    delay:5000,
    disableOnInteraction:false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',

    },
});

//open Model
function toggleModal2() {
    document.getElementById("modal-id2").classList.toggle("hidden");
}

//get value of input
function myFunction() {
    document.getElementById("header_input").value = document.getElementById("span_demo").innerHTML;
}
