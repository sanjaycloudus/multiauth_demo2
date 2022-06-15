@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h4>hi user {{Auth::user()->name }}</h4>
                <hr><h1>profile</h1>
                <form method="GET" >
                    @csrf
                    <table>
                        <tr>
                            <td>name</td>
                            <td><input type="text" name="name" value="{{Auth::user()->name }}"></td>
                        </tr>
                         <tr>
                            <td>email</td>
                            <td><input type="email" name="email" value="{{Auth::user()->email }}"></td>
                        </tr>
                       
                       
                        <tr>
                            <td><input type="submit" name="update" value="change"></td>
                        </tr>
                    </table>
                </form>
                <a href="{{url('/password/reset')}}">change password</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
