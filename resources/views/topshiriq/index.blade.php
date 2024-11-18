@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Topshiriqlar</h1>
                <a href="{{ route('topshiriq.create') }}" class="btn btn-primary mb-3">Create Topshiriq</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Ijrochi</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">File</th>
                            <th scope="col">Muddat</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topshiriqs as $topshiriq)
                            <tr>
                                <td>{{ $topshiriq->id }}</td>
                                <td>{{ $topshiriq->category_id }}</td>
                                <td>{{ $topshiriq->ijrochi }}</td>
                                <td>{{ $topshiriq->title }}</td>
                                <td>{{ $topshiriq->description }}</td>
                                <td>
                                    @if ($topshiriq->file)
                                        <a href="{{ asset('files/' . $topshiriq->file) }}" download>{{ $topshiriq->file }}</a>
                                    @else
                                        No File
                                    @endif
                                </td>
                                
                                <td>{{ $topshiriq->muddat }}</td>
                                <td>
                                    <form action="{{ route('topshiriq.destroy', $topshiriq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('topshiriq.edit', $topshiriq->id) }}" class="btn btn-warning">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
