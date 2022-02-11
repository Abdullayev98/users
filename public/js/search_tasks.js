let dataAjaxCheck=1, allCheck=1, fltrCheck = 0, r=0, m=1, p=10, s=0, sGeo=0, dl=0, k=1;
let dataAjax = [], dataAjax2 = [], dataAjaxPrint = [];
let dataGeo = [], userCoordinates = [];
$('.all_cat').click();
$(".for_check input:checkbox").each(function() {
    this.checked = true;
});

function dataAjaxCopy(dataA){
    dataAjaxPrint = [];
    if (allCheck == 1){
        dataAjaxPrint = dataA;
    }
    if (allCheck == 2){
        $.each(dataA, function (index, data) {
            $('.chi_cat').each(function () {
                if (this.checked && this.name == data.category_id) {
                    dataAjaxPrint.push(data);
                }
            });
        });
    }
}

function dataAjaxCopyRemJob(dataA) {
    dataAjaxPrint = [];
    if (allCheck == 1){
        $.each(dataA, function (index, data) {
            if (data.address == null) {
                dataAjaxPrint.push(data);
            }
        });
    }
    if (allCheck == 2){
    $.each(dataA, function (index, data) {
        $('.chi_cat').each(function () {
            if (this.checked && this.name == data.category_id && data.address == null) {
                dataAjaxPrint.push(data);
            }
        });
    });
    }
}

function ajaxFilter() {
    nameVal1 = $('#filter').val()
    nameVal2 = $('#suggest').val()
    nameVal3 = $('#price').val()
        if ($.trim(nameVal1) != '' || $.trim(nameVal2) != '' || $.trim(nameVal3) != ''){
            first_ajax('klyuch', nameVal1, nameVal2, nameVal3)
        }
}

// $("#filter").keyup(function() {
//     if ($('#filter').val().trim().length == 0) {
//         $('#svgClose').hide();
//     }else{
//         $('#svgClose').show();
//     }
// });

$('#filter').on('keypress',function(e) {
    if(e.which == 13) {
        ajaxFilter()
    }
});

$("#suggest").keyup(function() {
    if ($('#suggest').val().trim().length == 0) {
        $('#closeBut').hide();
        $('#geoBut').show();
    }else{
        $('#geoBut').hide();
        $('#closeBut').show();
    }
});

$('#suggest').on('keypress',function(e) {
    if(e.which == 13) {
        ajaxFilter()
    }
});

$("#price").keyup(function() {
    if ($('#price').val().trim().length == 0) {
        $('#prcClose').hide();
    }else{
        $('#prcClose').show();
    }
});

$('#price').on('keypress',function(e) {
    if(e.which == 13) {
        ajaxFilter()
    }
});

// $("#svgClose").click(function() {
//     $('#filter').val('');
//     $('#svgClose').hide();
// });

$("#findBut").click(function() {
    ajaxFilter();
});

$("#geoBut").click(function() {
    $('#closeBut').show();
    $('#geoBut').hide();
});

$("#closeBut").click(function() {
    $('#suggest').val('');
    $('#closeBut').hide();
    $('#geoBut').show();
});

$("#selectGeo").change(function() {
    let r0 = r;
    r = $('#selectGeo').val();
    if(r0 == 0 && r > 0){
        $('#geoBut').show();
        $('#suggest').removeAttr('disabled');
    }
    if(r == 0){
        $('#suggest').val('')
        $('#geoBut').hide()
        $('#closeBut').hide();
        $('#suggest').attr('disabled','disabled')
    }
    map_pos(k)
});

$("#prcClose").click(function() {
    $('#price').val('');
    $('#prcClose').hide();
});

$("#remJob").click(function() {
    if (this.checked == true){
        $('#byRem').hide();
        sixInOne2()
    }else {
        $('#byRem').show();
        sixInOne()
    }

    // if (dataAjaxCheck == 1) {
    //     resetCounters()
    //     tasks_list_remJob(dataAjax)
    // }else{
    //     tasks_list_remJob(dataAjax2)
    // }
});

