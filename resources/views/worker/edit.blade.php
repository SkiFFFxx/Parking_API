@extends('layout.main')

@section('content')



<h2>Edit Page</h2>

<div>
    <div>
        <a href="{{ route('workers.index') }}">Main</a>
    </div>
    <hr>
    <form action="{{ route('workers.update', $worker->id) }}" method="post">
        @csrf
        @method('patch')
        <div style="margin-bottom: 15px">
            <input type="text" name="name" placeholder="name" value = "{{ old('name') ?? $worker->name }}">
            @error('name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="text" name="surname" placeholder="surname" value = "{{ old('surname') ?? $worker->surname }}">
            @error('surname')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="email" name="email" placeholder="email" value = "{{ old('email') ?? $worker->email }}">
            @error('email')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="number" name="age" placeholder="age" value = "{{ old('age') ?? $worker->age }}">
            @error('age')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <textarea name="description" placeholder="description">{{ old('description') ?? $worker->description }}</textarea>
            @error('description')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input id="isMarried" type="checkbox" name="is_married"
            {{ $worker->is_married ? 'checked' : ''}}>
            <label for="isMarried">is Married</label>
            @error('is_married')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div style="margin-bottom: 15px">
            <input type="submit" value="Save">
        </div>
    </form>
</div>

@endsection
