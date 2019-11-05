@extends('layouts.master')

@section('content')
    <div class="container">
        @include('layouts.sidebar')
        <div class="row">
            <div class="col-md-12 offset-1">
                <div class="card">
                    <div class="card-header">
                        <strong>  Dashboard</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome To Dashboard <br>
                        You are logged in!
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