function dataAjaxSortBy() {
    // let nameVal = $('#filter').val()
    // var msk = filterByCity(myArray, nameVal);
    if (nameVal != '') {
        dataAjaxPrint = [];
        if (allCheck == 1) {
            $.each(dataAjax, function (index, data) {
                // console.log(data.name)
                // console.log((data.name.search(new RegExp(nameVal, "i")) < 0))
                // if (data.name.search(new RegExp(nameVal, "i")) > 0) {
                // if (data.name.match(nameVal)) {
                console.log(data.name.search(nameVal))
                if (data.name.search(nameVal) !== -1) {
                    dataAjaxPrint.push(data);

                }
            })
        } else {
            $.each(dataAjax, function (index, data) {
                $('.chi_cat').each(function () {
                    if (this.checked && this.name == data.category_id) {
                        if (data.name.search(new RegExp(nameVal, "i")) > 0) {
                            dataAjaxPrint.push(data);
                            console.log('allcheck != 1')
                        }
                    }
                });
            });
        }
        sixInOne();
    }
}

function tasks_list_all(data) {
    $(".show_tasks").empty();
    $.each(data, function(index, data) {
        dl++;
        let json = JSON.parse(data.address);
        $(".show_tasks").append(
            `<div class="sort-table print_block" hidden>
                <div class="w-full border-b border-t  md:border sm:pt-3 md:p-0 hover:bg-blue-100 sm:h-32 h-36 item md:overflow-hidden" data-nomer="`+ data.start_date +`">
                    <div class="md:w-11/12 w-full sm:ml-0.5  md:m-4 sm:m-2 m-0 ml-2">
                        <div class="sm:float-left sm:w-7/12 w-full" id="results">
                            <i class="` + data.icon + ` text-2xl float-left text-blue-400 sm:mr-4 mr-3"></i>
                            <a href="/detailed-tasks/` + data.id + `" class="sm:text-lg text-base font-semibold text-blue-500 hover:text-red-600">` + data.name + `</a>
                            <p class="text-sm sm:ml-12 ml-10 sm:mt-4 sm:mt-1 mt-0 location ">` + (data.address != null ? json.location : 'Можно выполнить удаленно') + `</p>
                            <p class="text-sm sm:ml-8 ml-6 sm:mt-1 mt-0 pl-4 ">Начать ` + data.start_date + `</p>
                        </div>
                        <div class="sm:float-right sm:w-4/12 w-full sm:text-right sm:p-0 sm:ml-0 ml-10 sm:mt-1 mt-0" id="about">
                            <p  class="sm:text-lg text-sm font-semibold text-gray-700">` + data.budget + `</p>
                            <p class="text-sm sm:mt-5 sm:mt-1 mt-0">` + (dataAjaxCheck==1 ? data.category_name : data.category.name) + `</p>
                            <a href="/performers/` + data.userid + `" class="text-sm sm:mt-1 mt-0 hover:text-red-600 ">` + (dataAjaxCheck==1 ? data.user_name : data.user.name) + `</a>
                        </div>
                    </div>
                </div>
            </div>`,
        )
    });
}

function tasks_list_remJob(data) {
    $(".show_tasks").empty();
    $.each(data, function(index, data) {
        dl++;
            $(".show_tasks").append(
                `<div class="sort-table print_block" hidden>
                <div class="w-full border-b border-t  md:border sm:pt-3 md:p-0 hover:bg-blue-100 sm:h-32 h-36 item md:overflow-hidden" data-nomer="` + data.start_date + `">
                    <div class="md:w-11/12 w-full sm:ml-0.5  md:m-4 sm:m-2 m-0 ml-2">
                        <div class="sm:float-left sm:w-7/12 w-full" id="results">
                            <i class="` + data.icon + ` text-2xl float-left text-blue-400 sm:mr-4 mr-3"></i>
                            <a href="/detailed-tasks/` + data.id + `" class="sm:text-lg text-base font-semibold text-blue-500 hover:text-red-600">` + data.name + `</a>
                            <p class="text-sm sm:ml-12 ml-10 sm:mt-4 sm:mt-1 mt-0 location ">Можно выполнить удаленно</p>
                            <p class="text-sm sm:ml-8 ml-6 sm:mt-1 mt-0 pl-4 ">Начать ` + data.start_date + `</p>
                        </div>
                        <div class="sm:float-right sm:w-4/12 w-full sm:text-right sm:p-0 sm:ml-0 ml-10 sm:mt-1 mt-0" id="about">
                            <p  class="sm:text-lg text-sm font-semibold text-gray-700">` + data.budget + `</p>
                            <p class="text-sm sm:mt-5 sm:mt-1 mt-0">` + (dataAjaxCheck == 1 ? data.category_name : data.category.name) + `</p>
                            <a href="/performers/` + data.userid + `" class="text-sm sm:mt-1 mt-0 hover:text-red-600 ">` + (dataAjaxCheck == 1 ? data.user_name : data.user.name) + `</a>
                        </div>
                    </div>
                </div>
            </div>`,
            )
    });
}

