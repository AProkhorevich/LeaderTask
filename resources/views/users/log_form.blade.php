<div class="card">
    <div class="card-body">
        @foreach($notes as $note)
            <ul class="list-group">
                <ui class="list-group-item"><b>Name:</b> {{ $note->name }} </ui>
                <ui class="list-group-item"><b>Email:</b> {{ $note->email }} </ui>
                <ui class="list-group-item"><b>Contatct phone:</b> {{ $note->phone }} </ui>
                @if (!empty($note->message))
                    <ui class="list-group-item"><b>Message:</b>
                        {{$note->message}}
                    </ui>
                @endif
            </ul>
            <hr/>
        @endforeach
    </div>
</div>