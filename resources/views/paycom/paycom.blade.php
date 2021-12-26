<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST" action="https://checkout.paycom.uz">
      <input type="hidden" name="merchant" value="{{ config('paycom.merchant_id') }}"/>
      <input type="hidden" name="amount" value="{{ $transaction->amount }}"/>
      <input type="hidden" name="account[transaction_id]" value="{{ $transaction->id }}"/>
      <input type="submit" id="btn" hidden name="" value=""/>
    </form>
    <script>
    window.onload = function(){
      document.getElementById('btn').click();
    }
    </script>
  </body>
</html>
