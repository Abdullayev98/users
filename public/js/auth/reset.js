
var element = document.getElementById('phone_number');
var maskOptions = {
    mask: '+998(00)000-00-00',
    lazy: false
}
var mask = new IMask(element, maskOptions);

$("#phone_number").keyup(function (){
    var text = $(this).val()
    text = text.replace(/[^0-9.]/g, "")
    text = text.slice(3)
    $("#phone").val(text)
    console.log($("#phone").val())
})
