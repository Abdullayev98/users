//variable
var myMap;
var multiRoute;
var place, place1 = "",
    place2 = "",
    place3 = "",
    place4 = "";

    // btn
$("#btnclck").click(function() {
    $(".hidShad").hide()
    $(".showshad").show()
})

function backPersonalinfo() {
    $(".hidShad").show()
    $(".showshad").hide()
}

flatpickr.localize(flatpickr.l10ns.uz_latn);
flatpickr.localize(flatpickr.l10ns.ru);
flatpickr(".flatpickr", {
    wrap: true,
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
    locale: "@lang('lang.dateLang')",
}, )

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

    suggestView0.events.add('select', function() {
        myFunction();
    });

    const alp = ["B", "C", "D", "E"];



    $("#getlocal").click(function() {

        var geolocation = ymaps.geolocation;
        geolocation.get({
            mapStateAutoApply: true,
        }).then(function(result) {
                // Синим цветом пометим положение, полученное через браузер.
                // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
                var userAddress = result.geoObjects.get(0).properties.get('text');
                document.getElementById("suggest0").value = userAddress;
                document.getElementById("coordinate").value = result.geoObjects.get(0).geometry.getCoordinates();

            },
            function(err) {
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
        function(res) {
            document.getElementById("coordinate").value = res.geoObjects.get(0).geometry.getCoordinates();
            myMap.setCenter(res.geoObjects.get(0).geometry.getCoordinates());
        }

    );




    if (document.getElementById("suggest1")) {
        place1 = document.getElementById("suggest1").value;
        var myGeocoder1 = ymaps.geocode(place1);
        myGeocoder1.then(
            function(res) {
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
        referencePoints: [place, place1 /*, place2, place3, place4*/ ],

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
// end



ymaps.ready(init);