$(".rotate").click(function() {
    $(this).toggleClass("rotate-[360deg]");
});

// function enDis(rr){
//     if (rr == 0){
//
//         // $('#mpshow').attr("disabled","disabled")
//     }else {
//
//         // $('#mpshow').removeAttr("disabled")
//     }
// }

function resetCounters(){
    $('.butt').removeAttr("disabled")
    s=0, dl=0;
}

function maps_show(){
    dataGeo = [];
    if(dataAjaxPrint.length != 0) {
        for (var i in dataAjaxPrint) {
            dataGeo.push(dataAjaxPrint[i].coordinates.split(','));
        }
    }
    map_pos(k)
}

function sixInOne(){
    resetCounters()
    if(dataAjaxCheck == 0) {
        dataAjaxPrint = [];
    }
    if(dataAjaxCheck == 1) {
        dataAjaxCopy(dataAjax)
    }else {
        dataAjaxCopy(dataAjax2)
    }
    if(dataAjaxPrint.length == 0){
        img_show();
    }else {
        tasks_list_all(dataAjaxPrint)
        tasks_show()
        maps_show()
    }
}

function sixInOne2(){
    resetCounters()
    if(dataAjaxCheck == 0) {
        dataAjaxPrint = [];
    }
    if(dataAjaxCheck == 1) {
        dataAjaxCopyRemJob(dataAjax)
        console.log(dataAjaxPrint)
    }else {
        dataAjaxCopyRemJob(dataAjax2)
        console.log(dataAjaxPrint)
    }
    if(dataAjaxPrint.length == 0){
        img_show();
    }else{
        tasks_list_remJob(dataAjaxPrint)
        tasks_show()
        maps_show()
    }
}

function img_show() {
    $('.no_tasks').removeAttr('hidden');
    $(".show_tasks").empty();
    // $(".small-map").empty();
    // $(".big-map").empty();
    $('.lM').attr("hidden","hidden")
}

function tasks_show(){
    let i=1;
    $('.print_block').each(function() {
        if ((this.hidden) && (i <= p) && (s <= dl))
        {
            this.hidden = false;
            i++
            s++
        }
    });
    $('.no_tasks').attr("hidden","hidden")
    $('.lM').removeAttr('hidden');
    $('#pnum').html(s)
    $('#snum').html(dl)
    if (s==dl){
        // $('.butt').attr("disabled","disabled")
        $('.butt').hide()
    }
}

$('.all_cat').click(function() {
    if (this.checked == false) {
        $(".for_check input:checkbox").each(function() {
            this.checked = false;
        });
        allCheck = 0;
        img_show();
    } else {
        $(".for_check input:checkbox").each(function() {
            this.checked = true;
        });
        allCheck = 1;
        sixInOne();
    }
});

$('.par_cat').click(function() {
    if (this.checked == false) {
        parcats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            allCheck = 2;
            sixInOne();
        } else {
            allCheck = 0;
            img_show()
        }
    } else {
        parcats_click_true(this.id, this.name)
        sixInOne();
    }
});

$('.chi_cat').click(function() {
    if (this.checked == false) {
        chicats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            allCheck = 2;
            sixInOne();
        } else {
            allCheck = 0;
            img_show()
        }
    } else {
        chicats_click_true(this.id, this.name)
        sixInOne();
    }
});

function parcats_click_true(id, name) {
    $('.chi_cat').each(function() {
        if (this.id == id) {
            this.checked = true;
        }
    });
    $('.all_cat').each(function() {
        if (parcat_check()) {
            this.checked = true;
            allCheck = 1;
        } else {
            this.checked = false;
            allCheck = 2;
        }
    });
}

function parcats_click_false(id) {
    $('.par_cat').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
    $('.all_cat').each(function() {
        this.checked = false;
    });
    $('.chi_cat').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
}

function parcat_check() {
    let i = 1;
    $('.par_cat').each(function() {
        if (this.checked == false) {
            i = 0;
            return false;
        }
    });
    return i;
}

function chicats_click_true(id, name) {
    $('.chi_cat').each(function() {
        if (this.name == name) {
            this.checked = true;
        }
    });
    $('.par_cat').each(function() {
        if (this.id == id) {
            if (chicat_check(id))
            {this.checked = true;}
        }
    });
    $('.all_cat').each(function() {
        if (parcat_check()) {
            this.checked = true;
            allCheck = 1;
        } else {
            this.checked = false;
            allCheck = 2;
        }
    });
}

