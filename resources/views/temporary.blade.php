{{-- <html>
<head>
<title>paypal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
i am here

  <div id="paypal-button"></div>
   <script src="https://www.paypalobjects.com/api/checkout.js"></script>


<script>
  paypal.Button.render({
     env:'sandbox',
     client:{
       sandbox:'ART5410LrcA-NtVa32NgwChrKpuniRcMQ1BQToD47UZNuXXOqD5Iy-m0X7PPfshXipSufd9fzmqRuvrg',
       production:'demo_production_client_id'
     },
    locale:'en_US',
    style: {
      color:'blue',
      size: 'small',
      shape:'pill',
    },
    payment: function(data, actions) {
      return actions.payment.create({
        redirect_urls:{
          return_url:"http://localhost:8000/execute-payment"
        },
        transactions:[{
          amount:{
              total:'20',
              currency:'USD'
          }
        }]
      });
    },
    onAuthorize: function(data, actions){
      return actions.redirect();
    }
  },'#paypal-button');
</script>


</body>
</html>


 --}}
 <html>
    <head>
    <title>paypal</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    </head>
    <body>
        <a href="{{route('creat-payment')}}" class="btn btn-primary">payment by Paypal by get Method</a>
        <form action="{{route('create-payment')}}" method='post'>
            @csrf
            <input type="submit" value="Pay Now">
        </form>
    </body>
 </html>
