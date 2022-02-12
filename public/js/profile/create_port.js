// input submit desc
$("#button1").click(function(){
    let comment = $("input[name=comment]").val();
    let description = $("input[name=description]").val();
    $.ajax({
        url: "{{route('comment')}}",
        type:"POST",
        data:{
            comment:comment,
            description:description,
            _token:$('meta[name="csrf-token"]').attr('content'),
        },
    });
    $("#comdes").addClass("hidden");
    $("#comdes1").removeClass("hidden");
});
