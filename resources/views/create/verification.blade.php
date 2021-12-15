@extends('layouts.app')


@section('content')
    <div class="h-screen mb-32 bg-[url('https://assets.youdo.com/_next/static/media/back_toned.96ac5f6f14f3080fa4aed180c287d19f.jpg')] h-90">
        <div class="text-center pt-64">
              <p class="text-5xl font-bold text-[#fff] ">Станьте исполнителем YouDo</p>
              <p class="mt-8 mb-16 text-[#fff] text-2xl">YouDo поможет найти новых клиентов и зарабатывать <br>
                на выполнении любых услуг.</p>
              <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="#">СТАТЬ ИСПОЛНИТЕЛЕМ</a>
        </div>
              
        {{-- <div class=" mt-32 rounded-sm">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/Js_5Pal4bOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> --}}
    </div>

    <div class="text-center mb-16">
      <h1 class="text-5xl font-bold">Преимущества</h1>
      <p class="font-bold mt-16">Станьте исполнителем и выполняйте интересные задания от заказчиков <br>
        в удобное для вас время.</p>
        <div class="grid grid-cols-4 gap-4 pt-16 container mx-auto font-bold text-xl">
          <div>
            <img class="ml-20" src="	https://assets.youdo.com/_next/static/media/money.bd687ef7e0abebf2c7822c7c9e527522.png" alt="#">
             <p>Достойный заработок</p>
          </div>
          <div>
            <img class="ml-20" src="https://assets.youdo.com/_next/static/media/free.4da9be74c8a60728ae3a1126aec7b2b0.png" alt="#">
            <p>Свободный график</p>
          </div>
          <div>
            <img class="ml-20" src="https://assets.youdo.com/_next/static/media/safe.110dfdf9ed01a8b87b2d2efdee4a843f.png" alt="#">
            <p>Безопасный сервис</p>
          </div>
          <div>
            <img class="ml-20" src="	https://assets.youdo.com/_next/static/media/economy.2c5d8e9a3016bb0d29e7444455afc18e.png" alt="#">
            <p>Экономия на рекламе</p>
          </div>
        </div>
    </div>

    <div class="flex flex-row container mx-auto">
        <div class="basis-2/3 ">
          <img  src="	https://assets.youdo.com/next/_next/static/images/3065257-ce528a23cf35ebec9f26fca3c8234f92.jpg" alt="#">
        </div>
        <div class="basis-1/3">
          <h1 class="font-bold text-3xl">Достойный заработок</h1>
          <p class="mt-6 text-lg">Зарабатывайте на заказах с YouDo без ограничений. Используйте сервис для подработки или начните развивать собственное дело.</p>
            <div>
              <hr class="mt-12 mb-8">
              <p class="mb-24">Максимальный заказ на YouDo.com был почти на 100 000 рублей, я несколько дней решал проблему, за которую никто не хотел браться.</p>
              <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="#">Начать зарабатывать</a>
            </div>
        </div>
    </div>

    <div class="flex flex-row container mx-auto mt-32">
      <div class="basis-1/3">
        <h1 class="font-bold text-3xl">Свободный график</h1>
        <p class="mt-6 text-lg">На YouDo вы работаете на себя и сами выбираете заказчиков. Выполняйте задания в удобное для вас время и устраивайте выходные, когда захотите.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Я считаю, что YouDo.com — это уникальный сервис возможностей. Его безусловное преимущество в том, что вы можете самостоятельно выбирать для себя график работы, заказы, клиентов, формировать свой доход.</p>
            <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="#">Начать работать на себя</a>
          </div>
      </div>
      <div class="basis-2/3 ml-56">
        <img  src="https://assets.youdo.com/next/_next/static/images/2039481-bb66c26d9d35c864cd7994a436e8ca0f.jpg" alt="#">
      </div>
    </div>

    <div class="flex flex-row container mx-auto mt-32">
      <div class="basis-2/3 ">
        <img  src="https://assets.youdo.com/next/_next/static/images/2735528-4845f3d54cb821712417c20131306d50.jpg" alt="#">
      </div>
      <div class="basis-1/3">
        <h1 class="font-bold text-3xl">Безопасность сервиса</h1>
        <p class="mt-6 text-lg">Читайте отзывы о заказчиках и выполняйте задания со Сделкой без риска: при успешном завершении работы вы гарантированно получите оплату на карту.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Со Сделкой без риска не переживаешь, что оплата не поступит. Если что, задание закрывается автоматически</p>
            <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="#">Получить статус исполнителя</a>
          </div>
      </div>
    </div>

    <div class="flex flex-row container mx-auto mt-32">
      <div class="basis-1/3">
        <h1 class="font-bold text-3xl">Экономия на рекламе</h1>
        <p class="mt-6 text-lg">Больше не нужно тратить деньги на собственный сайт и рекламу — выбирайте задания и отправляйте отклики заказчикам, которым услуга нужна прямо сейчас.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.</p>
            <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="#">Стать исполнителем</a>
          </div>
      </div>
      <div class="basis-2/3 ml-56">
        <img  src="https://assets.youdo.com/next/_next/static/images/2402385-0292eb700f06ad2d5a8f4e71a3edc48d.jpg" alt="#">
      </div>
    </div>

       <div class="text-center mt-48 mb-32">
          <h1 class="font-bold text-5xl">Условия сотрудничества с YouDo</h1>
          <p class="text-xl mt-8 font-medium">Сервис не берёт комиссию за выполненный заказ. <br>
            Вы оплачиваете только отклики к заданиям и сами выбираете клиентов.</p>
           
            <div class="flex flex-row container mx-auto mt-24">
                <div class="basis-1/2">
                     <div class="flex flex-row">
                          <div class="basis-2/3 text-left">
                              <h1 class="text-2xl font-medium">Безлимитный тариф</h1>
                              <p class="mt-4 ">Неограниченное количество откликов <br> к заказам на 15, 30 или 90 дней.</p>
                              <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                                Выбрать тариф
                              </button>
                          </div>
                          <div class="basis-1/3">
                              <img class="h-28 w-28" src="https://assets.youdo.com/_next/static/media/unlim.fbd507f8113531a2717af8877957d4aa.svg" alt="">
                          </div>
                     </div>
                </div>
               
                <div class="basis-1/2">
                    <div class="flex flex-row">
                        <div class="basis-2/3 text-left">
                            <h1 class="text-2xl font-medium">Базовый тариф</h1>
                            <p class="mt-4">Фиксированное количество откликов: 25, <br> 50 или 100. Сроком на 30 дней.</p>
                            <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                              Выбрать тариф
                            </button>
                        </div>
                        <div class="basis-1/3">
                            <img  class="h-28 w-28" src="https://assets.youdo.com/_next/static/media/basic.4d5f4ab124ffcd01e1b75c89be396d63.svg" alt="">
                        </div>
                  </div>
                </div>
              </div>
          </div>
@endsection
