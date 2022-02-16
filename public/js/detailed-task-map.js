ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
        center: [{{$task->coordinates}}],
        zoom: 10,
        controls: []
}),

    // Создаем геообъект с типом геометрии "Точка".
    myGeoObject = new ymaps.GeoObject({
        // Описание геометрии.
    }, {
        // Опции.
        // Иконка метки будет растягиваться под размер ее содержимого.
        preset: 'islands#blackStretchyIcon',
        // Метку можно перемещать.
        draggable: true
    });

    myMap.geoObjects
        .add(myGeoObject)
        .add(new ymaps.Placemark([{{$task->coordinates}}], {
        balloonContent: 'цвет <strong>воды пляжа бонди</strong>'
    }, {
        preset: 'islands#icon',
            iconColor: '#0095b6'
    }));
}
