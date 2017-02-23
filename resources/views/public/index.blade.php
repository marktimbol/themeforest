@extends('layouts.app')

@section('pageTitle', 'Welcome')

@section('content')
<div class="container">
    @foreach( $items as $item )
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $item->name }}</div>

                <div class="panel-body">
                    {{ $item->description }}

                    <hr />
                    <form method="POST" action="/cart">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $item->id }}" />
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Add to Cart</button>
                            <a href="{{ $item->url() }}" class="btn btn-sm btn-link">View Item</a>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
