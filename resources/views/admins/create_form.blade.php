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
        New message
    </div>
    <div class="card-body">
        <form method="POST" name="message-form" id="message-form" action="{{ url("create-message") }}">
            @csrf
            <div class="row mb-3">
                <label for="user_id" class="col-md-4 col-form-label text-md-end">User Id</label>
                <div class="col-md-6">
                    <input id="user_id" type="text" class="form-control " name="user_id" value="{{ $user->user_id }}" required="" autocomplete="user_id" autofocus="">
                </div>
            </div>
            {{-- Name --}}
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control " name="name" value="{{ $user->name }}" required="" autocomplete="name" autofocus="">
                </div>
            </div>
            {{-- Email --}}
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required="" autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Phone --}}
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">Contact Phone</label>
                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control " name="phone" required="">
                </div>
            </div>
            {{-- Message --}}
            <div class="row mb-3">
                <label for="message" class="col-md-4 col-form-label text-md-end">Message (optional)</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="message"></textarea>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer d-flex justify-content-center">
        <button type="submit" form="message-form" class="btn btn-primary btn-lg active form-control w-50 ">Submit</button>
    </div>
</div>