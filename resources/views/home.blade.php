<!DOCTYPE html>
<html lang="{{setting('language','en')}}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{setting('app_name')}} | {{setting('app_short_description')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
</head>
<body>

<div class="bg-[url('https://assets.youdo.com/next/_next/static/images/frame-51209c6822214bfb9166eb41c4dec591.jpg')] bg-center bg-cover h-96 ">
    <div class="container-lg mx-auto">
        <main class="xl:mt-4">
            <div class="text-center pt-32">
                <h1 class="font-semibold text-white sm:text-3xl md:text-6xl">
                    <span class="block xl:block">Освободим вас от забот</span>
                </h1>
                <p class="mt-3 text-base text-white sm:mt-5 sm:text-md sm:mx-auto md:mt-5 md:text-lg mb-3">
                    Поможем найти надежного исполнителя для любых задач
                </p>
                <div class="text-center flew w-8/12 bg-white hover:shadow-[0_5px_30px_-0_rgba(255,138,0,4)] transition duration-200 rounded-md mx-auto">
                    <input type="text" placeholder="Например, составить иск" class="w-75 focus:outline-none items-center justify-center sm:left-24 rounded-md text-black md:text-lg sm:full py-2.5">
                    <button type="submit" class="items-center justify-center border bg-orange  border-transparent font-medium  rounded-md text-white px-3.5 py-2 -mr-7 text-white">
                        Заказать услугу
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>





    <script>
        window.replainSettings = { id: '38d8d3f0-b690-4857-a153-f1e5e8b462a8' };
        (function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;
            var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
        })('https://widget.replain.cc/dist/client.js');
    </script>

    <script>
        tailwind.config = {
            purge: [],
            theme: {
                screens: {
                    'sm': '400px',
                },
                colors: {
                    'orange': '#ff8a00',
                },
                boxShadowColor: {
                    'sabzirang': '#ff8a00',
                }
            }
        }
    </script>


<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
