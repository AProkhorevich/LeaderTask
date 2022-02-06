<div class="card">
    <div class="card-body">
        @foreach($notes as $note)
            <ul class="list-group">
                <ui class="list-group-item">{{ $note->note_id }} </ui>
                <ui class="list-group-item"><b>User identificator:</b> {{ $note->user_id }} </ui>
                <ui class="list-group-item">Name: {{ $note->name }} </ui>
                <ui class="list-group-item">Email: {{ $note->email }} </ui>
                <ui class="list-group-item">Contatct phone: {{ $note->phone }} </ui>
                @if (!empty($note->message))
                    <ui class="list-group-item">Message:
                        {{$note->message}}
                    </ui>
                @endif
            </ul>
            <a class='text-decoration-none text-white btn btn-danger mt-1' href="{{url('delete-message/' . $note->note_id)}}">Delete</a>
            <a class='text-decoration-none btn btn-secondary mt-1' href="{{url('update-message/' . $note->note_id)}}">Edit</a>

            <hr/>
        @endforeach
    </div>
</div>