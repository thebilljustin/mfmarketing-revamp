@extends('layouts.admin')

@section('content')
<section id="dashboard">
    <div class="ui container segment">
        <form class="ui form center aligned" method="post">
            <div class="ui input" style="width: 40%; margin-bottom: 30px;">
                <input type="text" placeholder="Transaction ID or customer name" name="searchParameter">
                <button class="ui orange button" name="searchBtn">Search</button>
                <button class="ui orange button" name="pendingBtn">Pending</button>
            </div>
        </form>
        <div class="ui styled fluid accordion">
            <div class="title orange-text">
                <i class="dropdown icon"></i>
                Bill Justin Manalo - Blk 3 Lot 57 Phase 9, Golden City, Dasmarinas, Cavite -- 09672833867
            </div>
            <div class="content">
                <span class="transition hidden">
                    <table class="ui collapsing celled table">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Barbed Wire</td>
                                <td>27</td>
                                <td>P 1, 938.93</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post">
                    <button class="ui orange button" value="">Delivered</button>
                    </form>
                </span>
            </div>
        </div>
    </div>
</section>

@endsection