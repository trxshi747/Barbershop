@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Paiement</div>
                    
                    <div class="card-body">
                        @php
                            $exchange_rate = 0.11;
                            $usd_amount = session('total_price') * $exchange_rate;
                        @endphp
                        <h4>Total à payer : {{ session('total_price') }} DH (≈ {{ number_format($usd_amount, 2) }} $)</h4>
                        <script src="https://www.paypal.com/sdk/js?client-id=AXRE5lmz3Q0Ix7L8GvEscb1aDunDzJExkEAxdvTZu6B4CSbKNFFY-FiooAFTEjGwkeHNd0Tobc_ePc8p&currency=USD"></script>
                        <div id="paypal-button-container"></div>
                        <script>
                            fetch('https://api.exchangerate-api.com/v4/latest/USD')
                                .then(response => response.json())
                                .then(data => {
                                    const madAmount = {{ session('total_price') }};
                                    const usdAmount = (madAmount / data.rates.MAD).toFixed(2);
                                    
                                    paypal.Buttons({
                                        createOrder: (data, actions) => {
                                            return actions.order.create({
                                                purchase_units: [{
                                                    amount: {
                                                        value: usdAmount,
                                                        currency_code: 'USD'
                                                    }
                                                }]
                                            });
                                        },
                                        onApprove: (data, actions) => {
                                            return actions.order.capture().then((details) => {
                                                fetch("{{ route('checkout.store') }}", {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    },
                                                    body: JSON.stringify({
                                                        payment_id: details.id,
                                                        methode: 'PayPal'
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        window.location.href = data.redirect;
                                                    } else {
                                                        alert('Erreur: ' + data.error);
                                                    }
                                                })
                                                .catch(error => alert(error));
                                            });
                                        }
                                    }).render('#paypal-button-container'); // Correction ici
                                })
                                .catch(error => {
                                    console.error('Erreur API taux de change:', error);
                                    alert('Impossible de charger les taux de change');
                                });
                        </script>
                        <div id="timeout-alert" class="alert alert-danger d-none">
                            Votre session a expiré ! Vous serez redirigé vers la page de réservation dans <span id="countdown">3:00</span>.
                        </div>

                        <script>
                        // Décompte de 1 minutes
                        let minutes = 2;
                        let seconds = 0;
                        const countdownEl = document.getElementById('countdown');

                        const timer = setInterval(() => {
                            countdownEl.textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
                            
                            if (seconds === 0) {
                                if (minutes === 0) {
                                    clearInterval(timer);
                                    document.getElementById('timeout-alert').classList.remove('d-none');
                                    setTimeout(() => {
                                        window.location.href = "{{ route('booking.show') }}";
                                    }, 3000); // Redirection après 3 secondes
                                } else {
                                    minutes--;
                                    seconds = 59;
                                }
                            } else {
                                seconds--;
                            }
                        }, 1000);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    #timeout-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
    }
</style>