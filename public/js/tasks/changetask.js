//Choose Task slider
document.addEventListener('DOMContentLoaded', function () {

    // const slider = new ChiefSlider('.slider', {
    //     loop: false,
    //     refresh:true
    // });
    var elms = document.querySelectorAll('.slider');
    for (var i = 0, len = elms.length; i < len; i++) {
        // инициализация elms[i] в качестве слайдера
        new ChiefSlider(elms[i]);
    }
});

//yandex maps variables
var myMap;
var multiRoute;
var place, place1 = "", place2 = "", place3 = "", place4 = "";
//yandex maps
function init_map() {

    myMap = new ymaps.Map('map', {
        center: [41.311151, 69.279737],
        zoom: 13,
        controls: ['zoomControl', 'searchControl']
    });


}

ymaps.ready(init_map);


var x = 1;

function init() {

    var suggestView0 = new ymaps.SuggestView('suggest0');

    suggestView0.events.add('select', function () {
        myFunction();
    });

    const alp = ["B", "C", "D", "E"];
    $("#addbtn").click(function () {
        if (x < 5) {
            $("#addinput").append('<div class="flex items-center gap-x-2">' +
                '<div class="bg-white hover:bg-gray-200 flex items-center rounded-lg border  w-full py-1"> ' +
                '<button class="flex-shrink-0 border-transparent text-teal-500 text-md py-1 px-2 rounded focus:outline-none" type="button">  ' + alp[x - 1] + ' </button>' +
                ' <input oninput="myFunction()" id="suggest' + (x) + '" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"' +
                ' type="text" name="location' + x + '" placeholder="Город, Улица, Дом" aria-label="Full name"> ' +
                '  </div><button id="remove_inputs" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> ' +
                ' <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 2.95v-.2A2.75 2.75 0 0 1 6 0h6a2.75 2.75 0 0 1 2.75 2.75v.2h2.45a.8.8 0 0 1 0 1.6H.8a.8.8 0 1 1 0-1.6h2.45zm10 .05v-.25c0-.69-.56-1.25-1.25-1.25H6c-.69 0-1.25.56-1.25 1.25V3h8.5z" fill="#666"/>' +
                '<path d="M14.704 6.72a.8.8 0 1 1 1.592.16l-.996 9.915a2.799 2.799 0 0 1-2.8 2.802h-7c-1.55 0-2.8-1.252-2.796-2.723l-1-9.994a.8.8 0 1 1 1.592-.16L4.3 16.794c0 .668.534 1.203 1.2 1.203h7c.665 0 1.2-.536 1.204-1.282l1-9.995z" fill="#666"/>' +
                '<path d="M12.344 7.178a.75.75 0 1 0-1.494-.13l-.784 8.965a.75.75 0 0 0 1.494.13l.784-8.965zm-6.779 0a.75.75 0 0 1 1.495-.13l.784 8.965a.75.75 0 0 1-1.494.13l-.785-8.965z" fill="#666"/></svg> </button> ' +
                '<input name="coordinates' + x + '" type="hidden" id="coordinate' + x + '"> </div>    ');
            x++;
        } else {
            alert("max five field allowed");
        }
        var suggestView = [];
        for (var i = 1; i <= x; i++) {
            suggestView[i] = new ymaps.SuggestView('suggest' + i);
            suggestView[i].events.add('select', function () {
                myFunction();
            });
        }
    });
    $("#addinput").on("click", "#remove_inputs", function () {
        $(this).parent("div").remove();

        x--;
        myFunction();
    });


    $("#getlocal").click(function () {

        var geolocation = ymaps.geolocation;
        geolocation.get({
            mapStateAutoApply: true,
        }).then(function (result) {
                // Синим цветом пометим положение, полученное через браузер.
                // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
                var userAddress = result.geoObjects.get(0).properties.get('text');
                document.getElementById("suggest0").value = userAddress;
                document.getElementById("coordinate").value = result.geoObjects.get(0).geometry.getCoordinates();

            },
            function (err) {
                console.log('Ошибка: ' + err)
            });
        myFunction();

    });


}

// Mapga yuklash joyni

function myFunction() {


    place = document.getElementById("suggest0").value;
    var myGeocoder = ymaps.geocode(place);
    myGeocoder.then(
        function (res) {
            document.getElementById("coordinate").value = res.geoObjects.get(0).geometry.getCoordinates();
            myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates());
        }
    );


    if (document.getElementById("suggest1")) {
        place1 = document.getElementById("suggest1").value;
        var myGeocoder1 = ymaps.geocode(place1);
        myGeocoder1.then(
            function (res) {
                document.getElementById("coordinate1").value = res.geoObjects.get(0).geometry.getCoordinates();

            }
        );
    } else {
        place1 = "";
    }

    myMap.destroy();

    function getbound() {
        if (place1 != "") {
            return true;
        } else {
            return false
        }
    }

    multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: [place, place1 /*, place2, place3, place4*/],

    }, {
        // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
        boundsAutoApply: getbound()
    });


    myMap = new ymaps.Map('map', {
        center: [41.311151, 69.279737],
        zoom: 13,
        controls: ['zoomControl', 'searchControl']

    });

    myMap.geoObjects.add(multiRoute);

}

ymaps.ready(init);

//Phone number formatter
var element = document.getElementById('phone');
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
