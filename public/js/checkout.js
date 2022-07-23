      // This is your test publishable API key.
      const stripe = Stripe(stripe_key);


      let elements;
      let clientSecretValue = null;
      
      initialize();
      checkStatus();
      console.log('place_order_route', place_order_route)
      
      document
        .getElementById("payment-form")
        .addEventListener("submit", handleSubmit);  //
      
      // Fetches a payment intent and captures the client secret
      async function initialize() {
        const { clientSecret } = await fetch(payment_intent_route, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": _token
          },
          body: JSON.stringify({ _token, buy_now_mode }),
        }).then((r) => r.json());

        clientSecretValue = clientSecret;

        elements = stripe.elements({ clientSecret });
      
        const paymentElement = elements.create("payment");
        paymentElement.mount("#payment-element");
      }
      
      async function handleSubmit(e) {
        e.preventDefault();
        setLoading(true);

        // const phone = document.getElementById('phone').value
        // const address1 = document.getElementById('address1').value
        // const address2 = document.getElementById('address2').value
        // const city = document.getElementById('city').value
        // const state = document.getElementById('state').value
        // const country = document.getElementById('country').value
        // const pin_code = document.getElementById('pin_code').value

        const obj = {
          _token, 
          // phone,
          // address1,
          // address2,
          // city,
          // state, 
          // country, 
          // pin_code,
          buy_now_mode
        };

        const response = await fetch(place_order_route, {
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': _token
          }, 
          body: JSON.stringify(obj)
        }).then(res => res.json());

        if(response.ok)
        {

          const returnValue = await stripe.confirmPayment({
            elements,
            confirmParams: {
              // Make sure to change this to your payment completion page
              return_url: finish_page,
            },
          });

          const error = returnValue.error
        
          // This point will only be reached if there is an immediate error when
          // confirming the payment. Otherwise, your customer will be redirected to
          // your `return_url`. For some payment methods like iDEAL, your customer will
          // be redirected to an intermediate site first to authorize the payment, then
          // redirected to the `return_url`.
          if (error.type === "card_error" || error.type === "validation_error") {
            showMessage(error.message);
          } else {
            showMessage("An unexpected error occurred.");
          }        

          await fetch(order_cancel_route, {
            method: "DELETE",
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': _token
            },
            body: JSON.stringify({ buy_now_mode })
          });
        }
        else
        {
          showMessage('Something went wrong.\n' + response.error);
        }

        setLoading(false);
      }
      
      // Fetches the payment intent status after payment submission
      async function checkStatus() {
        // const clientSecret = new URLSearchParams(window.location.search).get(
        //   "payment_intent_client_secret"
        // );
      
        const clientSecret = clientSecretValue;
        
        if (!clientSecret) {
          return;
        }

        console.log(clientSecret)
      
        const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);


        console.log(paymentIntent)
      
        switch (paymentIntent.status) {
          case "succeeded":
            window.location.replace(finish_page)
            break;
          case "processing":
            showMessage("Your payment is processing.");
            break;
          case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
          default:
            showMessage("Something went wrong.");
            break;
        }
      }
      
      // ------- UI helpers -------
      
      function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");
      
        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;
      
        setTimeout(function () {
          messageContainer.classList.add("hidden");
          messageText.textContent = "";
        }, 4000);
      }
      
      // Show a spinner on payment submission
      function setLoading(isLoading) {
        if (isLoading) {
          // Disable the button and show a spinner
          document.querySelector("#submit").disabled = true;
          document.querySelector("#spinner").classList.remove("hidden");
          document.querySelector("#button-text").classList.add("hidden");
        } else {
          document.querySelector("#submit").disabled = false;
          document.querySelector("#spinner").classList.add("hidden");
          document.querySelector("#button-text").classList.remove("hidden");
        }
      }