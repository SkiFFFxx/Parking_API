@extends('layout.main')

@section('content')



<h2>Create Page</h2>


<div>
    <div>
        <a href="{{ route('workers.index') }}">Main</a>
    </div>
    <form action="{{ route('workers.store') }}" method="post">
        @csrf
        <div style="margin-bottom: 15px">
            <input type="text" name="name" placeholder="name" value = "{{ old('name') }}">
            @error('name')
               <div>
                   {{ $message }}
               </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="text" name="surname" placeholder="surname" value = "{{ old('surname') }}">
            @error('surname')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="email" name="email" placeholder="email" value = "{{ old('email') }}">
            @error('email')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="number" name="age" placeholder="age" value = "{{ old('age') }}">
            @error('age')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <textarea name="description" placeholder="description">{{ old('description') }}</textarea>
            @error('description')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input
                {{ old('is_married') == 'on' ? ' checked' : '' }}
                id="isMarried" type="checkbox" name="is_married">
            <label for="isMarried">is Married</label>
            @error('is_married')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div style="margin-bottom: 15px">
            <input type="submit" value="Create">
        </div>
    </form>
</div>

@endsection
