@extends('layouts.app')


@section('content')
<section id="dashboard">
    <div class="ui padded container">
        <div class="container">
            <form class="ui very padded small form segment" action="{{ route('products.store') }}" method="post">
                <h4 class="ui dividing header">Add Items</h4>
                <div class="two fields">
                    <div class="field">
                        <label>Item Name</label>
                        <input type="text" placeholder="Name" name="name">
                    </div>
                    <div class="field">
                        <label>Category</label> 
                        <!-- turn into dropdown select  -->
                        <select name="category" id="" class="ui search dropdown">
                            <option value="">Select Category</option>
                            <option value="Hardware and Construction">Hardware and Construction</option>
                            <option value="Motorcycle Parts">Motorcycle Parts</option>
                            <option value="Poultry and Livestock Feeds">Poultry and Livestock Feeds</option>
                        </select>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label>Price</label> 
                        <input type="text" placeholder="Price" name="price" required>
                    </div>
                    <div class="field">
                        <label>Stock</label> 
                        <input type="text" placeholder="Quantity" name="stocked" required>
                    </div>
                    <div class="field">
                        <label for="">Image</label>
                        <input type="text" placeholder="Select Image" name="image" >
                    </div>
                </div>
                <div class="field">
                    @csrf
                    <button class="ui orange small button">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection