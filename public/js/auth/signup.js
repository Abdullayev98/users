//phone number js
var element = document.getElementById('phone_number');
var maskOptions = {
    mask: '+998(00)000-00-00',
    lazy: false
}
var mask = new IMask(element, maskOptions);

$("#phone_number").keyup(function () {
    var text = $(this).val()
    text = text.replace(/[^0-9.]/g, "")
    text = text.slice(3)
    $("#phone").val(text)
})
  //   input eye
$(function () {

    $('#eye').click(function () {
        if ($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password').attr('type', 'text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type', 'password');
        }
    });

});
 //input eye2
$(function () {

    $('#eye1').click(function () {
        if ($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password_confirmation').attr('type', 'text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password_confirmation').attr('type', 'password');
        }
    });

});

//remove and add button

$("#checkbox1").change(function() {
    if (this.checked) {
       $('#btn11').addClass('hidden')
       $('#btn22').removeClass('hidden')
    }
    else if (!this.checked){
        $('#btn22').addClass('hidden')
        $('#btn11').removeClass('hidden')
    }
});