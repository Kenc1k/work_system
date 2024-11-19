@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Users</h1>
                <a href="{{ route('hudud_topshiriq.create') }}" class="btn btn-primary mb-3">Create topshiriq</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Hudud</th>
                            <th scope="col">Topshiriq</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hududtopshiriqs as $hududtopshiriq)
                            <tr>
                                <td>{{ $hududtopshiriq->id }}</td>
                                <td>{{ $hududtopshiriq->hudud_id}}</td>
                                <td>{{ $hududtopshiriq->topshiriq_id }}</td>
                                <td>{{ $hududtopshiriq->status }}</td>
                                <td>
                                    <form action="{{ route('hudud_topshiriq.destroy', $hududtopshiriq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('hudud_topshiriq.edit', $hududtopshiriq->id) }}" class="btn btn-warning">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
