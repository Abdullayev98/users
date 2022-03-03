<div class="lg:w-1/5 w-full text-base">
    <ul class="mb-5">
        <li><a  href="/geotaskshint" class="geotaskshint hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Как это работает')}}</a></li>
        <li><a  href="/security" class="security hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Безопасность и гарантии')}}</a></li>
        <li><a  href="/badges" class="badges hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Награды и рейтинг')}}</a></li>
    </ul>
    <ul class="mb-5">
        <li><a  href="/reviews" class="reviews hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Отзывы исполнителей')}}</a></li>
        <li><a  href="/author-reviews" class="authors hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Отзывы заказчиков')}}</a></li>
    </ul>
    <ul class="mb-5">
        <li><a  href="/press" class="press hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('СМИ о нас')}}</a></li>
        <li><a  href="/job" class="job hover:text-red-500 text-md text-blue-600 cursor-pointer">{{__('Вакансии')}}</a></li>
    </ul>
</div>

<script >
    var link = document.location.href.split('/');
    if(link[3] == 'geotaskshint'){
        $(".geotaskshint").removeClass("text-blue-600");
        $(".geotaskshint").addClass("text-red-400");
    }
    else if(link[3] == 'security'){
        $(".security").removeClass("text-blue-600");
        $(".security").addClass("text-red-400");
    }
    else if(link[3] == 'badges'){
        $(".badges").removeClass("text-blue-600");
        $(".badges").addClass("text-red-400");
    }
    else if(link[3] == 'reviews'){
        $(".reviews").removeClass("text-blue-600");
        $(".reviews").addClass("text-red-400");
    }
    else if(link[3] == 'author-reviews'){
        $(".authors").removeClass("text-blue-600");
        $(".authors").addClass("text-red-400");
    }
    else if(link[3] == 'press'){
        $(".press").removeClass("text-blue-600");
        $(".press").addClass("text-red-400");
    }
    else if(link[3] == 'job'){
        $(".job").removeClass("text-blue-600");
        $(".job").addClass("text-red-400");
    }
</script>