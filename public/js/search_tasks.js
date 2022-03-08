let dl=0, k=1, m=1, p=10, r=0, s=0;
let dataAjaxCheck = 1, allCheck = 1, remJobCheck = 0, bezOtkCheck = 0;
let dataAjax = [], dataAjax2 = [], dataAjaxPrint = [];
let dataGeo = [], userCoordinates = [[],[]];
$('.all_cat').click();
$(".for_check input:checkbox").each(function() {
    this.checked = true;
});

function dataAjaxCopy(dataA){
    dataAjaxPrint = [];
    if (allCheck == 1 && remJobCheck == 0 && bezOtkCheck == 0){
        dataAjaxPrint = dataA;
    }
    if (allCheck == 1 && remJobCheck == 1 && bezOtkCheck == 0){
        $.each(dataA, function (index, data) {
            if (data.address == null) {
                dataAjaxPrint.push(data);
            }
        });
    }
    if (allCheck == 1 && remJobCheck == 0 && bezOtkCheck == 1){
        $.each(dataA, function (index, data) {
            if (data.address != null && data.status == 1) {
                dataAjaxPrint.push(data);
            }
        });
    }
    if (allCheck == 1 && remJobCheck == 1 && bezOtkCheck == 1){
        $.each(dataA, function (index, data) {
            if (data.address == null && data.status == 1) {
                dataAjaxPrint.push(data);
            }
        });
    }
    if (allCheck == 2 && remJobCheck == 0 && bezOtkCheck == 0){
        $.each(dataA, function (index, data) {
            $('.chi_cat').each(function () {
                if (this.checked && this.name == data.category_id) {
                    dataAjaxPrint.push(data);
                }
            });
        });
    }
    if (allCheck == 2 && remJobCheck == 1 && bezOtkCheck == 0){
        $.each(dataA, function (index, data) {
            $('.chi_cat').each(function () {
                if (this.checked && this.name == data.category_id && data.address == null) {
                    dataAjaxPrint.push(data);
                }
            });
        });
    }
    if (allCheck == 2 && remJobCheck == 0 && bezOtkCheck == 1){
        $.each(dataA, function (index, data) {
            $('.chi_cat').each(function () {
                if (this.checked && this.name == data.category_id && data.status == 1) {
                    dataAjaxPrint.push(data);
                }
            });
        });
    }
    if (allCheck == 2 && remJobCheck == 1 && bezOtkCheck == 1){
        $.each(dataA, function (index, data) {
            $('.chi_cat').each(function () {
                if (this.checked && this.name == data.category_id && data.address == null && data.status == 1) {
                    dataAjaxPrint.push(data);
                }
            });
        });
    }
}

function jqFilter() {
    filterVal = $('#filter').val()
    suggestVal = $('#suggest').val()
    priceVal = $('#price').val()
    if ($.trim(filterVal) != '' || $.trim(suggestVal) != '' || $.trim(priceVal) != ''){
        dataAjaxFindThree(dataAjax, filterVal, suggestVal, priceVal)
    }
    if ($.trim(filterVal) == '' && $.trim(suggestVal) == '' && $.trim(priceVal) == ''){
        dataAjaxCheck = 1;
        sixInOne();
    }
}

$("#filter").keyup(function() {
    if ($('#filter').val().trim().length == 0) {
        $('#svgClose').hide();
        jqFilter()
    }else{
        $('#svgClose').show();
    }
});

$('#filter').on('keypress',function(e) {
    if(e.which == 13) {
        jqFilter()
    }
});

$("#svgClose").click(function() {
    $('#filter').val('');
    $('#svgClose').hide();
    jqFilter();
});


$("#suggest").keyup(function() {
    if ($('#suggest').val().trim().length == 0) {
        $('#closeBut').hide();
        $('#geoBut').show();
        // jqFilter()
    }else{
        $('#geoBut').hide();
        $('#closeBut').show();
    }
});

$('#suggest').on('keypress',function(e) {
    if(e.which == 13) {
        jqFilter()
    }
});

$("#price").keyup(function() {
    if ($('#price').val().trim().length == 0) {
        $('#prcClose').hide();
        jqFilter()
    }else{
        $('#prcClose').show();
    }
});

