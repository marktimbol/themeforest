@extends('layouts.app')

@section('pageTitle', sprintf('All the Templates you can download from %s', config('app.name')))

@section('content')
    
<div class="Hero center-content">
    <div class="Hero__content">
        <h1 class="Hero__title">
            7,397 Graphic Templates
        </h1>
        <p class="Hero__description">
            Print Templates, Product Mockups, Website, UX/UI Kits, Infographics, Logos and Scene Generators from independent designers
        </p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <a class="list-group-item" href="#">
                    Print Template
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    Product Mockups
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    Websites
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    UX &amp; UI Kits
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    Infographics
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    Logos
                    <span class="badge">7</span>
                </a>
                <a class="list-group-item" href="#">
                    Scene Generators
                    <span class="badge">7</span>
                </a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach( range(1, 9) as $index )
                <div class="col-md-4">
                    <div class="Card">
                        <div class="Card__image">
                            <img src="/images/sample-item.jpeg" alt="" title="" class="img-responsive" />
                        </div>
                        <div class="Card__content">
                            <div class="Card__content--info">
                                <h4 class="Card__title">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p class="Card__author">
                                    By <strong>Boxkayu</strong>
                                </p>
                            </div>
                            <div class="Card__content--download">
                                <button class="btn-link">
                                    <i class="fa fa-cloud-download"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <ul class="list-group">
                @foreach( $items as $item )
                <li class="list-group-item">
                    {{ $item->name }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
