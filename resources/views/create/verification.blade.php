@extends('layouts.app')


@section('content')
   <div class="h-screen   mb-32 bg-[url('https://assets.youdo.com/_next/static/media/back_toned.96ac5f6f14f3080fa4aed180c287d19f.jpg')] h-90">
        <div class="text-center my-auto pt-48">
              <p class="text-5xl font-bold text-[#fff] ">Станьте исполнителем Universal Services</p>
              <p class="mt-8 mb-16 text-[#fff] text-2xl">Universal Services поможет найти новых клиентов и зарабатывать <br>
                на выполнении любых услуг.</p>
              <a class="px-10 py-4 font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500  h-12 rounded-md text-xl" href="{{ route('task.search') }}">СТАТЬ ИСПОЛНИТЕЛЕМ</a>
        </div>
    </div>

    <div class="text-center mb-16">
      <h1 class="text-5xl font-bold">Преимущества</h1>
      <p class="font-bold mt-16">Станьте исполнителем и выполняйте интересные задания от заказчиков <br>
        в удобное для вас время.</p>
        <div class="grid md:grid-cols-4 grid-cols-1 gap-4 pt-16 container mx-auto font-bold text-xl">
          <div>
            <img class="mx-auto" src="	https://assets.youdo.com/_next/static/media/money.bd687ef7e0abebf2c7822c7c9e527522.png" alt="#">
             <p>Достойный заработок</p>
          </div>
          <div>
            <img class="mx-auto" src="https://assets.youdo.com/_next/static/media/free.4da9be74c8a60728ae3a1126aec7b2b0.png" alt="#">
            <p>Свободный график</p>
          </div>
          <div>
            <img class="mx-auto" src="https://assets.youdo.com/_next/static/media/safe.110dfdf9ed01a8b87b2d2efdee4a843f.png" alt="#">
            <p>Безопасный сервис</p>
          </div>
          <div>
            <img class="mx-auto" src="	https://assets.youdo.com/_next/static/media/economy.2c5d8e9a3016bb0d29e7444455afc18e.png" alt="#">
            <p>Экономия на рекламе</p>
          </div>
        </div>
    </div>

        <div class="zakza w-9/12 mx-auto text-center font-serif mb-32 mt-32">
          <div class="info">
              <h2 class="zakaz_title font-sans text-5xl pb-8 font-bold">Как получить заказ</h2>
              <p class="zakaz_text font-sans text-xl pb-16 font-medium">На Universal Services исполнители сами выбирают заказы и клиентов. Это просто.</p>
              <div class="process grid lg:grid-cols-5 grid-cols-1 items-center">
                  <div class="info ">
                      <div>
                      <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">1</p>
                      <p class="process_text text-lg text-black">Станьте исполнителем и заполните профиль</p>
                      </div>
                  </div>
                  <div>
                      <img class="object-cover lg:block hidden   w-10/12 shrink" src="https://assets.youdo.com/_next/static/media/arrow.35c0a4c2bd4bf776be97bd4bb7a66db9.svg" alt="">
                  </div>
                  <div class="info ">
                      <div>
                          <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">2</p>
                          <p class="process_text text-lg text-black">Выберите задание и откликнитесь на него</p>
                      </div>
                  </div>
                  <div>
                      <img class="object-cover lg:block hidden   w-10/12 shrink" src="https://assets.youdo.com/_next/static/media/arrow.35c0a4c2bd4bf776be97bd4bb7a66db9.svg" alt="">
                  </div>
                  <div class="info ">
                      <div>
                          <p class="process_number text-[#9e69c7] text-[56px] pb-[22px]">3</p>
                          <p class="process_text text-lg text-black">Получите оплату сразу же после выполнения задания</p>
                      </div>
                  </div>


              </div>
          </div>
          <a href="{{ route('task.search') }}">
            <button  class="font-sans mt-8 text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
              Стать исполнителем
            </button>
          </a>
      </div>


    {{-- 1 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
        <div class="col-span-2 xl:mr-0 mr-8 md:mx-0 mx-6">
          <img  src="	https://assets.youdo.com/next/_next/static/images/3065257-ce528a23cf35ebec9f26fca3c8234f92.jpg" alt="#">
        </div>
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8  lg:text-left text-center">
          <h1 class="font-bold text-3xl">Достойный заработок</h1>
          <p class="mt-6 text-lg">Зарабатывайте на заказах с Universal Services без ограничений. Используйте сервис для подработки или начните развивать собственное дело.</p>
            <div>
              <hr class="mt-8 mb-8">
              <p class="mb-16">Максимальный заказ на Universal Services.com был почти на 100 000 рублей, я несколько дней решал проблему, за которую никто не хотел браться.</p>
              <a href="{{ route('task.search') }}" class="">
                <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                  Начать зарабатывать
                </button>
              </a>
            </div>
        </div>
    </div>

    {{-- 2 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center xl:mr-0 mr-8">
        <h1 class="font-bold text-3xl">Свободный график</h1>
        <p class="mt-6 text-lg">На Universal Services вы работаете на себя и сами выбираете заказчиков. Выполняйте задания в удобное для вас время и устраивайте выходные, когда захотите.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Я считаю, что users.uz — это уникальный сервис возможностей. Его безусловное преимущество в том, что вы можете самостоятельно выбирать для себя график работы, заказы, клиентов, формировать свой доход.</p>
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Начать работать на себя
              </button>
            </a>
          </div>
      </div>
      <div class="col-span-2 mx-auto mr-8 lg:block hidden">
        <img  src="https://assets.youdo.com/next/_next/static/images/2039481-bb66c26d9d35c864cd7994a436e8ca0f.jpg" alt="#">
      </div>

      <div class="col-span-2 mx-auto mr-8 lg:hidden block md:ml-0 ml-6">
        <img  src="https://assets.youdo.com/next/_next/static/images/2039481-bb66c26d9d35c864cd7994a436e8ca0f.jpg" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
        <h1 class="font-bold text-3xl">Свободный график</h1>
        <p class="mt-6 text-lg">На Universal Services вы работаете на себя и сами выбираете заказчиков. Выполняйте задания в удобное для вас время и устраивайте выходные, когда захотите.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Я считаю, что users.uz — это уникальный сервис возможностей. Его безусловное преимущество в том, что вы можете самостоятельно выбирать для себя график работы, заказы, клиентов, формировать свой доход.</p>
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Начать работать на себя
              </button>
            </a>
          </div>
      </div>
    </div>

    {{-- 3 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 xl:mr-0 mr-8 md:mx-0 mx-6">
        <img  src="https://assets.youdo.com/next/_next/static/images/2735528-4845f3d54cb821712417c20131306d50.jpg" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:text-left text-center">
        <h1 class="font-bold text-3xl">Безопасность сервиса</h1>
        <p class="mt-6 text-lg">Читайте отзывы о заказчиках и выполняйте задания со Сделкой без риска: при успешном завершении работы вы гарантированно получите оплату на карту.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Со Сделкой без риска не переживаешь, что оплата не поступит. Если что, задание закрывается автоматически</p>
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Получить статус исполнителя
              </button>
            </a>
          </div>
      </div>
    </div>

    {{-- 4 --}}
    <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-32 ">
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center xl:mr-0 mr-8">
        <h1 class="font-bold text-3xl">Экономия на рекламе</h1>
        <p class="mt-6 text-lg">Больше не нужно тратить деньги на собственный сайт и рекламу — выбирайте задания и отправляйте отклики заказчикам, которым услуга нужна прямо сейчас.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.</p>
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Стать исполнителем
              </button>
            </a>
          </div>
      </div>
      <div class="col-span-2  mx-auto mr-8 lg:block hidden ">
        <img  src="https://assets.youdo.com/next/_next/static/images/2402385-0292eb700f06ad2d5a8f4e71a3edc48d.jpg" alt="#">
      </div>

      <div class="col-span-2  mx-auto mr-8 lg:hidden block md:ml-0 ml-6">
        <img  src="https://assets.youdo.com/next/_next/static/images/2402385-0292eb700f06ad2d5a8f4e71a3edc48d.jpg" alt="#">
      </div>
      <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
        <h1 class="font-bold text-3xl">Экономия на рекламе</h1>
        <p class="mt-6 text-lg">Больше не нужно тратить деньги на собственный сайт и рекламу — выбирайте задания и отправляйте отклики заказчикам, которым услуга нужна прямо сейчас.</p>
          <div>
            <hr class="mt-12 mb-8">
            <p class="mb-24">Сервис мне очень помог в наработке клиентской базы, что всегда очень сложно сделать в салоне. У меня уже есть заказчики, которые приходят на стрижку или окрашивание в третий, четвертый раз, то есть становятся постоянными клиентами.</p>
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Стать исполнителем
              </button>
            </a>
          </div>
      </div>
    </div>




        <div class="text-center mt-48 mb-16">
          <h1 class="font-bold text-5xl">Условия сотрудничества с Universal Services</h1>
          <p class="text-xl mt-8 font-medium">Сервис не берёт комиссию за выполненный заказ. <br>
            Вы оплачиваете только отклики к заданиям и сами выбираете клиентов.</p>
        </div>

        <div class="grid md:grid-cols-2 grid-cols-1 container mx-auto mb-16">
            <div class="grid-cols-1  float-left p-8 rounded-lg w-5/6 shadow-2xl md:mx-0 mx-auto md:mb-0 mb-8">
                <div class="float-left">
                  <h1 class="font-medium text-2xl">Безлимитный тариф</h1>
                  <p class="mt-4">Неограниченное количество откликов <br> к заказам на 15, 30 или 90 дней.</p>
                  <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                      Выбрать тариф
                  </button>
                </div>
                  <div class="float-right ">
                      <img class="w-24 h-24" src="https://assets.youdo.com/_next/static/media/unlim.fbd507f8113531a2717af8877957d4aa.svg" alt="#">
                  </div>
            </div>

            <div class="grid-cols-1  float-right p-8 rounded-lg w-5/6 shadow-2xl md:mx-0 mx-auto">
              <div class="float-left">
                <h1 class="font-medium text-2xl">Базовый тариф</h1>
                <p class="mt-4">Фиксированное количество откликов: 25, <br> 50 или 100. Сроком на 30 дней.</p>
                <button class="bg-transparent mt-10  text-black-700 font-semibold  py-2 px-4 border border-slate-400 hover:border-slate-900 rounded">
                   Выбрать тариф
                </button>
              </div>
                <div class="float-right">
                    <img class="w-24 h-24" src="https://assets.youdo.com/_next/static/media/basic.4d5f4ab124ffcd01e1b75c89be396d63.svg" alt="#">
                </div>
            </div>
        </div>


       <div class="text-center mt-48 mb-16">
            <h1 class="font-bold text-5xl">Зарабатывайте и добивайтесь <br>
              своих целей с Universal Services</h1>
            <p class="text-xl mt-8 font-medium">Наши исполнители делают это каждый день.</p>
       </div>

      <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto">
          <div class="col-span-2">
            <iframe class="rounded-lg h-full w-5/6 mx-auto" src="https://www.youtube.com/embed/FgV0PmpJFh0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:text-left text-center">
            <p class=" text-lg">Universal Services помогает мне оставаться свободным. Несмотря на то, что график плотный, я решаю сам, не кто-то мне говорит, когда мне встать, куда приехать, что сделать.</p>
              <h1 class="font-bold text-6xl mt-4">65 000 ₽</h1>
           <p class="text-lg font-medium mt-4">Средний месячный доход <br>
            в категории «Курьерские услуги»</p>
            <div class="mt-16">
              <a href="{{ route('task.search') }}">
                <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                  Стать исполнителем
                </button>
              </a>
            </div>
          </div>
      </div>


        <div class="grid md:grid-cols-3 grid-cols-1 container mx-auto  md:mt-32 mt-16 md:mb-32 mb-16">
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg h-64 w-90 ">
                <p class="text-lg">Открыла для себя такую штуку, как сервис Universal Services. Выполняешь задания — платят. Отличная замена обычной «работе на работе» ради денег</p>
                <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">Читать дальше</a>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg ml-4 mr-4 md:mt-0 mt-8">
                <p class="text-lg">Очень крутой сервис, напоминает Uber. Удобно пользоваться, особенно со стороны заказчика — быстро и дешево решаются любые сложные</p>
                <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">Читать дальше</a>
            </div>
            <div class="grid-cols-1 shadow-2xl p-8 rounded-lg md:mt-0 mt-8">
              <p class="text-lg">Начала потихоньку зарабатывать на поездку. Я остановилась на сайте Universal Services. Там есть много интересных предложений и сама система сайта</p>
              <a class="text-lg text-slate-400 hover:text-cyan-400 underline" href="#">Читать дальше</a>
            </div>
        </div>

      <div class="grid lg:grid-cols-3 grid-cols-2 container mx-auto mt-16 mb-16">
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:block hidden lg:text-left text-center">
          <p class=" text-lg">Сейчас уже дорос уровень до того, что я снимаю и клиентов клиентов. Одни клиенты рекомендуют меня своим друзьям, знакомым. И много, конечно, заказов идет с Universal Services.</p>
            <h1 class="font-bold text-6xl mt-4">70 000 ₽</h1>
         <p class="text-lg font-medium mt-4">Средний месячный доход <br>
          в категории «Фото и видеоуслуги»</p>
          <div class="mt-16">
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Стать исполнителем
              </button>
            </a>
          </div>
        </div>
        <div class="col-span-2 lg:block hidden mx-auto mr-8 ">
          <iframe class="rounded-lg h-full" width="640" src="https://www.youtube.com/embed/M6QCnnVSfzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-span-2 lg:hidden block mx-auto mr-8 ">
          <iframe class="rounded-lg h-full w-full" src="https://www.youtube.com/embed/M6QCnnVSfzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-span-2 lg:col-span-1 lg:mt-0 mt-8 lg:hidden block lg:text-left text-center">
          <p class="mt-6 text-lg">Сейчас уже дорос уровень до того, что я снимаю и клиентов клиентов. Одни клиенты рекомендуют меня своим друзьям, знакомым. И много, конечно, заказов идет с Universal Services.</p>
            <h1 class="font-bold text-6xl mt-4">70 000 ₽</h1>
         <p class="text-lg font-medium mt-4">Средний месячный доход <br>
          в категории «Фото и видеоуслуги»</p>
          <div class="mt-16">
            <a href="{{ route('task.search') }}">
              <button  class="font-sans  text-lg  font-semibold bg-[#ff8a00] text-[#fff] hover:bg-orange-500 px-10 py-4 rounded">
                Стать исполнителем
              </button>
            </a>
          </div>
        </div>
    </div>



@endsection
