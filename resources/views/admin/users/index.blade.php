@extends('layouts.admin')

@section('content')
<section id="dashboard">
    
    <div class="ui container segment">
        <!-- product table  -->
        <table class="ui celled small table">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Street</th>
                    <th>Barangay</th>
                    <th>Municipality</th>
                    <th>Province</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> 
                @forelse ($users as $user)
                <tr>
                    <td class="three wide"><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></td>
                    <td class="three wide"><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></td>
                    <td class=" center aligned">{{ $user->email }}</td>
                    <td class=" center aligned">{{ $user->street }}</td>
                    <td class=" center aligned">{{ $user->barangay }}</td>
                    <td class=" center aligned">{{ $user->municipality }}</td>
                    <td class=" center aligned">{{ $user->province }}</td>
                    <td class="collapsing center aligned">{{ $user->status }}</td>
                </tr>
                @empty
                    <div class="ui tiny negative message" style="max-width: 400px; margin-top: 30px !important; margin: 0 auto; font-weight: 600;">No user have been registered.</a></div>
                @endforelse
                
                
            </tbody>
        </table>
           
    </div>
</section>
@endsection