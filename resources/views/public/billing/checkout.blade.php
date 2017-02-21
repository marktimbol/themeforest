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
@endsection
