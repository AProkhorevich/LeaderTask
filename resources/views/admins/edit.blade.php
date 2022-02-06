@extends('layouts.app')

@section('title')
Edit
@endsection

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-header">
        Edit message
    </div>
    <div class="card-body">
        <form method="POST" name="message-form" id="message-form" action="{{ url("commit-message") }}">
            @csrf
            <input name="user_id" type="hidden" value="{{ $req[0]->id }}">
            <input name="note_id" type="hidden" value="{{ $req[0]->note_id }}">
            {{-- Phone --}}
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">Contact Phone</label>
                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control " name="phone" value="{{ $req[0]->phone }}" required="">
                </div>
            </div>
            {{-- Message --}}
            <div class="row mb-3">
                <label for="message" class="col-md-4 col-form-label text-md-end">Message (optional)</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="message">{{$req[0]->message}}</textarea>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer d-flex justify-content-center">
        <button type="submit" form="message-form" class="btn btn-primary btn-lg active form-control w-50 ">Submit</button>
    </div>
</div>
@endsection