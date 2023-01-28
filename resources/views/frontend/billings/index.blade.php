@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluid my-5">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-7 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            Proceed Payment
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('pay')}}" class="card-form mt-3 mb-3">
                                @csrf
                                <div class="row mb-3">
                                    <label for="card_name" class="col-sm-2 col-form-label form-label">Card Holder</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="payment_method" class="payment-method">
                                        <input type="text" class="form-control" name="card_holder_name" id="card_name" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div id="card-element"></div>
                                </div>
                                <div id="card-errors" role="alert"></div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success pay">
                                        Pay
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe("{{ env('STRIPE_KEY') }}")
        let elements = stripe.elements()
        let style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
        let card = elements.create('card', {style: style})
        card.mount('#card-element')
        let paymentMethod = null
        $('.card-form').on('submit', function (e) {
            $('button.pay').attr('disabled', true)
            if (paymentMethod) {
                return true
            }
            stripe.confirmCardSetup(
                "{{ $intent->client_secret }}",
                {
                    payment_method: {
                        card: card,
                        billing_details: {name: $('.card_holder_name').val()}
                    }
                }
            ).then(function (result) {
                if (result.error) {
                    $('#card-errors').text(result.error.message)
                    $('button.pay').removeAttr('disabled')
                } else {
                    paymentMethod = result.setupIntent.payment_method
                    $('.payment-method').val(paymentMethod)
                    $('.card-form').submit()
                }
            })
            return false
        })
    </script>
@endsection
