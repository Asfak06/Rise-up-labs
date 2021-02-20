@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
            <div class="card card-default">
                <div class="card-header">Users</div>
                <div class="card-body">
                    @if($users->count())
                    <table class="table">
                        <thead>
                              <th>
                                   First Name
                              </th>
                              <th>
                                    Last name
                              </th>
                              <th>
                                    email
                              </th>
                              <th>
                                    Birthday
                              </th>
                        </thead>

                        <tbody>                        	  
                              @foreach($users as $user)
                                    <tr>
                                          <td>{{ $user->first_name }}</td>
                                          <td>{{ $user->last_name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>{{ $user->birth_day }}</td>
                                    </tr>
                              @endforeach
                        </tbody>  
                    </table>
                       @else
                        <p class="text-center ">nothin found</p>
                       @endif
                </div>
                <a href="/" class="btn btn-success w-25 my-2 mx-2">back</a>
            </div>
        </div>
    </div>
</div>
@endsection