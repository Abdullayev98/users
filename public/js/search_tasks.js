let dataAjax = {};
let dataGeoAll = [];
let dataGeoSroch = [];
let dataGeoUdal = [];
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
        dl++
            $(".show_tasks").append(
                    `<div class="sort-table print_block" hidden>
                    <div class="sort-table as">
                    <div class="w-full border hover:bg-blue-100 h-[140px] item" data-coord="`+data.coordinates+`" data-nomer="`+ data.start_date +`">
                    <div class="w-11/12 h-12 m-4">
                    <div class="float-left w-9/12 " id="results">
                    <i class="` + data.icon + ` text-4xl float-left text-blue-400 mr-2 mt-8"></i>
                    <a href="/detailed-tasks/` + data.id + `" class="text-lg text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-sm ml-12 mt-4 location">` + data.address + `</p>
                    <p class="text-sm ml-10 mt-1 pl-4">Начать ` + data.start_date + `</p>
                    <p class="text-sm ml-10 mt-1 pl-4">` + data.oplata + `</p>
                    </div>
                    <div class="float-right w-1/4 text-right " id="about">
                    <a href="#" class="text-lg">` + data.budget + `</a>
                    <p class="text-sm ml-12">` + data.category_name + `</p>
                    <p class="text-sm ml-12 mt-2">` + data.user_name + `</p>
                    </div>
                    </div>
                    </div>
                    </div>`,
            )
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
                            `<div class="sort-table print_block" hidden>
                            <div class="w-full border hover:bg-blue-100 h-[140px] item" data-coord="`+data.coordinates+`" data-nomer="` + data.start_date + `">
                            <div class="w-11/12 h-12 m-4">
                            <div class="float-left w-9/12 " id="results">
                            <i class="` + data.icon + ` text-4xl float-left text-blue-400 mr-2 mt-8"></i>
                            <a href="/detailed-tasks/` + data.id + `" class="text-lg text-blue-400 hover:text-red-400">` + data.name + `</a>
                            <p class="text-sm ml-10 mt-1 location">` + data.address + `</p>
                            <p class="text-sm ml-10 mt-1 pl-4">Начать ` + data.start_date + `</p>
                            <p class="text-sm ml-10 mt-1 pl-4">` + data.oplata + `</p>
                            </div>
                            <div class="float-right w-1/4 text-right " id="about">
                            <a href="#" class="text-lg">` + data.budget + `</a>
                            <p class="text-sm ml-12">` + data.category_name + `</p>
                            <p class="text-sm ml-12 mt-2">` + data.user_name + `</p>
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

function resetCounters(){
    $('.butt').removeAttr("disabled")
    s=0, dl=0;
}

let tabsContainer = document.querySelector("#tabs");
let tabTogglers = tabsContainer.querySelectorAll("a");

tabTogglers.forEach(function(toggler) {
    toggler.addEventListener("click", function(e) {
        e.preventDefault();

        let tabName = this.getAttribute("href");

        let tabContents = document.querySelector("#tab-contents");

        for (let i = 0; i < tabContents.children.length; i++) {

            tabTogglers[i].parentElement.classList.remove("border-orange-400", "border-b", "opacity-100");
            tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");

        }
        e.target.parentElement.classList.add("border-orange-400", "border-b-2", "opacity-100");
    });
});

document.getElementById("default-tab").click();

$(".rotate").click(function() {
    $(this).toggleClass("rotate-[360deg]");
});

$("#filter").keyup(function() {

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
        count = 0;

    // Loop through the comment list
    $('#results a').each(function() {
        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().hide();
            $(parents).parent().id = '';
            // Show the list item if the phrase matches and increase the count by 1
        } else {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().show();
            $(parents).parent().id = 'geoShow';
            // $(this).show(); // MY CHANGE
            count++;
            console.log(count);
        }
        console.log(count);
    });
    console.log(count);
        if (count){
            tasks_show2();
        }
});

$(".address").keyup(function() {

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
        count = 0;

    // Loop through the comment list
    $('#results .location').each(function() {
        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().hide();
            $(parents).parent().id = '';
            // Show the list item if the phrase matches and increase the count by 1
        } else {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().show();
            $(parents).parent().id = 'geoShow';
            // $(this).show(); // MY CHANGE
            count++;
        }
    });
});


$("#price").keyup(function() {

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
        count = 0;

    // Loop through the comment list
    $('#about a').each(function() {
        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().hide();
            $(parents).parent().id = '';
            // Show the list item if the phrase matches and increase the count by 1
        } else {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().show();
            $(parents).parent().id = "geoShow";
            // $(this).show(); // MY CHANGE
            count++;
        }
    });
});


// function img_show() {
//     $(".show_tasks").empty();
//     $(".show_tasks").append(
//         `<div class="grid grid-cols-3 gap-3 content-center w-full h-full">
//         <div></div>
//         <div><img src="{{asset('/images/notlike.svg')}}" class="w-full h-full"></div>
//         <div></div>
//         <div class="col-span-3 text-center w-full h-full">
//             <p class="text-3xl"><b>Задания не найдены</b></p>
//             <p class="text-lg">Попробуйте уточнить запрос или выбрать другие категории</p>
//         </div>
//         </div>`
//     );
//     // $('.butt').attr('style', 'display: none');
// }

function fourInOne1(){
    resetCounters()
    tasks_list_all(dataAjax)
    if(dl==0){
        img_show();
    }else {
        tasks_show()
    }
}

function fourInOne2(){
    resetCounters()
    tasks_list(dataAjax)
    if(dl==0){
        img_show();
    }else {
        tasks_show()
    }
}

function tasks_show2(){
    let gg = 0;
    $('#geoShow').each(function() {
        this.hidden = true;
        gg++
    });
    console.log(gg)
    let i=1;
    $('#geoShow').each(function() {
        if ((this.hidden) && (i <= p) && (sGeo <= dlGeo))
        {
            this.hidden = false;
            i++
            sGeo++
        }
    });
    $('.lM2').removeAttr('hidden');
    // $('.lM').attr("hidden","hidden")
    $('#pnum2').html(sGeo)
    $('#snum2').html(dlGeo)
    if (sGeo==dlGeo){
        $('.butt2').attr("disabled","disabled")
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
        fourInOne1();
    }
});

$('.par_cat, .par_cat2').click(function() {
    if (this.checked == false) {
        parcats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            fourInOne2();
        } else {
            img_show()
        }
    } else {
        parcats_click_true(this.id, this.name)
        fourInOne2();
    }
});

$('.chi_cat, .chi_cat2').click(function() {
    if (this.checked == false) {
        chicats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            fourInOne2();
        } else {
            img_show()
        }
    } else {
        chicats_click_true(this.id, this.name)
        fourInOne2();
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
            fourInOne1();
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
            fourInOne1();
        } else {
            this.checked = false;
        }
    });
}


$(document).ready(function(){

    $("#srochnost").click(function(){
        first_ajax('sroch')
    });
    $(".byid").click(function(){
        first_ajax('all')
    });
    $("#as").click(function(){
        first_ajax('udal')
    });
    $(".checkboxByAs").change(function() {
        if(this.checked) {
            first_ajax('udal')
        }else {
            first_ajax('all')
        }
    });
});

