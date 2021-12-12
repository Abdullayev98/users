<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Refill Page</title>
  </head>
  <body>



  <div class="container m-5 p-5">
  <form action="/ref" method="GET">
<input type="hidden" name="user_id" value="1">
  <hr>
<h5>Способ оплаты</h5>

              <div class="my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" onClick="doBlock()" name="paymethod" type="radio" value="PayMe" class="custom-control-input">
                  <label class="custom-control-label" for="credit">PayMe</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" onClick="doBlock()" name="paymethod" value="Click" type="radio" class="custom-control-input">
                  <label class="custom-control-label" for="debit">Click</label>
                </div>

                <div class="d-none input-group my-5" id="forhid">
                <span class="input-group-text">сум</span>
                <input type="text" name="amount" class="form-control">
                <span class="input-group-text">.00</span>
                </div>

              </div>

  <button type="submit" class="btn btn-primary">Выбирать</button>

</form>
  </div>

<script>
function doBlock() {
    $( "#forhid" ).removeClass("d-none");
}
</script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
