 // input cash
function inputCash() {
    var x = document.getElementById("myText1").value;
    if (x < 4000) {
        document.getElementById('button2').removeAttribute("onclick");
        document.getElementById('button2').classList.remove("bg-green-500","hover:bg-green-600");
        document.getElementById('button2').classList.add("bg-gray-500");
    } else {
        document.getElementById('button2').setAttribute("onclick", "toggleModal();");
        document.getElementById('button2').classList.remove("bg-gray-500");
        document.getElementById('button2').classList.add("bg-green-500","hover:bg-green-600");
    }
}
    // file upload
    function fileupdate() {
        var x = document.getElementById("buttons");
        x.style.display = "block";
    }

    function fileadd() {
        var x = document.getElementById("buttons");
        x.classList.add("hidden");
    }
    // tab content
    //  let tabsContainer = document.querySelector("#tabs");
    //  let tabTogglers = tabsContainer.querySelectorAll("#tabs a");
    //  console.log(tabTogglers);
    //  tabTogglers.forEach(function(toggler) {
    //      toggler.addEventListener("click", function(e) {
    //          e.preventDefault();
    //          let tabName = this.getAttribute("href");
    //          let tabContents = document.querySelector("#tab-contents");
    //          for (let i = 0; i < tabContents.children.length; i++) {
    //              tabTogglers[i].parentElement.classList.remove("bg-gray-400", "rounded-sm",
    //                  "text-white");
    //              tabContents.children[i].classList.remove("hidden");
    //              if ("#" + tabContents.children[i].id === tabName) {
    //                  continue;
    //              }
    //              tabContents.children[i].classList.add("hidden");
    //          }
    //          e.target.parentElement.classList.add("bg-gray-400", "rounded-sm", "text-white");
    //      });
    //  });

// input cash transaction
$('#period').change(function(){
    if($(this).val() === 'date-period'){
        $('#ddr').removeClass('hidden');
    }
    else{
        $('#ddr').addClass('hidden');
    }
});

// datatable js
//1
$(document).ready(function() {

    var table1 = $('#example1').DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc();
  });
  //2
  $(document).ready(function() {

    var table2 = $('#example2').DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc();
  });
  //3
  $(document).ready(function() {

    var table3 = $('#example3').DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc();
  });
  //4
  $(document).ready(function() {

    var table4 = $('#example4').DataTable({
        responsive: true
      })
      .columns.adjust()
      .responsive.recalc();
  });
