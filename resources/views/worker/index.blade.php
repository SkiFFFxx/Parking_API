@extends('layout.main')

@section('content')

<h2>Index Page</h2>
<div>
    <div>
        <a href="{{ route('workers.create') }}">Add User</a>
    </div>
    <hr>
    <div>
        <form action="{{ route('workers.index') }}">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
            <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">
            <input id="isMarried" type="checkbox" name="is_married" {{ request()->get('is_married') == 'on' ? ' checked' : ''}}>
            <label for="isMarried">Is married</label>
            <input type="submit" value="Find">
            <a href="{{ route('workers.index') }}">Refresh</a>
        </form>
    </div>
    <hr>
    @foreach($workers as $worker)
        <div>
            <div> <strong>Name:</strong> {{ $worker->name }} </div>
            <div> <strong>Surname:</strong> {{ $worker->surname }} </div>
            <div> <strong>Email:</strong> {{ $worker->email }} </div>
            <div> <strong>Age:</strong> {{ $worker->age }} </div>
            <div> <strong>Description:</strong> {{ $worker->description }} </div>
            <div> <strong>is_married:</strong> {{ $worker->is_married }} </div>
            <div>
                <a href="{{ route('workers.show', $worker->id) }}">See User</a>
            </div>
            <div>
                <a href="{{ route('workers.edit', $worker->id) }}">Edit User</a>
            </div>
            <div>
                <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
            </div>
            <hr>
        </div>
    @endforeach
    <div class="my-nav">
        {{ $workers->WithQueryString()->links() }}
    </div>
</div>


@endsection
