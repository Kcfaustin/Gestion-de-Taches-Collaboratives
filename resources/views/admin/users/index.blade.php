@extends('layout')
@section('content')
<x-app-layout>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container mx-auto mt-6">
        <h1 class="text-center text-2xl font-bold">Gestion des Utilisateurs</h1>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Projets</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->usertype }}</td>
                    <td>{{ $user->projects_count }}</td>
                    <td>
                        <a href="{{ route('admin.users.projects', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Voir Projets</a>
                        <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
@endsection
