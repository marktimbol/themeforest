@extends('layouts.app')

@section('pageTitle', $item->name)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $item->name }}</h1>
            <p class="lead">
                {{ $item->description }}
            </p>
            
            <form method="POST" action="/cart">
            	{{ csrf_field() }}
            	<input type="hidden" name="id" value="{{ $item->id }}" />
            	<div class="form-group">
            		<button class="btn btn-primary">Add to Cart</button>
            	</div>
            </form>
        </div>
    </div>
</div>

@endsection
