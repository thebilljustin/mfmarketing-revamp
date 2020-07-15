@extends('layouts.app')

@section('content')
<section id="products">
    <div class="ui container"> 
        <div class="row">
            <div class="ui breadcrumb">
                <a href="/store?category=all" class="section">Show All</a>
                <span class="divider">/</span>
                <a href="/store?category=Hardware and Construction" class="section">Hardware and Construction</a>
                <span class="divider">/</span>
                <a href="/store?category=Motorcycle Parts" class="section">Motorcycle Parts</a>
                <span class="divider">/</span>
                <a href="/store?category=Poultry and Livestock Feeds" class="section">Poultry and Livestock</a>
            </div>
        </div>
        
        <div class="row center">
            {!! $message !!}
        </div>

        <div class="ui grid" style="margin-top: 30px;">
            
            @forelse ($items as $item)
            <div class="four wide column">
                <form class="ui center card"  method="post" action="/store">
                    <h4 class="header">{{ $item->name }}</h4>
                    <div class="field">
                        <img src="../img/7087lafarge-republic-portland-plus-40kg.jpg" alt="">
                    </div>
                    <div class="field">
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                        <div class="ui action input">
                            <input type="number" placeholder="0" name="quantity" required>
                            <button class="ui orange basic button">P {{ $item->price }}</button>
                        </div>
                    </div>
                    
                    <div class="field" style="padding-top: 20px;">
                        @csrf
                        <button class="ui orange button" type="submit">
                            <i class="cart icon"></i>
                            Add to Cart
                        </button>
                    </div>
                </form>
            </div>
            @empty
                <div class="ui info tiny message" style="margin: 0 auto;"><div class="header">There are no available items that matched your criteria.</div></div>
            @endforelse
            
        </div> 
    </div>
</section>
@endsection