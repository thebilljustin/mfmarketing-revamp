@extends('layouts.admin')

@section('content')
<div style="padding-top: 50px;"></div>
    <form action="/admin/products/{{ $product->id }}" method="post" class="ui very padded small center aligned form segment" style="max-width: 500px; margin: 0 auto;">
        @method('PATCH')
        {{-- image here  --}}
        <div class="field">
            <label for="">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="field">
                <label for="">Category</label>
                <select name="category" id="category" class="ui search dropdown">
                    <option value="Hardware and Construction">Hardware and Construction</option>
                    <option value="Motorcycle Parts">Motorcycle Parts</option>
                    <option value="Poultry and Livestock Feeds" selected>Poultry and Livestock</option>
                </select>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">Purchased</label>
                <input type="text" value="{{ $product->purchased }} pcs" disabled>
            </div>
            <div class="field">
                <label for="">Remaining</label>
                <input type="text" value="{{ $product->remaining }} pcs" disabled>
            </div>
        </div>
        <div class="four fields">
            <div class="field">
                <label for="">Stock</label>
                <input type="number" name="stocked" value="{{ $product->stocked }}" required>
            </div>
            <div class="field">
                <label for="">Missing</label>
                <input type="number" name="missing" value="{{ $product->missing }}" required>
            </div>
            <div class="field">
                <label for="">Defective</label>
                <input type="number" name="defective" value="{{ $product->defective }}" required>
            </div>
            <div class="field">
                <label for="">Returned</label>
                <input type="number" name="returned" value="{{ $product->returned }}" required> 
            </div>
        </div>
        <div class="field" style="padding-top: 30px;">
            @csrf
            <button class="ui small negative button">Delete Product</button>
            <button class="ui small primary button">Update Product</button>
        </div>
    </form>
@endsection