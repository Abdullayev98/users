let dataAjax = {};
let dataAjaxPrint = {};
$('.all_cat').click();
$('.all_cat2').click();
$(".for_check input:checkbox").each(function() {
    this.checked = true;
});
$(".for_check2 input:checkbox").each(function() {
    this.checked = true;
});

function tasks_list_all(data) {
    $(".show_tasks").empty();
    $.each(data, function(index, data) {
        let json = JSON.parse(data.address);
            $(".show_tasks").append(
                   `<div class="sort-table print_block" id="`+data.coordinates+`" hidden>
                    <div class="w-full border hover:bg-blue-100 h-44 item overflow-hidden" data-coord="`+data.coordinates+`" data-nomer="`+ data.start_date +`">
                    <div class="sm:w-11/12 w-full ml-0.5 h-12 md:m-4 sm:m-2 m-0">
                    <div class="float-left w-9/12 " id="results">
                    <i class="` + data.icon + ` text-4xl float-left text-blue-400 mr-4 mt-8"></i>
                    <a href="/detailed-tasks/` + data.id + `" class="text-[18px] text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-[14px] ml-12 mt-4 location">` + json.location + `</p>
                    <p class="text-[14px] ml-10 mt-1 pl-4">Начать ` + data.start_date + `</p>
                    <p class="text-[14px] ml-10 mt-1 pl-4">` + data.oplata + `</p>
                    </div>
                    <div class="float-right w-1/4 text-right sm:p-0 p-[5px]" id="about">
                    <a href="#" class="text-[20px]">` + data.budget + `</a>
                    <p class="text-[14px]">` + data.category_name + `</p>
                    <p class="text-[14px] mt-2">` + data.user_name + `</p>
                    </div>
                    </div>
                    </div>
                    </div>`,
            )
        dl++;
    });
}

function tasks_list(data) {
    $(".show_tasks").empty();
    let id;
    $('.chi_cat').each(function() {
        if (this.checked) {
            id = this.name
            $.each(data, function(index, data) {
                if (data.category_id == id) {
                    dl++
                        $(".show_tasks").append(
                           `<div class="sort-table print_block" id="`+data.coordinates+`" hidden>
                            <div class="w-full border hover:bg-blue-100 h-44 item overflow-hidden" data-coord="`+data.coordinates+`" data-nomer="` + data.start_date + `">
                            <div class="sm:w-11/12 w-full h-12 md:m-4 sm:m-2 m-0">
                            <div class="float-left w-9/12 " id="results">
                            <i class="` + data.icon + ` text-4xl float-left text-blue-400 mr-4 mt-8"></i>
                            <a href="/detailed-tasks/` + data.id + `" class="sm:text-lg text-sm text-blue-400 hover:text-red-400">` + data.name + `</a>
                            <p class="sm:text-sm text-xs ml-10 mt-1 location">` + json.location + `</p>
                            <p class="sm:text-sm text-xs ml-10 mt-1 pl-4">Начать ` + data.start_date + `</p>
                            <p class="sm:text-sm text-xs ml-10 mt-1 pl-4">` + data.oplata + `</p>
                            </div>
                            <div class="float-right w-1/4 text-right sm:p-0 p-[5px]" id="about">
                            <a href="#" class="sm:text-lg text-sm">` + data.budget + `</a>
                            <p class="sm:text-sm text-xs ">` + data.category_name + `</p>
                            <p class="sm:text-sm text-xs mt-2">` + data.user_name + `</p>
                            </div>
                            </div>
                            </div>
                            </div>`,
                        )
                }
            });
        }
    });
}

$(".rotate").click(function() {
    $(this).toggleClass("rotate-[360deg]");
});

$("#filter").keyup(function() {
    var filter = $(this).val();
first_ajax('klyuch', filter)
});

$("#price").keyup(function() {
    var filter = $(this).val();
    if(allCheck){
    first_ajax('price', filter)
    }
});

