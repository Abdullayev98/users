var element = document.getElementById('phone_number');
var maskOptions = {
    mask: '+998(00)000-00-00',
    lazy: false
}
var mask = new IMask(element, maskOptions);
