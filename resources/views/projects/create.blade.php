@extends('layout')
@section('content')
@csrf
<div class="field">
    <label class="label" for="title">Project Title</label>
    <input type="text" name="title" placeholder="PrjectTitle"><br>
</div>

<div class="field">
    <label class="label" for="description">Project Title</label>
    <textarea name="description" id="" cols="30" rows="10" ></textarea><br>
</div>

<div class="field">
    <div class="control">
        <button type="submit">create</button>
    </div>
</div>

<div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endsection
