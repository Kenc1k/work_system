@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Hududlar</h1>
                <a href="{{ route('hudud.create') }}" class="btn btn-primary mb-3">Create User</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hududs as $hudud)
                            <tr>
                                <td>{{ $hudud->id }}</td>
                                <td>{{ $hudud->user_id }}</td>
                                <td>{{ $hudud->name }}</td>
                                <td>
                                    <form action="{{ route('hudud.destroy', $hudud->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('hudud.edit', $hudud->id) }}" class="btn btn-warning">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
