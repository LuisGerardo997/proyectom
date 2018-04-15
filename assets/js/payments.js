Mercadopago.setPublishableKey("PUBLIC_KEY");
var form = $('#payment-form');
Mercadopago.createToken(form,
   function(response){
     console.log(response);
   });