$('#price').on('keypress',function(e) {
    if(e.which == 13) {
        jqFilter()
    }
});

$("#findBut").click(function() {
    jqFilter();
});

$("#findBut2").click(function() {
    jqFilter();
});

$("#geoBut").click(function() {
    $('#closeBut').show();
    $('#geoBut').hide();
});

$("#geobut2").click(function() {
    $('#closeBut2').show();
    $('#geobut2').hide();
});

$("#closeBut").click(function() {
    $('#suggest').val('');
    $('#closeBut').hide();
    $('#geoBut').show();
    jqFilter()
});

$("#closeBut2").click(function() {
    $('#suggest2').val('');
    $('#closeBut2').hide();
    $('#geobut2').show();
    jqFilter()
});

$("#selectGeo").change(function() {
    r = $('#selectGeo').val();
    map_pos(k)
});

$("#prcClose").click(function() {
    $('#price').val('');
    $('#prcClose').hide();
    jqFilter();
});

$("#remJob").click(function() {
    if (this.checked == true){
        remJobCheck = 1;
    }else {
        remJobCheck = 0;
    }
    sixInOne();
});

$("#noResp").click(function() {
    if (this.checked == true) {
        bezOtkCheck = 1;
    } else {
        bezOtkCheck = 0;
    }
    sixInOne()
});

$("#byDate").click(function() {
    dataAjaxSortByDS(dataAjaxPrint, 1)
    $('#byDate').attr('disabled','disabled');
    $('#bySroch').removeAttr('disabled');
});
$("#bySroch").click(function() {
    dataAjaxSortByDS(dataAjaxPrint, 2)
    $('#bySroch').attr('disabled','disabled');
    $('#byDate').removeAttr('disabled');
});

function dataAjaxSortByDS(arr, numb) {
    if (numb == 1) {
        arr.sort((a, b) => a.updated_at > b.updated_at ? 1 : -1);
        resetCounters()
        tasks_list_all(dataAjaxPrint)
        tasks_show()
    }else{
        arr.sort((a, b) => a.end_date > b.end_date ? 1 : -1);
        resetCounters()
        tasks_list_all(dataAjaxPrint)
        tasks_show()
    }
}

function dataAjaxFindThree(dataA, str1, str2, num) {
    dataAjax2 = [];
        $.each(dataA, function (index, data) {
            if (str1 == ''){nmeVl1 = false}
            else {
                nmeVl1 = data.name.toLowerCase().includes(str1.toLowerCase())
            }
            if (str2 == ''){nmeVl2 = false}
            else {
                nmeVl2 = data.address.toLowerCase().includes(str2.toLowerCase())
            }
            if (num == ''){nmeVl3 = false}
            else {
                nmeVl3 = data.budget.includes(num)
            }
            if (str1 != '' && str2 == '' && num == '') {
                if (nmeVl1) {
                    dataAjax2.push(data);
                }
            }
            if (str1 != '' && str2 != '' && num == '') {
                if (nmeVl1 && nmeVl2) {
                    dataAjax2.push(data);
                }
            }
            if (str1 != '' && str2 != '' && num != '') {
                if (nmeVl1 && nmeVl2 && nmeVl3) {
                    dataAjax2.push(data);
                }
            }
            if (str1 == '' && str2 != '' && num != '') {
                if (nmeVl2 && nmeVl3) {
                    dataAjax2.push(data);
                }
            }
            if (str1 == '' && str2 != '' && num == '') {
                if (nmeVl2) {
                    dataAjax2.push(data);
                }
            }
            if (str1 == '' && str2 == '' && num != '') {
                if (nmeVl3) {
                    dataAjax2.push(data);
                }
            }
            if (str1 != '' && str2 == '' && num != '') {
                if (nmeVl1 && nmeVl3) {
                    dataAjax2.push(data);
                }
            }
        });
        if (dataAjax2.length != 0){
            dataAjaxCheck = 2
            sixInOne()
        }
        // else{
            // resetCounters()
            // tasks_list_all(dataAjaxPrint)
            // tasks_show()
            // maps_show()
        // }
}

