@extends('layouts.admin')

@section('content')
<section id="dashboard">
    <div class="ui very padded container segment">
        <form class="ui form">
            <div class="three fields">
                <div class="field">
                    <div class="ui labeled input">
                        <div class="ui label">Start Date</div>
                        <input type="date" name="startDate">
                    </div>
                </div>
                <div class="field">
                    <div class="ui labeled input">
                        <div class="ui label">End Date</div>
                        <input type="date" name="endDate">
                    </div>
                </div>
                <div class="field center">
                    <button class="ui orange button">Show Record</button>
                </div>
            </div>
        </form>
        <table class="ui celled small table" style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Purchased</th>
                    <th>Total Purchased</th>
                    <th>MDR</th>
                    <th>Total MDR</th>
                    <th>OverAll Total</th>
                </tr>
            </thead>
        </table>
    </div>
</section>
@endsection