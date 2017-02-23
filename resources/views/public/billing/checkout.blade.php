@extends('layouts.app')

@section('pageTitle', 'Checkout')

@section('content')

	<div class="container">
	    <div class="row">
	        <div class="col-md-8">
	            <h3>Billing Details</h3>
	            <p class="lead">
					We do not sell your details or share them without your permission. Read more in our privacy policy.
	            </p>

	            <form method="POST" id="payment-form">
	            	{{ csrf_field() }}
	            	<div class="row">
	            		<div class="col-md-6">
	            			<div class="form-group">
	            				<label for="first_name">First Name <span class="required">*</span></label>
	            				<input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" />
	            			</div>
	            		</div>
	            		<div class="col-md-6">
	            			<div class="form-group">
	            				<label for="last_name">Last Name <span class="required">*</span></label>
	            				<input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" />
	            			</div>
	            		</div>
	            	</div>

            		<div class="form-group">
        				<label for="company">Company Name</label>
        				<input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}" />
            		</div>

            		<div class="form-group">
        				<label for="country">Country <span class="required">*</span></label>
        				<input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" />
            		</div>

            		<div class="form-group">
        				<label for="address_line_1">Address line 1 <span class="required">*</span></label>
        				<input type="text" name="address_line_1" id="address_line_1" class="form-control" value="{{ old('address_line_1') }}" />
            		</div>

            		<div class="form-group">
        				<label for="address_line_2">Address line 2</label>
        				<input type="text" name="address_line_2" id="address_line_2" class="form-control" value="{{ old('address_line_2') }}" />
            		</div>

            		<div class="row">
            			<div class="col-md-4">
	        				<label for="city">City <span class="required">*</span></label>
	        				<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" />	
            			</div>

            			<div class="col-md-4">
	        				<label for="state">State / Province / Region</label>
	        				<input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" />	
            			</div> 

            			<div class="col-md-4">
	        				<label for="zip">Zip / Postal Code</label>
	        				<input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" />	
            			</div>             			           			
            		</div>	 

            		<div class="form-group">
            			<label for="card-element">Credit or Debit card</label>
            			<div id="card-element">
            				<!-- a Stripe Element will be inserted here. -->
            			</div>
						<!-- Used to display form errors -->
						<div id="card-errors"></div>       			
            		</div>   

            		<div class="form-group">
            			<button class="btn btn-lg btn-primary">Submit Payment</button>
            		</div>
	            </form>
	        </div>

	        <div class="col-md-4">
	            <h3>Order Summary</h3>
	            <p>3D Design</p>

	        </div>
	    </div>
	</div>

@endsection

@section('footer_scripts')
	<script src="https://js.stripe.com/v3/"></script>
	<script>
		var stripe = Stripe('pk_test_FdWDhqgmFddybwXdk6GOL1fH');
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
			base: {
				color: '#32325d',
				lineHeight: '24px',
				fontFamily: 'Helvetica Neue',
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
		};

		// Create an instance of the card Element
		var card = elements.create('card', { style: style });
		// Add an instance of the card Element into the `card-element` <div>
		card.mount('#card-element');

		card.addEventListener('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
		});

		// Create a token or display an error the form is submitted.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
			event.preventDefault();
			stripe.createToken(card).then(function(result) {
				if (result.error) {
					// Inform the user if there was an error
					var errorElement = document.getElementById('card-errors');
					errorElement.textContent = result.error.message;
				} else {
					// Send the token to your server
					stripeTokenHandler(result.token);
				}
			});
		});

		function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
		}						
	</script>
@endsection