function tasks_list_all(data) {
    $(".show_tasks").empty();
    $.each(data, function(index, data) {
        dl++;
        let json = JSON.parse(data.address);
        $(".show_tasks").append(
            `<div class="sort-table print_block" id="` + data.id + `" hidden>
                <div class="w-full border-b border-t  md:border sm:pt-3 md:p-0 hover:bg-blue-100 sm:h-32 h-38 item md:overflow-hidden" data-nomer="`+ data.start_date +`">
                    <div class="md:w-11/12 w-full mx-auto mt-3">
                        <div class="sm:float-left sm:w-7/12 w-full" id="results">
                            <img src="storage/` + data.icon.replace("\\","/") + `" class="text-2xl float-left text-blue-400 sm:mr-4 mr-3"/>
                            <a href="/detailed-tasks/` + data.id + `" class="sm:text-lg text-base font-semibold text-blue-500 hover:text-red-600">` + data.name + `</a>
                            <p class="text-sm sm:ml-12 ml-10 sm:mt-4 sm:mt-1 mt-0 location ">` + (data.address != null ? json.location : 'Можно выполнить удаленно') + `</p>
                            <p class="text-sm sm:ml-8 ml-6 sm:mt-1 mt-0 pl-4 ">Начать ` + data.start_date + `</p>
                        </div>
                        <div class="sm:float-right sm:w-4/12 w-full sm:text-right sm:p-0 sm:ml-0 ml-10 mt-0" id="about">
                            <p  class="sm:text-lg text-sm font-semibold text-gray-700">` + data.budget + `</p>
                            <span  class="text-sm sm:mt-5 sm:mt-1 mt-0">Откликов - ` + data.responses.length + `</span>
                            <p class="text-sm sm:mt-1 mt-0">` + data.category_name + `</p>
                            <a href="/performers/` + data.user_id + `" class="text-sm sm:mt-1 mt-0 hover:text-red-600 ">` + data.user_name + `</a>
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

function resetCounters(){
    $('.butt').removeAttr("disabled")
    s=0, dl=0;
}

function maps_show(){
    dataGeo = [];
    if (dataAjaxPrint.length != 0) {
        for (var i = 0; i < dataAjaxPrint.length; i++) {
            dataGeo.push(dataAjaxPrint[i].coordinates.split(','));
        }
    }
    map_pos(k)
    // map1_show()
}

function sixInOne(){
    resetCounters()
    if(dataAjaxCheck == 0) {
        dataAjaxPrint = [];
    }
    if(dataAjaxCheck == 1) {
        dataAjaxCopy(dataAjax)
    }
    if (dataAjaxCheck == 2){
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

function img_show() {
    $('.no_tasks').removeAttr('hidden');
    $(".show_tasks").empty();
    $('.lM').attr("hidden","hidden")
}

function tasks_show(){
    let i = 1, id;
    $('.print_block').each(function() {
        if ((this.hidden) && (i <= p) && (s <= dl))
        {
            id = this.id
            this.hidden = false;
            i++
            s++
        }
    });
    $('.no_tasks').attr("hidden","hidden")
    $('.lM').removeAttr('hidden');
    $('#pnum').html(s)
    $('#snum').html(dl)
    if (s==dl) {
        $('.butt').hide()
    }else{
        $('.butt').show()
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
        parcats_click_true(this.id)
        sixInOne();
    }
});

$('.chi_cat').click(function() {
    if (this.checked == false) {
        chicats_click_false(this.id)
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

function parcats_click_true(id) {
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

function chicats_click_false(id) {
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

        ymaps.ready(init);
        function init() {
            let location = ymaps.geolocation;
            sugVal = document.getElementById("suggest").value;
            if (sugVal != '') {
                var myGeo = ymaps.geocode(sugVal);
                myGeo.then(
                    function (res) {
                        let userCoord = res.geoObjects.get(0).geometry.getCoordinates();
                        userCoordinates = userCoord;
                        myMap2.geoObjects.add(result.geoObjects)
                        // myMap.setCenter( res.geoObjects.get(0).geometry.getCoordinates());
                    }
                );
            }else {
                // var suggestView = new ymaps.SuggestView('suggest');
                // let myInput = new ymaps.SuggestView('suggest');
                // console.log(myInput)
                // let myInput = document.getElementById("suggest");

                location.get({
                    mapStateAutoApply: true
                })
                    .then(
                        function (result) {
                            let userCoord = result.geoObjects.get(0).geometry.getCoordinates();
                            userCoordinates = userCoord;
                            // myMap2.geoObjects.add(result.geoObjects)

                        },
                        function (err) {
                            console.log('Ошибка: ' + err)
                        }
                    );
            }

            // var suggestView1 = new ymaps.SuggestView('suggest');
            let myMap2 = new ymaps.Map('map2', {
                center: [userCoordinates[0], userCoordinates[1]],
                zoom: 13,
                controls: [],
                // controls: ['zoomControl','geolocationControl'],
                behaviors: ['default', 'scrollZoom']
            }, {
                searchControlProvider: 'yandex#search'
            });

            $("#geoBut").click(function(){
                location.get({
                    mapStateAutoApply: true
                })
                    .then(
                        function(result) {
                            document.getElementById("suggest").value = result.geoObjects.get(0).properties.get('text');
                            userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                            myMap2.geoObjects.add(result.geoObjects)
                            myMap2.setCenter(result.geoObjects.get(0).geometry.getCoordinates());
                        },
                        function(err) {
                            console.log('Ошибка: ' + err)
                        }
                    );
            });



            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedGreenClusterIcons',
                // hasBalloon: false,
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            });
            getPointData = function (index) {
                return {
                    balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjaxPrint[index].id + '">' + dataAjaxPrint[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjaxPrint[index].start_date + ' - ' + dataAjaxPrint[index].end_date + '</p></font><br><font size=3><p>' + dataAjaxPrint[index].budget + '</p></font>',
                    clusterCaption: 'Задания <strong>' + dataAjaxPrint[index].id + '</strong>'
                };
            }
            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            }

            geoObjects = [];
            if (dataGeo.length != 0) {
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
                boundsAutoApply: true,
                checkZoomRange: true
            });

            circle = new ymaps.Circle([userCoordinates, r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
            myMap2.geoObjects.add(circle);

            // circle.events.add('visible', function () {
            //     var objectsInsideCircle = objects.searchInside(circle);
            //     objectsInsideCircle.setOptions('visible', 'true');
            //     objects.remove(objectsInsideCircle).setOptions('visible', 'false');
            // });

            // Circle ichiga joylashish nuqtasini hisoblash formulasi...
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
                center: [userCoordinates[0], userCoordinates[1]],
                zoom: 10,
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
                    balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjaxPrint[index].id + '">' + dataAjaxPrint[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjaxPrint[index].start_date + ' - ' + dataAjaxPrint[index].end_date + '</p></font><br><font size=3><p>' + dataAjaxPrint[index].budget + '</p></font>',
                    clusterCaption: 'Задания <strong>' + dataAjaxPrint[index].id + '</strong>'
                };
            }
            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            }

            geoObjects = [];
            if (dataGeo.length != 0) {
                for (var i = 0; i < dataGeo.length; i++) {
                    geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
                }
            }
            clusterer.options.set({
                gridSize: 80,
                clusterDisableClickZoom: true
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
         </div>`
    )
    ymaps.ready(init);
    function init() {

        var myInput2 = document.getElementById("suggest2");
        let location = ymaps.geolocation;

        location.get({
            mapStateAutoApply: true
        })
            .then(
                function(result) {
                    userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                },
                function(err) {
                    console.log('Ошибка: ' + err)
                }
            );

        $("#geoBut5").click(function(){
            location.get({
                mapStateAutoApply: true
            })
                .then(
                    function(result) {
                        myInput2.value = result.geoObjects.get(0).properties.get('text');
                        userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                    },
                    function(err) {
                        console.log('Ошибка: ' + err)
                    }
                );
        });

        $("#geobut2").click(function(){
            location.get({
                mapStateAutoApply: true
            })
                .then(
                    function(result) {
                        document.getElementById("suggest2").value = result.geoObjects.get(0).properties.get('text');
                        userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                        myMap1.geoObjects.add(result.geoObjects);
                        myMap1.setCenter(result.geoObjects.get(0).geometry.getCoordinates());
                    },
                    function(err) {
                        console.log('Ошибка: ' + err)
                    }
                );
        });

        var myMap1 = new ymaps.Map('map1', {
                center: [userCoordinates[0], userCoordinates[1]],
                controls: ['geolocationControl'],
                zoom: 10,
                // behaviors: ['default', 'scrollZoom']
            }, {
                // searchControlProvider: 'yandex#search'
            }),

            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedGreenClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            }),

            getPointData = function (index) {
                return {
                    balloonContentBody: '<br><font size=4><b><a href="">' + dataAjaxPrint[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjaxPrint[index].start_date + ' - ' + dataAjaxPrint[index].end_date + '</p></font><br><font size=3><p>' + dataAjaxPrint[index].budget + '</p></font>',
                    clusterCaption: 'Задания <strong>' + dataAjaxPrint[index].id + '</strong>'
                };
            }

            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            },
            geoObjects = [];
            if (dataGeo.length != 0) {
                for (var i = 0; i < dataGeo.length; i++) {
                    geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointData(i), getPointOptions());
                }
            }


        clusterer.options.set({
            gridSize: 80,
            clusterDisableClickZoom: true
        });
        clusterer.add(geoObjects);
        myMap1.geoObjects.add(clusterer);
        myMap1.setBounds(clusterer.getBounds(), {
            checkZoomRange: false
        });

        circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
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

$(document).ready(function() {
    $("#show_2").click(function() {
        $("#hide_2").css('display', 'block');
        $("#show_2").css('display', 'none');
        $("#mobile_bar").css('display', 'block');
    });
    $("#hide_2").click(function() {
        $("#hide_2").css('display', 'none');
        $("#show_2").css('display', 'block');
        $("#mobile_bar").css('display', 'none');
    });
});

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

function toggleModal(){
    document.getElementById("modal-id").classList.toggle("hidden");
    document.getElementById("modal-id" + "-backdrop").classList.toggle("hidden");
    document.getElementById("modal-id").classList.toggle("flex");
    document.getElementById("modal-id" + "-backdrop").classList.toggle("flex");
}
function toggleModal1(){
    var element = document.getElementById("modal-id-backdrop");
    element.classList.add("hidden");
    var element2 = document.getElementById("modal-id");
    var b = document.getElementById("myText").value;
    var u = document.getElementById("amount_u");
    u.value = b;
    element2.classList.add("hidden");
    document.getElementById("modal-id1").classList.toggle("hidden");
    document.getElementById("modal-id1" + "-backdrop").classList.toggle("hidden");
    document.getElementById("modal-id1").classList.toggle("flex");
    document.getElementById("modal-id1" + "-backdrop").classList.toggle("flex");
}
function borderColor() {
    var element = document.getElementById("demo");
    element.classList.add("border-amber-500");
}
function inputFunction() {
    var x = document.getElementById("myText").value;
    if(x < 4000){
        document.getElementById('button').removeAttribute("onclick");
        document.getElementById('button').classList.remove("bg-green-500");
        document.getElementById('button').classList.add("bg-gray-500");
        document.getElementById('button').classList.remove("hover:bg-green-500");
        document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
    }else{
        document.getElementById('button').setAttribute("onclick","toggleModal1();");
        document.getElementById('button').classList.remove("bg-gray-500");
        document.getElementById('button').classList.add("bg-green-500");
        document.getElementById('button').classList.add("hover:bg-green-500");
        document.getElementById("button").innerHTML ="К оплате " + x +"UZS";
    }
}
function checkFunction() {
    var x = document.getElementById("myText").value;
    var checkBox = document.getElementById("myCheck");
    if (checkBox.checked == true){
        document.getElementById("button").innerHTML ="К оплате " + (parseInt(x) + 10000);
    } else {
        document.getElementById("button").innerHTML ="К оплате " + x  +"UZS";
    }
}
function validate(evt) {
    var theEvent = evt || window.event;
    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}
//{{-- pay modal end --}}

$('.has-clear input[type="text"]').on('input propertychange', function() {
    var $this = $(this);
    var visible = Boolean($this.val());
    $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
}).trigger('propertychange');

$('.form-control-clear').click(function() {
    $(this).siblings('input[type="text"]').val('')
        .trigger('propertychange').focus();
});

