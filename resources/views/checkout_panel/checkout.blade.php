@extends('main_panel_template.template')

@section('content')

    <body class="bg-light">

        <div class="container">

            <div class="row align-items-start">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach (Cart::content() as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $item->name }}</h6>
                                    <small class="text-muted">Quantity: {{ $item->qty }}</small>
                                </div>
                                <span class="text-normal">/ ${{ $item->price }}</span>
                                <span class="text-normal">${{ $item->price * $item->qty }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between ">
                            <span>Total (USD)</span>
                            <strong>${{ Cart::subtotal() }}</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form id="orderForm" name="orderForm" action="" method="post" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder=""
                                    value="{{ !empty($customerAddress) ? $customerAddress->first_name : '' }}" required>
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder=""
                                    value="{{ !empty($customerAddress) ? $customerAddress->last_name : '' }}" required>
                                <p></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <div class="input-group">
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    placeholder="xxxx xxxx xxxx"
                                    value="{{ !empty($customerAddress) ? $customerAddress->phone_number : '' }}" required>
                                <p></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="you@example.com"
                                value="{{ !empty($customerAddress) ? $customerAddress->email : '' }}">
                            <p></p>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea rows="3" name="address" class="form-control" id="address" placeholder="1234 Main St" required>{{ !empty($customerAddress) ? $customerAddress->address : '' }}</textarea>
                            <p></p>
                        </div>


                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" name="country" required>
                                    <option value="">Choose...</option>
                                    @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option
                                                {{ !empty($customerAddress) && $customerAddress->country_id == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control" id="state"
                                    placeholder="California"
                                    value="{{ !empty($customerAddress) ? $customerAddress->state : '' }}" required>
                                <p></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" class="form-control" id="zip" placeholder=""
                                    value="{{ !empty($customerAddress) ? $customerAddress->zip : '' }}" required>
                                <p></p>
                            </div>
                        </div>

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="payment_method" type="radio" class="custom-control-input"
                                    checked required value="credit">
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="cod" name="payment_method" type="radio" class="custom-control-input"
                                    required value="cod">
                                <label class="custom-control-label" for="cod">COD</label>
                            </div>
                        </div>
                        <div id="card-payment-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" name="card_name" class="form-control" id="cc-name"
                                        placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" name="card_number" class="form-control" id="cc-number"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" name="card_expiration" class="form-control" id="cc-expiration"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" name="card_cw" class="form-control" id="cc-cvv"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn text-light btn-lg btn-block bg-dark" type="submit">Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