function chicats_click_false(id, name) {
    $('.par_cat').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
    $('.all_cat').each(function() {
        this.checked = false;
    });
}

function chicat_check(id) {
    let i = 1;
    $('.chi_cat').each(function() {
        if (this.id == id) {
            if (this.checked == false) {
                i = 0;
                return false;
            }
        }
    });
    return i;
}

function chicat_check_print() {
    let i = 0;
    $('.chi_cat').each(function() {
        if (this.checked) {
            i = 1;
            return false;
        }
    });
    return i;
}

// $(document).ready(function(){
//
//     $("#srochnost").click(function(){
//         first_ajax('sroch')
//     });
//     $(".byid").click(function(){
//         first_ajax('all')
//     });
//     $("#as").click(function(){
//         first_ajax('udal')
//     });
//     $(".checkboxByAs").change(function() {
//         if(this.checked) {
//             first_ajax('udal')
//         }else {
//             first_ajax('all')
//         }
//     });
// });

function map_pos(mm) {
    if (mm) {
        k=1;
        $(".small-map").empty();
        $(".big-map").empty();
        $(".small-map").append(
            `<div id="map2" class="h-60 my-5 rounded-lg w-full static">
             <div class="relative float-right z-10 ml-1"><img src="/images/big-map.png" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kattalashtirish" onclick="map_pos(0)"/></div>
             </div>`
        );

        // ymaps.ready(init);
        // function init() {
        //     var myInput = document.getElementById("suggest");
        //     var location = ymaps.geolocation;
        //
        //     location.get({
        //         mapStateAutoApply: true
        //     })
        //         .then(
        //             function(result) {
        //                 let userCoord = result.geoObjects.get(0).geometry.getCoordinates();
        //                 userCoordinates = userCoord;
        //
        //             },
        //             function(err) {
        //                 console.log('Ошибка: ' + err)
        //             }
        //         );
        //
        //
        //     var suggestView1 = new ymaps.SuggestView('suggest');
        //     var myMap2 = new ymaps.Map('map2', {
        //         center: userCoordinates,
        //         // center: [41.317648, 69.230585],
        //         zoom: 10,
        //         controls: ['geolocationControl'],
        //         behaviors: ['default', 'scrollZoomNo']
        //     }, {
        //         // searchControlProvider: 'yandex#search'
        //     });
        //
        //     $("#mpshow").click(function(){
        //         location.get({
        //             mapStateAutoApply: true
        //         })
        //             .then(
        //                 function(result) {
        //                     myInput.value = result.geoObjects.get(0).properties.get('text');
        //                     userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
        //                     // myMap2.geoObjects.add(result.geoObjects)
        //                 },
        //                 function(err) {
        //                     console.log('Ошибка: ' + err)
        //                 }
        //             );
        //     });
        //
        //     ///////////////////////////////////////
        //     // var myGeocoder = ymaps.geocode(myInput);
        //     // myGeocoder.then(
        //     //     function (res) {
        //     //         alert('Координаты объекта :' + res.geoObjects.get(0).geometry.getCoordinates());
        //     //     },
        //     //     function (err) {
        //     //         alert('Ошибка');
        //     //     }
        //     // );
        //     ///////////////////////////////////////
        //
        //     clusterer = new ymaps.Clusterer({
        //         preset: 'islands#invertedGreenClusterIcons',
        //         hasBalloon: false,
        //         groupByCoordinates: false,
        //         clusterDisableClickZoom: true,
        //         clusterHideIconOnBalloonOpen: false,
        //         geoObjectHideIconOnBalloonOpen: false
        //     });
        //     getPointData = function (index) {
        //         return {
        //             balloonContentHeader: '<font size=3><b><a target="_blank" href="https://yandex.ru">Здесь может быть ваша ссылка</a></b></font>',
        //             balloonContentBody: '<p>Ваше имя: <input name="login"></p><p>Телефон в формате 2xxx-xxx:  <input></p><p><input type="submit" value="Отправить"></p>',
        //             balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
        //             clusterCaption: 'метка <strong>' + index + '</strong>'
        //         };
        //     }
        //     getPointOptions = function () {
        //         return {
        //             preset: 'islands#greenIcon'
        //         };
        //     }
        // // , sGeo <= dl
        // //     for (var i = 0, k = 1; k <= p; i++, k++, sGeo++) {
        // //         if (k > dataGeo.length || sGeo>dl){break}
        // //         geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData[i], getPointOptions());
        // //     }
        // //     geoObjects = [];
        //     // for (var i = 0; i < dataGeo.length; i++) {
        //     //     geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
        //     // }
        //     geoObjects = [];
        //     for (var i = 0; i < dataGeo.length; i++) {
        //         geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
        //     }
        //     clusterer.options.set({
        //         gridSize: 80,
        //         clusterDisableClickZoom: true
        //     });
        //     clusterer.add(geoObjects);
        //     myMap2.geoObjects.add(clusterer);
        //     myMap2.setBounds(clusterer.getBounds(), {
        //         checkZoomRange: true
        //     });
        //     circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
        //     myMap2.geoObjects.add(circle);
        // }

        ymaps.ready(init);
        function init() {

            var myInput = document.getElementById("suggest");
            var location = ymaps.geolocation;

            location.get({
                mapStateAutoApply: true
            })
                .then(
                    function(result) {
                        let userCoord = result.geoObjects.get(0).geometry.getCoordinates();
                        userCoordinates = userCoord;

                    },
                    function(err) {
                        console.log('Ошибка: ' + err)
                    }
                );

            $("#geoBut").click(function(){
                location.get({
                    mapStateAutoApply: true
                })
                    .then(
                        function(result) {
                            myInput.value = result.geoObjects.get(0).properties.get('text');
                            userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                            // myMap2.geoObjects.add(result.geoObjects)
                        },
                        function(err) {
                            console.log('Ошибка: ' + err)
                        }
                    );
            });
            // var suggestView1 = new ymaps.SuggestView('suggest');
            var myMap2 = new ymaps.Map('map2', {
                // center: userCoordinates,
                // center: [41.317648, 69.230585],
                center: [55.10, 37.45],
                zoom: 15,
                controls: ['geolocationControl'],
                behaviors: ['default', 'scrollZoomNo']
            }, {
                searchControlProvider: 'yandex#search'
            });

            circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: true, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
            myMap2.geoObjects.add(circle);

            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedGreenClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            });
            getPointData = function (index) {
                return {
                    // balloonContentHeader: '<font size=3><b><a href="/detailed-tasks/' + dataAjax[index].id + '">' + dataAjax[index].name + '</a></b></font>',
                    balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjaxPrint[index].id + '">' + dataAjaxPrint[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjaxPrint[index].start_date + ' - ' + dataAjaxPrint[index].end_date + '</p></font><br><font size=3><p>' + dataAjaxPrint[index].budget + '</p></font>',
                    // balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
                    clusterCaption: 'Задания <strong>' + dataAjaxPrint[index].id + '</strong>'
                };
            }
            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            }
            // for (var i = 0; i <= p-1, sGeo <= dl; i++, sGeo++) {
            //     geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData[i], getPointOptions());
            // }
            geoObjects = [];
            if(dataGeo.length != 0) {
                for (var i = 0; i < dataGeo.length; i++) {
                    geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
                }
            }

            clusterer.options.set({
                gridSize: 80,
                clusterDisableClickZoom: true
            });

            clusterer.add(geoObjects);
            myMap2.geoObjects.add(clusterer);
            myMap2.setBounds(clusterer.getBounds(), {
                checkZoomRange: false
            });



            // objects.searchInside(circle).addToMap(myMap2);
                // И затем добавим найденные объекты на карту.


            myMap2.events.add('boundschange', function () {
                // После каждого сдвига карты будем смотреть, какие объекты попадают в видимую область.
                var visibleObjects = objects.searchInside(circle).addToMap(myMap2);
                // Оставшиеся объекты будем удалять с карты.
                objects.remove(visibleObjects).removeFromMap(myMap2);
            });

            // circle.events.add('visible', function () {
            //     // Объекты, попадающие в круг, будут становиться красными.
            //     var objectsInsideCircle = objects.searchInside(circle);
            //     objectsInsideCircle.setOptions('visible', 'true');
            //     // Оставшиеся объекты - синими.
            //     objects.remove(objectsInsideCircle).setOptions('visible', 'false');
            // });





            // myMap2.geoObjects.add(searchIntersect(myMap2));
            // ymaps.geoQuery(geoObjects).addToMap(myMap2);
            // ymaps.geoQuery(myMap2.geoObjects).searchIntersect(myMap2);
            // geoQuery(geoObjects).addToMap(myMap2);
            // geoQuery(myMap2.geoObjects).searchIntersect(myMap2);

            // $distance = 2 * asin(sqrt( pow(sin(deg2rad( ($lat1-$lat2) / 2)), 2) +
            //     cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            //     pow(sin(deg2rad(($lng1- $lng2) / 2)), 2))) * 6378245;
        }

    } else {
        k=0;
        $(".big-map").empty();
        $(".small-map").empty();
        $(".big-map").append(
            `<div id="map3" class="h-80 my-5 rounded-lg w-3/3 static align-items-center">
             <div class="relative float-right z-10 ml-1"><img src="/images/small-map.png" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kichiklashtirish" onclick="map_pos(1)"/></div>
             </div>`
        )
        ymaps.ready(init);
        function init() {
            var myMap3 = new ymaps.Map('map3', {
                // center: userCoordinates,
                center: [41.317648, 69.230585],
                zoom: 15,
                controls: ['geolocationControl'],
                behaviors: ['default', 'scrollZoomNo']
            }, {
                searchControlProvider: 'yandex#search'
            });

            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedGreenClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            });
            getPointData = function (index) {
                return {
                    // balloonContentHeader: '<font size=3><b><a href="/detailed-tasks/' + dataAjaxPrint[index].id + '">' + dataAjaxPrint[index].name + '</a></b></font>',
                    balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjaxPrint[index].id + '">' + dataAjaxPrint[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjaxPrint[index].start_date + ' - ' + dataAjaxPrint[index].end_date + '</p></font><br><font size=3><p>' + dataAjaxPrint[index].budget + '</p></font>',
                    // balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
                    clusterCaption: 'Задания <strong>' + dataAjaxPrint[index].id + '</strong>'
                };
            }
            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            }
            // for (var i = 0; i <= p-1, sGeo <= dl; i++, sGeo++) {
            //     geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData[i], getPointOptions());
            // }
            geoObjects = [];
            for (var i = 0; i < dataGeo.length; i++) {
                geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
            }
            clusterer.options.set({
                gridSize: 80,
                clusterDisableClickZoom: false
            });

            clusterer.add(geoObjects);
            myMap3.geoObjects.add(clusterer);
            myMap3.setBounds(clusterer.getBounds(), {
                checkZoomRange: false
            });
            circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
            myMap3.geoObjects.add(circle);


        }
    }
}

