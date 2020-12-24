@extends('layout')

@section('content')
    <h1>Edit Project</h1>
    <form method="POST" action="/projects/{{ $project->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="field">
            <label for="title">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" value="{{ $project->title}}">
            </div>
        </div>

        <div class="field">
            <label for="title">Description</label>
            <div class="control">
                <textarea class="textarea" name="description">{{ $project->description}}</textarea>
            </div>
        </div>

        <div class="field">
            <label for="title">Description</label>
            <div class="control">
                <button type="submit">Update Project</button>
            </div>
        </div>
    </form>

<form method="POST" action="/projects/{{ $project->id }}">
    @method('DELETE')
    @csrf
    <div class="field">
        <label for="title">Description</label>
        <div class="control">
            <button type="submit">Delete Project</button>
        </div>
    </div>
</form>

@endsection
