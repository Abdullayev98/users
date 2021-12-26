@extends('layouts.app')

@section('content')
<div class="w-9/12 mx-auto">
    <div class="terms">
        <h2 class="ruleHead font-sans text-[56px] pb-[28px] ">Правила сервиса</h2>
        <ul class="list ">
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «19» октября 2021 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «29» июля 2021 г.</a>  </li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «20» февраля 2021 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «17» декабря 2020 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «10» октября 2020 г.</a></li>
            <li class="mb-4"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «18» августа 2020 г.</a></li>
        </ul>
        <ul class="list hidden" id="div">
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «19» октября 2021 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «29» июля 2021 г.</a>  </li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «20» февраля 2021 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «17» декабря 2020 г.</a></li>
            <li class="mb-2"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «10» октября 2020 г.</a></li>
            <li class="mb-4"><a href="https://www.adobe.com/content/dam/acom/en/devnet/pdf/pdfs/PDFReference13.pdf" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none ">Редакция от «18» августа 2020 г.</a></li>
        </ul>
    </div>
    <button id="ShowButton" class = "bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onclick="myFunction()">Прошлые редакции</button>
    <div class="youDo my-10">
        <a href="/terms/doc" class="border-b-2 border-black hover:text-[#ffa200] hover:border-none">Правила сервиса ЮДУ БИЗНЕС</a>
    </div>

    <div class="Rekvezit">
        <h2 class="Rekvezit_title font-bold pb-2">Реквизиты</h2>
        <p class="Rekvezit_text">Общество с ограниченной ответственностью «Киберлогистик»</p>
        <p class="Rekvezit_text">Адрес для корреспонденции, направления жалоб и предложений:</p>
        <p class="Rekvezit_text">119021, Россия, г. Москва, а/я 21</p>
        <p class="Rekvezit_text">Юридический адрес:</p>
        <p class="Rekvezit_text">121205, Россия, г. Москва, Территория Инновационного Центра «Сколково», улица Нобеля 7, офис 47</p>
        <p class="Rekvezit_text">ИНН 7730194136</p>
        <p class="Rekvezit_text">КПП 773101001</p>
        <p class="Rekvezit_text">ОГРН 5157746302434</p>
    </div>
</div>
    <script>
function myFunction() {
  var x = document.getElementById("div");
  if (x.style.display === "block") {
    x.style.display = "none";
    document.querySelector('#ShowButton').textContent = 'Прошлые редакции';

  }else{
    x.style.display = "block";
    document.querySelector('#ShowButton').textContent = 'Показать меньше';
  }
}
    </script>
@endsection