function map1_show (){
    $("#big-big").empty();
    $("#big-big").append(
        `<div id="map1" class="h-52 overflow-hidden my-5 rounded-lg w-full static">
<!--                <div class="relative float-right z-10 ml-1"><img src="/images/big-map.png')}}" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kattalashtirish" onclick="map_pos(0)"/></div>-->
            </div>`
    )
    ymaps.ready(init);
    function init() {
        var myMap1 = new ymaps.Map('map1', {
                center: [41.317648, 69.230585],
                zoom: 10,
                // behaviors: ['default', 'scrollZoom']
            }, {
                searchControlProvider: 'yandex#search'
            }),

            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedVioletClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            }),

            getPointOptions = function () {
                return {
                    preset: 'islands#violetIcon'
                };
            },
            geoObjects = [];
        dataGeo = [];
        for (var i in dataAjaxPrint) {
            dataGeo.push(dataAjaxPrint[i].coordinates.split(','));
        }

        for (var i = 0; i <= p-1, sGeo <= dl; i++, sGeo++) {
            geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData[i], getPointOptions());
        }

        clusterer.options.set({
            gridSize: 80,
            clusterDisableClickZoom: false
        });
        clusterer.add(geoObjects);
        myMap1.geoObjects.add(clusterer);
        myMap1.setBounds(clusterer.getBounds(), {
            checkZoomRange: false
        });

        circle = new ymaps.Circle([[41.317648, 69.230585], r * 1000], null, {draggable: true}, {fill: false});
        myMap1.geoObjects.add(circle);
    }
}

// script for mobile

$(document).ready(function() {
    $("#show").click(function() {
        map1_show();
        $("#hide").css('display', 'block');
        $("#show").css('display', 'none');
        $("#scrollbar").css('display', 'none');
        $("footer").css('display', 'none');
        $('#big-big').removeClass("hidden");
    });
    $("#hide").click(function() {
        $('#big-big').addClass("hidden");
        $("#hide").css('display', 'none');
        $("#show").css('display', 'block');
        $("#scrollbar").css('display', 'block');
        $("footer").css('display', 'block');
    });
});
