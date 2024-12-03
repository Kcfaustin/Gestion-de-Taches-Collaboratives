@extends('layouts.app')

@section('content')
<x-app-layout>
    <h1>Mes Projets</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Créer un projet</a>
    <ul>
        @foreach($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                ({{ $project->status }})
            </li>
        @endforeach
    </ul>
</x-app-layout>
@endsection
