@extends('layout.main')

@section('content')



    <h2>Show Page</h2>

    <div>
        <div>
            <div> <strong>Name:</strong> {{ $worker->name }} </div>
            <div> <strong>Surname:</strong> {{ $worker->surname }} </div>
            <div> <strong>Email:</strong> {{ $worker->email }} </div>
            <div> <strong>Age:</strong> {{ $worker->age }} </div>
            <div> <strong>Description:</strong> {{ $worker->description }} </div>
            <div> <strong>is_married:</strong> {{ $worker->is_married }} </div>
            <div>
                <a href="{{ route('workers.index') }}">Back</a>
            </div>
            <hr>
        </div>
</div>

@endsection
