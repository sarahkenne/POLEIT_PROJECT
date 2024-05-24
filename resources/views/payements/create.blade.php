<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Stripe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container">
        <a href="{{ route('paniers.index') }}" class="btn btn-sm btn-secondary mt-3">Revenir au panier</a>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4 class="text-center pt-5">Procéder au paiement</h4>
                <form action="{{ route('payements.store') }}" method="POST" class="my-4" id="payment-form">
                    @csrf
                    <div id="card-element">
                    <!-- Stripe Elements will create input elements here -->
                    </div>

                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>

                    <button class="btn btn-success btn-block mt-3" id="submit">
                        <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{ getPrice(Cart::total()) }})
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Suppression de la barre de navigation
            var blogHeader = document.querySelector('.blog-header');
            var navScroller = document.querySelector('.nav-scroller');
            if (blogHeader) blogHeader.classList.add("d-none");
            if (navScroller) navScroller.classList.add("d-none");

            // Initialisation de Stripe
            var stripe = Stripe('pk_test_51PHWHe2KytYQAEth4vaTuJbujfJc9ZBhzxlfKtGazsMeJMkdez0QkKs9etbYYOyVsRpvWEZH3XhY2VwjXaSj9GKf0078WsSiDd');
            var elements = stripe.elements();

            // Styles pour l'élément de carte
            var style = {
                base: {
                    color: "#32325d",
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#aab7c4"
                    }
                },
                invalid: {
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            };

            // Création de l'élément de carte
            var card = elements.create("card", { style: style });
            card.mount("#card-element");

            // Gestion des erreurs en temps réel
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.classList.add('alert', 'alert-warning', 'mt-3');
                    displayError.textContent = event.error.message;
                } else {
                    displayError.classList.remove('alert', 'alert-warning', 'mt-3');
                    displayError.textContent = '';
                }
            });

            // Gestion de la soumission du formulaire
            var submitButton = document.getElementById('submit');

            submitButton.addEventListener('click', function(ev) {
                ev.preventDefault();
                submitButton.disabled = true;

                stripe.confirmCardPayment("{{ $clientSecret }}", {
                    payment_method: {
                        card: card
                    }
                }).then(function(result) {
                    if (result.error) {
                        // Afficher l'erreur à votre client
                        submitButton.disabled = false;
                        console.log(result.error.message);
                    } else {
                        // Le paiement a été traité avec succès
                        if (result.paymentIntent.status === 'succeeded') {
                            var paymentIntent = result.paymentIntent;
                            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            var form = document.getElementById('payment-form');
                            var url = form.action;
                            var redirect = '/merci';

                            fetch(url, {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method: 'POST',
                                body: JSON.stringify({
                                    paymentIntent: paymentIntent
                                })
                            }).then(function(data) {
                                console.log(data);
                                form.reset();
                                
                                window.location.href = redirect;
                            }).catch(function(error) {
                                console.log(error);
                            });
                        }
                    }
                });
            });
        });
        
    </script>
   
</body>
</html>
