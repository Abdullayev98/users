@extends('layouts.app')


@section('content')


<div class="bg-[url('https://assets.youdo.com/next/_next/static/images/frame-51209c6822214bfb9166eb41c4dec591.jpg')] bg-center bg-cover h-96 ">
    <div class="container-lg mx-auto">
        <main class="xl:mx-96 lg:mx-60 md:mx-48 sm:mx-32">
            <div class="text-center pt-32">
                <h1 class="font-semibold text-white text-3xl lg:text-5xl md:text-4xl">
                    <span class="block xl:block">Освободим вас от забот</span>
                </h1>
                <p class="mt-3 text-base text-white sm:mt-5 text-sm sm:mx-auto md:mt-5 md:text-sm md:mt-2 mb-3">
                    Поможем найти надежного исполнителя для любых задач
                </p>
                <div class="w-3/4 mx-auto">
                <div class="flew w-full bg-white hover:shadow-[0_5px_30px_-0_rgba(255,138,0,4)] transition duration-200 rounded-md mx-auto">
                    {{--                        <input type="text" placeholder="Например, составить иск" class="w-2/3 md: focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-1/2 py-2.5">--}}
                        <input type="text" placeholder="Например, составить иск" class="w-auto md:left-32 focus:outline-none sm:left-24 rounded-md text-black md:text-md md:pl-2 sm:w-2/3 py-2.5">
                        <button type="submit" class="float-right border bg-yellow-500  border-transparent font-medium  rounded-md text-white px-3.5 py-1 mr-1 mt-1 md:text-md md:pb-1 text-white">
                            Заказать услугу
                        </button>
                    </div>
                    <div class="text-left mt-2 text-gray-700 underline-offset-1 text-sm">
                        Например: <a href="#" class="hover:text-slate-400">повесить кондиционер</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            @include('profile.login')
        </div>
    </div>

    <script>
        // Grabs all the Elements by their IDs which we had given them
        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        // let button = document.getElementById("ok-btn");

        // We want the modal to open when the Open button is clicked
        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        // button.onclick = function() {
        //     modal.style.display = "none";
        // }
        // The modal will close when the user clicks anywhere outside the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        window.replainSettings = { id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8' };
        (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
            var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
        })('https://widget.replain.cc/dist/client.js');
    </script>

    <script>
        tailwind.config = {
            module.exports = {
                purge: [],
                theme: {
                    screens: {
                        'tablet': '700px',
                    },
                    colors: {
                        'orange': '#ff8a00',
                    },
                    boxShadowColor: {
                        'sabzirang': '#ff8a00',
                    },
                }
            }
        }
    </script>
@endsection