// $("#filter").keyup(function() {
//
//     // Retrieve the input field text and reset the count to zero
//     var filter = $(this).val(),
//         count = 0;
//
//     // Loop through the comment list
//     $('#results a').each(function() {
//         // If the list item does not contain the text phrase fade it out
//         if ($(this).text().search(new RegExp(filter, "i")) < 0) {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().hide();
//             // Show the list item if the phrase matches and increase the count by 1
//         } else {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().show();
//             // $(this).show(); // MY CHANGE
//             count++;
//             console.log(count);
//         }
//     });
// });

// $(".address").keyup(function() {
//
//     // Retrieve the input field text and reset the count to zero
//     var filter = $(this).val(),
//         count = 0;
//
//     // Loop through the comment list
//     $('#results .location').each(function() {
//         // If the list item does not contain the text phrase fade it out
//         if ($(this).text().search(new RegExp(filter, "i")) < 0) {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().hide();
//             // Show the list item if the phrase matches and increase the count by 1
//         } else {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().show();
//             // $(this).show(); // MY CHANGE
//             count++;
//         }
//     });
// });


// $("#price").keyup(function() {
//
//     // Retrieve the input field text and reset the count to zero
//     var filter = $(this).val(),
//         count = 0;
//
//     // Loop through the comment list
//     $('#about a').each(function() {
//         // If the list item does not contain the text phrase fade it out
//         if ($(this).text().search(new RegExp(filter, "i")) < 0) {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().hide();
//             // Show the list item if the phrase matches and increase the count by 1
//         } else {
//             var parent = $(this).parent();
//             var parents = $(parent).parent();
//             // MY CHANGE
//             $(parents).parent().show();
//             // $(this).show(); // MY CHANGE
//             count++;
//         }
//     });
// });

function enDis(rr){
    if (rr == 0){
        $('#suggest').attr("disabled","disabled")
        $('#mpshow').attr("disabled","disabled")
    }else {
        $('#suggest').removeAttr("disabled")
        $('#mpshow').removeAttr("disabled")
    }
}

function resetCounters(){
    $('.butt').removeAttr("disabled")
    s=0, dl=0;
}

function maps_show(){
    map_pos(k)
}

function fiveInOne(){
    resetCounters()
    if(dataAjaxPrint.length == 0){
        img_show();
    }else {
        tasks_list_all(dataAjaxPrint)
        tasks_show()
    }
    maps_show()
}

function fiveInOne1(){
    resetCounters()
    tasks_list_all(dataAjaxPrint)
    if(dl==0){
        img_show();
    }else {
        tasks_show()
    }
    maps_show()
}

function fiveInOne2(){
    resetCounters()
    tasks_list(dataAjax)
    if(dl==0){
        img_show();
    }else {
        tasks_show()
    }
    maps_show()
}

