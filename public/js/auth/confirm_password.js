    //input eyes
$(function(){

    $('#eye').click(function(){

        if($(this).hasClass('fa-eye-slash')){

            $(this).removeClass('fa-eye-slash');

            $(this).addClass('fa-eye');

            $('#password').attr('type','text');

        }else{

            $(this).removeClass('fa-eye');

            $(this).addClass('fa-eye-slash');

            $('#password').attr('type','password');
        }
    });
});
