

let tabsContainer = document.querySelector("#tabs");

let tabTogglers = tabsContainer.querySelectorAll("a");
console.log(tabTogglers);

tabTogglers.forEach(function (toggler) {
    toggler.addEventListener("click", function (e) {
        e.preventDefault();

        let tabName = this.getAttribute("href");

        let tabContents = document.querySelector("#tab-contents");

        for (let i = 0; i < tabContents.children.length; i++) {

            tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b", "-mb-px", "opacity-100");
            tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
    });
});

document.getElementById("default-tab").click();
var element = document.getElementById('phone_number');
var maskOptions = {
    mask: '+998 00 000-00-00',
    lazy: false
}
var mask = new IMask(element, maskOptions);

$("#phone_number").keyup(function () {
    var text = $(this).val()
    text = text.replace(/[^0-9.]/g, "")
    text = text.slice(3)
    $("#phone").val(text)
})

if ($('#tab-contents').children(".error").length) {
    $('#tab-contents').children('.tab-pane').addClass('hidden')
    $('.error').removeClass('hidden')
    $('#tabs').children('.tab-name').removeClass("border-blue-400 border-b-4  -mb-px opacity-100")
    $('#tabs').children('.error').addClass("border-blue-400 border-b-4  -mb-px opacity-100")

}

function fileupdate() {
    var x = document.getElementById("buttons");
    x.style.display = "block";
}

function fileadd() {
    var x = document.getElementById("baatton");
    x.classList.add("hidden");
}

function ConfirmDelete() {
    var result = confirm(" @lang('lang.settings_delete')");
    if (result == true) {
        window.location.href = "http://" + window.location.hostname + "/profile/delete";
        return true;
    } else {
        console.log(result);
        return false;
    }
}
