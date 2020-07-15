@extends('layouts.admin')

@section('content')
<section id="dashboard">
    <div class="ui container segment">
            <form class="ui form center">
                <div class="ui input" style="width: 40%;">
                    <input type="text" placeholder="Product name or code...">
                    <button class="ui orange button">Search</button>
                </div>

                <!-- product table  -->
                <table class="ui table">
                    <thead>
                        <tr>
                            <th class="eight wide">Product Name</th>
                            <th class="four wide">Code</th>
                            <th>Stocked</th>
                            <th>Purchased</th>
                            <th>Missing</th>
                            <th>Defective</th>
                            <th>Returned</th>
                            <th>Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Galvanized Iron Sheet</td>
                            <td>00125489874</td>
                            <td class="collapsing center aligned" data-content="03/18/19" data-variation="basic">300</td>
                            <td class="collapsing center aligned">56</td>
                            <td class="collapsing center aligned">2</td>
                            <td class="collapsing center aligned">0</td>
                            <td class="collapsing center aligned">0</td>
                            <td class="collapsing center aligned">242</td>
                        </tr>
                        <tr class="error">
                            <td class="left aligned">Barbed Wire</td>
                            <td>0074568415</td>
                            <td class="collapsing center aligned">300</td>
                            <td class="collapsing center aligned">56</td>
                            <td class="collapsing center aligned">2</td>
                            <td class="collapsing center aligned">0</td>
                            <td class="collapsing center aligned">0</td>
                            <td class="collapsing center aligned">242</td>
                        </tr>
                    </tbody>
                </table>
            </form>
    </div>
</section>
@endsection