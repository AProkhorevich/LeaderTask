@extends('layouts.app')

@section('title')
Home
@endsection


@section('content')
@php
    use App\Models\User;
    $user = User::find(Auth::id());
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @if ($user->is_admin)
                {{ __('You are logged in as admin. Your Id is '. $user->id) }}
                @else
                    {{ __('You are logged in! Feel free to leave a note in a form below.') }}
                @endif
                </div>
                @if ($user->is_admin)
                    @include('admins.create_form')
                @else
                    @include('users.create_form')
                @endif
            </div>

            <div class="card">
                <div class="card-header">{{ __('Submition log') }}</div>

                <div class="card-body">

                </div>
                @if ($user->is_admin)
                    @include('admins.log_form')                
                @else
                    @include('users.log_form')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