function img_show() {
    $(".show_tasks").empty();
    $(".small-map").empty();
    $(".big-map").empty();
    $(".show_tasks").append(
        `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">
                <div></div>
                <div><img src="images/notlike.png" class="w-full h-full"></div>
                <div></div>
                <div class="col-span-3 text-center w-full h-full">
                    <p class="text-3xl"><b>Задания не найдены</b></p>
                    <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>
                </div>
                </div>`
    );
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
    $('.lM').removeAttr('hidden');
    $('#pnum').html(s)
    $('#snum').html(dl)
    if (s==dl){
        $('.butt').attr("disabled","disabled")
    }
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
    $('.par_cat2').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
    $('.all_cat2').each(function() {
        this.checked = false;
    });
    $('.chi_cat2').each(function() {
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

function parcat2_check() {
    let i = 1;
    $('.par_cat2').each(function() {
        if (this.checked == false) {
            i = 0;
            return false;
        }
    });
    return i;
}

function chicats_click_false(id, name) {
    $('.chi_cat').each(function() {
        if (this.name == name) {
            this.checked = false
        }
    });
    $('.par_cat').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
    $('.all_cat').each(function() {
        this.checked = false;
    });
    $('.chi_cat2').each(function() {
        if (this.name == name) {
            this.checked = false
        }
    });
    $('.par_cat2').each(function() {
        if (this.id == id) {
            this.checked = false;
        }
    });
    $('.all_cat2').each(function() {
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

function chicat2_check(id) {
    let i = 1;
    $('.chi_cat2').each(function() {
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

$('.all_cat, .all_cat2').click(function() {
    if (this.checked == false) {
        $(".for_check input:checkbox").each(function() {
            this.checked = false;
        });
        $(".for_check2 input:checkbox").each(function() {
            this.checked = false;
        });
        $('.all_cat').each(function() {
            this.checked = false;
        });
        $('.all_cat2').each(function() {
            this.checked = false;
        });
        allCheck = 0;
        img_show();
    } else {
        $(".for_check input:checkbox").each(function() {
            this.checked = true;
        });
        $(".for_check2 input:checkbox").each(function() {
            this.checked = true;
        });
        $('.all_cat').each(function() {
            this.checked = true;
        });
        $('.all_cat2').each(function() {
            this.checked = true;
        });
        allCheck = 1;
        dataAjaxPrint = {};
        dataAjaxPrint = dataAjax;
        fiveInOne();
    }
});

$('.par_cat, .par_cat2').click(function() {
    if (this.checked == false) {
        parcats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            allCheck = 1;
            fiveInOne2();
        } else {
            allCheck = 0;
            img_show()
        }
    } else {
        parcats_click_true(this.id, this.name)
        allCheck = 1;
        fiveInOne2();
    }
});

$('.chi_cat, .chi_cat2').click(function() {
    if (this.checked == false) {
        chicats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            allCheck = 1;
            fiveInOne2();
        } else {
            allCheck = 0;
            img_show()
        }
    } else {
        chicats_click_true(this.id, this.name)
        allCheck = 1;
        fiveInOne2();
    }
});

function parcats_click_true(id, name) {
    $('.par_cat').each(function() {
        if (this.name == name) {
            this.checked = true;
        }
    });
    $('.chi_cat').each(function() {
        if (this.id == id) {
            this.checked = true;
        }
    });
    $('.all_cat').each(function() {
        if (parcat_check()) {
            this.checked = true;
        } else {
            this.checked = false;
        }
    });
    $('.par_cat2').each(function() {
        if (this.name == name) {
            this.checked = true;
        }
    });
    $('.chi_cat2').each(function() {
        if (this.id == id) {
            this.checked = true;
        }
    });
    $('.all_cat2').each(function() {
        if (parcat2_check()) {
            this.checked = true;
        } else {
            this.checked = false;
        }
    });
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
        } else {
            this.checked = false;
        }
    });
    $('.chi_cat2').each(function() {
        if (this.name == name) {
            this.checked = true;
        }
    });
    $('.par_cat2').each(function() {
        if (this.id == id) {
            if (chicat2_check(id))
                this.checked = true;
        }
    });
    $('.all_cat2').each(function() {
        if (parcat2_check()) {
            this.checked = true;
        } else {
            this.checked = false;
        }
    });
}


$(document).ready(function(){

    $("#srochnost").click(function(){
        first_ajax('sroch', '')
    });
    $(".byid").click(function(){
        first_ajax('all', '')
    });
    $("#as").click(function(){
        first_ajax('udal', '')
    });
    $(".checkboxByAs").change(function() {
        if(this.checked) {
            first_ajax('udal', '')
        }else {
            first_ajax('all', '')
        }
    });
});

function map_pos(mm) {
    if (mm) {
        k=1;
        $(".small-map").empty();
        $(".big-map").empty();
        $(".small-map").append(
            `<div id="map2" class="h-60 my-5 rounded-lg w-full static">
             <div class="relative float-right z-50 ml-1"><img src="images/big-map.png" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kattalashtirish" onclick="map_pos(0)"/></div>
             </div>`
        );

        ymaps.ready(init);
        function init() {
            var myInput = document.getElementById("suggest");
            var location = ymaps.geolocation;

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


            var suggestView1 = new ymaps.SuggestView('suggest');
            var myMap2 = new ymaps.Map('map2', {
                center: userCoordinates,
                zoom: 10,
                controls: ['geolocationControl'],
                behaviors: ['default', 'scrollZoomNo']
            }, {
                searchControlProvider: 'yandex#search'
            });

            $("#mpshow").click(function(){
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

            ///////////////////////////////////////
            // var myGeocoder = ymaps.geocode(myInput);
            // myGeocoder.then(
            //     function (res) {
            //         alert('Координаты объекта :' + res.geoObjects.get(0).geometry.getCoordinates());
            //     },
            //     function (err) {
            //         alert('Ошибка');
            //     }
            // );
            ///////////////////////////////////////

            clusterer = new ymaps.Clusterer({
                preset: 'islands#invertedGreenClusterIcons',
                hasBalloon: false,
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            })
            // getPointData = function (index) {
            //     return {
            //         balloonContentHeader: '<font size=3><b><a target="_blank" href="https://yandex.ru">Здесь может быть ваша ссылка</a></b></font>',
            //         balloonContentBody: '<p>Ваше имя: <input name="login"></p><p>Телефон в формате 2xxx-xxx:  <input></p><p><input type="submit" value="Отправить"></p>',
            //         balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
            //         clusterCaption: 'метка <strong>' + index + '</strong>'
            //     };
            // },
            getPointOptions = function () {
                return {
                    preset: 'islands#greenIcon'
                };
            }
            geoObjects = [];
            for (var i = sGeo; i <= p, sGeo <= dl; i++, sGeo++) {
                dataGeo = [];
                dataGeo.push(dataAjax[i].coordinates.split(','));
                geoObjects[i] = new ymaps.Placemark(dataGeo[i], getPointOptions());
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
            circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: false, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
            myMap2.geoObjects.add(circle);
        }
    } else {
        k=0;
        $(".big-map").empty();
        $(".small-map").empty();
        $(".big-map").append(
            `<div id="map3" class="h-80 my-5 rounded-lg w-3/3 static align-items-center">
             <div class="relative float-right z-50 ml-1"><img src="images/small-map.png" class="hover:cursor-pointer bg-white w-8 h-auto mt-2 mr-2 p-1 rounded-md drop-shadow-lg" title="Kartani kichiklashtirish" onclick="map_pos(1)"/></div>
             </div>`
        )
        ymaps.ready(init);
        function init() {
            var myMap3 = new ymaps.Map('map3', {
                center: userCoordinates,
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
            }),
                getPointData = function (index) {
                    return {
                        balloonContentHeader: '<font size=3><b><a href="/detailed-tasks/' + dataAjax[index].id + '">' + dataAjax[index].name + '</a></b></font>',
                        balloonContentBody: '<br><font size=4><b><a href="/detailed-tasks/' + dataAjax[index].id + '">' + dataAjax[index].name + '</a></b></font><br><br><font size=3><p>' + dataAjax[index].start_date + ' - ' + dataAjax[index].end_date + '</p></font><br><font size=3><p>' + dataAjax[index].budget + '</p></font>',
                        // balloonContentFooter: '<font size=1>Информация предоставлена: </font> балуном <strong>метки ' + index + '</strong>',
                        clusterCaption: 'Задания <strong>' + dataAjax[index].id + '</strong>'
                    };
                },
                getPointOptions = function () {
                    return {
                        preset: 'islands#greenIcon'
                    };
                }
            geoObjects = [];
            for (var i = 0, len = dataGeo.length; i < len; i++) {
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

            circle = new ymaps.Circle([[userCoordinates[0],userCoordinates[1]], r*1000], null, { draggable: true, fill: false, outline: true, strokeColor: '#32CD32', strokeWidth: 3});
            myMap3.geoObjects.add(circle);


        }
    }
}
