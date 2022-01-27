let dataAjax = {};
let dataGeo = [];
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
                   `<div class="sort-table print_block" id="`+data.coordinates+`" hidden>
                    <div class="w-full border hover:bg-blue-100 h-44 item overflow-hidden" data-coord="`+data.coordinates+`" data-nomer="`+ data.start_date +`">
                    <div class="sm:w-11/12 w-full ml-0.5 h-12 md:m-4 sm:m-2 m-0">
                    <div class="float-left w-9/12 " id="results">
                    <i class="` + data.icon + ` text-4xl float-left text-blue-400 mr-4 mt-8"></i>
                    <a href="/detailed-tasks/` + data.id + `" class="text-[18px] text-blue-400 hover:text-red-400">` + data.name + `</a>
                    <p class="text-[14px] ml-12 mt-4 location">` + data.address + `</p>
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
                            <p class="sm:text-sm text-xs ml-10 mt-1 location">` + data.address + `</p>
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
            // Show the list item if the phrase matches and increase the count by 1
        } else {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().show();
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
            // Show the list item if the phrase matches and increase the count by 1
        } else {
            var parent = $(this).parent();
            var parents = $(parent).parent();
            // MY CHANGE
            $(parents).parent().show();
            // $(this).show(); // MY CHANGE
            count++;
        }
    });
});

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
    geo_coords()
    map_pos(k)
}

function fiveInOne1(){
    resetCounters()
    tasks_list_all(dataAjax)
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
        fiveInOne1();
    }
});

$('.par_cat, .par_cat2').click(function() {
    if (this.checked == false) {
        parcats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            fiveInOne2();
        } else {
            img_show()
        }
    } else {
        parcats_click_true(this.id, this.name)
        fiveInOne2();
    }
});

$('.chi_cat, .chi_cat2').click(function() {
    if (this.checked == false) {
        chicats_click_false(this.id, this.name)
        if (chicat_check_print()) {
            fiveInOne2();
        } else {
            img_show()
        }
    } else {
        chicats_click_true(this.id, this.name)
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
